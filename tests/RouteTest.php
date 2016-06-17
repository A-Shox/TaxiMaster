<?php

class RouteTest extends TestCase{
    
    public function testLogin(){

        \Illuminate\Support\Facades\Auth::logout();
        $response = $this->call('GET', 'login');
        $this->assertEquals('login', $response->getOriginalContent()->getName());

        \Illuminate\Support\Facades\Auth::attempt(['username' => 'admin', 'password' => 'admin1234', 'userLevelId' => 1]);
        $response = $this->call('GET', 'login');
        $this->assertRedirectedTo('dashboard');
    }

    public function testDashboard(){

        \Illuminate\Support\Facades\Auth::logout();
        $response = $this->call('GET', 'dashboard');
        $this->assertRedirectedTo('login');

        \Illuminate\Support\Facades\Auth::attempt(['username' => 'admin', 'password' => 'admin1234', 'userLevelId' => 1]);
        $response = $this->call('GET', 'dashboard');
        $this->assertEquals('dashboard', $response->getOriginalContent()->getName());
    }

}