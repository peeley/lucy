<?php

namespace Tests\Feature;

use App\Models\Board;
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

        $response = $this->get("/boards/1");
        $response->assertStatus(200);

        $response = $this->get("/boards/2");
        $response->assertStatus(200);

        $response = $this->get("/boards/3");
        $response->assertStatus(200);

        $response = $this->get("/boards/999");
        $response->assertStatus(200);
    }

    public function test_nonexistant_user_boards_returns_404()
    {
        $response = $this->get("/users/999/boards");

        $response->assertStatus(404);
    }

    public function test_user_can_get_board_tiles()
    {
        $board = Board::factory()->for($this->user)->create();

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
            'name' => $board->name,
            'width' => $board->width,
            'height' => $board->height,
            'contents' => [
                [$folders[0]->toArray(), $words[4]->toArray()],
                [$folders[1]->toArray()]
            ]
        ]);
    }

    public function test_user_can_delete_board()
    {
        $board = Board::factory()->for($this->user)->create();

        $response = $this->actingAs($this->user)->delete("/boards/{$board->id}");

        $response->assertRedirectContains('/home');
        $response->assertSessionHas('success');
    }

    public function test_unauthenticated_user_cannot_delete_board()
    {
        $board = Board::factory()->for($this->user)->create();

        $response = $this->delete("/boards/{$board->id}");

        $response->assertRedirectContains('/login');
    }

    public function test_user_can_create_board()
    {
        $this->assertEquals($this->user->boards()->count(), 0);

        $response = $this->actingAs($this->user)->post('/boards');

        $response->assertRedirectContains('/home');
        $response->assertSessionHas('success');

        $this->assertEquals($this->user->boards()->count(), 1);
    }

    public function test_user_must_be_authenticated_to_create_board()
    {
        $response = $this->post('/boards');

        $response->assertRedirectContains('/login');
    }
}
