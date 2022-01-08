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

        $this->user = User::create([
            'name' => 'User McUser',
            'email' => 'user@email.com',
            'password' => Hash::make('password')
        ]);
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
        $folder = $this->user->folders()->create(['name' => 'folder1']);

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

        $board->folders()->attach($folder, ['board_position' => 5]);

        $this->assertEquals($board->folders()->get()->first()->name, 'board1 folder');

        $board->folders()->detach($folder);

        $this->assertEmpty($board->folders()->get());
    }

    public function test_word_can_be_added_to_folder()
    {
        $word = $this->user->words()->create([
            'text' => 'Hello'
        ]);

        $folder = $this->user->folders()->create(['name' => 'greetings']);

        $folder->words()->attach($word, ['board_position' => 5]);

        $this->assertEquals($folder->words()->get()->first()->text, 'Hello');

        $folder->words()->detach($word);

        $this->assertEmpty($folder->words()->get());
    }

    public function test_folder_can_be_added_to_folder()
    {
        $outer_folder = $this->user->folders()->create(['name' => 'foods']);

        $inner_folder = $this->user->folders()->create(['name' => 'orange foods']);

        $word = $this->user->words()->create(['text' => 'oranges']);

        $inner_folder->words()->attach($word, ['board_position' => 5]);

        $outer_folder->folders()->attach($inner_folder, ['board_position' => 1]);

        $nested_folder = $outer_folder->folders()->get()->first();

        $this->assertEquals($nested_folder->name, 'orange foods');

        $this->assertEquals($nested_folder->words()->first()->text, 'oranges');
    }

    public function test_folder_can_be_serialized()
    {
        $word = $this->user->words()->create([
            'text' => 'Hello',
            'color' => '#123456'
        ]);

        $folder = $this->user->folders()->create(['name' => 'greetings']);

        $folder->words()->attach($word, ['board_position' => 5]);

        // need to fetch folder from DB to auto-load words relationship for toArray
        $actual_json = Folder::find($folder->id)->toArray();

        $expected_json = [
            'name' => 'greetings',
            'color' => '#FFFFFF',
            'icon' => null,
            'words' => [
                [
                    'text' => 'Hello',
                    'pivot' => [
                        'folder_id' => $folder->id,
                        'word_id' => $word->id,
                        'board_position' => 5,
                    ],
                    'icon' => null,
                    'color' => '#123456'
                ]
            ],
            'folders' => []
        ];

        $this->assertEquals($actual_json, $expected_json);
    }

    public function test_nested_folder_can_be_serialized()
    {
        $outer_folder = $this->user->folders()->create(['name' => 'foods']);

        $inner_folder = $this->user->folders()->create(['name' => 'orange foods']);

        $word = $this->user->words()->create(['text' => 'oranges']);

        $inner_folder->words()->attach($word, ['board_position' => 5]);

        $outer_folder->folders()->attach($inner_folder, ['board_position' => 1]);

        $outer_folder->words()->attach($word, ['board_position' => 3]);

        $actual_json = Folder::find($outer_folder->id)->toArray();

        $expected_json = [
            'name' => 'foods',
            'color' => '#FFFFFF',
            'icon' => null,
            'words' => [
                [
                    'text' => 'oranges',
                    'icon' => null,
                    'color' => '#FFFFFF',
                    'pivot' => [
                        'folder_id' => $outer_folder->id,
                        'word_id' => $word->id,
                        'board_position' => 3
                    ]
                ]
            ],
            'folders' => [
                [
                    'name' => 'orange foods',
                    'color' => '#FFFFFF',
                    'icon' => null,
                    'folders' => [],
                    'words' => [
                        [
                            'text' => 'oranges',
                            'icon' => null,
                            'color' => '#FFFFFF',
                            'pivot' => [
                                'folder_id' => $inner_folder->id,
                                'word_id' => $word->id,
                                'board_position' => 5
                            ]
                        ]
                    ],
                    'pivot' => [
                        'outer_folder_id' => $outer_folder->id,
                        'inner_folder_id' => $inner_folder->id,
                        'board_position' => 1
                    ]
                ]
            ]
        ];

        $this->assertEquals($actual_json, $expected_json);
    }
}
