<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;

class AuthControllerTest extends TestCase
{
    public function testLoginDriver()
    {
        $this->post('/driver/login', ['username' => 'anuradha', 'password' => 'anuradha1234'])
            ->seeJson([
                'success' => 0,
            ]);
    }

    public function testLogoutDriver()
    {
        $this->post('/driver/logout', ['id' => 2, 'latitude'=>0, 'longitude'=>0, 'stateId'=>1])
            ->seeJson([
                'success' => true,
            ]);
    }

}
