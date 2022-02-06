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
            ['id' => 1, 'text' => 'Hello', 'color' => '#e6ffe6'],
            ['id' => 2, 'text' => 'Goodbye', 'color' => '#ffe6cc'],
            ['id' => 3, 'text' => 'Yay!', 'color' => '#ffff99'],
            ['id' => 4, 'text' => 'Ball', 'color' => '#fdb589'],
            ['id' => 5, 'text' => 'Hamburger', 'color' => '#dd33dd'],
            ['id' => 6, 'text' => 'Orange', 'color' => '#e24908'],
            ['id' => 7, 'text' => 'Yes', 'color' => '#ccffcc'],
            ['id' => 8, 'text' => 'No', 'color' => '#ffcccc'],
            ['id' => 9, 'text' => 'Help me', 'color' => '#e6e6ff'],
            ['id' => 10, 'text' => 'Talk', 'color' => '#ffecb3'],
            ['id' => 11, 'text' => 'Okay', 'color' => '#eeffe6'],
            ['id' => 12, 'text' => 'I cannot speak', 'color' => '#ffdf80'],
            ['id' => 13, 'text' => 'I am using a talker', 'color' => '#ffecb3'],
            ['id' => 14, 'text' => 'Food', 'color' => '#e6ffcc'],
            ['id' => 15, 'text' => 'Comfort', 'color' => '#cceeff'],
            ['id' => 16, 'text' => 'Panic', 'color' => '#ffad33'],
            ['id' => 17, 'text' => 'Hurt', 'color' => '#ffd1b3'],
            ['id' => 18, 'text' => 'Call for help', 'color' => '#ff99c2'],
            ['id' => 19, 'text' => 'Medical emergency', 'color' => '#ff8080'],
            ['id' => 20, 'text' => 'Ask companion', 'color' => '#ccffcc'],
            ['id' => 21, 'text' => 'Medical symptoms', 'color' => '#ffcccc'],
            ['id' => 22, 'text' => 'A', 'color' => '#bfff80'],
            ['id' => 23, 'text' => 'An', 'color' => '#9fff80'],
            ['id' => 24, 'text' => 'The', 'color' => '#4dff4d'],
            ['id' => 25, 'text' => 'And', 'color' => '#bf80ff'],
            ['id' => 26, 'text' => 'Also', 'color' => '#9999ff'],
            ['id' => 27, 'text' => 'Except', 'color' => '#b3e6cc'],
            ['id' => 28, 'text' => 'But', 'color' => '#9933ff'],
            ['id' => 29, 'text' => 'Either', 'color' => '#c61aff'],
            ['id' => 30, 'text' => 'Or', 'color' => '#cc99ff'],
            ['id' => 31, 'text' => 'Both', 'color' => '#d966ff'],
            ['id' => 32, 'text' => 'I', 'color' => '#ccd9ff'],
            ['id' => 33, 'text' => 'Me', 'color' => '#ccd9ff'],
            ['id' => 34, 'text' => 'My', 'color' => '#ccd9ff'],
            ['id' => 35, 'text' => 'Mine', 'color' => '#ccd9ff'],
            ['id' => 36, 'text' => 'Myself', 'color' => '#ccd9ff'],
            ['id' => 37, 'text' => 'We', 'color' => '#ccffe6'],
            ['id' => 38, 'text' => 'Us', 'color' => '#ccffe6'],
            ['id' => 39, 'text' => 'Our', 'color' => '#ccffe6'],
            ['id' => 40, 'text' => 'Ours', 'color' => '#ccffe6'],
            ['id' => 41, 'text' => 'Ourselves', 'color' => '#ccffe6'],
            ['id' => 42, 'text' => 'It', 'color' => '#cceaae'],
            ['id' => 43, 'text' => 'Its', 'color' => '#cceaae'],
            ['id' => 44, 'text' => 'Itself', 'color' => '#cceaae'],
            ['id' => 45, 'text' => 'You', 'color' => '#ffffb3'],
            ['id' => 46, 'text' => 'Your', 'color' => '#ffffb3'],
            ['id' => 47, 'text' => 'Yours', 'color' => '#ffffb3'],
            ['id' => 48, 'text' => 'Yourself', 'color' => '#ffffb3'],
            ['id' => 49, 'text' => 'Yourselves', 'color' => '#ffffb3'],
            ['id' => 50, 'text' => 'He', 'color' => '#b3e6ff'],
            ['id' => 51, 'text' => 'Him', 'color' => '#b3e6ff'],
            ['id' => 52, 'text' => 'His', 'color' => '#b3e6ff'],
            ['id' => 53, 'text' => 'Himself', 'color' => '#b3e6ff'],
            ['id' => 54, 'text' => 'She', 'color' => '#ffccf3'],
            ['id' => 55, 'text' => 'Her', 'color' => '#ffccf3'],
            ['id' => 56, 'text' => 'Hers', 'color' => '#ffccf3'],
            ['id' => 57, 'text' => 'Herself', 'color' => '#ffccf3'],
            ['id' => 58, 'text' => 'They', 'color' => '#9ae59a'],
            ['id' => 59, 'text' => 'Them', 'color' => '#9ae59a'],
            ['id' => 60, 'text' => 'Their', 'color' => '#9ae59a'],
            ['id' => 61, 'text' => 'Theirs', 'color' => '#9ae59a'],
            ['id' => 62, 'text' => 'Themselves', 'color' => '#9ae59a'],
            ['id' => 63, 'text' => 'Xe', 'color' => '#ecb3ff'],
            ['id' => 64, 'text' => 'Xem', 'color' => '#ecb3ff'],
            ['id' => 65, 'text' => 'Xyr', 'color' => '#ecb3ff'],
            ['id' => 66, 'text' => 'Xyrs', 'color' => '#ecb3ff'],
            ['id' => 67, 'text' => 'Xemself', 'color' => '#ecb3ff'],
            ['id' => 68, 'text' => 'Ze', 'color' => '#ffd9b3'],
            ['id' => 69, 'text' => 'Zir', 'color' => '#ffd9b3'],
            ['id' => 70, 'text' => 'Zirs', 'color' => '#ffd9b3'],
            ['id' => 71, 'text' => 'Zirself', 'color' => '#ffd9b3'],
            ['id' => 72, 'text' => 'Scared', 'color' => '#fff3e6'],
            ['id' => 73, 'text' => 'Happy', 'color' => '#ffff99'],
            ['id' => 74, 'text' => 'Sad', 'color' => '#ccf2ff'],
            ['id' => 75, 'text' => 'Care', 'color' => '#ccccff'],
            ['id' => 76, 'text' => 'Upset', 'color' => '#ff9f80'],
            ['id' => 77, 'text' => 'Safe', 'color' => '#e6ffec'],
            ['id' => 78, 'text' => 'Pasta', 'color' => '#ffedb3'],
            ['id' => 79, 'text' => 'Spaghetti', 'color' => '#ffedb3'],
            ['id' => 80, 'text' => 'Macaroni', 'color' => '#ffedb3'],
            ['id' => 81, 'text' => 'Penne', 'color' => '#ffedb3'],
            ['id' => 82, 'text' => 'Colorful', 'color' => '#ffc6b3'],
            ['id' => 83, 'text' => 'Mac & Cheese', 'color' => '#ffd966'],
            ['id' => 84, 'text' => 'Alfredo', 'color' => '#ebebe0'],
            ['id' => 85, 'text' => 'Tomato Sauce', 'color' => '#ffcccc'],
            ['id' => 86, 'text' => 'Snack', 'color' => '#b3e6cc'],
            ['id' => 87, 'text' => 'Potato Chips', 'color' => '#b3e6cc'],
            ['id' => 88, 'text' => 'Goldfish', 'color' => '#b3e6cc'],
            ['id' => 89, 'text' => 'Drink', 'color' => '#b3e6cc'],
            ['id' => 90, 'text' => 'Soda', 'color' => '#b3e6cc'],
            ['id' => 91, 'text' => 'Juice', 'color' => '#b3e6cc'],
            ['id' => 92, 'text' => 'Water', 'color' => '#b3e6ff'],
            ['id' => 93, 'text' => 'Flavored Water', 'color' => '#b3e6cc'],
            ['id' => 94, 'text' => 'Pizza', 'color' => '#b3e6cc'],
            ['id' => 95, 'text' => 'Hamburger', 'color' => '#ffcc66'],
            ['id' => 96, 'text' => 'Fruit', 'color' => '#b3e6cc'],
            ['id' => 97, 'text' => 'Apple', 'color' => '#b3e6cc'],
            ['id' => 98, 'text' => 'Pear', 'color' => '#b3e6cc'],
            ['id' => 99, 'text' => 'Chicken nuggets', 'color' => '#b3e6cc'],
            ['id' => 100, 'text' => 'Blanket', 'color' => '#b3e6cc'],
            ['id' => 101, 'text' => 'Stuffed animal', 'color' => '#cccccc'],
            ['id' => 102, 'text' => 'Hug', 'color' => '#eee6ff'],
            ['id' => 103, 'text' => 'Gentle touch', 'color' => '#b3e6cc'],
            ['id' => 104, 'text' => 'Pressure', 'color' => '#b3e6cc'],
            ['id' => 105, 'text' => 'Distance', 'color' => '#b3e6cc'],
            ['id' => 106, 'text' => 'More', 'color' => '#b3e6cc'],
            ['id' => 107, 'text' => 'Less', 'color' => '#b3e6cc'],
            ['id' => 108, 'text' => 'Lot', 'color' => '#b3e6cc'],
            ['id' => 109, 'text' => 'Little', 'color' => '#b3e6cc'],
            ['id' => 110, 'text' => 'None', 'color' => '#b3e6cc'],
            ['id' => 111, 'text' => 'All', 'color' => '#b3e6cc'],
        ]);

        $user->folders()->createMany([
            ['id' => 1, 'name' => 'Foods', 'color' => '#ffd700'],
            ['id' => 2, 'name' => 'Orange Foods', 'color' => '#e24908']
            ['id' => 3, 'name' => 'Help', 'color' => '#ffff66'],
            ['id' => 4, 'name' => 'Article', 'color' => '#dfff80'],
            ['id' => 5, 'name' => 'Conjunction', 'color' => '#c61aff'],
            ['id' => 6, 'name' => 'Pronouns', 'color' => '#b3e6cc'],
            ['id' => 7, 'name' => '1st plural', 'color' => '#ccffe6'],
            ['id' => 8, 'name' => 'Thing', 'color' => '#cceaae'],
            ['id' => 9, 'name' => '2nd person', 'color' => '#ffffb3'],
            ['id' => 10, 'name' => 'Masculine', 'color' => '#b3e6ff'],
            ['id' => 11, 'name' => 'Feminine', 'color' => '#ffccf3'],
            ['id' => 12, 'name' => 'plural/neutral', 'color' => '#9ae59a'],
            ['id' => 13, 'name' => 'Neutral - X', 'color' => '#ecb3ff'],
            ['id' => 14, 'name' => 'Neutral - Z', 'color' => '#ffd9b3'],
            ['id' => 15, 'name' => 'Subject', 'color' => '#b3e6cc'],
            ['id' => 16, 'name' => 'Object', 'color' => '#b3e6cc'],
            ['id' => 17, 'name' => 'Possessive Adj', 'color' => '#b3e6cc'],
            ['id' => 18, 'name' => 'Possessive', 'color' => '#b3e6cc'],
            ['id' => 19, 'name' => 'Reflexive', 'color' => '#b3e6cc'],
            ['id' => 20, 'name' => 'Food', 'color' => '#e6ffcc'],
            ['id' => 21, 'name' => 'Pasta', 'color' => '#ffedb3'],
            ['id' => 22, 'name' => 'Snacks', 'color' => '#b3e6cc'],
            ['id' => 23, 'name' => 'Drinks', 'color' => '#b3e6cc'],
            ['id' => 24, 'name' => 'Fruit', 'color' => '#b3e6cc'],
            ['id' => 25, 'name' => 'Comfort', 'color' => '#b3e6cc'],
            ['id' => 26, 'name' => 'Quantity', 'color' => '#b3e6cc'], 
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
