<?php

namespace ApiTests\Feature;

use Api\Tests\TestCase;

class LoginTest extends TestCase
{

    /**
     * @var array
     */
    private static $user = ['email' => 'test@demo.com', 'password' => 'secret', 'name' => 'test user'];

    /**
     *
     */
    public function setUp()
    {
        parent::setUp();
        $this->createUser();
    }

    /**
     * @return mixed
     */
    private function createUser()
    {
        $response = $this
            ->json('POST', '/api/register', static::$user)
            ->decodeResponseJson();

        return $response['token'];
    }

    /**
     *
     */
    public function testValidLogin()
    {
        $validUser = ['email' => static::$user['email'],  'password' => static::$user['password']];

        $response = $this->json('POST', '/api/login', $validUser);

        $response
            ->assertStatus(200)
            ->assertJsonStructure(['token']);
    }

    /**
     *
     */
    public function testInvalidLogin()
    {
        $invalidUser = ['email' => static::$user['email'],  'password' => 'wrongPassword'];

        $response = $this->json('POST', '/api/login', $invalidUser);

        $response
            ->assertStatus(401)
            ->assertJsonStructure(['error'])
            ->assertJson(['error' => 'invalid_credentials']);
    }

    /**
     *
     */
    public function testLoginWithoutParams()
    {
        $response = $this->json('POST', '/api/login', []);

        $response
            ->assertStatus(400)
            ->assertJsonStructure(['email', 'password'])
            ->assertJson([
                    'email' => ['The email field is required.'],
                    'password' => ['The password field is required.']
            ]);
    }
}
