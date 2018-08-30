<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    protected $thread;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->create();
    }

    /**
     * @test
     */
    public function unauthenticated_user_can_not_add_reply()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $reply = factory('App\Reply')->make();

        $this->post($this->thread->path() . '/replies', $reply->toArray());
    }
    
    /**
     * @test
     */
    public function authenticated_user_can_participate_in_forum_threads()
    {
        $this->be($user = factory('App\User')->create());

        $reply = factory('App\Reply')->make();

        $this->post($this->thread->path() . '/replies', $reply->toArray());

        $this->get($this->thread->path())
            ->assertSee($reply->body);
    }
}
