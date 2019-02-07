<?php

namespace Api\Tasks;

use Api\Repositories\UserRepository;

class LoginTask implements TaskInterface
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * LoginTask constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return array
     */
    public function run() :array
    {
        return $this->userRepository->login($this->email, $this->password);
    }

    /**
     * @param string $email
     * @return LoginTask
     */
    public function setEmail(string $email): LoginTask
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param string $password
     * @return LoginTask
     */
    public function setPassword(string $password): LoginTask
    {
        $this->password = $password;
        return $this;
    }
}
