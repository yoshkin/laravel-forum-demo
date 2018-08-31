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

        $this->thread = create('App\Thread');
    }

    /**
     * @test
     */
    public function thread_instance_have_correct_path()
    {
        $this->assertEquals("/threads/{$this->thread->category->slug}/{$this->thread->id}", $this->thread->path());
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
    public function thread_has_replies()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->thread->replies);
    }

    /**
     * @test
     */
    public function thread_belongs_to_category()
    {
        $this->assertInstanceOf('App\Category',$this->thread->category);
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
