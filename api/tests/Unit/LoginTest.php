<?php

namespace Api\Tests\Unit;

use Api\Tests\TestCase;
use App\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginTest extends TestCase
{
    /**
     * @var array
     */
    private static $user = ['email' => 'test@demo.com', 'password' => 'secret', 'name' => 'test user'];


    public function testValidLogin()
    {
        User::create([
            'name' => self::$user['name'],
            'email' => self::$user['email'],
            'password' => bcrypt(self::$user['password']),
        ]);

        $this->assertDatabaseHas('users', [
            'email' => self::$user['email']
        ]);

        $user = User::first();
        $token = JWTAuth::fromUser($user);

        $this->assertIsString($token);
    }
    
}
