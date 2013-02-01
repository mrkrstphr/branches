<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// Composer autoloading
$vendor = realpath(__DIR__ . '/../../vendor');

if (file_exists($vendor . '/autoload.php')) {
    $loader = include $vendor . '/autoload.php';
}

$paths = array(__DIR__ . '/src/Branches/Persistence/mappings');
$isDevMode = false;

$dbParams = array(
    'driver'   => 'pdo_pgsql',
    'user'     => 'branches',
    'password' => '4bches1$',
    'dbname'   => 'branches',
);

$config = Setup::createXMLMetadataConfiguration($paths, $isDevMode);
$em = EntityManager::create($dbParams, $config);

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));

