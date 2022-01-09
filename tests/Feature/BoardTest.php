<?php

namespace Tests\Feature;

use App\Models\Board;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class BoardTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function test_board_needs_user()
    {
        $this->expectException(\Exception::class);

        Board::create(['name' => 'my board', 'height' => 5, 'width' => 5]);
    }

    public function test_user_can_make_board()
    {
        $board = $this->user->boards()->create([
            'name' => 'my board',
            'height' => 5,
            'width' => 5
        ]);

        $this->assertInstanceOf(Board::class, $board);
    }

    public function test_board_defaults()
    {
        $board = $this->user->boards()->create([
            'name' => 'my board'
        ]);

        $this->assertEquals(7, $board->width);
        $this->assertEquals(5, $board->height);
    }

    public function test_board_can_add_word()
    {
        $word = $this->user->words()->create([
            'text' => 'Hi!'
        ]);

        $board = $this->user->boards()->create([
            'name' => 'my board',
            'height' => 3,
            'width' => 2
        ]);

        $board->words()->attach($word, ['board_x' => 1, 'board_y' => 1]);

        // need to load relationships for them to be visible in array
        $board->load('words', 'folders');

        $expected_array = [
            'name' => 'my board',
            'folders' => [],
            'height' => 3,
            'width' => 2,
            'words' => [
                ['text' => 'Hi!',
                 'color' => '#FFFFFF',
                 'icon' => null,
                 'pivot' => [
                     'board_x' => 1,
                     'board_y' => 1,
                     'board_id' => $board->id,
                     'word_id' => $word->id
                 ]]
            ]
        ];

        $this->assertEquals($expected_array, $board->toArray());
    }

    public function test_board_can_add_folder()
    {
        $folder = $this->user->folders()->create([
            'name' => 'greetings',
            'color' => '#FF00FF'
        ]);

        $board = $this->user->boards()->create([
            'name' => 'my board 2',
            'height' => 3,
            'width' => 2
        ]);

        $board->folders()->attach($folder, ['board_x' => 1, 'board_y' => 2]);

        $board->load('folders', 'words');

        $expectected_array = [
            'name' => 'my board 2',
            'height' => 3,
            'width' => 2,
            'words' => [],
            'folders' => [
                ['name' => 'greetings',
                 'color' => '#FF00FF',
                 'icon' => null,
                 'words' => [],
                 'folders' => [],
                 'pivot' => [
                     'board_x' => 1,
                     'board_y' => 2,
                     'board_id' => $board->id,
                     'folder_id' => $folder->id
                 ]]
            ]
        ];

        $this->assertEquals($expectected_array, $board->toArray());
    }

    public function test_board_can_add_word_and_folder()
    {
        $folder = $this->user->folders()->create([
            'name' => 'goodbyes',
            'color' => '#00FF00'
        ]);

        $board = $this->user->boards()->create([
            'name' => 'my board 3',
            'height' => 6,
            'width' => 6
        ]);

        $word = $this->user->words()->create([
            'text' => 'Goodbye!'
        ]);

        $board->words()->attach($word, ['board_x' => 1, 'board_y' => 1]);
        $board->folders()->attach($folder, ['board_x' => 2, 'board_y' => 1]);
    }
}
