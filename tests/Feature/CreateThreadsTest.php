<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    protected $thread;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->make();
    }

    /**
     * @test
     */
    public function unauthenticated_user_can_not_create_new_threads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->post('/threads', $this->thread->toArray());
    }
    
    /**
     * @test
     */
    public function authenticated_user_can_create_new_threads()
    {
        $this->actingAs( factory('App\User')->create() );

        $this->post('/threads', $this->thread->toArray());

        $this->get($this->thread->path())
            ->assertSee($this->thread->title)
            ->assertSee($this->thread->body);
    }
}
