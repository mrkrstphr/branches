<?php
/**
 *
 */

namespace Branches\Domain\Model;

/**
 *
 */
class LocationTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testLocation()
    {
        $description = 'test description';
        $address1 = 'Attn Wicked Dude';
        $address2 = '123 Any Street';
        $address3 = 'Apt #14';
        $city = 'Chicago';
        $state = 'IL';
        $postal = '60602';
        $country = 'US';
        $phone = '555-555-5555';

        $location = new Location();
        $location->setDescription($description);
        $location->setAddress1($address1);
        $location->setAddress2($address2);
        $location->setAddress3($address3);
        $location->setCity($city);
        $location->setStateProvince($state);
        $location->setPostalCode($postal);
        $location->setCountry($country);
        $location->setPhone($phone);

        $this->assertEquals($description, $location->getDescription());
        $this->assertEquals($address1, $location->getAddress1());
        $this->assertEquals($address2, $location->getAddress2());
        $this->assertEquals($address3, $location->getAddress3());
        $this->assertEquals($city, $location->getCity());
        $this->assertEquals($state, $location->getStateProvince());
        $this->assertEquals($postal, $location->getPostalCode());
        $this->assertEquals($country, $location->getCountry());
        $this->assertEquals($phone, $location->getPhone());
    }
}
