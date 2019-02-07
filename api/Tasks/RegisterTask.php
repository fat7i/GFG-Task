<?php

namespace Api\Tasks;

use Api\Repositories\UserRepository;

class RegisterTask implements TaskInterface
{
    /**
     * @var string
     */
    private $name;

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
     * RegisterTask constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return array
     */
    public function run(): array
    {
        return $this->userRepository->register($this->name, $this->email, $this->password);
    }

    /**
     * @param string $name
     * @return RegisterTask
     */
    public function setName(string $name): RegisterTask
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param string $email
     * @return RegisterTask
     */
    public function setEmail(string $email): RegisterTask
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param string $password
     * @return RegisterTask
     */
    public function setPassword(string $password): RegisterTask
    {
        $this->password = $password;
        return $this;
    }
}
