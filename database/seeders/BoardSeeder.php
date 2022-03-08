<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'width' => 6,
            'height' => 4
        ]);

        $default_color = '#b3e6cc';
        $first_plural_color = '#ccffe6';
        $thing_color = '#cceaae';
        $second_person_color = '#ffffb3';
        $masculine_color = '#b3e6ff';
        $feminine_color = '#ffccf3';
        $they_color = '#9ae59a';
        $x_pronoun_color = '#ecb3ff';
        $z_pronoun_color = '#ffd9b3';

        $user->words()->createMany([
            ['id' => 1, 'text' => 'Hello', 'col;or' => '#e6ffe6'],
            ['id' => 2, 'text' => 'Goodbye', 'color' => '#ffe6cc'],
            ['id' => 3, 'text' => 'Yay!', 'color' => '#ffff99'],
            ['id' => 4, 'text' => 'Ball', 'color' => '#fdb589'],
            ['id' => 7, 'text' => 'Yes', 'color' => '#ccffcc'],
            ['id' => 8, 'text' => 'No', 'color' => '#ffcccc'],
            ['id' => 10, 'text' => 'Talk', 'color' => '#ffecb3'],
            ['id' => 11, 'text' => 'Okay', 'color' => '#eeffe6'],
            ['id' => 1000, 'text' => '', 'color' => $default_color]
        ]);

        //Emotions
        $user->words()->createMany([
            ['id' => 16, 'text' => 'Panic', 'color' => '#ffad33'],
            ['id' => 17, 'text' => 'Hurt', 'color' => '#ffd1b3'],
            ['id' => 72, 'text' => 'Scared', 'color' => '#fff3e6'],
            ['id' => 73, 'text' => 'Happy', 'color' => '#ffff99'],
            ['id' => 74, 'text' => 'Sad', 'color' => '#ccf2ff'],
            ['id' => 75, 'text' => 'Care', 'color' => '#ccccff'],
            ['id' => 76, 'text' => 'Upset', 'color' => '#ff9f80'],
            ['id' => 77, 'text' => 'Safe', 'color' => '#e6ffec'],
            ['id' => 120, 'text' => 'Love', 'color' => $default_color],
            ['id' => 121, 'text' => 'Like', 'color' => $default_color],
            ['id' => 122, 'text' => 'Frustrated', 'color' => $default_color],
            ['id' => 123, 'text' => 'Hate', 'color' => $default_color]
        ]);
        $user->folders()->createMany([
            ['id' => 25, 'name' => 'Emotions', 'color' => $default_color]
        ]);
        $user->folders()->find(25)->words()->attach([
            16 => ['board_x' => 1, 'board_y' => 1],
            17 => ['board_x' => 2, 'board_y' => 1],
            72 => ['board_x' => 3, 'board_y' => 1],
            73 => ['board_x' => 4, 'board_y' => 1],
            74 => ['board_x' => 5, 'board_y' => 1],
            75 => ['board_x' => 6, 'board_y' => 1],
            76 => ['board_x' => 1, 'board_y' => 2],
            77 => ['board_x' => 2, 'board_y' => 2],
            120 => ['board_x' => 3, 'board_y' => 2],
            121 => ['board_x' => 4, 'board_y' => 2],
            122 => ['board_x' => 5, 'board_y' => 2],
            123 => ['board_x' => 6, 'board_y' => 2]
        ]);

        //pronouns
        $user->folders()->createMany([
            ['id' => 5, 'name' => 'Pronouns', 'color' => $default_color],
            ['id' => 6, 'name' => '1st plural', 'color' => '#ccffe6'],
            ['id' => 7, 'name' => 'Thing', 'color' => '#cceaae'],
            ['id' => 8, 'name' => '2nd person', 'color' => '#ffffb3'],
            ['id' => 9, 'name' => 'Masculine', 'color' => '#b3e6ff'],
            ['id' => 10, 'name' => 'Feminine', 'color' => '#ffccf3'],
            ['id' => 11, 'name' => 'plural/neutral', 'color' => '#9ae59a'],
            ['id' => 12, 'name' => 'Neutral - X', 'color' => '#ecb3ff'],
            ['id' => 13, 'name' => 'Neutral - Z', 'color' => '#ffd9b3'],
            ['id' => 14, 'name' => 'Subject', 'color' => $default_color],
            ['id' => 15, 'name' => 'Object', 'color' => $default_color],
            ['id' => 16, 'name' => 'Possessive Adj', 'color' => $default_color],
            ['id' => 17, 'name' => 'Possessive', 'color' => $default_color],
            ['id' => 18, 'name' => 'Reflexive', 'color' => $default_color],
        ]);
        $user->words()->createMany([
            ['id' => 32, 'text' => 'I', 'color' => '#ccd9ff'],
            ['id' => 33, 'text' => 'Me', 'color' => '#ccd9ff'],
            ['id' => 34, 'text' => 'My', 'color' => '#ccd9ff'],
            ['id' => 35, 'text' => 'Mine', 'color' => '#ccd9ff'],
            ['id' => 36, 'text' => 'Myself', 'color' => '#ccd9ff']
        ]);
        $user->folders()->find(5)->words()->attach([
            32 => ['board_x' => 1, 'board_y' => 1],
            33 => ['board_x' => 2, 'board_y' => 1],
            34 => ['board_x' => 3, 'board_y' => 1],
            35 => ['board_x' => 4, 'board_y' => 1],
            36 => ['board_x' => 5, 'board_y' => 1]
        ]);
        $user->folders()->find(5)->folders()->attach([
            6 => ['board_x' => 1, 'board_y' => 2],
            7 => ['board_x' => 2, 'board_y' => 2],
            8 => ['board_x' => 3, 'board_y' => 2],
            9 => ['board_x' => 4, 'board_y' => 2],
            10 => ['board_x' => 5, 'board_y' => 2],
            11 => ['board_x' => 6, 'board_y' => 2],
            12 => ['board_x' => 1, 'board_y' => 3],
            13 => ['board_x' => 2, 'board_y' => 3],
            14 => ['board_x' => 1, 'board_y' => 4],
            15 => ['board_x' => 2, 'board_y' => 4],
            16 => ['board_x' => 3, 'board_y' => 4],
            17 => ['board_x' => 4, 'board_y' => 4],
            18 => ['board_x' => 5, 'board_y' => 4]
        ]);
        $user->words()->createMany([
            ['id' => 37, 'text' => 'We', 'color' => $first_plural_color],
            ['id' => 38, 'text' => 'Us', 'color' => $first_plural_color],
            ['id' => 39, 'text' => 'Our', 'color' => $first_plural_color],
            ['id' => 40, 'text' => 'Ours', 'color' => $first_plural_color],
            ['id' => 41, 'text' => 'Ourselves', 'color' => $first_plural_color]
        ]);
        $user->folders()->find(6)->words()->attach([
            37 => ['board_x' => 1, 'board_y' => 1],
            38 => ['board_x' => 2, 'board_y' => 1],
            39 => ['board_x' => 3, 'board_y' => 1],
            40 => ['board_x' => 4, 'board_y' => 1],
            41 => ['board_x' => 5, 'board_y' => 1]
        ]);
        $user->words()->createMany([
            ['id' => 42, 'text' => 'It', 'color' => $thing_color],
            ['id' => 43, 'text' => 'Its', 'color' => $thing_color],
            ['id' => 44, 'text' => 'Itself', 'color' => $thing_color]
        ]);
        $user->folders()->find(7)->words()->attach([
            42 => ['board_x' => 1, 'board_y' => 1],
            43 => ['board_x' => 2, 'board_y' => 1],
            44 => ['board_x' => 3, 'board_y' => 1],
        ]);
        $user->words()->createMany([
            ['id' => 45, 'text' => 'You', 'color' => $second_person_color],
            ['id' => 46, 'text' => 'Your', 'color' => $second_person_color],
            ['id' => 47, 'text' => 'Yours', 'color' => $second_person_color],
            ['id' => 48, 'text' => 'Yourself', 'color' => $second_person_color],
            ['id' => 49, 'text' => 'Yourselves', 'color' => $second_person_color]
        ]);
        $user->folders()->find(8)->words()->attach([
            45 => ['board_x' => 1, 'board_y' => 1],
            46 => ['board_x' => 2, 'board_y' => 1],
            47 => ['board_x' => 3, 'board_y' => 1],
            48 => ['board_x' => 4, 'board_y' => 1],
            49 => ['board_x' => 5, 'board_y' => 1],
        ]);
        $user->words()->createMany([
            ['id' => 50, 'text' => 'He', 'color' => $masculine_color],
            ['id' => 51, 'text' => 'Him', 'color' => $masculine_color],
            ['id' => 52, 'text' => 'His', 'color' => $masculine_color],
            ['id' => 53, 'text' => 'Himself', 'color' => $masculine_color]
        ]);
        $user->folders()->find(9)->words()->attach([
            50 => ['board_x' => 1, 'board_y' => 1],
            51 => ['board_x' => 2, 'board_y' => 1],
            52 => ['board_x' => 3, 'board_y' => 1],
            53 => ['board_x' => 4, 'board_y' => 1],
        ]);
        $user->words()->createMany([
            ['id' => 54, 'text' => 'She', 'color' => $feminine_color],
            ['id' => 55, 'text' => 'Her', 'color' => $feminine_color],
            ['id' => 56, 'text' => 'Hers', 'color' => $feminine_color],
            ['id' => 57, 'text' => 'Herself', 'color' => $feminine_color]
        ]);
        $user->folders()->find(10)->words()->attach([
            54 => ['board_x' => 1, 'board_y' => 1],
            55 => ['board_x' => 2, 'board_y' => 1],
            56 => ['board_x' => 3, 'board_y' => 1],
            57 => ['board_x' => 4, 'board_y' => 1],
        ]);
        $user->words()->createMany([
            ['id' => 58, 'text' => 'They', 'color' => $they_color],
            ['id' => 59, 'text' => 'Them', 'color' => $they_color],
            ['id' => 60, 'text' => 'Their', 'color' => $they_color],
            ['id' => 61, 'text' => 'Theirs', 'color' => $they_color],
            ['id' => 62, 'text' => 'Themselves', 'color' => $they_color],
            ['id' => 125, 'text' => 'Themself', 'color' => $they_color]
        ]);
        $user->folders()->find(11)->words()->attach([
            58 => ['board_x' => 1, 'board_y' => 1],
            59 => ['board_x' => 2, 'board_y' => 1],
            60 => ['board_x' => 3, 'board_y' => 1],
            61 => ['board_x' => 4, 'board_y' => 1],
            62 => ['board_x' => 5, 'board_y' => 1],
        ]);
        $user->words()->createMany([
            ['id' => 63, 'text' => 'Xe', 'color' => $x_pronoun_color],
            ['id' => 64, 'text' => 'Xem', 'color' => $x_pronoun_color],
            ['id' => 65, 'text' => 'Xyr', 'color' => $x_pronoun_color],
            ['id' => 66, 'text' => 'Xyrs', 'color' => $x_pronoun_color],
            ['id' => 67, 'text' => 'Xemself', 'color' => $x_pronoun_color]
        ]);
        $user->folders()->find(12)->words()->attach([
            63 => ['board_x' => 1, 'board_y' => 1],
            64 => ['board_x' => 2, 'board_y' => 1],
            65 => ['board_x' => 3, 'board_y' => 1],
            66 => ['board_x' => 4, 'board_y' => 1],
            67 => ['board_x' => 5, 'board_y' => 1],
        ]);
        $user->words()->createMany([
            ['id' => 68, 'text' => 'Ze', 'color' => $z_pronoun_color],
            ['id' => 69, 'text' => 'Zir', 'color' => $z_pronoun_color],
            ['id' => 70, 'text' => 'Zirs', 'color' => $z_pronoun_color],
            ['id' => 71, 'text' => 'Zirself', 'color' => $z_pronoun_color]
        ]);
        $user->folders()->find(13)->words()->attach([
            68 => ['board_x' => 1, 'board_y' => 1],
            69 => ['board_x' => 2, 'board_y' => 1],
            70 => ['board_x' => 3, 'board_y' => 1],
            71 => ['board_x' => 4, 'board_y' => 1],
        ]);
        $user->folders()->find(14)->words()->attach([
            32 => ['board_x' => 1, 'board_y' => 1],
            45 => ['board_x' => 2, 'board_y' => 1],
            50 => ['board_x' => 3, 'board_y' => 1],
            54 => ['board_x' => 4, 'board_y' => 1],
            42 => ['board_x' => 5, 'board_y' => 1],
            37 => ['board_x' => 6, 'board_y' => 1],
            58 => ['board_x' => 1, 'board_y' => 2],
            63 => ['board_x' => 2, 'board_y' => 2],
            68 => ['board_x' => 3, 'board_y' => 2]
        ]);
        $user->folders()->find(15)->words()->attach([
            33 => ['board_x' => 1, 'board_y' => 1],
            45 => ['board_x' => 2, 'board_y' => 1],
            51 => ['board_x' => 3, 'board_y' => 1],
            55 => ['board_x' => 4, 'board_y' => 1],
            42 => ['board_x' => 5, 'board_y' => 1],
            38 => ['board_x' => 6, 'board_y' => 1],
            59 => ['board_x' => 1, 'board_y' => 2],
            64 => ['board_x' => 2, 'board_y' => 2],
            69 => ['board_x' => 3, 'board_y' => 2]
        ]);
        $user->folders()->find(16)->words()->attach([
            34 => ['board_x' => 1, 'board_y' => 1],
            46 => ['board_x' => 2, 'board_y' => 1],
            52 => ['board_x' => 3, 'board_y' => 1],
            55 => ['board_x' => 4, 'board_y' => 1],
            43 => ['board_x' => 5, 'board_y' => 1],
            39 => ['board_x' => 6, 'board_y' => 1],
            60 => ['board_x' => 1, 'board_y' => 2],
            65 => ['board_x' => 2, 'board_y' => 2],
            69 => ['board_x' => 3, 'board_y' => 2]
        ]);
        $user->folders()->find(17)->words()->attach([
            35 => ['board_x' => 1, 'board_y' => 1],
            47 => ['board_x' => 2, 'board_y' => 1],
            52 => ['board_x' => 3, 'board_y' => 1],
            56 => ['board_x' => 4, 'board_y' => 1],
            40 => ['board_x' => 5, 'board_y' => 1],
            61 => ['board_x' => 6, 'board_y' => 1],
            66 => ['board_x' => 1, 'board_y' => 2],
            70 => ['board_x' => 2, 'board_y' => 2]
        ]);
        $user->folders()->find(18)->words()->attach([
            36 => ['board_x' => 1, 'board_y' => 1],
            48 => ['board_x' => 2, 'board_y' => 1],
            53 => ['board_x' => 3, 'board_y' => 1],
            57 => ['board_x' => 4, 'board_y' => 1],
            44 => ['board_x' => 5, 'board_y' => 1],
            49 => ['board_x' => 6, 'board_y' => 1],
            62 => ['board_x' => 1, 'board_y' => 2],
            67 => ['board_x' => 2, 'board_y' => 2],
            71 => ['board_x' => 3, 'board_y' => 2]
        ]);

        //Conjunctions
        $user->words()->createMany([
            ['id' => 25, 'text' => 'And', 'color' => '#bf80ff'],
            ['id' => 26, 'text' => 'Also', 'color' => '#9999ff'],
            ['id' => 27, 'text' => 'Except', 'color' => $default_color],
            ['id' => 28, 'text' => 'But', 'color' => '#9933ff'],
            ['id' => 29, 'text' => 'Either', 'color' => '#c61aff'],
            ['id' => 30, 'text' => 'Or', 'color' => '#cc99ff'],
            ['id' => 31, 'text' => 'Both', 'color' => '#d966ff']
        ]);
        $user->folders()->createMany([
            ['id' => 4, 'name' => 'Conjunction', 'color' => '#c61aff']
        ]);
        $user->folders()->find(4)->words()->attach([
            25 => ['board_x' => 1, 'board_y' => 1],
            26 => ['board_x' => 2, 'board_y' => 1],
            27 => ['board_x' => 3, 'board_y' => 1],
            28 => ['board_x' => 4, 'board_y' => 1],
            29 => ['board_x' => 5, 'board_y' => 1],
            30 => ['board_x' => 6, 'board_y' => 1],
            31 => ['board_x' => 1, 'board_y' => 2]
        ]);

        //Food
        $user->words()->createMany([
            ['id' => 5, 'text' => 'Food', 'color' => '#e6ffcc'],
            ['id' => 94, 'text' => 'Pizza', 'color' => $default_color],
            ['id' => 95, 'text' => 'Hamburger', 'color' => '#fde4g9e'],
            ['id' => 99, 'text' => 'Chicken nuggets', 'color' => $default_color]
        ]);
        $user->folders()->createMany([
            ['id' => 1, 'name' => 'Foods', 'color' => '#e6ffcc'],
            ['id' => 19, 'name' => 'Pasta', 'color' => '#ffedb3'],
            ['id' => 20, 'name' => 'Snacks', 'color' => $default_color],
            ['id' => 21, 'name' => 'Drinks', 'color' => $default_color],
            ['id' => 22, 'name' => 'Fruit', 'color' => $default_color]
        ]);
        $user->folders()->find(1)->words()->attach([
            5 => ['board_x' => 1, 'board_y' => 1],
            //leaving space for the folder
            94 => ['board_x' => 1, 'board_y' => 2],
            95 => ['board_x' => 2, 'board_y' => 2],
            99 => ['board_x' => 3, 'board_y' => 2]
        ]);
        $user->folders()->find(1)->folders()->attach([
            19 => ['board_x' => 2, 'board_y' => 1],
            20 => ['board_x' => 3, 'board_y' => 1],
            21 => ['board_x' => 4, 'board_y' => 1],
            22 => ['board_x' => 5, 'board_y' => 1]
        ]);
        //Pasta
        $user->words()->createMany([
            ['id' => 78, 'text' => 'Pasta', 'color' => '#ffedb3'],
            ['id' => 79, 'text' => 'Spaghetti', 'color' => '#ffedb3'],
            ['id' => 80, 'text' => 'Macaroni', 'color' => '#ffedb3'],
            ['id' => 81, 'text' => 'Penne', 'color' => '#ffedb3'],
            ['id' => 82, 'text' => 'Colorful', 'color' => '#ffc6b3'],
            ['id' => 83, 'text' => 'Mac & Cheese', 'color' => '#ffd966'],
            ['id' => 84, 'text' => 'Alfredo', 'color' => '#ebebe0'],
            ['id' => 85, 'text' => 'Tomato Sauce', 'color' => '#ffcccc']
        ]);
        $user->folders()->find(19)->words()->attach([
            78 => ['board_x' => 1, 'board_y' => 1],
            79 => ['board_x' => 2, 'board_y' => 1],
            80 => ['board_x' => 3, 'board_y' => 1],
            81 => ['board_x' => 4, 'board_y' => 1],
            82 => ['board_x' => 5, 'board_y' => 1],
            83 => ['board_x' => 6, 'board_y' => 1],
            84 => ['board_x' => 1, 'board_y' => 2],
            85 => ['board_x' => 2, 'board_y' => 2]
        ]);
        //Fruit
        $user->words()->createMany([
            ['id' => 6, 'text' => 'Orange', 'color' => '#ffa024'],
            ['id' => 96, 'text' => 'Fruit', 'color' => $default_color],
            ['id' => 97, 'text' => 'Apple', 'color' => $default_color],
            ['id' => 98, 'text' => 'Pear', 'color' => $default_color],
            ['id' => 112, 'text' => 'Banana', 'color' => $default_color],
            ['id' => 113, 'text' => 'Grapes', 'color' => $default_color],
            ['id' => 114, 'text' => 'Peach', 'color' => $default_color],
            ['id' => 115, 'text' => 'Plumb', 'color' => $default_color],
            ['id' => 116, 'text' => 'Strawberries', 'color' => $default_color],
            ['id' => 117, 'text' => 'Blueberries', 'color' => $default_color],
            ['id' => 118, 'text' => 'Raspberries', 'color' => $default_color]
        ]);
        $user->folders()->find(22)->words()->attach([
            96 => ['board_x' => 1, 'board_y' => 1],
            6 => ['board_x' => 2, 'board_y' => 1],
            97 => ['board_x' => 3, 'board_y' => 1],
            98 => ['board_x' => 4, 'board_y' => 1],
            112 => ['board_x' => 5, 'board_y' => 1],
            113 => ['board_x' => 6, 'board_y' => 1],
            114 => ['board_x' => 1, 'board_y' => 2],
            115 => ['board_x' => 2, 'board_y' => 2],
            116 => ['board_x' => 3, 'board_y' => 2],
            117 => ['board_x' => 4, 'board_y' => 2],
            118 => ['board_x' => 5, 'board_y' => 2]
        ]);
        //Snack
        $user->words()->createMany([
            ['id' => 86, 'text' => 'Snack', 'color' => $default_color],
            ['id' => 87, 'text' => 'Potato Chips', 'color' => $default_color],
            ['id' => 88, 'text' => 'Goldfish', 'color' => $default_color]
        ]);
        $user->folders()->find(20)->words()->attach([
            86 => ['board_x' => 1, 'board_y' => 1],
            87 => ['board_x' => 2, 'board_y' => 1],
            88 => ['board_x' => 3, 'board_y' => 1],
            96 => ['board_x' => 1, 'board_y' => 2],
            6 => ['board_x' => 2, 'board_y' => 2],
            97 => ['board_x' => 3, 'board_y' => 2],
            112 => ['board_x' => 4, 'board_y' => 2],
            116 => ['board_x' => 5, 'board_y' => 2],
            117 => ['board_x' => 6, 'board_y' => 2]
        ]);
        //Drinks
        $user->words()->createMany([
            ['id' => 89, 'text' => 'Drink', 'color' => $default_color],
            ['id' => 90, 'text' => 'Soda', 'color' => $default_color],
            ['id' => 91, 'text' => 'Juice', 'color' => $default_color],
            ['id' => 92, 'text' => 'Water', 'color' => '#b3e6ff'],
            ['id' => 93, 'text' => 'Flavored Water', 'color' => $default_color],
        ]);
        $user->folders()->find(21)->words()->attach([
            89 => ['board_x' => 1, 'board_y' => 1],
            90 => ['board_x' => 2, 'board_y' => 1],
            91 => ['board_x' => 3, 'board_y' => 1],
            92 => ['board_x' => 4, 'board_y' => 1],
            93 => ['board_x' => 5, 'board_y' => 1]
            //placeholder for end of row
        ]);


        //Comfort
        $user->words()->createMany([
            ['id' => 15, 'text' => 'Comfort', 'color' => '#cceeff'],
            ['id' => 100, 'text' => 'Blanket', 'color' => $default_color],
            ['id' => 101, 'text' => 'Stuffed animal', 'color' => '#cccccc'],
            ['id' => 102, 'text' => 'Hug', 'color' => '#eee6ff'],
            ['id' => 103, 'text' => 'Gentle touch', 'color' => $default_color],
            ['id' => 104, 'text' => 'Pressure', 'color' => $default_color],
            ['id' => 105, 'text' => 'Distance', 'color' => $default_color]
        ]);
        $user->folders()->createMany([
            ['id' => 23, 'name' => 'Comfort', 'color' => $default_color]
        ]);
        $user->folders()->find(23)->words()->attach([
            15 => ['board_x' => 1, 'board_y' => 1],
            100 => ['board_x' => 2, 'board_y' => 1],
            101 => ['board_x' => 3, 'board_y' => 1],
            102 => ['board_x' => 4, 'board_y' => 1],
            103 => ['board_x' => 5, 'board_y' => 1],
            104 => ['board_x' => 6, 'board_y' => 1],
            105 => ['board_x' => 1, 'board_y' => 2],
            86 => ['board_x' => 2, 'board_y' => 2],
        ]);

        //Quantity
        $user->words()->createMany([
            ['id' => 106, 'text' => 'More', 'color' => $default_color],
            ['id' => 107, 'text' => 'Less', 'color' => $default_color],
            ['id' => 108, 'text' => 'Lot', 'color' => $default_color],
            ['id' => 109, 'text' => 'Little', 'color' => $default_color],
            ['id' => 110, 'text' => 'None', 'color' => $default_color],
            ['id' => 111, 'text' => 'All', 'color' => $default_color]
        ]);
        $user->folders()->createMany([
            ['id' => 24, 'name' => 'Quantity', 'color' => $default_color]
        ]);
        $user->folders()->find(24)->words()->attach([
            106 => ['board_x' => 1, 'board_y' => 1],
            107 => ['board_x' => 2, 'board_y' => 1],
            108 => ['board_x' => 3, 'board_y' => 1],
            109 => ['board_x' => 4, 'board_y' => 1],
            110 => ['board_x' => 5, 'board_y' => 1],
            111 => ['board_x' => 6, 'board_y' => 1]
        ]);

        //Articles
        $user->words()->createMany([
            ['id' => 22, 'text' => 'A', 'color' => '#bfff80'],
            ['id' => 23, 'text' => 'An', 'color' => '#9fff80'],
            ['id' => 24, 'text' => 'The', 'color' => '#4dff4d']
        ]);
        $user->folders()->createMany([
            ['id' => 3, 'name' => 'Article', 'color' => '#dfff80']
        ]);
        $user->folders()->find(3)->words()->attach([
            22 => ['board_x' => 1, 'board_y' => 1],
            23 => ['board_x' => 2, 'board_y' => 1],
            24 => ['board_x' => 3, 'board_y' => 1]
        ]);

        //Help
        $user->words()->createMany([
            ['id' => 9, 'text' => 'Help', 'color' => '#e6e6ff'],
            ['id' => 14, 'text' => 'Help me', 'color' => '#e6e6ff'],
            ['id' => 18, 'text' => 'Call for help', 'color' => '#ff99c2'],
            ['id' => 19, 'text' => 'Medical emergency', 'color' => '#ff8080'],
            ['id' => 21, 'text' => 'Medical symptoms', 'color' => '#ffcccc'],
            ['id' => 20, 'text' => 'Ask companion', 'color' => '#ccffcc'],
            ['id' => 12, 'text' => 'I cannot speak', 'color' => '#ffdf80'],
            ['id' => 13, 'text' => 'I am using a talker', 'color' => '#ffecb3'],
            ['id' => 124, 'text' => 'I Need', 'color' => $default_color]
        ]);
        $user->folders()->createMany([
            ['id' => 2, 'name' => 'Help', 'color' => '#ffff66']
        ]);
        $user->folders()->find(2)->words()->attach([
            9 => ['board_x' => 1, 'board_y' => 1],
            14 => ['board_x' => 2, 'board_y' => 1],
            18 => ['board_x' => 3, 'board_y' => 1],
            19 => ['board_x' => 4, 'board_y' => 1],
            21 => ['board_x' => 5, 'board_y' => 1],
            12 => ['board_x' => 6, 'board_y' => 1],

            13 => ['board_x' => 1, 'board_y' => 2],
            19 => ['board_x' => 2, 'board_y' => 2],
            5 => ['board_x' => 3, 'board_y' => 2],
            15 => ['board_x' => 4, 'board_y' => 2],
            16 => ['board_x' => 5, 'board_y' => 2],
            17 => ['board_x' => 6, 'board_y' => 2],

            124 => ['board_x' => 1, 'board_y' => 3]
        ]);
        //toys
        $user->words()->createMany([
            ['id' => 126, 'text' => 'Toy', 'color' => $default_color],
            ['id' => 127, 'text' => 'Ball', 'color' => $default_color],
            ['id' => 128, 'text' => 'Block', 'color' => $default_color],
            ['id' => 129, 'text' => 'Doll', 'color' => $default_color]
        ]);

        $board->words()->attach([
            1 => ['board_x' => 1, 'board_y' => 1],
            2 => ['board_x' => 2, 'board_y' => 1],
            7 => ['board_x' => 3, 'board_y' => 1],
            8 => ['board_x' => 4, 'board_y' => 1],
            11 => ['board_x' => 5, 'board_y' => 1],
            //stop should go here
            9 => ['board_x' => 1, 'board_y' => 2],
            10 => ['board_x' => 2, 'board_y' => 2],
            3 => ['board_x' => 3, 'board_y' => 2],
        ]);

        $board->folders()->attach([
            1 => ['board_x' => 1, 'board_y' => 3],
            25 => ['board_x' => 2, 'board_y' => 3],
            23 => ['board_x' => 3, 'board_y' => 3],
            2 => ['board_x' => 4, 'board_y' => 3],
            3 => ['board_x' => 1, 'board_y' => 4],
            24 => ['board_x' => 2, 'board_y' => 4],
            4 => ['board_x' => 3, 'board_y' => 4],
            5 => ['board_x' => 4, 'board_y' => 4]
        ]);

        // !! raw sql alert !!
        // usually, we can leave out the `id` param when creating models since
        // postgres tracks what value the `id` col should be w/ an
        // auto-incrementing int.  since we've manually provided all the ids,
        // that auto-incrementing int never gets updated and stays at 1. we need
        // to update the auto-incrementer to generate the last id we manually
        // provided so it properly generates the next one, otherwise it
        // auto-generates an id of 1 and blows up since we already have a
        // word/folder w/ id 1.
        if (env('DB_CONNECTION') === 'sqlite') { // for CI runs
            DB::statement("UPDATE sqlite_sequence SET seq = (SELECT MAX(id) FROM words) WHERE name='words'");
            DB::statement("UPDATE sqlite_sequence SET seq = (SELECT MAX(id) FROM folders) WHERE name='folders'");
        } else { // for postgres
            DB::statement("SELECT setval('words_id_seq', (SELECT max(id) FROM words));");
            DB::statement("SELECT setval('folders_id_seq', (SELECT max(id) FROM folders));");
        }
    }
}
