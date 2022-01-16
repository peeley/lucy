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
            ['id' => 1, 'text' => 'Hello', 'color' => '#ff0000'],
            ['id' => 2, 'text' => 'Goodbye', 'color' => '#00ff00'],
            ['id' => 3, 'text' => 'Yay!', 'color' => '#00ff00'],
            ['id' => 4, 'text' => 'Ball', 'color' => '#fdb589'],
            ['id' => 5, 'text' => 'Hamburger', 'color' => '#dd33dd'],
            ['id' => 6, 'text' => 'Orange', 'color' => '#e24908'],
        ]);

        $user->folders()->createMany([
            ['id' => 1, 'name' => 'Foods', 'color' => '#ffd700'],
            ['id' => 2, 'name' => 'Orange Foods', 'color' => '#e24908']
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
