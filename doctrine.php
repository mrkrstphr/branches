<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\Types\Type;
use Symfony\Component\Console\Application;

require 'vendor/autoload.php';

$paths = array(__DIR__ . '/src/Branches/Persistence/Mapping');
$isDevMode = true;

$params = require 'src/Branches/www/config/autoload/db.local.php';

$config = Setup::createXMLMetadataConfiguration($paths, $isDevMode);
$config->addEntityNamespace('', 'Branches\Domain\Model');

$em = EntityManager::create($params['doctrine']['params'], $config);

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(
    array(
        'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
        'dialog' => new \Symfony\Component\Console\Helper\DialogHelper(),
        'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
    )
);

$db = $em->getConnection();

$cli = new Application('Doctrine Command Line Interface', \Doctrine\ORM\Version::VERSION);
$cli->setCatchExceptions(true);
$cli->setHelperSet($helperSet);

\Doctrine\ORM\Tools\Console\ConsoleRunner::addCommands($cli);

$cli->addCommands(
    array(
        // Migrations Commands
        new \Doctrine\DBAL\Migrations\Tools\Console\Command\DiffCommand(),
        new \Doctrine\DBAL\Migrations\Tools\Console\Command\ExecuteCommand(),
        new \Doctrine\DBAL\Migrations\Tools\Console\Command\GenerateCommand(),
        new \Doctrine\DBAL\Migrations\Tools\Console\Command\MigrateCommand(),
        new \Doctrine\DBAL\Migrations\Tools\Console\Command\StatusCommand(),
        new \Doctrine\DBAL\Migrations\Tools\Console\Command\VersionCommand()
    )
);
$cli->run();
