<?php

namespace Tests\Feature;

use App\Models\Folder;
use App\Models\User;
use App\Models\Word;
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

    public function test_user_can_get_board_tiles()
    {
        $board = $this->user->boards()->create([
            'name' => 'my board',
            'height' => 3,
            'width' => 5
        ]);

        $words = Word::factory()
            ->for($this->user)
            ->count(5)
            ->create();

        $folders = Folder::factory()
            ->for($this->user)
            ->count(2)
            ->create();

        $folders[0]->words()->attach($words[0], ['board_x' => 1, 'board_y' => 1]);
        $folders[0]->words()->attach($words[1], ['board_x' => 2, 'board_y' => 1]);

        $folders[1]->words()->attach($words[2], ['board_x' => 1, 'board_y' => 1]);
        $folders[1]->words()->attach($words[3], ['board_x' => 2, 'board_y' => 1]);

        $board->folders()->attach($folders[0], ['board_x' => 1, 'board_y' => 1]);
        $board->folders()->attach($folders[1], ['board_x' => 1, 'board_y' => 2]);

        $board->words()->attach($words[4], ['board_x' => 3, 'board_y' => 1]);

        $response = $this->get("/boards/{$board->id}/tiles");

        $response->assertStatus(200);

        $response->assertJson([
            'name' => 'my board',
            'width' => 5,
            'height' => 3,
            'contents' => [
                [$folders[0]->toArray(), $words[4]->toArray()],
                [$folders[1]->toArray()]
            ]
        ]);
    }
}
