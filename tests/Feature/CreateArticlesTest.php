<?php

namespace Tests\Feature;

use Illuminate\Auth\AuthenticationException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateArticlesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_guest_cant_visit_create_articles_page()
    {
        $this->withoutExceptionHandling();
        $this->expectException(AuthenticationException::class);
        
        $this->get(route('articles.create'));
    }
    
    /** @test */
    public function a_user_can_create_posts()
    {
        $this->signIn();

        $this->post(route('articles.store'), [
            'title' => 'Test Title',
            'content' => 'Test Content',
        ]);

        $this->assertEquals('success', session()->get('flash_notification')->first()->level);
    }

    /** @test */
    public function the_title_is_required()
    {
        $this->signIn();

        $response = $this->post(route('articles.store'), [
            'title' => '',
            'content' => 'Test Content',
        ]);

        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function the_content_is_required()
    {
        $this->signIn();

        $response = $this->post(route('articles.store'), [
            'title' => 'Test Title',
            'content' => '',
        ]);

        $response->assertSessionHasErrors('content');
    }
}
