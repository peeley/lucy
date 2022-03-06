<?php

namespace Tests\Feature;

use App\Models\Folder;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class FolderTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    public function test_folder_needs_user()
    {
        // we shouldn't be able to make a folder without an associated user - we
        // expect to throw an exception here
        $this->expectException(\Exception::class);

        Folder::create(['name' => 'folder1']);
    }

    public function test_user_can_make_folder()
    {
        $folder = Folder::factory()
            ->for($this->user)
            ->create(['name' => 'folder1']);

        $this->assertInstanceOf(Folder::class, $folder);
    }

    public function test_folder_can_be_added_to_board()
    {
        $board = $this->user->boards()->create([
            'name' => 'board1',
            'width' => 7,
            'height' => 5
        ]);

        $folder = $this->user->folders()->create(['name' => 'board1 folder']);

        $this->assertInstanceOf(Folder::class, $folder);

        $board->folders()->attach($folder, ['board_x' => 1, 'board_y' => 1]);

        $this->assertEquals('board1 folder', $board->folders()->get()->first()->name);

        $board->folders()->detach($folder);

        $this->assertEmpty($board->folders()->get());
    }

    public function test_word_can_be_added_to_folder()
    {
        $word = $this->user->words()->create([
            'text' => 'Hello'
        ]);

        $folder = $this->user->folders()->create(['name' => 'greetings']);

        $folder->words()->attach($word, ['board_x' => 5, 'board_y' => 5]);

        $this->assertEquals($folder->words()->get()->first()->text, 'Hello');

        $folder->words()->detach($word);

        $this->assertEmpty($folder->words()->get());
    }

    public function test_folder_can_be_added_to_folder()
    {
        $outer_folder = $this->user->folders()->create(['name' => 'foods']);

        $inner_folder = $this->user->folders()->create(['name' => 'orange foods']);

        $word = $this->user->words()->create(['text' => 'oranges']);

        $inner_folder->words()->attach($word, ['board_x' => 1, 'board_y' => 1]);

        $outer_folder->folders()->attach($inner_folder, ['board_x' => 1, 'board_y' => 2]);

        $nested_folder = $outer_folder->folders()->get()->first();

        $this->assertEquals('orange foods', $nested_folder->name);

        $this->assertEquals('oranges', $nested_folder->words()->first()->text);
    }

    public function test_folder_can_be_serialized()
    {
        $word = $this->user->words()->create([
            'text' => 'Hello',
            'color' => '#123456'
        ]);

        $folder = $this->user->folders()->create(['name' => 'greetings']);

        $folder->words()->attach($word, ['board_x' => 5, 'board_y' => 3]);

        // need to fetch folder from DB to auto-load words relationship for toArray
        $actual_json = Folder::find($folder->id)->toArray();

        $expected_json = [
            'name' => 'greetings',
            'color' => '#FFFFFF',
            'icon' => null,
            'contents' => [
                [[
                    'text' => 'Hello',
                    'icon' => null,
                    'color' => '#123456',
                    'id' => $word->id,
                ]],
            ],
            'id' => $folder->id,
        ];

        $this->assertEquals($expected_json, $actual_json);
    }

    public function test_nested_folder_can_be_serialized()
    {
        $outer_folder = $this->user->folders()->create(['name' => 'foods']);

        $inner_folder = $this->user->folders()->create(['name' => 'orange foods']);

        $word = $this->user->words()->create(['text' => 'oranges']);

        $inner_folder->words()->attach($word, ['board_x' => 5, 'board_y' => 5]);

        $outer_folder->folders()->attach($inner_folder, ['board_x' => 1, 'board_y' => 2]);

        $outer_folder->words()->attach($word, ['board_x' => 3, 'board_y' => 2]);

        $actual_json = Folder::find($outer_folder->id)->toArray();

        $expected_json = [
            'name' => 'foods',
            'color' => '#FFFFFF',
            'icon' => null,
            'contents' => [
                [
                    [
                        'name' => 'orange foods',
                        'color' => '#FFFFFF',
                        'icon' => null,
                        'contents' => [
                            [[
                                'text' => 'oranges',
                                'icon' => null,
                                'color' => '#FFFFFF',
                                'id' => $word->id,
                            ]]
                        ],
                        'id' => $inner_folder->id,
                    ],
                    [
                        'text' => 'oranges',
                        'icon' => null,
                        'color' => '#FFFFFF',
                        'id' => $word->id,
                    ]
                ]
            ],
            'id' => $outer_folder->id,
        ];

        $this->assertEquals($expected_json, $actual_json);
    }
}
