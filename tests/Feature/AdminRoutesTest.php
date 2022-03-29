<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminRoutesTest extends TestCase
{

    /**
     * Admin news route
     *
     * @return void
     */

    public function test_admin_news_route()
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }


    /**
     * Admin news create route
     *
     * @return void
     */

    public function test_admin_news_create_route()
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertOK();
    }

    /**
     * Admin news Insert in DB route
     *
     * @return void
     */

    public function test_admin_news_store_route()
    {
        $response = $this->get(route('admin.news.store'));

        $response->assertOK();
    }

}
