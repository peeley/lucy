<?php

namespace Tests\Feature;

use App\Models\Board;
use App\Models\Folder;
use App\Models\User;
use App\Models\Word;
use Illuminate\Foundation\Testing\RefreshDatabase;
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
        $word = Word::factory()->for($this->user)->create();

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
            'height' => 3,
            'width' => 2,
            'contents' => [
                [[
                    'text' => $word->text,
                    'color' => $word->color,
                    'icon' => $word->icon,
                    'id' => $word->id
                ]]
            ]
        ];

        $this->assertEquals($expected_array, $board->toArray());
    }

    public function test_board_can_add_folder()
    {
        $folder = Folder::factory()->for($this->user)->create();

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
            'contents' => [[
                [
                    'name' => $folder->name,
                    'color' => $folder->color,
                    'icon' => $folder->icon,
                    'contents' => [],
                    'id' => $folder->id,
                ]
            ]]
        ];

        $this->assertEquals($expectected_array, $board->toArray());
    }

    public function test_board_can_add_word_and_folder()
    {
        $folder = Folder::factory()->for($this->user)->create();

        $word = Word::factory()->for($this->user)->create();

        $board = $this->user->boards()->create([
            'name' => 'my board 3',
            'height' => 6,
            'width' => 6
        ]);

        $board->words()->attach($word, ['board_x' => 1, 'board_y' => 2]);
        $board->folders()->attach($folder, ['board_x' => 3, 'board_y' => 4]);
        $board->load('words', 'folders');

        // TODO refactor to allow for blank tiles
        $expected_array = [
            'name' => 'my board 3',
            'height' => 6,
            'width' => 6,
            'contents' => [
                [[
                    'text' => $word->text,
                    'color' => $word->color,
                    'icon' => $word->icon,
                    'id' => $word->id,
                ]],
                [[
                    'name' => $folder->name,
                    'color' => $folder->color,
                    'icon' => $folder->icon,
                    'contents' => [],
                    'id' => $folder->id,
                ]]
            ]
        ];

        $this->assertEquals($expected_array, $board->toArray());
    }
}
