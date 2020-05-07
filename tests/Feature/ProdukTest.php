<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProdukTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function testCreatePassordMatch()
    {
        $response = $this->post('/register',['username' => 'username',
        'password' => '123qwe',
        'password2' => '123qwe',
        'email' => 'email@gmail.com',
        'no_hp' => '0812',
        'status' => 'customer'])->assertRedirect('/');
    }

    // public function testCreatePasswordNotSame()
    // {
    //     $response = $this->post('/register',['username' => 'username',
    //     'password' => 'password',
    //     'email' => 'email@gmail.com',
    //     'no_hp' => '0812',
    //     'status' => 'customer'])->assertRedirect('/');

    //     // $response->assertStatus(302);
    // }

    
}
