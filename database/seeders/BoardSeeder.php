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
        //color variables
            $default_color = '#b3e6cc';
            $first_plural_color = '#ccffe6';
            $thing_color = '#cceaae';
            $second_person_color = '#ffffb3';
            $masculine_color = '#b3e6ff';
            $feminine_color = '#ffccf3';
            $they_color = '#9ae59a';
            $x_pronoun_color = '#ecb3ff';
            $z_pronoun_color = '#ffd9b3';
            $conjunction_color = '#cbb3e6';
            $article_color = '#9fff80';
            $quantity_color = '#8cedb9';
            $pronoun_color = '#ffffb3';
            $pronoun_type_color = '#b77dff';
        //indexes
            $board_index = 1;
            $emotion_index = $board_index + 7;
            $pronoun_index = $emotion_index + 15;
            $conjunction_index = $pronoun_index + 41;
            $food_extra = $conjunction_index + 12;
            $food_pasta = $food_extra + 4;
            $food_snacks = $food_pasta + 8;
            $food_fruit = $food_snacks + 3;
            $food_drinks = $food_fruit + 24;
            $comfort = $food_drinks + 5;
            $quantity = $comfort + 7;
            $article = $quantity + 10;
            $help = $article + 3;
            $toys = $help + 10;
            $people = $toys + 4;
            $colors = $people + 29;
            $patterns = $colors + 12;
            $vehicles = $patterns + 7;
            //$clothes = $vehicles + ;
            //$weather = $clothes + ;
            //$tempurature = $weather + ;
            //$numbers = $tempurature + ;
            //$letters = $numbers + ;
            //$personal_care = $letters + ;

        $user->words()->createMany([
            ['id' => $board_index + 1, 'text' => 'Hello', 'color' => '#e6ffe6'],
            ['id' => $board_index + 2, 'text' => 'Goodbye', 'color' => '#ffe6cc'],
            ['id' => $board_index + 3, 'text' => 'Yay!', 'color' => '#ffff99'],
            ['id' => $board_index + 4, 'text' => 'Yes', 'color' => '#ccffcc'],
            ['id' => $board_index + 5, 'text' => 'No', 'color' => '#ffcccc'],
            ['id' => $board_index + 6, 'text' => 'Talk', 'color' => '#ffecb3'],
            ['id' => $board_index + 7, 'text' => 'Okay', 'color' => '#eeffe6']
        ]);

        //Emotions
            $user->words()->createMany([
                ['id' => $emotion_index + 1, 'text' => 'Panic', 'color' => '#ffad33'],
                ['id' => $emotion_index + 2, 'text' => 'Hurt', 'color' => '#ffd1b3'],
                ['id' => $emotion_index + 3, 'text' => 'Scared', 'color' => '#fff3e6'],
                ['id' => $emotion_index + 4, 'text' => 'Happy', 'color' => '#ffff99'],
                ['id' => $emotion_index + 5, 'text' => 'Sad', 'color' => '#ccf2ff'],
                ['id' => $emotion_index + 6, 'text' => 'Care', 'color' => '#ccccff'],
                ['id' => $emotion_index + 7, 'text' => 'Upset', 'color' => '#ff9f80'],
                ['id' => $emotion_index + 8, 'text' => 'Safe', 'color' => '#e6ffec'],
                ['id' => $emotion_index + 9, 'text' => 'Love', 'color' => '#e3a8d6'],
                ['id' => $emotion_index + 10, 'text' => 'Like', 'color' => '#edc7d1'],
                ['id' => $emotion_index + 11, 'text' => 'Frustrated', 'color' => '#e8b692'],
                ['id' => $emotion_index + 12, 'text' => 'Hate', 'color' => '#ababab'],
                ['id' => $emotion_index + 13, 'text' => 'Miss', 'color' => '#8f92bd'],
                ['id' => $emotion_index + 14, 'text' => 'Excited', 'color' => $default_color],
                ['id' => $emotion_index + 15, 'text' => 'Proud', 'color' => $default_color]
            ]);
            $user->folders()->createMany([
                ['id' => 25, 'name' => 'Emotions', 'color' => '#9eadf7']
            ]);
            $user->folders()->find(25)->words()->attach([
                $emotion_index + 1 => ['board_x' => 1, 'board_y' => 1],
                $emotion_index + 2 => ['board_x' => 2, 'board_y' => 1],
                $emotion_index + 3 => ['board_x' => 3, 'board_y' => 1],
                $emotion_index + 4 => ['board_x' => 4, 'board_y' => 1],
                $emotion_index + 5 => ['board_x' => 5, 'board_y' => 1],
                $emotion_index + 6 => ['board_x' => 6, 'board_y' => 1],

                $emotion_index + 7 => ['board_x' => 1, 'board_y' => 2],
                $emotion_index + 8 => ['board_x' => 2, 'board_y' => 2],
                $emotion_index + 9 => ['board_x' => 3, 'board_y' => 2],
                $emotion_index + 10 => ['board_x' => 4, 'board_y' => 2],
                $emotion_index + 11 => ['board_x' => 5, 'board_y' => 2],
                $emotion_index + 12 => ['board_x' => 6, 'board_y' => 2],

                $emotion_index + 13 => ['board_x' => 1, 'board_y' => 3],
                $emotion_index + 14 => ['board_x' => 2, 'board_y' => 3],
                $emotion_index + 15 => ['board_x' => 3, 'board_y' => 3]
            ]);

        //pronouns
            $user->folders()->createMany([
                ['id' => 5, 'name' => 'Pronouns', 'color' => $pronoun_color],
                ['id' => 6, 'name' => '1st plural', 'color' => $first_plural_color],
                ['id' => 7, 'name' => 'Thing', 'color' => $thing_color],
                ['id' => 8, 'name' => '2nd person', 'color' => $second_person_color],
                ['id' => 9, 'name' => 'Masculine', 'color' => $masculine_color],
                ['id' => 10, 'name' => 'Feminine', 'color' => $feminine_color],
                ['id' => 11, 'name' => 'Plural/Neutral', 'color' => $they_color],
                ['id' => 12, 'name' => 'Neutral - X', 'color' => $x_pronoun_color],
                ['id' => 13, 'name' => 'Neutral - Z', 'color' => $z_pronoun_color],
                ['id' => 14, 'name' => 'Subject', 'color' => $pronoun_type_color],
                ['id' => 15, 'name' => 'Object', 'color' => $pronoun_type_color],
                ['id' => 16, 'name' => 'Possessive Adj', 'color' => $pronoun_type_color],
                ['id' => 17, 'name' => 'Possessive', 'color' => $pronoun_type_color],
                ['id' => 18, 'name' => 'Reflexive', 'color' => $pronoun_type_color],
            ]);
            $user->words()->createMany([
                ['id' => $pronoun_index + 1, 'text' => 'I', 'color' => '#ccd9ff'],
                ['id' => $pronoun_index + 2, 'text' => 'Me', 'color' => '#ccd9ff'],
                ['id' => $pronoun_index + 3, 'text' => 'My', 'color' => '#ccd9ff'],
                ['id' => $pronoun_index + 4, 'text' => 'Mine', 'color' => '#ccd9ff'],
                ['id' => $pronoun_index + 5, 'text' => 'Myself', 'color' => '#ccd9ff'],
                ['id' => $pronoun_index + 6, 'text' => 'Pronouns', 'color' => $pronoun_color]
            ]);
            $user->folders()->find(5)->words()->attach([
                $pronoun_index + 6 => ['board_x' => 1, 'board_y' => 1],
                $pronoun_index + 1 => ['board_x' => 2, 'board_y' => 1],
                $pronoun_index + 2 => ['board_x' => 3, 'board_y' => 1],
                $pronoun_index + 3 => ['board_x' => 4, 'board_y' => 1],
                $pronoun_index + 4 => ['board_x' => 5, 'board_y' => 1],
                $pronoun_index + 5 => ['board_x' => 6, 'board_y' => 1]

                //row 2 is folders

                //row 3 slots 1 and 2 are folders

                //row for, slots 1-5 are folders
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
                ['id' => $pronoun_index + 6, 'text' => 'We', 'color' => $first_plural_color],
                ['id' => $pronoun_index + 7, 'text' => 'Us', 'color' => $first_plural_color],
                ['id' => $pronoun_index + 8, 'text' => 'Our', 'color' => $first_plural_color],
                ['id' => $pronoun_index + 9, 'text' => 'Ours', 'color' => $first_plural_color],
                ['id' => $pronoun_index + 10, 'text' => 'Ourselves', 'color' => $first_plural_color]
            ]);
            $user->folders()->find(6)->words()->attach([
                $pronoun_index + 6 => ['board_x' => 1, 'board_y' => 1],
                $pronoun_index + 7 => ['board_x' => 2, 'board_y' => 1],
                $pronoun_index + 8 => ['board_x' => 3, 'board_y' => 1],
                $pronoun_index + 9 => ['board_x' => 4, 'board_y' => 1],
                $pronoun_index + 10 => ['board_x' => 5, 'board_y' => 1],
            ]);
            $user->words()->createMany([
                ['id' => $pronoun_index + 11, 'text' => 'It', 'color' => $thing_color],
                ['id' => $pronoun_index + 12, 'text' => 'Its', 'color' => $thing_color],
                ['id' => $pronoun_index + 13, 'text' => 'Itself', 'color' => $thing_color]
            ]);
            $user->folders()->find(7)->words()->attach([
                $pronoun_index + 11 => ['board_x' => 1, 'board_y' => 1],
                $pronoun_index + 12 => ['board_x' => 2, 'board_y' => 1],
                $pronoun_index + 13 => ['board_x' => 3, 'board_y' => 1],
            ]);
            $user->words()->createMany([
                ['id' => $pronoun_index + 14, 'text' => 'You', 'color' => $second_person_color],
                ['id' => $pronoun_index + 15, 'text' => 'Your', 'color' => $second_person_color],
                ['id' => $pronoun_index + 16, 'text' => 'Yours', 'color' => $second_person_color],
                ['id' => $pronoun_index + 17, 'text' => 'Yourself', 'color' => $second_person_color],
                ['id' => $pronoun_index + 18, 'text' => 'Yourselves', 'color' => $second_person_color]
            ]);
            $user->folders()->find(8)->words()->attach([
                $pronoun_index + 14 => ['board_x' => 1, 'board_y' => 1],
                $pronoun_index + 15 => ['board_x' => 2, 'board_y' => 1],
                $pronoun_index + 16 => ['board_x' => 3, 'board_y' => 1],
                $pronoun_index + 17 => ['board_x' => 4, 'board_y' => 1],
                $pronoun_index + 18 => ['board_x' => 5, 'board_y' => 1],
            ]);
            $user->words()->createMany([
                ['id' => $pronoun_index + 19, 'text' => 'He', 'color' => $masculine_color],
                ['id' => $pronoun_index + 20, 'text' => 'Him', 'color' => $masculine_color],
                ['id' => $pronoun_index + 21, 'text' => 'His', 'color' => $masculine_color],
                ['id' => $pronoun_index + 22, 'text' => 'Himself', 'color' => $masculine_color]
            ]);
            $user->folders()->find(9)->words()->attach([
                $pronoun_index + 19 => ['board_x' => 1, 'board_y' => 1],
                $pronoun_index + 20 => ['board_x' => 2, 'board_y' => 1],
                $pronoun_index + 21 => ['board_x' => 3, 'board_y' => 1],
                $pronoun_index + 22 => ['board_x' => 4, 'board_y' => 1],
            ]);
            $user->words()->createMany([
                ['id' => $pronoun_index + 23, 'text' => 'She', 'color' => $feminine_color],
                ['id' => $pronoun_index + 24, 'text' => 'Her', 'color' => $feminine_color],
                ['id' => $pronoun_index + 25, 'text' => 'Hers', 'color' => $feminine_color],
                ['id' => $pronoun_index + 26, 'text' => 'Herself', 'color' => $feminine_color]
            ]);
            $user->folders()->find(10)->words()->attach([
                $pronoun_index + 23 => ['board_x' => 1, 'board_y' => 1],
                $pronoun_index + 24 => ['board_x' => 2, 'board_y' => 1],
                $pronoun_index + 25 => ['board_x' => 3, 'board_y' => 1],
                $pronoun_index + 26 => ['board_x' => 4, 'board_y' => 1],
            ]);
            $user->words()->createMany([
                ['id' => $pronoun_index + 27, 'text' => 'They', 'color' => $they_color],
                ['id' => $pronoun_index + 28, 'text' => 'Them', 'color' => $they_color],
                ['id' => $pronoun_index + 29, 'text' => 'Their', 'color' => $they_color],
                ['id' => $pronoun_index + 30, 'text' => 'Theirs', 'color' => $they_color],
                ['id' => $pronoun_index + 31, 'text' => 'Themselves', 'color' => $they_color],
                ['id' => $pronoun_index + 32, 'text' => 'Themself', 'color' => $they_color]
            ]);
            $user->folders()->find(11)->words()->attach([
                $pronoun_index + 27 => ['board_x' => 1, 'board_y' => 1],
                $pronoun_index + 28 => ['board_x' => 2, 'board_y' => 1],
                $pronoun_index + 29 => ['board_x' => 3, 'board_y' => 1],
                $pronoun_index + 30 => ['board_x' => 4, 'board_y' => 1],
                $pronoun_index + 31 => ['board_x' => 5, 'board_y' => 1],
                $pronoun_index + 32 => ['board_x' => 6, 'board_y' => 1],
            ]);
            $user->words()->createMany([
                ['id' => $pronoun_index + 33, 'text' => 'Xe', 'color' => $x_pronoun_color],
                ['id' => $pronoun_index + 34, 'text' => 'Xem', 'color' => $x_pronoun_color],
                ['id' => $pronoun_index + 35, 'text' => 'Xyr', 'color' => $x_pronoun_color],
                ['id' => $pronoun_index + 36, 'text' => 'Xyrs', 'color' => $x_pronoun_color],
                ['id' => $pronoun_index + 37, 'text' => 'Xemself', 'color' => $x_pronoun_color]
            ]);
            $user->folders()->find(12)->words()->attach([
                $pronoun_index + 33 => ['board_x' => 1, 'board_y' => 1],
                $pronoun_index + 34 => ['board_x' => 2, 'board_y' => 1],
                $pronoun_index + 35 => ['board_x' => 3, 'board_y' => 1],
                $pronoun_index + 36 => ['board_x' => 4, 'board_y' => 1],
                $pronoun_index + 37 => ['board_x' => 5, 'board_y' => 1],
            ]);
            $user->words()->createMany([
                ['id' => $pronoun_index + 38, 'text' => 'Ze', 'color' => $z_pronoun_color],
                ['id' => $pronoun_index + 39, 'text' => 'Zir', 'color' => $z_pronoun_color],
                ['id' => $pronoun_index + 40, 'text' => 'Zirs', 'color' => $z_pronoun_color],
                ['id' => $pronoun_index + 41, 'text' => 'Zirself', 'color' => $z_pronoun_color]
            ]);
            $user->folders()->find(13)->words()->attach([
                $pronoun_index + 38 => ['board_x' => 1, 'board_y' => 1],
                $pronoun_index + 39 => ['board_x' => 2, 'board_y' => 1],
                $pronoun_index + 40 => ['board_x' => 3, 'board_y' => 1],
                $pronoun_index + 41 => ['board_x' => 4, 'board_y' => 1],
            ]);
            $user->folders()->find(14)->words()->attach([
                $pronoun_index + 1 => ['board_x' => 1, 'board_y' => 1],
                $pronoun_index + 14 => ['board_x' => 2, 'board_y' => 1],
                $pronoun_index + 19 => ['board_x' => 3, 'board_y' => 1],
                $pronoun_index + 23 => ['board_x' => 4, 'board_y' => 1],
                $pronoun_index + 11 => ['board_x' => 5, 'board_y' => 1],
                $pronoun_index + 6 => ['board_x' => 6, 'board_y' => 1],

                $pronoun_index + 27 => ['board_x' => 1, 'board_y' => 2],
                $pronoun_index + 33 => ['board_x' => 2, 'board_y' => 2],
                $pronoun_index + 38 => ['board_x' => 3, 'board_y' => 2],
            ]);
            $user->folders()->find(15)->words()->attach([
                $pronoun_index + 2 => ['board_x' => 1, 'board_y' => 1],
                $pronoun_index + 14 => ['board_x' => 2, 'board_y' => 1],
                $pronoun_index + 20 => ['board_x' => 3, 'board_y' => 1],
                $pronoun_index + 24 => ['board_x' => 4, 'board_y' => 1],
                $pronoun_index + 11 => ['board_x' => 5, 'board_y' => 1],
                $pronoun_index + 7 => ['board_x' => 6, 'board_y' => 1],

                $pronoun_index + 28 => ['board_x' => 1, 'board_y' => 2],
                $pronoun_index + 34 => ['board_x' => 2, 'board_y' => 2],
                $pronoun_index + 39 => ['board_x' => 3, 'board_y' => 2],
            ]);
            $user->folders()->find(16)->words()->attach([
                $pronoun_index + 3 => ['board_x' => 1, 'board_y' => 1],
                $pronoun_index + 15 => ['board_x' => 2, 'board_y' => 1],
                $pronoun_index + 21 => ['board_x' => 3, 'board_y' => 1],
                $pronoun_index + 24 => ['board_x' => 4, 'board_y' => 1],
                $pronoun_index + 12 => ['board_x' => 5, 'board_y' => 1],
                $pronoun_index + 8 => ['board_x' => 6, 'board_y' => 1],

                $pronoun_index + 29 => ['board_x' => 1, 'board_y' => 2],
                $pronoun_index + 35 => ['board_x' => 2, 'board_y' => 2],
                $pronoun_index + 39 => ['board_x' => 3, 'board_y' => 2],
            ]);
            $user->folders()->find(17)->words()->attach([
                $pronoun_index + 4 => ['board_x' => 1, 'board_y' => 1],
                $pronoun_index + 16 => ['board_x' => 2, 'board_y' => 1],
                $pronoun_index + 21 => ['board_x' => 3, 'board_y' => 1],
                $pronoun_index + 25 => ['board_x' => 4, 'board_y' => 1],
                $pronoun_index + 9 => ['board_x' => 5, 'board_y' => 1],
                $pronoun_index + 30 => ['board_x' => 6, 'board_y' => 1],

                $pronoun_index + 36 => ['board_x' => 1, 'board_y' => 2],
                $pronoun_index + 40 => ['board_x' => 2, 'board_y' => 2],
            ]);
            $user->folders()->find(18)->words()->attach([
                $pronoun_index + 5 => ['board_x' => 1, 'board_y' => 1],
                $pronoun_index + 17 => ['board_x' => 2, 'board_y' => 1],
                $pronoun_index + 22 => ['board_x' => 3, 'board_y' => 1],
                $pronoun_index + 26 => ['board_x' => 4, 'board_y' => 1],
                $pronoun_index + 13 => ['board_x' => 5, 'board_y' => 1],
                $pronoun_index + 18 => ['board_x' => 6, 'board_y' => 1],

                $pronoun_index + 31 => ['board_x' => 1, 'board_y' => 2],
                $pronoun_index + 32 => ['board_x' => 2, 'board_y' => 2],
                $pronoun_index + 37 => ['board_x' => 3, 'board_y' => 2],
                $pronoun_index + 41 => ['board_x' => 4, 'board_y' => 2],
            ]);

        //Conjunctions
            $user->words()->createMany([
                ['id' => $conjunction_index + 1, 'text' => 'And', 'color' => $conjunction_color],
                ['id' => $conjunction_index + 2, 'text' => 'Also', 'color' => $conjunction_color],
                ['id' => $conjunction_index + 3, 'text' => 'Except', 'color' => $conjunction_color],
                ['id' => $conjunction_index + 4, 'text' => 'But', 'color' => $conjunction_color],
                ['id' => $conjunction_index + 5, 'text' => 'Either', 'color' => $conjunction_color],
                ['id' => $conjunction_index + 6, 'text' => 'Or', 'color' => $conjunction_color],
                ['id' => $conjunction_index + 7, 'text' => 'Both', 'color' => $conjunction_color],
                ['id' => $conjunction_index + 8, 'text' => 'For', 'color' => $conjunction_color],
                ['id' => $conjunction_index + 9, 'text' => 'Nor', 'color' => $conjunction_color],
                ['id' => $conjunction_index + 10, 'text' => 'So', 'color' => $conjunction_color],
                ['id' => $conjunction_index + 11, 'text' => 'Yet', 'color' => $conjunction_color],
                ['id' => $conjunction_index + 12, 'text' => 'Also', 'color' => $conjunction_color]
            ]);
            $user->folders()->createMany([
                ['id' => 4, 'name' => 'Conjunction', 'color' => $conjunction_color]
            ]);
            $user->folders()->find(4)->words()->attach([
                $conjunction_index + 1 => ['board_x' => 1, 'board_y' => 1],
                $conjunction_index + 2 => ['board_x' => 2, 'board_y' => 1],
                $conjunction_index + 3 => ['board_x' => 3, 'board_y' => 1],
                $conjunction_index + 4 => ['board_x' => 4, 'board_y' => 1],
                $conjunction_index + 5 => ['board_x' => 5, 'board_y' => 1],
                $conjunction_index + 6 => ['board_x' => 6, 'board_y' => 1],

                $conjunction_index + 7 => ['board_x' => 1, 'board_y' => 2],
                $conjunction_index + 8 => ['board_x' => 2, 'board_y' => 2],
                $conjunction_index + 9 => ['board_x' => 3, 'board_y' => 2],
                $conjunction_index + 10 => ['board_x' => 4, 'board_y' => 2],
                $conjunction_index + 11 => ['board_x' => 5, 'board_y' => 2],
                $conjunction_index + 12 => ['board_x' => 6, 'board_y' => 2]
            ]);

        //Food
            $user->words()->createMany([
                ['id' => $food_extra + 1, 'text' => 'Food', 'color' => '#e6ffcc'],
                ['id' => $food_extra + 2, 'text' => 'Pizza', 'color' => '#c73838'],
                ['id' => $food_extra + 3, 'text' => 'Hamburger', 'color' => '#fde49e'],
                ['id' => $food_extra + 4, 'text' => 'Chicken nuggets', 'color' => '#fcb321']
            ]);
            $user->folders()->createMany([
                ['id' => 1, 'name' => 'Foods', 'color' => '#e6ffcc'],
                ['id' => 19, 'name' => 'Pasta', 'color' => '#ffedb3'],
                ['id' => 20, 'name' => 'Snacks', 'color' => '#edb25a'],
                ['id' => 21, 'name' => 'Drinks', 'color' => '#d9b6bd'],
                ['id' => 22, 'name' => 'Fruit', 'color' => '#ff8080']
            ]);
            $user->folders()->find(1)->words()->attach([
                $food_extra + 1 => ['board_x' => 1, 'board_y' => 1],
                //2-5 for the folders

                $food_extra + 2 => ['board_x' => 1, 'board_y' => 2],
                $food_extra + 4 => ['board_x' => 2, 'board_y' => 2],
                $food_extra + 3 => ['board_x' => 3, 'board_y' => 2]
            ]);
            $user->folders()->find(1)->folders()->attach([
                19 => ['board_x' => 2, 'board_y' => 1],
                20 => ['board_x' => 3, 'board_y' => 1],
                21 => ['board_x' => 4, 'board_y' => 1],
                22 => ['board_x' => 5, 'board_y' => 1]
            ]);
            //Pasta
                $user->words()->createMany([
                    ['id' => $food_pasta + 1, 'text' => 'Pasta', 'color' => '#ffedb3'],
                    ['id' => $food_pasta + 2, 'text' => 'Spaghetti', 'color' => '#ffedb3'],
                    ['id' => $food_pasta + 3, 'text' => 'Macaroni', 'color' => '#ffedb3'],
                    ['id' => $food_pasta + 4, 'text' => 'Penne', 'color' => '#ffedb3'],
                    ['id' => $food_pasta + 5, 'text' => 'Colorful', 'color' => '#ffc6b3'],
                    ['id' => $food_pasta + 6, 'text' => 'Mac & Cheese', 'color' => '#ffd966'],
                    ['id' => $food_pasta + 7, 'text' => 'Alfredo', 'color' => '#ffefe3'],
                    ['id' => $food_pasta + 8, 'text' => 'Tomato Sauce', 'color' => '#b21807']
                ]);
                $user->folders()->find(19)->words()->attach([
                    $food_pasta + 1 => ['board_x' => 1, 'board_y' => 1],
                    $food_pasta + 2 => ['board_x' => 2, 'board_y' => 1],
                    $food_pasta + 3 => ['board_x' => 3, 'board_y' => 1],
                    $food_pasta + 4 => ['board_x' => 4, 'board_y' => 1],
                    $food_pasta + 5 => ['board_x' => 5, 'board_y' => 1],
                    $food_pasta + 6 => ['board_x' => 6, 'board_y' => 1],

                    $food_pasta + 7 => ['board_x' => 1, 'board_y' => 2],
                    $food_pasta + 8 => ['board_x' => 2, 'board_y' => 2],
                ]);
            //Fruit
                $user->words()->createMany([
                    ['id' => $food_fruit + 1, 'text' => 'Orange', 'color' => '#ffa024'],
                    ['id' => $food_fruit + 2, 'text' => 'Fruit', 'color' => '#ff8080'],
                    ['id' => $food_fruit + 3, 'text' => 'Apple', 'color' => '#ff5b45'],
                    ['id' => $food_fruit + 4, 'text' => 'Pear', 'color' => '#dbfca2'],
                    ['id' => $food_fruit + 5, 'text' => 'Banana', 'color' => '#fffb87'],
                    ['id' => $food_fruit + 6, 'text' => 'Grapes', 'color' => '#723f8a'],
                    ['id' => $food_fruit + 7, 'text' => 'Peach', 'color' => '#ffcba4'],
                    ['id' => $food_fruit + 8, 'text' => 'Plum', 'color' => '#91516b'],
                    ['id' => $food_fruit + 9, 'text' => 'Strawberry', 'color' => '#e83a46'],
                    ['id' => $food_fruit + 10, 'text' => 'Blueberry', 'color' => '#5f53d4'],
                    ['id' => $food_fruit + 11, 'text' => 'Raspberry', 'color' => '#d9528d'],
                    ['id' => $food_fruit + 12, 'text' => 'Blackberry', 'color' => $default_color],
                    ['id' => $food_fruit + 13, 'text' => 'Cranberry', 'color' => $default_color],
                    ['id' => $food_fruit + 14, 'text' => 'Kiwi', 'color' => $default_color],
                    ['id' => $food_fruit + 15, 'text' => 'Pinapple', 'color' => $default_color],
                    ['id' => $food_fruit + 16, 'text' => 'Coconut', 'color' => $default_color],
                    ['id' => $food_fruit + 17, 'text' => 'Mango', 'color' => $default_color],
                    ['id' => $food_fruit + 18, 'text' => 'Lime', 'color' => $default_color],
                    ['id' => $food_fruit + 19, 'text' => 'Watermellon', 'color' => $default_color],
                    ['id' => $food_fruit + 20, 'text' => 'Cantalope', 'color' => $default_color],
                    ['id' => $food_fruit + 21, 'text' => 'Honeydew', 'color' => $default_color],
                    ['id' => $food_fruit + 22, 'text' => 'Apricot', 'color' => $default_color],
                    ['id' => $food_fruit + 23, 'text' => 'Cherry', 'color' => $default_color],
                    ['id' => $food_fruit + 24, 'text' => 'Lemon', 'color' => $default_color]
                ]);
                $user->folders()->find(22)->words()->attach([
                    $food_fruit + 2 => ['board_x' => 1, 'board_y' => 1],
                    $food_fruit + 1 => ['board_x' => 2, 'board_y' => 1],
                    $food_fruit + 4 => ['board_x' => 3, 'board_y' => 1],
                    $food_fruit + 3 => ['board_x' => 4, 'board_y' => 1],
                    $food_fruit + 5 => ['board_x' => 5, 'board_y' => 1],
                    $food_fruit + 6 => ['board_x' => 6, 'board_y' => 1],

                    $food_fruit + 7 => ['board_x' => 1, 'board_y' => 2],
                    $food_fruit + 8 => ['board_x' => 2, 'board_y' => 2],
                    $food_fruit + 9 => ['board_x' => 3, 'board_y' => 2],
                    $food_fruit + 10 => ['board_x' => 4, 'board_y' => 2],
                    $food_fruit + 11 => ['board_x' => 5, 'board_y' => 2],
                    $food_fruit + 12 => ['board_x' => 6, 'board_y' => 2],

                    $food_fruit + 13 => ['board_x' => 1, 'board_y' => 3],
                    $food_fruit + 14 => ['board_x' => 2, 'board_y' => 3],
                    $food_fruit + 15 => ['board_x' => 3, 'board_y' => 3],
                    $food_fruit + 16 => ['board_x' => 4, 'board_y' => 3],
                    $food_fruit + 17 => ['board_x' => 5, 'board_y' => 3],
                    $food_fruit + 18 => ['board_x' => 6, 'board_y' => 3],

                    $food_fruit + 19 => ['board_x' => 1, 'board_y' => 4],
                    $food_fruit + 20 => ['board_x' => 2, 'board_y' => 4],
                    $food_fruit + 21 => ['board_x' => 3, 'board_y' => 4],
                    $food_fruit + 22 => ['board_x' => 4, 'board_y' => 4],
                    $food_fruit + 23 => ['board_x' => 5, 'board_y' => 4],
                    $food_fruit + 24 => ['board_x' => 6, 'board_y' => 4]
                ]);
            //Snack
                $user->words()->createMany([
                    ['id' => $food_snacks + 1, 'text' => 'Snack', 'color' => ' #edb25a'],
                    ['id' => $food_snacks + 2, 'text' => 'Potato Chips', 'color' => '#fff0c2'],
                    ['id' => $food_snacks + 3, 'text' => 'Goldfish', 'color' => '#ffc859'],
                    ['id' => $food_snacks + 4, 'text' => 'Fruit Snacks', 'color' => '#db2c4f ']
                ]);
                $user->folders()->find(20)->words()->attach([
                    $food_snacks + 1 => ['board_x' => 1, 'board_y' => 1],
                    $food_snacks + 2 => ['board_x' => 2, 'board_y' => 1],
                    $food_snacks + 3 => ['board_x' => 3, 'board_y' => 1],
                    $food_snacks + 4 => ['board_x' => 3, 'board_y' => 1],

                    $food_fruit + 2 => ['board_x' => 1, 'board_y' => 2],
                    $food_fruit + 1 => ['board_x' => 2, 'board_y' => 2],
                    $food_fruit + 3 => ['board_x' => 3, 'board_y' => 2],
                    $food_fruit + 5 => ['board_x' => 4, 'board_y' => 2],
                    $food_fruit + 9 => ['board_x' => 5, 'board_y' => 2],
                    $food_fruit + 10 => ['board_x' => 6, 'board_y' => 2]
                ]);
                $user->folders()->find(20)->folders()->attach([
                    22 => ['board_x' => 1, 'board_y' => 3]
                ]);
            //Drinks
                $user->words()->createMany([
                    ['id' => $food_drinks + 1, 'text' => 'Drink', 'color' => '#d9b6bd'],
                    ['id' => $food_drinks + 2, 'text' => 'Soda', 'color' => '#c2937a'],
                    ['id' => $food_drinks + 3, 'text' => 'Juice', 'color' => '#ffb93d'],
                    ['id' => $food_drinks + 4, 'text' => 'Water', 'color' => '#b3e6ff'],
                    ['id' => $food_drinks + 5, 'text' => 'Flavored Water', 'color' => '#c3bfff']
                ]);
                $user->folders()->find(21)->words()->attach([
                    $food_drinks + 1 => ['board_x' => 1, 'board_y' => 1],
                    $food_drinks + 4 => ['board_x' => 2, 'board_y' => 1],
                    $food_drinks + 2 => ['board_x' => 3, 'board_y' => 1],
                    $food_drinks + 3 => ['board_x' => 4, 'board_y' => 1],
                    $food_drinks + 5 => ['board_x' => 5, 'board_y' => 1]
                ]);

        //Comfort
            $user->words()->createMany([
                ['id' => $comfort + 1, 'text' => 'Comfort', 'color' => '#cceeff'],
                ['id' => $comfort + 2, 'text' => 'Blanket', 'color' => $default_color],
                ['id' => $comfort + 3, 'text' => 'Stuffed animal', 'color' => '#cccccc'],
                ['id' => $comfort + 4, 'text' => 'Hug', 'color' => '#eee6ff'],
                ['id' => $comfort + 5, 'text' => 'Gentle touch', 'color' => $default_color],
                ['id' => $comfort + 6, 'text' => 'Pressure', 'color' => $default_color],
                ['id' => $comfort + 7, 'text' => 'Distance', 'color' => $default_color]
            ]);
            $user->folders()->createMany([
                ['id' => 23, 'name' => 'Comfort', 'color' => '#cceeff']
            ]);
            $user->folders()->find(23)->words()->attach([
                $comfort + 1 => ['board_x' => 1, 'board_y' => 1],
                $comfort + 2 => ['board_x' => 2, 'board_y' => 1],
                $comfort + 3 => ['board_x' => 3, 'board_y' => 1],
                $comfort + 4 => ['board_x' => 4, 'board_y' => 1],
                $comfort + 5 => ['board_x' => 5, 'board_y' => 1],
                $comfort + 6 => ['board_x' => 6, 'board_y' => 1],

                $comfort + 7 => ['board_x' => 1, 'board_y' => 2],
                $food_snacks + 1 => ['board_x' => 2, 'board_y' => 2]
            ]);

        //Quantity
            $user->words()->createMany([
                ['id' => $quantity + 1, 'text' => 'More', 'color' => $quantity_color],
                ['id' => $quantity + 2, 'text' => 'Less', 'color' => $quantity_color],
                ['id' => $quantity + 3, 'text' => 'Lot', 'color' => $quantity_color],
                ['id' => $quantity + 4, 'text' => 'Little', 'color' => $quantity_color],
                ['id' => $quantity + 5, 'text' => 'None', 'color' => $quantity_color],
                ['id' => $quantity + 6, 'text' => 'All', 'color' => $quantity_color],
                ['id' => $quantity + 7, 'text' => 'Many', 'color' => $quantity_color],
                ['id' => $quantity + 8, 'text' => 'Few', 'color' => $quantity_color],
                ['id' => $quantity + 9, 'text' => 'Light', 'color' => $quantity_color],
                ['id' => $quantity + 10, 'text' => 'Heavy', 'color' => $quantity_color]
            ]);
            $user->folders()->createMany([
                ['id' => 24, 'name' => 'Quantity', 'color' => $quantity_color]
            ]);
            $user->folders()->find(24)->words()->attach([
                $quantity + 1 => ['board_x' => 1, 'board_y' => 1],
                $quantity + 2 => ['board_x' => 2, 'board_y' => 1],
                $quantity + 3 => ['board_x' => 3, 'board_y' => 1],
                $quantity + 4 => ['board_x' => 4, 'board_y' => 1],
                $quantity + 5 => ['board_x' => 5, 'board_y' => 1],
                $quantity + 6 => ['board_x' => 6, 'board_y' => 1],

                $quantity + 7 => ['board_x' => 1, 'board_y' => 2],
                $quantity + 8 => ['board_x' => 2, 'board_y' => 2],
                $quantity + 9 => ['board_x' => 3, 'board_y' => 2],
                $quantity + 10 => ['board_x' => 4, 'board_y' => 2]
            ]);

        //Articles
            $user->words()->createMany([
                ['id' => $article + 1, 'text' => 'A', 'color' => $article_color],
                ['id' => $article + 2, 'text' => 'An', 'color' => $article_color],
                ['id' => $article + 3, 'text' => 'The', 'color' => $article_color]
            ]);
            $user->folders()->createMany([
                ['id' => 3, 'name' => 'Article', 'color' => $article_color]
            ]);
            $user->folders()->find(3)->words()->attach([
                $article + 1 => ['board_x' => 1, 'board_y' => 1],
                $article + 2 => ['board_x' => 2, 'board_y' => 1],
                $article + 3 => ['board_x' => 3, 'board_y' => 1]
            ]);

        //Help
            $user->words()->createMany([
                ['id' => $help + 1, 'text' => 'Help', 'color' => '#e6e6ff'],
                ['id' => $help + 2, 'text' => 'Help me', 'color' => '#e6e6ff'],
                ['id' => $help + 3, 'text' => 'Call for help', 'color' => '#ff99c2'],
                ['id' => $help + 4, 'text' => 'Medical emergency', 'color' => '#ff8080'],
                ['id' => $help + 5, 'text' => 'Medical symptoms', 'color' => '#ffcccc'],
                ['id' => $help + 6, 'text' => 'Ask companion', 'color' => '#ccffcc'],
                ['id' => $help + 7, 'text' => 'I cannot speak', 'color' => '#ffdf80'],
                ['id' => $help + 8, 'text' => 'I am using a talker', 'color' => '#ffecb3'],
                ['id' => $help + 9, 'text' => 'I Need', 'color' => $default_color],
                ['id' => $help + 10, 'text' => 'Stop', 'color' => '#c42b2b']
            ]);
            $user->folders()->createMany([
                ['id' => 2, 'name' => 'Help', 'color' => '#ffff66']
            ]);
            $user->folders()->find(2)->words()->attach([
                $help + 1 => ['board_x' => 1, 'board_y' => 1],
                $help + 2 => ['board_x' => 2, 'board_y' => 1],
                $help + 3 => ['board_x' => 3, 'board_y' => 1],
                $help + 4 => ['board_x' => 4, 'board_y' => 1],
                $help + 5 => ['board_x' => 5, 'board_y' => 1],
                $help + 7 => ['board_x' => 6, 'board_y' => 1],

                $help + 8 => ['board_x' => 1, 'board_y' => 2],
                $help + 4 => ['board_x' => 2, 'board_y' => 2],
                $food_extra + 1 => ['board_x' => 3, 'board_y' => 2],
                $comfort + 1 => ['board_x' => 4, 'board_y' => 2],
                $emotion_index + 1 => ['board_x' => 5, 'board_y' => 2],
                $emotion_index + 2 => ['board_x' => 6, 'board_y' => 2],

                $help + 9 => ['board_x' => 1, 'board_y' => 3],
                $help + 10 => ['board_x' => 2, 'board_y' => 3],
                $help + 6 => ['board_x' => 3, 'board_y' => 3]
            ]);
        //Toys
            $user->words()->createMany([
                ['id' => $toys + 1, 'text' => 'Toy', 'color' => '#60d164'],
                ['id' => $toys + 2, 'text' => 'Ball', 'color' => '#596df0'],
                ['id' => $toys + 3, 'text' => 'Block', 'color' => '#f23a3a'],
                ['id' => $toys + 4, 'text' => 'Doll', 'color' => '#ffefad']
            ]);
            $user->folders()->createMany([
                ['id' => 26, 'name' => 'Toys', 'color' => '#60d164']
            ]);
            $user->folders()->find(26)->words()->attach([
                $toys + 1 => ['board_x' => 1, 'board_y' => 1],
                $toys + 2 => ['board_x' => 2, 'board_y' => 1],
                $toys + 3 => ['board_x' => 3, 'board_y' => 1],
                $toys + 4 => ['board_x' => 4, 'board_y' => 1]
                //attach book
            ]);
            //attach vehicles folder

        //People
            $user->words()->createMany([
                ['id' => $people + 1, 'text' => 'People', 'color' => $default_color],
                ['id' => $people + 2, 'text' => 'Teacher', 'color' => $default_color],
                ['id' => $people + 3, 'text' => 'Classmate', 'color' => $default_color],
                ['id' => $people + 4, 'text' => 'Friend', 'color' => $default_color],
                ['id' => $people + 5, 'text' => 'Doctor', 'color' => $default_color],
                ['id' => $people + 6, 'text' => 'Nurse', 'color' => $default_color],
                ['id' => $people + 7, 'text' => 'Cashier', 'color' => $default_color],
                ['id' => $people + 8, 'text' => 'Wait Staff', 'color' => $default_color],
                ['id' => $people + 9, 'text' => 'Piolot', 'color' => $default_color],
                ['id' => $people + 10, 'text' => 'Staff', 'color' => $default_color]
            ]);
            $user->folders()->createMany([
                ['id' => 28, 'name' => 'People', 'color' => $default_color],
                ['id' => 29, 'name' => 'Family', 'color' => $default_color] 
            ]);
            $user->folders()->find(28)->words()->attach([
                $people + 1 => ['board_x' => 1, 'board_y' => 1],
                //blank space for family folder
                $people + 2 => ['board_x' => 3, 'board_y' => 1],
                $people + 3 => ['board_x' => 4, 'board_y' => 1],
                $people + 4 => ['board_x' => 5, 'board_y' => 1],
                $people + 5 => ['board_x' => 6, 'board_y' => 1],

                $people + 6 => ['board_x' => 1, 'board_y' => 2],
                $people + 7 => ['board_x' => 2, 'board_y' => 2],
                $people + 8 => ['board_x' => 3, 'board_y' => 2],
                $people + 9 => ['board_x' => 4, 'board_y' => 2],
                $people + 10 => ['board_x' => 5, 'board_y' => 2]
            ]);
            $user->folders()->find(28)->folders()->attach([
                29 => ['board_x' => 2, 'board_y' => 1]
            ]);
            $user->words()->createMany([
                ['id' => $people + 11, 'text' => 'Family', 'color' => $default_color],
                ['id' => $people + 12, 'text' => 'Parent', 'color' => $default_color],
                ['id' => $people + 13, 'text' => 'Mom', 'color' => $default_color],
                ['id' => $people + 14, 'text' => 'Dad', 'color' => $default_color],
                ['id' => $people + 15, 'text' => 'Grandma', 'color' => $default_color],
                ['id' => $people + 16, 'text' => 'Grandpa', 'color' => $default_color],
                ['id' => $people + 17, 'text' => 'Granparent', 'color' => $default_color],
                ['id' => $people + 18, 'text' => 'Aunt', 'color' => $default_color],
                ['id' => $people + 19, 'text' => 'Uncle', 'color' => $default_color],
                ['id' => $people + 20, 'text' => 'Cousin', 'color' => $default_color],
                ['id' => $people + 21, 'text' => 'Brother', 'color' => $default_color],
                ['id' => $people + 22, 'text' => 'Sister', 'color' => $default_color],
                ['id' => $people + 23, 'text' => 'Sibling', 'color' => $default_color],
                ['id' => $people + 24, 'text' => 'Niece', 'color' => $default_color],
                ['id' => $people + 25, 'text' => 'Nephew', 'color' => $default_color],
                ['id' => $people + 26, 'text' => 'Nibling', 'color' => $default_color],
                ['id' => $people + 27, 'text' => 'Daughter', 'color' => $default_color],
                ['id' => $people + 28, 'text' => 'Son', 'color' => $default_color],
                ['id' => $people + 29, 'text' => 'Child', 'color' => $default_color]
            ]);
            $user->folders()->find(29)->words()->attach([
                $people + 11 => ['board_x' => 1, 'board_y' => 1],
                $people + 12 => ['board_x' => 2, 'board_y' => 1],
                $people + 13 => ['board_x' => 3, 'board_y' => 1],
                $people + 14 => ['board_x' => 4, 'board_y' => 1],
                $people + 15 => ['board_x' => 5, 'board_y' => 1],
                $people + 16 => ['board_x' => 6, 'board_y' => 1],

                $people + 17 => ['board_x' => 1, 'board_y' => 2],
                $people + 18 => ['board_x' => 2, 'board_y' => 2],
                $people + 19 => ['board_x' => 3, 'board_y' => 2],
                $people + 20 => ['board_x' => 4, 'board_y' => 2],
                $people + 21 => ['board_x' => 5, 'board_y' => 2],
                $people + 22 => ['board_x' => 6, 'board_y' => 2],

                $people + 23 => ['board_x' => 1, 'board_y' => 3],
                $people + 24 => ['board_x' => 2, 'board_y' => 3],
                $people + 25 => ['board_x' => 3, 'board_y' => 3],
                $people + 26 => ['board_x' => 4, 'board_y' => 3],
                $people + 27 => ['board_x' => 5, 'board_y' => 3],
                $people + 28 => ['board_x' => 6, 'board_y' => 3],

                $people + 29 => ['board_x' => 1, 'board_y' => 4],
                //hold for great $people + 16 => ['board_x' => 6, 'board_y' => 4]
            ]);
        
            //Colors
            $user->words()->createMany([
                ['id' => $colors + 1, 'text' => 'Red', 'color' => $default_color],
                ['id' => $colors + 2, 'text' => 'Orange', 'color' => $default_color],
                ['id' => $colors + 3, 'text' => 'Yellow', 'color' => $default_color],
                ['id' => $colors + 4, 'text' => 'Green', 'color' => $default_color],
                ['id' => $colors + 5, 'text' => 'Blue', 'color' => $default_color],
                ['id' => $colors + 6, 'text' => 'Purple', 'color' => $default_color],
                ['id' => $colors + 7, 'text' => 'Rainbow', 'color' => $default_color],
                ['id' => $colors + 8, 'text' => 'Brown', 'color' => $default_color],
                ['id' => $colors + 9, 'text' => 'Black', 'color' => $default_color],
                ['id' => $colors + 10, 'text' => 'White', 'color' => $default_color],
                ['id' => $colors + 11, 'text' => 'Pink', 'color' => $default_color],
                ['id' => $colors + 12, 'text' => 'Neon', 'color' => $default_color],
            ]);
            $user->folders()->createMany([
                ['id' => 30, 'name' => 'Colors', 'color' => $default_color]
            ]);
            $user->folders()->find(30)->words()->attach([
                $colors + 1 => ['board_x' => 1, 'board_y' => 1],
                $colors + 2 => ['board_x' => 2, 'board_y' => 1],
                $colors + 3 => ['board_x' => 3, 'board_y' => 1],
                $colors + 4 => ['board_x' => 4, 'board_y' => 1],
                $colors + 5 => ['board_x' => 5, 'board_y' => 1],
                $colors + 6 => ['board_x' => 6, 'board_y' => 1],

                $colors + 7 => ['board_x' => 1, 'board_y' => 2],
                $colors + 8 => ['board_x' => 2, 'board_y' => 2],
                $colors + 9 => ['board_x' => 3, 'board_y' => 2],
                $colors + 10 => ['board_x' => 4, 'board_y' => 2],
                $colors + 11 => ['board_x' => 5, 'board_y' => 2],

                //space for light $ => ['board_x' => 1, 'board_y' => 4]
                //space for dark $ => ['board_x' => 2, 'board_y' => 4]
                $colors + 12 => ['board_x' => 3, 'board_y' => 4]
            ]);

        //Patterns
            $user->words()->createMany([
                ['id' => $patterns + 1, 'text' => 'Pattern', 'color' => $default_color],
                ['id' => $patterns + 2, 'text' => 'Spots', 'color' => $default_color],
                ['id' => $patterns + 3, 'text' => 'Stripes', 'color' => $default_color],
                ['id' => $patterns + 4, 'text' => 'Checkered', 'color' => $default_color],
                ['id' => $patterns + 5, 'text' => 'Houndstooth', 'color' => $default_color],
                ['id' => $patterns + 6, 'text' => 'Floral', 'color' => $default_color],
                ['id' => $patterns + 7, 'text' => 'Paisley', 'color' => $default_color]
            ]);
            $user->folders()->createMany([
                ['id' => 31, 'name' => 'Patterns', 'color' => $default_color]
            ]);
            $user->folders()->find(26)->words()->attach([
                $patterns + 1 => ['board_x' => 1, 'board_y' => 1],
                $patterns + 2 => ['board_x' => 2, 'board_y' => 1],
                $patterns + 3 => ['board_x' => 3, 'board_y' => 1],
                $patterns + 4 => ['board_x' => 4, 'board_y' => 1],
                $patterns + 5 => ['board_x' => 5, 'board_y' => 1],
                $patterns + 6 => ['board_x' => 6, 'board_y' => 1],
                $patterns + 7 => ['board_x' => 1, 'board_y' => 2]
            ]);

        //vehicles
            $user->words()->createMany([
                ['id' => $vehicles + 1, 'text' => 'Vehicle', 'color' => $default_color],
                ['id' => $vehicles + 2, 'text' => 'Car', 'color' => $default_color],
                ['id' => $vehicles + 3, 'text' => 'Truck', 'color' => $default_color],
                ['id' => $vehicles + 4, 'text' => 'Bus', 'color' => $default_color],
                ['id' => $vehicles + 5, 'text' => 'Train', 'color' => $default_color],
                ['id' => $vehicles + 6, 'text' => 'Dumptruck', 'color' => $default_color],
                ['id' => $vehicles + 7, 'text' => 'Garbage Truck', 'color' => $default_color]
            ]);
            $user->folders()->createMany([
                ['id' => 32, 'name' => 'Vehicles', 'color' => $default_color]
            ]);
            $user->folders()->find(26)->words()->attach([
                $vehicles + 1 => ['board_x' => 1, 'board_y' => 1],
                $vehicles + 2 => ['board_x' => 2, 'board_y' => 1],
                $vehicles + 3 => ['board_x' => 3, 'board_y' => 1],
                $vehicles + 4 => ['board_x' => 4, 'board_y' => 1],
                $vehicles + 5 => ['board_x' => 5, 'board_y' => 1],
                $vehicles + 6 => ['board_x' => 6, 'board_y' => 1],
                $vehicles + 7 => ['board_x' => 1, 'board_y' => 2]
            ]);
        
        //adjictives
            
        
        //clothes

        //weather

        //tempurature

        //numbers

        //letters

        //personal care

        //talker
            $user->words()->createMany([
                ['id' => $talker + 1, 'text' => 'Word', 'color' => $default_color],
                ['id' => $talker + 2, 'text' => 'Words', 'color' => $default_color],
                ['id' => $talker + 3, 'text' => 'Speak', 'color' => $default_color],
                ['id' => $talker + 4, 'text' => 'Say', 'color' => $default_color]
            ]);
            $user->folders()->createMany([
                ['id' => 27, 'name' => 'Talker', 'color' => $default_color]
            ]);
            $user->folders()->find(27)->words()->attach([
                $talker + 1 => ['board_x' => 1, 'board_y' => 1],
                $talker + 2 => ['board_x' => 2, 'board_y' => 1],
                $talker + 3 => ['board_x' => 3, 'board_y' => 1],
                $talker + 4 => ['board_x' => 4, 'board_y' => 1],
                $help + 7 => ['board_x' => 5, 'board_y' => 1],
                $help + 8 => ['board_x' => 6, 'board_y' => 1],
            ]);

        //main board
            $board->words()->attach([
                $board_index + 1 => ['board_x' => 1, 'board_y' => 1],
                $board_index + 2 => ['board_x' => 2, 'board_y' => 1],
                $board_index + 4 => ['board_x' => 3, 'board_y' => 1],
                $board_index + 5 => ['board_x' => 4, 'board_y' => 1],
                $board_index + 7 => ['board_x' => 5, 'board_y' => 1],
                $help + 10 => ['board_x' => 6, 'board_y' => 1],
                $help + 1 => ['board_x' => 1, 'board_y' => 2],
                $board_index + 6 => ['board_x' => 2, 'board_y' => 2],
                $board_index + 3 => ['board_x' => 3, 'board_y' => 2],
            ]);

            $board->folders()->attach([
                1 => ['board_x' => 1, 'board_y' => 3],
                25 => ['board_x' => 2, 'board_y' => 3],
                23 => ['board_x' => 3, 'board_y' => 3],
                2 => ['board_x' => 4, 'board_y' => 3],
                3 => ['board_x' => 1, 'board_y' => 4],
                24 => ['board_x' => 2, 'board_y' => 4],
                4 => ['board_x' => 3, 'board_y' => 4],
                5 => ['board_x' => 4, 'board_y' => 4],
                26 => ['board_x' => 5, 'board_y' => 4]
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
