<?php

namespace Branches\Service\Authentication\Adapter;

use Branches\Domain\Repository\UserRepositoryInterface;
use Branches\Service\Authentication\PasswordFactory;
use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\Adapter\ValidatableAdapterInterface;
use Zend\Authentication\Result;

/**
 * Class UserRepositoryAdapter
 * @package Uss\Auth\Authentication\Adapter
 */
class UserRepositoryAdapter extends AbstractAdapter implements ValidatableAdapterInterface
{
    /**
     * @var UserRepositoryInterface
     */
    protected $userRepository;

    /**
     * @var PasswordFactory
     */
    protected $passwordFactory;

    /**
     * @param UserRepositoryInterface $userRepository
     * @param PasswordFactory $passwordFactory
     */
    public function __construct(UserRepositoryInterface $userRepository, PasswordFactory $passwordFactory) {
        $this->userRepository = $userRepository;
        $this->passwordFactory = $passwordFactory;
    }

    /**
     * @return Result
     */
    public function authenticate()
    {
        $messages = ['Please try again.'];
        $code = Result::FAILURE;
        $user = null;

        $users = $this->userRepository->getBy(['email' => $this->identity]);
        if ($users) {
            $user = $users[0];
        }

        if ($user) {
            $isPasswordValid = $this->passwordFactory->verify($this->credential, $user->getPassword());

            if ($isPasswordValid) {
                $code = Result::SUCCESS;
            }
        }

        return new Result($code, ($user ?: $this->identity), $messages);
    }
}
