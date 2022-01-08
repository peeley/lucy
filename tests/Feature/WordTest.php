<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Word;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WordTest extends TestCase
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

    public function test_word_defaults()
    {
        $word = $this->user->words()->create([
            'text' => 'Hi!'
        ]);

        $this->assertEquals($word->text, 'Hi!');
        $this->assertEquals($word->color, '#FFFFFF');
        $this->assertEquals($word->icon, null);
    }

    public function test_word_can_be_serialized()
    {
        $word = $this->user->words()->create([
            'text' => 'Hi!',
            'color' => '#ABCDEF',
            'icon' => 'file/path'
        ]);

        $expected_array = [
            'text' => 'Hi!',
            'color' => '#ABCDEF',
            'icon' => 'file/path'
        ];

        $this->assertEquals($word->toArray(), $expected_array);
    }
}
