<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function unauthenticated_user_can_not_create_new_threads()
    {
        $this->withExceptionHandling();

        $this->get('/threads/create')
            ->assertRedirect('/login');

        $this->post('/threads')
            ->assertRedirect('/login');
    }

    /**
     * @test
     */
    public function authenticated_user_can_create_new_threads()
    {
        $this->singIn();

        $thread = make('App\Thread');
        $response = $this->post('/threads', $thread->toArray());

        $this->get($response->headers->get('Location'))
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }

    /**
     * @test
     */
    public function thread_storing_requires_title_field()
    {
        $this->storeThread(['title'=>null])
            ->assertSessionHasErrors('title');
    }
    /**
     * @test
     */
    public function thread_storing_requires_body_field()
    {
        $this->storeThread(['body'=>null])
            ->assertSessionHasErrors('body');
    }
    /**
     * @test
     */
    public function thread_storing_requires_existing_valid_category_id_field()
    {
        factory('App\Category', 2)->create();

        $this->storeThread(['category_id'=>null])
            ->assertSessionHasErrors('category_id');

        $this->storeThread(['category_id'=>10])
            ->assertSessionHasErrors('category_id');
    }

    public function storeThread($attributes = [])
    {
        $this->withExceptionHandling()->singIn();
        $thread = make('App\Thread', $attributes);

        return $this->post('/threads', $thread->toArray());
    }
}
