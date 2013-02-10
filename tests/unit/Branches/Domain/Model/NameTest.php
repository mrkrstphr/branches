<?php
/**
 *
 */

namespace Branches\Domain\Model;

/**
 * Provides unit testing against the Name
 */
class NameTest extends \PHPUnit_Framework_TestCase
{
    use SourcedTest;

    /**
     *
     * @var string
     */
    protected $_entity = 'Branches\\Domain\\Model\\Name';

    /**
     *
     */
    public function testName()
    {
        $name = new Name('Abraham', 'Lincoln', 100);
        $this->assertEquals('Abraham', $name->getGivenName());
        $this->assertEquals('Lincoln', $name->getSurname());
        $this->assertEquals(100, $name->getCertainty());

        $name->setPrefix('Mr.');
        $name->setSuffix('The Great');
        $name->setNickname('Honest Abe');

        $this->assertEquals('Mr.', $name->getPrefix());
        $this->assertEquals('The Great', $name->getSuffix());
        $this->assertEquals('Honest Abe', $name->getNickname());

        $this->assertEquals('Mr. Abraham Lincoln, The Great', $name->getProperName());
        $this->assertEquals('Abraham Lincoln, The Great', $name->getFullName());
        $this->assertEquals('Lincoln, Abraham, The Great', $name->getSurnameFirst());

        $name->setGivenName('Abe');
        $name->setSurname('Linkin');
        $name->setCertainty(40);

        $this->assertEquals('Abe', $name->getGivenName());
        $this->assertEquals('Linkin', $name->getSurname());
        $this->assertEquals(40, $name->getCertainty());
    }
}
