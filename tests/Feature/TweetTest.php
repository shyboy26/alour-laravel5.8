<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Tweet;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class TweetTest extends TestCase
{
    // use RefreshDatabase;
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
    public function test_user_create_a_tweet()
    {
        // setup
        $user = factory(User::class)->create();

        // exercise
        $user->createTweet('My tweet!');

        // verify
        // $this->seeInDatabase('tweets', ['tweet' => 'My tweet!']);
        $this->assertDatabaseHas('tweets', ['tweet' => 'My tweet!']);
    }

    public function test_user_create_a_tweet_with_login()
    {
        // setup
        $user = factory(User::class)->create();
        // dd($user);

        // exercise
        $response = $this->actingAs($user)->call('POST', route('tweet.store'), ['tweet' => 'My Lovely Tweet!']);
        // $response = $this->actingAs($user)->post('tweet.store',['tweet' => 'My Lovely Tweet!'])->assertStatus(201);
       
        // dd($response);
        // verify
        // $this->seeInDatabase('tweets', ['tweet' => 'My Lovely Tweet!']);
        $this->assertDatabaseHas('tweets', ['tweet' => 'My Lovely Tweet!']);
    }
}
