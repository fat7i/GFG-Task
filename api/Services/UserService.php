<?php

namespace Api\Services;

use Api\Tasks\LoginTask;
use Api\Tasks\LogoutTask;
use Api\Tasks\RegisterTask;

class UserService
{
    /**
     * @var LoginTask
     */
    private $loginTask;

    /**
     * @var RegisterTask
     */
    private $registerTask;

    private $logoutTask;

    /**
     * UserService constructor.
     * @param LoginTask $loginTask
     * @param LogoutTask $logoutTask
     * @param RegisterTask $registerTask
     */
    public function __construct(LoginTask $loginTask, LogoutTask $logoutTask, RegisterTask $registerTask)
    {
        $this->loginTask = $loginTask;
        $this->logoutTask = $logoutTask;
        $this->registerTask = $registerTask;
    }

    /**
     * @param string $email
     * @param string $password
     * @return array
     */
    public function login(string $email, string $password): array
    {
        return $this->loginTask
            ->setEmail($email)
            ->setPassword($password)
            ->run();
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return array
     */
    public function register(string $name, string $email, string $password): array
    {
        return $this->registerTask
            ->setName($name)
            ->setEmail($email)
            ->setPassword($password)
            ->run();
    }

    public function logout(string $token): array
    {
        return $this->logoutTask->setToken($token)->run();
    }
}
