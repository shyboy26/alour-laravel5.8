<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }



    /** @test */
    public function cobaTest()
    {
      $response = $this->get('/admin/data_sewa')->assertRedirect('/');
    }
}
