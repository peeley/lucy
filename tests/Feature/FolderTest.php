<?php

namespace Tests\Feature;

use App\Models\Folder;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
}
