<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\News;

class TestNews extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNewsPage() {
        $response = $this->get('/news/');
        $response->assertStatus(200);
    }

    public function testNewsListTest() {
        $this->assertIsArray(News::getNews());
    }

    public function testNewsIdTest() {
        $this->assertIsArray(News::getNewsId('123'));
    }
}
