<?php

namespace Tests\Feature;

use App\Models\Board;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BoardControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function test_user_can_retrieve_boards()
    {
        $this->user->boards()->createMany([
            ['name' => 'board uno', 'id' => 1, 'width' => 1, 'height' => 2],
            ['name' => 'board dos', 'id' => 2, 'width' => 3, 'height' => 4],
            ['name' => 'board tres', 'id' => 3, 'width' => 5, 'height' => 6]
        ]);

        $response = $this->get("/users/{$this->user->id}/boards");

        $response->assertStatus(200);

        $response->assertJson([
            ['name' => 'board uno', 'id' => 1],
            ['name' => 'board dos', 'id' => 2],
            ['name' => 'board tres', 'id' => 3]
        ]);
    }

    public function test_nonexistant_user_boards_returns_404()
    {
        $response = $this->get("/users/999/boards");

        $response->assertStatus(404);
    }
}
