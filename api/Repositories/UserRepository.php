<?php

namespace Api\Repositories;

use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserRepository
{
    /**
     * @var User
     */
    private $model;

    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * @param string $email
     * @param string $password
     * @return array
     */
    public function login(string $email, string $password): array
    {
        $credentials = ['email' => $email, 'password' => $password];

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return ['status_code' => 401, 'response' => ['error' => 'invalid_credentials']];
            }
        } catch (JWTException $e) {
            return ['status_code' => 500, 'response' => ['error' => 'could_not_create_token']];
        }

        return ['status_code' => 200, 'response' => ['token' => $token]];
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return array
     */
    public function register(string $name, string $email, string $password): array
    {
        $this->model->create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ]);

        $user = $this->model->first();
        $token = JWTAuth::fromUser($user);

        return ['status_code' => 201, 'response' => ['token' => $token]];
    }

    /**
     * @param string $token
     * @return array
     */
    public function logout(string $token): array
    {
        JWTAuth::invalidate($token);

        return ['status_code' => 200, 'response' => ['message' => 'logged_out']];
    }
}
