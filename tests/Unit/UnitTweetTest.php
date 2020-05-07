<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\UserController;
use App\Repositories\TweetRepository;
use App\Services\TweetService;
use App\Tweet;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Mockery;

class UnitTweetTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_tweets()
    {
        // Setup
        $mock = Mockery::mock(TweetRepository::class);

        $data = [[
            'id' => 1,
            'tweet' => 'sip',
            'user_id' => 1,
            'created_at' => null,
            'updated_at' => null
        ]];
        $mock->shouldReceive('getLatestTweets')->once()->andReturn($data);

        // Exercise
        $userService = new TweetService($mock);
        $results = $userService->getTweets(1);

        // Verify
        $this->assertEquals($data[0]['tweet'], 'sip');
    }
}
