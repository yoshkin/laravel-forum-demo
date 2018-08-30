<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReplyTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function reply_has_user()
    {
        $reply = factory('App\Reply')->create();

        $this->assertInstanceOf('App\User', $reply->user);
    }
}
