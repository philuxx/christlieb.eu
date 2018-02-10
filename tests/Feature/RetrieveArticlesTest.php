<?php

namespace Tests\Feature;

use App\Article;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RetrieveArticlesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_visitor_can_see_paginated_articles()
    {
        factory(Article::class, 20)->create();

        $viewData = $this->getViewData($this->get('/blog'));

        $this->assertInstanceOf(LengthAwarePaginator::class, $viewData['articles']);
    }

    /** @test */
    public function a_visitor_can_retrieve_a_single_article_by_slug()
    {
        $article = factory(Article::class)->create(['slug' => 'foo-bar']);

        $viewData = $this->getViewData($this->get('/blog/foo-bar'));

        $this->assertEquals($article->fresh(), $viewData['article']);
    }
}
