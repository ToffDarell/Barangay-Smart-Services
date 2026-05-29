<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    public function test_the_public_landing_page_is_accessible(): void
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    public function test_the_login_page_is_accessible(): void
    {
        $response = $this->get(route('login'));

        $response->assertOk();
    }
}
