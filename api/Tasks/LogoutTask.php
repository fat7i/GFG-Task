<?php

namespace Api\Tasks;

use Api\Repositories\UserRepository;

class LogoutTask implements TaskInterface
{
    /**
     * @var string
     */
    private $token;

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
        return $this->userRepository->logout($this->token);
    }

    /**
     * @param string $token
     * @return LogoutTask
     */
    public function setToken(string $token): LogoutTask
    {
        $this->token = $token;
        return $this;
    }
}
