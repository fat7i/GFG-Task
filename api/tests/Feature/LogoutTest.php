<?php

namespace ApiTests\Feature;

use Api\Tests\TestCase;

class LogoutTest extends TestCase
{

    /**
     * @var array
     */
    private static $user = ['email' => 'test@demo.com', 'password' => 'secret', 'name' => 'test user'];

    /**
     * @var string
     */
    private $token;

    /**
     *
     */
    public function setUp()
    {
        parent::setUp();
        $this->token = $this->createUser();
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
    public function testValidLogout()
    {
        $response = $this
            ->withHeaders([
                'Authorization' => 'Bearer '. $this->token,
            ])
            ->json('GET', '/api/logout');
        $response
            ->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJson(['message' => 'logged_out']);
    }

    /**
     *
     */
    public function testLogoutWithoutToken()
    {
        $response = $this->json('GET', '/api/logout');

        $response
            ->assertStatus(400)
            ->assertJsonStructure(['error'])
            ->assertJson(['error' => 'token_not_provided']);
    }

    /**
     *
     */
    public function testLogoutWithExpiredToken()
    {
        $this->withHeaders(['Authorization' => 'Bearer '. $this->token])->json('GET', '/api/logout');

        $response = $this
            ->withHeaders([
                'Authorization' => 'Bearer '. $this->token,
            ])
            ->json('GET', '/api/logout');

        $response
            ->assertStatus(401)
            ->assertJsonStructure(['error'])
            ->assertJson(['error' => 'token_invalid']);
    }


}
