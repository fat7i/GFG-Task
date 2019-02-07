<?php

namespace Api\Tests\Feature;

use Api\Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     *
     */
    public function testValidRegister()
    {
        $userArray = ['email' => 'test@demo.com', 'password' => 'secret', 'name' => 'test user'];

        $response = $this->json('POST', '/api/register', $userArray);

        $response
            ->assertStatus(201)
            ->assertJsonStructure(['token']);
    }

    /**
     *
     */
    public function testRegisterWithoutParams()
    {
        $userArray = [];

        $response = $this->json('POST', '/api/register', $userArray);

        $response
            ->assertStatus(400)
            ->assertJsonStructure(['email', 'name', 'password'])
            ->assertJson([
                    'email' => ['The email field is required.'],
                    'name' => ['The name field is required.'],
                    'password' => ['The password field is required.'],
                ]);
    }
}
