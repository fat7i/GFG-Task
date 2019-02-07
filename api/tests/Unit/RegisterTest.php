<?php

namespace Api\Tests\Unit;

use Api\Tests\TestCase;
use App\User;

class RegisterTest extends TestCase
{
    /**
     * @var array
     */
    private static $user = ['email' => 'test@demo.com', 'password' => 'secret', 'name' => 'test user'];


    public function testValidRegister()
    {
        User::create([
            'name' => self::$user['name'],
            'email' => self::$user['email'],
            'password' => bcrypt(self::$user['password']),
        ]);

        $this->assertDatabaseHas('users', [
            'email' => self::$user['email']
        ]);
    }

}
