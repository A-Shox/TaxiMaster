<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;

class AuthControllerTest extends TestCase
{
    public function testLoginDriver()
    {
        $this->post('/driver/login', ['username' => 'anuradha', 'password' => 'anuradha1234', 'userType' => 'DRIVER'])
            ->seeJson([
                'success' => 0,
            ]);
    }

//    public function testLoginWeb()
//    {
//        $this->post('/login', ['username' => 'admin', 'password'=>'admin1234'])
//            ->seePageIs('/dashboard');
//    }

    public function testLogoutWeb()
    {
        $response = $this->action('GET', 'AuthController@logoutWeb');
        $this->assertRedirectedTo('login');
    }
}
