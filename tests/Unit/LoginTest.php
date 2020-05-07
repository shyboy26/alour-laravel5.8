<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
// use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{

    // use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $this->assertTrue(true);
    // }

    // public function test_user_can_view_a_login_form()
    // {
    //     $response = $this->get('/login');

    //     $response->assertSuccessful();
    //     // $response->assertViewIs('auth.login');
    // }

    // public function test_user_cannot_view_a_login_form_when_authenticated()
    // {
    //     $user = factory(User::class)->make();

    //     $response = $this->actingAs($user)->get('/login')->assertStatus(200);;

        
    // }

    public function test_user_can_login_with_correct_credentials()
    {
        // $user = factory(User::class)->create();
        // $user = factory(User::class)->create([
        //     'password' => bcrypt($password = 'i-love-laravel'),
        // ]);
        // dd($user);
        // dd($user->email);
        $response = $this->get('/login', [
            'email' => 'kemmer.evangeline@example.net',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ])->assertStatus(200);
        // dd($response);

        // $response->assertRedirect('/customer/barang');
        // $this->assertAuthenticatedAs($user);
    }
}
