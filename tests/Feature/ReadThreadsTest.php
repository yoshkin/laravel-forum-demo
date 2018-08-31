<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;

    protected $thread;

    public function setUp()
    {
        parent::setUp();

        $this->thread = create('App\Thread');
    }

    /**
     *  @test
     */
    public function user_can_access_threads_page()
    {
        $this->get('/threads')
            ->assertStatus(200);
    }

    /**
     *  @test
     */
    public function user_can_view_threads_titles()
    {
        $this->get('/threads')
            ->assertSee($this->thread->title);
    }

    /**
     *  @test
     */
    public function user_can_view_single_thread()
    {
        $this->get($this->thread->path())
            ->assertSee($this->thread->title);
    }

    /**
     *  @test
     */
    public function user_can_view_replies_of_the_single_thread()
    {
        $reply = create('App\Reply', ['thread_id' => $this->thread->id]);

        $this->get($this->thread->path())
            ->assertSee($reply->body);
    }
}
