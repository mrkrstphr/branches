<?php

namespace Branches\Service\Authentication;

use InvalidArgumentException;

/**
 * Class PasswordFactory
 * @package Uss\Domain\Service\Factory
 */
class PasswordFactory
{
    /**
     * Creates a hashed password string for the provided password.
     *
     * @param string $password
     * @return string
     */
    public function create($password)
    {
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
    }

    /**
     * Determines if the passed plaintext $password matches the correct hash $hash.
     *
     * @param string $password
     * @param string $hash
     * @return boolean
     * @throws InvalidArgumentException
     */
    public function verify($password, $hash)
    {
        return password_verify($password, $hash);
    }
}
