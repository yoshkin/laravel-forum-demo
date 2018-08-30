<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ThreadTest extends TestCase
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
    public function thread_has_replies()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
    }
    
    /**
     * @test
     */
    public function thread_has_an_author()
    {
        $this->assertInstanceOf('App\User', $this->thread->author);
    }

    /**
     * @test
     */
    public function reply_can_be_added_to_thread()
    {
        $this->thread->addReply([
            'user_id' => 1,
            'body' => 'Testing adding reply'
        ]);

        $this->assertCount(1, $this->thread->replies);
    }
}
