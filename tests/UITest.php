<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UITest extends TestCase
{
    public function testFromLogin()
    {
        $this->visit('/login')
            ->type('admin', 'username')
            ->type('admin1234','password')
            ->click('button')
            ->seePageIs('/dashboard');
    }
}
