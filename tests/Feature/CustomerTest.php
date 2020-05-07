<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_customer_login()
    {
        //setup
        $user = factory(User::class)->create();

        //execute
        $response = $this->get('/login', [
            'email' => $user->email,
            'password' => $user->password,
        ])->assertRedirect('/customer/barang');
    }
}
