<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Request;

class AuthControllerTest extends TestCase
{
    public function testLoginDriver()
    {
        $response = $this->action('POST', 'AuthController@loginDriver', ['username' => 'anuradha', 'password' => 'anuradha', 'userType' => 'DRIVER']);
        $this->assertEquals('{"success":0,"driver":{"id":2,"username":"anuradha","firstName":"Anuradha","lastName":"Wickramrachchi","phone":"0712755777","isActive":1}}', $response->getContent());
    }

    public function testLoginWeb()
    {
        $response = $this->action('POST', 'AuthController@loginWeb', ['username' => 'admin', 'password'=>'admin']);
        $this->assertRedirectedTo('dashboard');
    }

    public function testLogoutWeb()
    {
        $response = $this->action('GET', 'AuthController@logoutWeb');
        $this->assertRedirectedTo('login');
    }
}
