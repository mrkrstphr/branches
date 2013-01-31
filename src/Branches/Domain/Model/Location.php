<?php
/**
 *
 */

namespace Branches\Domain\Model;

/**
 *
 */
class Location extends Entity
{
    use Timestamped, Sourced;

    /**
     *
     * @var string
     */
    protected $description;

    /**
     *
     * @var string
     */
    protected $_address1;

    /**
     *
     * @var string
     */
    protected $_address2;

    /**
     *
     * @var string
     */
    protected $_address3;

    /**
     *
     * @var string
     */
    protected $_city;

    /**
     *
     * @var string
     */
    protected $_stateProvince;

    /**
     *
     * @var string
     */
    protected $_postalCode;

    /**
     *
     * @var string
     */
    protected $_countryCode;

    /**
     *
     * @var string
     */
    protected $_phoneNumber;

    /**
     * @param string $address1
     */
    public function setAddress1($address1)
    {
        $this->_address1 = $address1;
    }

    /**
     * @return string
     */
    public function getAddress1()
    {
        return $this->_address1;
    }

    /**
     * @param string $address2
     */
    public function setAddress2($address2)
    {
        $this->_address2 = $address2;
    }

    /**
     * @return string
     */
    public function getAddress2()
    {
        return $this->_address2;
    }

    /**
     * @param string $address3
     */
    public function setAddress3($address3)
    {
        $this->_address3 = $address3;
    }

    /**
     * @return string
     */
    public function getAddress3()
    {
        return $this->_address3;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->_city = $city;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * @param string $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->_countryCode = $countryCode;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->_countryCode;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->_phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->_phoneNumber;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->_postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->_postalCode;
    }

    /**
     * @param string $stateProvince
     */
    public function setStateProvince($stateProvince)
    {
        $this->_stateProvince = $stateProvince;
    }

    /**
     * @return string
     */
    public function getStateProvince()
    {
        return $this->_stateProvince;
    }
}
