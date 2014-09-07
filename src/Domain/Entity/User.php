<?php

namespace Branches\Domain\Entity;

/**
 * Class User
 * @package Branches\Domain\Entity
 */
class User extends AbstractEntity
{
    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $password;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
}
