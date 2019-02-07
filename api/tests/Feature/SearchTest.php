<?php

namespace ApiTests\Feature;

use Api\Tests\TestCase;

class SearchTest extends TestCase
{

    private $token;
    /**
     *
     */
    public function setUp()
    {
        parent::setUp();
        $this->token = $this->getToken();
    }

    /**
     * @return mixed
     */
    private function getToken()
    {
        $userArray = ['email' => 'test@demo.com', 'password' => 'secret', 'name' => 'test user'];

        $response = $this
            ->json('POST', '/api/register', $userArray)
            ->decodeResponseJson();
        return $response['token'];
    }

    /**
     *
     */
    public function testSearch()
    {
        $response = $this
            ->withHeaders([
                'Authorization' => 'Bearer '. $this->token,
            ])
            ->json('GET', '/api/search?q=green&brand=levis');

        $response
            ->assertStatus(200)
            ->assertJsonStructure(['current_page', 'data']);
    }
}
