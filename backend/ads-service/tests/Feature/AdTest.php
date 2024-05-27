<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Ad;

class AdTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_ads()
    {
        Ad::factory()->count(15)->create();
        $response = $this->getJson('/api/ads');
        $response->assertStatus(200)->assertJsonCount(10, 'data');
    }

    public function test_create_ad()
    {
        $response = $this->postJson('/api/ads', [
            'title' => 'Test Ad',
            'description' => 'This is a test ad',
            'photos' => ['http://example.com/photo1.jpg'],
            'price' => 100.00,
        ]);

        $response->assertStatus(201)->assertJson(['status' => 'success']);
        $this->assertDatabaseHas('ads', ['title' => 'Test Ad']);
    }

    public function test_validation_error_on_create_ad()
    {
        $response = $this->postJson('/api/ads', [
            'title' => '',
            'price' => -100.00,
        ]);

        $response->assertStatus(422);
    }
}

