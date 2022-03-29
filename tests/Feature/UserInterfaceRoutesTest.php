<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserInterfaceRoutesTest extends TestCase
{

    /**
     * Home page route test
     *
     * @return void
     */

    public function test_home_route()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
    }

    /**
     * About page route test
     *
     * @return void
     */

    public function test_about_route()
    {
        $response = $this->get(route('about'));

        $response->assertStatus(200);
    }

    /**
     * News page route test
     *
     * @return void
     */

    public function test_news_route()
    {
        $response = $this->get(route('news.show', ['id' => 1]));

        $response->assertStatus(200);
    }

    /**
     * Category page route test
     *
     * @return void
     */

    public function test_news_by_category_route()
    {
        $response = $this->get(route('news.category.show', ['category_id' => 1]));

        $response->assertStatus(200);
    }

    /**
     * Feedback create page route test
     *
     * @return void
     */

    public function test_feedback_create_route()
    {
        $response = $this->get(route('feedback.create'));

        $response->assertStatus(405);
    }


}
