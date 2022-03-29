<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardRoutesTest extends TestCase
{
    /**
     * Dashboard page route 
     *
     * @return void
     */


    public function test_dashboard_route()
    {
        $response = $this->get(route('admin.dashboard'));

        $response->assertStatus(200);
    }


}
