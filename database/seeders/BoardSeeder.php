<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@email.com',
            'password' => Hash::make('testpw')
        ]);

        $board = $user->boards()->create([
            'name' => 'Default board',
            'width' => 3,
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
            5 => ['folder_position' => 1],
            6 => ['folder_position' => 2]
        ]);

        $board->words()->attach([
            1 => ['board_position' => 1],
            2 => ['board_position' => 2],
            3 => ['board_position' => 3],
            4 => ['board_position' => 4]
        ]);

        $board->folders()->attach([
            1 => ['board_position' => 5]
        ]);
    }
}
