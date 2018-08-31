<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    protected $thread;
    protected $reply;

    public function setUp()
    {
        parent::setUp();

        $this->thread = create('App\Thread');
        $this->reply = make('App\Reply');

    }

    /**
     * @test
     */
    public function unauthenticated_user_can_not_add_reply()
    {
        $this->withExceptionHandling()
            ->post($this->thread->path() . '/replies', [])
            ->assertRedirect('/login');
    }
    
    /**
     * @test
     */
    public function authenticated_user_can_participate_in_forum_threads()
    {
        $this->singIn();

        $this->post($this->thread->path() . '/replies', $this->reply->toArray());

        $this->get($this->thread->path())
            ->assertSee($this->reply->body);
    }

    /**
     * @test
     */
    public function reply_storing_requires_body_field()
    {
        $this->withExceptionHandling()->singIn();

        $this->reply = make('App\Reply', ['body'=>null]);

        $this->post($this->thread->path() . '/replies', $this->reply->toArray())
            ->assertSessionHasErrors('body');

    }
}
