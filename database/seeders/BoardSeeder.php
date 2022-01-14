<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);

        $board = $user->boards()->create([
            'name' => 'Default board',
            'width' => 5,
            'height' => 3
        ]);

        $user->words()->createMany([
            ['id' => 1, 'text' => 'Hello'],
            ['id' => 2, 'text' => 'Goodbye'],
            ['id' => 3, 'text' => 'Yay!'],
            ['id' => 4, 'text' => 'Ball'],
            ['id' => 5, 'text' => 'Hamburger'],
            ['id' => 6, 'text' => 'Orange'],
        ]);

        $user->folders()->createMany([
            ['id' => 1, 'name' => 'Food'],
            ['id' => 2, 'name' => 'Orange Food']
        ]);

        $user->folders()->find(1)->words()->attach([
            5 => ['board_x' => 1, 'board_y' => 1],
            6 => ['board_x' => 2, 'board_y' => 1]
        ]);

        $board->words()->attach([
            1 => ['board_x' => 1, 'board_y' => 1],
            2 => ['board_x' => 2, 'board_y' => 1],
            3 => ['board_x' => 3, 'board_y' => 1],
            4 => ['board_x' => 4, 'board_y' => 1]
        ]);

        $board->folders()->attach([
            1 => ['board_x' => 1, 'board_y' => 2]
        ]);
    }
}
