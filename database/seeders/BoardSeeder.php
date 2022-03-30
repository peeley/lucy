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
            $empty = 1;    
            $board_index = 1;
            $emotion_index = $board_index + 7;
            $pronoun_index = $emotion_index + 15;
            $conjunction_index = $pronoun_index + 42;
            $food_extra = $conjunction_index + 12;
            $food_pasta = $food_extra + 4;
            $food_snacks = $food_pasta + 7;
            $food_fruit = $food_snacks + 4;
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
            $talker = $vehicles + 7;
            $adjectives = $talker + 4;
            $clothes = $adjectives + 59;
            $weather = $clothes + 58;
            $tempurature = $weather + 19;
            $numbers = $tempurature + 4;
            $letters = $numbers + 31;
            $person_care = $letters + 28;
            $entertainment = $person_care + 6;
            $medical = $entertainment + 7;
            $plants = $medical + 6;
            //$animals = $plants + ;

        $user->words()->createMany([
            ['id' => $empty, 'text' => '+', 'color' => '#b4b2c2'],
            ['id' => $board_index + 1, 'text' => 'Hello', 'color' => '#e6ffe6'],//2
            ['id' => $board_index + 2, 'text' => 'Goodbye', 'color' => '#ffe6cc'],
            ['id' => $board_index + 3, 'text' => 'Yay!', 'color' => '#ffff99'],
            ['id' => $board_index + 4, 'text' => 'Yes', 'color' => '#ccffcc'],
            ['id' => $board_index + 5, 'text' => 'No', 'color' => '#ffcccc'],
            ['id' => $board_index + 6, 'text' => 'Talk', 'color' => '#ffecb3'],
            ['id' => $board_index + 7, 'text' => 'Okay', 'color' => '#eeffe6']
        ]);

        //adjictives
            $user->words()->createMany([
                ['id' => $adjectives + 3, 'text' => 'Dirty', 'color' => $default_color],
                ['id' => $adjectives + 4, 'text' => 'Clean', 'color' => $default_color],
                ['id' => $adjectives + 5, 'text' => 'Light', 'color' => $default_color],
                ['id' => $adjectives + 6, 'text' => 'Heavy', 'color' => $default_color]
            ]);
            $user->folders()->createMany([
                ['id' => 33, 'name' => 'Adjectives', 'color' => $default_color],
                ['id' => 34, 'name' => 'Asthetics', 'color' => $default_color],
                ['id' => 35, 'name' => 'People', 'color' => $default_color],
                ['id' => 36, 'name' => 'Opinions', 'color' => $default_color],
                ['id' => 37, 'name' => 'Sensory', 'color' => $default_color],
                ['id' => 38, 'name' => 'Movement', 'color' => $default_color],
                ['id' => 39, 'name' => 'Speed', 'color' => $default_color],
                ['id' => 40, 'name' => 'Distance', 'color' => $default_color],
                ['id' => 41, 'name' => 'Direction', 'color' => $default_color],
                ['id' => 42, 'name' => 'Size', 'color' => $default_color],
                ['id' => 43, 'name' => 'Texture', 'color' => $default_color]
            ]);
            $user->folders()->find(33)->words()->attach([
                $adjectives + 1 => ['board_x' => 1, 'board_y' => 1],
                $adjectives + 2 => ['board_x' => 2, 'board_y' => 1],
                $adjectives + 3 => ['board_x' => 3, 'board_y' => 1],
                $adjectives + 4 => ['board_x' => 4, 'board_y' => 1],
                $adjectives + 5 => ['board_x' => 5, 'board_y' => 1],
                $adjectives + 6 => ['board_x' => 6, 'board_y' => 1],

                //rows 2 and 3 have folderd

                $empty => ['board_x' => 1, 'board_y' => 4]
            ]);
            $user->folders()->find(33)->folders()->attach([
                34 => ['board_x' => 1, 'board_y' => 2],
                35 => ['board_x' => 2, 'board_y' => 2],
                36 => ['board_x' => 3, 'board_y' => 2],
                37 => ['board_x' => 4, 'board_y' => 2],
                38 => ['board_x' => 5, 'board_y' => 2],
                39 => ['board_x' => 6, 'board_y' => 2],

                40 => ['board_x' => 1, 'board_y' => 2],
                41 => ['board_x' => 2, 'board_y' => 2],
                42 => ['board_x' => 3, 'board_y' => 1],
                43 => ['board_x' => 4, 'board_y' => 1]
            ]);
            
                //asthetics
                    $user->words()->createMany([
                        ['id' => $adjectives + 7, 'text' => 'Bold', 'color' => $default_color],
                        ['id' => $adjectives + 8, 'text' => 'Light', 'color' => $default_color],
                        ['id' => $adjectives + 9, 'text' => 'Dark', 'color' => $default_color],
                        ['id' => $adjectives + 10, 'text' => 'Pretty', 'color' => $default_color],
                        ['id' => $adjectives + 11, 'text' => 'Colorful', 'color' => $default_color]
                    ]);
                    $user->folders()->find(34)->words()->attach([
                        $adjectives + 9 => ['board_x' => 1, 'board_y' => 1],
                        $adjectives + 11 => ['board_x' => 2, 'board_y' => 1],
                        $adjectives + 10 => ['board_x' => 3, 'board_y' => 1],
                        $empty => ['board_x' => 4, 'board_y' => 1],
                        $empty => ['board_x' => 5, 'board_y' => 1],
                        $empty => ['board_x' => 6, 'board_y' => 1],

                        $empty => ['board_x' => 1, 'board_y' => 2],

                        $empty => ['board_x' => 1, 'board_y' => 3],

                        $empty => ['board_x' => 1, 'board_y' => 4]
                    ]);
                
                //People
                    $user->words()->createMany([
                        ['id' => $adjectives + 12, 'text' => 'Kind', 'color' => $default_color],
                        ['id' => $adjectives + 13, 'text' => 'Mean', 'color' => $default_color],
                        ['id' => $adjectives + 14, 'text' => 'Gay', 'color' => $default_color],
                        ['id' => $adjectives + 15, 'text' => 'Queer', 'color' => $default_color],
                        ['id' => $adjectives + 16, 'text' => 'Attractive', 'color' => $default_color],
                        ['id' => $adjectives + 17, 'text' => 'Beautiful', 'color' => $default_color],
                        ['id' => $adjectives + 18, 'text' => 'Handsome', 'color' => $default_color],
                        ['id' => $adjectives + 19, 'text' => 'Goregous', 'color' => $default_color]
                    ]);
                    $user->folders()->find(35)->words()->attach([
                        $adjectives + 12 => ['board_x' => 1, 'board_y' => 1],
                        $adjectives + 13 => ['board_x' => 2, 'board_y' => 1],
                        $adjectives + 14 => ['board_x' => 3, 'board_y' => 1],
                        $adjectives + 15 => ['board_x' => 4, 'board_y' => 1],
                        $adjectives + 16 => ['board_x' => 5, 'board_y' => 1],
                        $adjectives + 17 => ['board_x' => 6, 'board_y' => 1],

                        $adjectives + 18 => ['board_x' => 1, 'board_y' => 2],
                        $adjectives + 19 => ['board_x' => 2, 'board_y' => 2],

                        $empty => ['board_x' => 1, 'board_y' => 3],

                        $empty => ['board_x' => 1, 'board_y' => 4]              
                    ]);
                
                //Opinions
                    $user->words()->createMany([
                        ['id' => $adjectives + 20, 'text' => 'Great', 'color' => $default_color],
                        ['id' => $adjectives + 21, 'text' => 'Good', 'color' => $default_color],
                        ['id' => $adjectives + 22, 'text' => 'Bad', 'color' => $default_color],
                        ['id' => $adjectives + 23, 'text' => 'Favorite', 'color' => $default_color],
                        ['id' => $adjectives + 24, 'text' => 'Worst', 'color' => $default_color],
                        ['id' => $adjectives + 25, 'text' => 'Best', 'color' => $default_color]
                    ]);
                    $user->folders()->find(36)->words()->attach([
                        $adjectives + 20 => ['board_x' => 1, 'board_y' => 1],
                        $adjectives + 21 => ['board_x' => 2, 'board_y' => 1],
                        $adjectives + 22 => ['board_x' => 3, 'board_y' => 1],
                        $adjectives + 23 => ['board_x' => 4, 'board_y' => 1],
                        $adjectives + 24 => ['board_x' => 5, 'board_y' => 1],
                        $adjectives + 25 => ['board_x' => 6, 'board_y' => 1],

                        $adjectives + 12 => ['board_x' => 1, 'board_y' => 2],
                        $adjectives + 13 => ['board_x' => 2, 'board_y' => 2],

                        $empty => ['board_x' => 1, 'board_y' => 3],

                        $empty => ['board_x' => 1, 'board_y' => 4]              
                    ]);

                //Sensory
                    $user->words()->createMany([
                        ['id' => $adjectives + 1, 'text' => 'Hot', 'color' => $default_color],
                        ['id' => $adjectives + 2, 'text' => 'Cold', 'color' => $default_color],
                        ['id' => $adjectives + 26, 'text' => 'Wet', 'color' => $default_color],
                        ['id' => $adjectives + 27, 'text' => 'Dry', 'color' => $default_color],
                        ['id' => $adjectives + 28, 'text' => 'Hard', 'color' => $default_color],
                        ['id' => $adjectives + 29, 'text' => 'Loud', 'color' => $default_color],
                        ['id' => $adjectives + 30, 'text' => 'Quiet', 'color' => $default_color]
                    ]);
                    $user->folders()->find(37)->words()->attach([
                        $adjectives + 26 => ['board_x' => 1, 'board_y' => 1],
                        $adjectives + 27 => ['board_x' => 2, 'board_y' => 1],
                        $adjectives + 28 => ['board_x' => 3, 'board_y' => 1],
                        $adjectives + 29 => ['board_x' => 4, 'board_y' => 1],
                        $adjectives + 30 => ['board_x' => 5, 'board_y' => 1],
                        $empty => ['board_x' => 6, 'board_y' => 1],

                        $empty => ['board_x' => 1, 'board_y' => 2],

                        $empty => ['board_x' => 1, 'board_y' => 3],

                        $empty => ['board_x' => 1, 'board_y' => 4]              
                    ]);
                
                //speed
                    $user->words()->createMany([
                        ['id' => $adjectives + 31, 'text' => 'Fast', 'color' => $default_color],
                        ['id' => $adjectives + 32, 'text' => 'Slow', 'color' => $default_color]
                    ]);
                    $user->folders()->find(39)->words()->attach([
                        $adjectives + 31 => ['board_x' => 1, 'board_y' => 1],
                        $adjectives + 32 => ['board_x' => 2, 'board_y' => 1],
                        $empty => ['board_x' => 3, 'board_y' => 1],
                        $empty => ['board_x' => 4, 'board_y' => 1],
                        $empty => ['board_x' => 5, 'board_y' => 1],
                        $empty => ['board_x' => 6, 'board_y' => 1],

                        $empty => ['board_x' => 1, 'board_y' => 2],

                        $empty => ['board_x' => 1, 'board_y' => 3],

                        $empty => ['board_x' => 1, 'board_y' => 4]              
                    ]);
                
                //Distance
                    $user->words()->createMany([
                        ['id' => $adjectives + 33, 'text' => 'Near', 'color' => $default_color],
                        ['id' => $adjectives + 34, 'text' => 'Far', 'color' => $default_color],
                        ['id' => $adjectives + 35, 'text' => 'Close', 'color' => $default_color]
                    ]);
                    $user->folders()->find(40)->words()->attach([
                        $adjectives + 12 => ['board_x' => 1, 'board_y' => 1],
                        $adjectives + 13 => ['board_x' => 2, 'board_y' => 1],
                        $adjectives + 14 => ['board_x' => 3, 'board_y' => 1],
                        $empty => ['board_x' => 4, 'board_y' => 1],
                        $empty => ['board_x' => 5, 'board_y' => 1],
                        $empty => ['board_x' => 6, 'board_y' => 1],

                        $empty => ['board_x' => 1, 'board_y' => 2],

                        $empty => ['board_x' => 1, 'board_y' => 3],

                        $empty => ['board_x' => 1, 'board_y' => 4]              
                    ]);
                
                //direction
                    $user->words()->createMany([
                        ['id' => $adjectives + 36, 'text' => 'Vertical', 'color' => $default_color],
                        ['id' => $adjectives + 37, 'text' => 'Horizontal', 'color' => $default_color],
                        ['id' => $adjectives + 38, 'text' => 'Right', 'color' => $default_color],
                        ['id' => $adjectives + 39, 'text' => 'Left', 'color' => $default_color],
                        ['id' => $adjectives + 40, 'text' => 'Upper', 'color' => $default_color],
                        ['id' => $adjectives + 41, 'text' => 'Lower', 'color' => $default_color]
                    ]);
                    $user->folders()->find(41)->words()->attach([
                        $adjectives + 36 => ['board_x' => 1, 'board_y' => 1],
                        $adjectives + 37 => ['board_x' => 2, 'board_y' => 1],
                        $adjectives + 38 => ['board_x' => 3, 'board_y' => 1],
                        $adjectives + 39 => ['board_x' => 4, 'board_y' => 1],
                        $adjectives + 40 => ['board_x' => 5, 'board_y' => 1],
                        $adjectives + 41 => ['board_x' => 6, 'board_y' => 1],

                        $empty => ['board_x' => 1, 'board_y' => 2],

                        $empty => ['board_x' => 1, 'board_y' => 3],

                        $empty => ['board_x' => 1, 'board_y' => 4]              
                    ]);
                
                //Movement
                    $user->folders()->find(38)->folders()->attach([
                        39 => ['board_x' => 1, 'board_y' => 1],
                        40 => ['board_x' => 2, 'board_y' => 1],
                        41 => ['board_x' => 3, 'board_y' => 1]            
                    ]);
                    $user->folders()->find(38)->folders()->attach([
                        $empty => ['board_x' => 4, 'board_y' => 1],
                        $empty => ['board_x' => 5, 'board_y' => 1],
                        $empty => ['board_x' => 6, 'board_y' => 1],

                        $empty => ['board_x' => 1, 'board_y' => 2],

                        $empty => ['board_x' => 1, 'board_y' => 3],

                        $empty => ['board_x' => 1, 'board_y' => 4]              
                    ]);
                
                //Size
                    $user->words()->createMany([
                        ['id' => $adjectives + 42, 'text' => 'Long', 'color' => $default_color],
                        ['id' => $adjectives + 43, 'text' => 'Tall', 'color' => $default_color],
                        ['id' => $adjectives + 44, 'text' => 'Short', 'color' => $default_color],
                        ['id' => $adjectives + 45, 'text' => 'Big', 'color' => $default_color],
                        ['id' => $adjectives + 46, 'text' => 'Large', 'color' => $default_color],
                        ['id' => $adjectives + 47, 'text' => 'Medium', 'color' => $default_color],
                        ['id' => $adjectives + 48, 'text' => 'Small', 'color' => $default_color],
                        ['id' => $adjectives + 49, 'text' => 'Light', 'color' => $default_color],
                        ['id' => $adjectives + 50, 'text' => 'Heavy', 'color' => $default_color]
                    ]);
                    $user->folders()->find(42)->words()->attach([
                        $adjectives + 42 => ['board_x' => 1, 'board_y' => 1],
                        $adjectives + 43 => ['board_x' => 2, 'board_y' => 1],
                        $adjectives + 44 => ['board_x' => 3, 'board_y' => 1],
                        $adjectives + 45 => ['board_x' => 4, 'board_y' => 1],
                        $adjectives + 46 => ['board_x' => 5, 'board_y' => 1],
                        $adjectives + 47 => ['board_x' => 6, 'board_y' => 1],

                        $adjectives + 48 => ['board_x' => 1, 'board_y' => 2],
                        $adjectives + 49 => ['board_x' => 1, 'board_y' => 2],
                        $adjectives + 50 => ['board_x' => 1, 'board_y' => 2],

                        $empty => ['board_x' => 1, 'board_y' => 3],

                        $empty => ['board_x' => 1, 'board_y' => 4]              
                    ]);
                
                //texture
                    $user->words()->createMany([
                        ['id' => $adjectives + 51, 'text' => 'Texture', 'color' => $default_color],
                        ['id' => $adjectives + 52, 'text' => 'Ribbed', 'color' => $default_color],
                        ['id' => $adjectives + 53, 'text' => 'Fuzzy', 'color' => $default_color],
                        ['id' => $adjectives + 54, 'text' => 'Bumpy', 'color' => $default_color],
                        ['id' => $adjectives + 55, 'text' => 'Soft', 'color' => $default_color],
                        ['id' => $adjectives + 56, 'text' => 'Rough', 'color' => $default_color],
                        ['id' => $adjectives + 57, 'text' => 'Sticky', 'color' => $default_color],
                        ['id' => $adjectives + 58, 'text' => 'Stretchy', 'color' => $default_color],
                        ['id' => $adjectives + 59, 'text' => 'Synthetic', 'color' => $default_color]
                    ]);
                    $user->folders()->find(43)->words()->attach([
                        $adjectives + 49 => ['board_x' => 1, 'board_y' => 1],
                        $adjectives + 50 => ['board_x' => 2, 'board_y' => 1],
                        $adjectives + 51 => ['board_x' => 3, 'board_y' => 1],
                        $adjectives + 52 => ['board_x' => 4, 'board_y' => 1],
                        $adjectives + 53 => ['board_x' => 5, 'board_y' => 1],
                        $adjectives + 54 => ['board_x' => 6, 'board_y' => 1],

                        $adjectives + 55 => ['board_x' => 1, 'board_y' => 2],
                        $adjectives + 56 => ['board_x' => 2, 'board_y' => 2],
                        $adjectives + 57 => ['board_x' => 3, 'board_y' => 2],

                        $empty => ['board_x' => 1, 'board_y' => 3],

                        $empty => ['board_x' => 1, 'board_y' => 4]              
                    ]);


        //Emotions
            $user->words()->createMany([
                ['id' => $emotion_index + 1, 'text' => 'Panic', 'color' => '#ffad33'],//9
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
                $emotion_index + 15 => ['board_x' => 3, 'board_y' => 3],

                $empty => ['board_x' => 1, 'board_y' => 4]
            ]);

        //Pronouns
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
                ['id' => $pronoun_index + 1, 'text' => 'I', 'color' => '#ccd9ff'],//24
                ['id' => $pronoun_index + 2, 'text' => 'Me', 'color' => '#ccd9ff'],
                ['id' => $pronoun_index + 3, 'text' => 'My', 'color' => '#ccd9ff'],
                ['id' => $pronoun_index + 4, 'text' => 'Mine', 'color' => '#ccd9ff'],
                ['id' => $pronoun_index + 5, 'text' => 'Myself', 'color' => '#ccd9ff'],
                ['id' => $pronoun_index + 42, 'text' => 'Pronouns', 'color' => $pronoun_color]//66
            ]);
            $user->folders()->find(5)->words()->attach([
                $pronoun_index + 42 => ['board_x' => 1, 'board_y' => 1],
                $pronoun_index + 1 => ['board_x' => 2, 'board_y' => 1],
                $pronoun_index + 2 => ['board_x' => 3, 'board_y' => 1],
                $pronoun_index + 3 => ['board_x' => 4, 'board_y' => 1],
                $pronoun_index + 4 => ['board_x' => 5, 'board_y' => 1],
                $pronoun_index + 5 => ['board_x' => 6, 'board_y' => 1]

                //row 2 is folders

                //row 3 slots 1 and 2 are folders

                //row 4, slots 1-5 are folders
            ]);
            //pronouns by persons
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
                    ['id' => $pronoun_index + 6, 'text' => 'We', 'color' => $first_plural_color],//29
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
                    $empty => ['board_x' => 6, 'board_y' => 1],
                    
                    $empty => ['board_x' => 1, 'board_y' => 2],

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]
                ]);
                $user->words()->createMany([
                    ['id' => $pronoun_index + 11, 'text' => 'It', 'color' => $thing_color],//34
                    ['id' => $pronoun_index + 12, 'text' => 'Its', 'color' => $thing_color],
                    ['id' => $pronoun_index + 13, 'text' => 'Itself', 'color' => $thing_color]
                ]);
                $user->folders()->find(7)->words()->attach([
                    $pronoun_index + 11 => ['board_x' => 1, 'board_y' => 1],
                    $pronoun_index + 12 => ['board_x' => 2, 'board_y' => 1],
                    $pronoun_index + 13 => ['board_x' => 3, 'board_y' => 1],
                    $empty => ['board_x' => 4, 'board_y' => 1],
                    $empty => ['board_x' => 5, 'board_y' => 1],
                    $empty => ['board_x' => 6, 'board_y' => 1],

                    $empty => ['board_x' => 1, 'board_y' => 2],

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]
                ]);
                $user->words()->createMany([
                    ['id' => $pronoun_index + 14, 'text' => 'You', 'color' => $second_person_color],//37
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
                    $empty => ['board_x' => 6, 'board_y' => 1],

                    $empty => ['board_x' => 1, 'board_y' => 2],

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]
                ]);
                $user->words()->createMany([
                    ['id' => $pronoun_index + 19, 'text' => 'He', 'color' => $masculine_color],//42
                    ['id' => $pronoun_index + 20, 'text' => 'Him', 'color' => $masculine_color],
                    ['id' => $pronoun_index + 21, 'text' => 'His', 'color' => $masculine_color],
                    ['id' => $pronoun_index + 22, 'text' => 'Himself', 'color' => $masculine_color]
                ]);
                $user->folders()->find(9)->words()->attach([
                    $pronoun_index + 19 => ['board_x' => 1, 'board_y' => 1],
                    $pronoun_index + 20 => ['board_x' => 2, 'board_y' => 1],
                    $pronoun_index + 21 => ['board_x' => 3, 'board_y' => 1],
                    $pronoun_index + 22 => ['board_x' => 4, 'board_y' => 1],
                    $empty => ['board_x' => 5, 'board_y' => 1],
                    $empty => ['board_x' => 6, 'board_y' => 1],

                    $empty => ['board_x' => 1, 'board_y' => 2],

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]
                ]);
                $user->words()->createMany([
                    ['id' => $pronoun_index + 23, 'text' => 'She', 'color' => $feminine_color],//46
                    ['id' => $pronoun_index + 24, 'text' => 'Her', 'color' => $feminine_color],
                    ['id' => $pronoun_index + 25, 'text' => 'Hers', 'color' => $feminine_color],
                    ['id' => $pronoun_index + 26, 'text' => 'Herself', 'color' => $feminine_color]
                ]);
                $user->folders()->find(10)->words()->attach([
                    $pronoun_index + 23 => ['board_x' => 1, 'board_y' => 1],
                    $pronoun_index + 24 => ['board_x' => 2, 'board_y' => 1],
                    $pronoun_index + 25 => ['board_x' => 3, 'board_y' => 1],
                    $pronoun_index + 26 => ['board_x' => 4, 'board_y' => 1],
                    $empty => ['board_x' => 5, 'board_y' => 1],
                    $empty => ['board_x' => 6, 'board_y' => 1],

                    $empty => ['board_x' => 1, 'board_y' => 2],

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]
                ]);
                $user->words()->createMany([
                    ['id' => $pronoun_index + 27, 'text' => 'They', 'color' => $they_color],//50
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

                    $empty => ['board_x' => 1, 'board_y' => 2],

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]
                ]);
                $user->words()->createMany([
                    ['id' => $pronoun_index + 33, 'text' => 'Xe', 'color' => $x_pronoun_color],//57
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
                    $empty => ['board_x' => 6, 'board_y' => 1],

                    $empty => ['board_x' => 1, 'board_y' => 2],

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]
                ]);
                $user->words()->createMany([
                    ['id' => $pronoun_index + 38, 'text' => 'Ze', 'color' => $z_pronoun_color],//62
                    ['id' => $pronoun_index + 39, 'text' => 'Zir', 'color' => $z_pronoun_color],
                    ['id' => $pronoun_index + 40, 'text' => 'Zirs', 'color' => $z_pronoun_color],
                    ['id' => $pronoun_index + 41, 'text' => 'Zirself', 'color' => $z_pronoun_color]
                ]);
                $user->folders()->find(13)->words()->attach([
                    $pronoun_index + 38 => ['board_x' => 1, 'board_y' => 1],
                    $pronoun_index + 39 => ['board_x' => 2, 'board_y' => 1],
                    $pronoun_index + 40 => ['board_x' => 3, 'board_y' => 1],
                    $pronoun_index + 41 => ['board_x' => 4, 'board_y' => 1],

                    $empty => ['board_x' => 5, 'board_y' => 1],
                    $empty => ['board_x' => 6, 'board_y' => 1],

                    $empty => ['board_x' => 1, 'board_y' => 2],

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]
                ]);
            //pronouns by part
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

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]
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

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]
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

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]
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

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]
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

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]
                ]);

        //Conjunctions
            $user->words()->createMany([
                ['id' => $conjunction_index + 1, 'text' => 'And', 'color' => $conjunction_color],//67
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
                ['id' => $conjunction_index + 12, 'text' => 'Also', 'color' => $conjunction_color]//78
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
                $conjunction_index + 12 => ['board_x' => 6, 'board_y' => 2],

                $empty => ['board_x' => 1, 'board_y' => 3],

                $empty => ['board_x' => 1, 'board_y' => 4]
            ]);

        //Food
            $user->words()->createMany([
                ['id' => $food_extra + 1, 'text' => 'Food', 'color' => '#e6ffcc'],//79
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
                $food_extra + 3 => ['board_x' => 3, 'board_y' => 2],
                $empty => ['board_x' => 4, 'board_y' => 2],
                $empty => ['board_x' => 5, 'board_y' => 2],
                $empty => ['board_x' => 6, 'board_y' => 2],

                $empty => ['board_x' => 1, 'board_y' => 3],

                $empty => ['board_x' => 1, 'board_y' => 4]
            ]);
            $user->folders()->find(1)->folders()->attach([
                19 => ['board_x' => 2, 'board_y' => 1],
                20 => ['board_x' => 3, 'board_y' => 1],
                21 => ['board_x' => 4, 'board_y' => 1],
                22 => ['board_x' => 5, 'board_y' => 1]
            ]);
            //Pasta
                $user->words()->createMany([
                    ['id' => $food_pasta + 1, 'text' => 'Pasta', 'color' => '#ffedb3'],//83
                    ['id' => $food_pasta + 2, 'text' => 'Spaghetti', 'color' => '#ffedb3'],
                    ['id' => $food_pasta + 3, 'text' => 'Macaroni', 'color' => '#ffedb3'],
                    ['id' => $food_pasta + 4, 'text' => 'Penne', 'color' => '#ffedb3']
                    ['id' => $food_pasta + 5, 'text' => 'Mac & Cheese', 'color' => '#ffd966'],
                    ['id' => $food_pasta + 6, 'text' => 'Alfredo', 'color' => '#ffefe3'],
                    ['id' => $food_pasta + 7, 'text' => 'Tomato Sauce', 'color' => '#b21807']
                ]);
                $user->folders()->find(19)->words()->attach([
                    $food_pasta + 1 => ['board_x' => 1, 'board_y' => 1],
                    $food_pasta + 2 => ['board_x' => 2, 'board_y' => 1],
                    $food_pasta + 3 => ['board_x' => 3, 'board_y' => 1],
                    $food_pasta + 4 => ['board_x' => 4, 'board_y' => 1],
                    $food_pasta + 5 => ['board_x' => 5, 'board_y' => 1],
                    $food_pasta + 6 => ['board_x' => 6, 'board_y' => 1],

                    $food_pasta + 7 => ['board_x' => 1, 'board_y' => 2],
                    $adjectives + 11 => ['board_x' => 2, 'board_y' => 2],

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]
                ]);
            
            //Fruit
                $user->words()->createMany([
                    ['id' => $food_fruit + 1, 'text' => 'Orange', 'color' => '#ffa024'],//95
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
                    ['id' => $food_fruit + 24, 'text' => 'Lemon', 'color' => $default_color]//118
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
                    ['id' => $food_snacks + 1, 'text' => 'Snack', 'color' => ' #edb25a'],//91
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
                    $food_fruit + 10 => ['board_x' => 6, 'board_y' => 2],

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]
                ]);
                $user->folders()->find(20)->folders()->attach([
                    22 => ['board_x' => 1, 'board_y' => 3]
                ]);
            
            //Drinks
                $user->words()->createMany([
                    ['id' => $food_drinks + 1, 'text' => 'Drink', 'color' => '#d9b6bd'],//119
                    ['id' => $food_drinks + 2, 'text' => 'Soda', 'color' => '#c2937a'],
                    ['id' => $food_drinks + 3, 'text' => 'Juice', 'color' => '#ffb93d'],
                    ['id' => $food_drinks + 4, 'text' => 'Water', 'color' => '#b3e6ff'],
                    ['id' => $food_drinks + 5, 'text' => 'Flavored Water', 'color' => '#c3bfff']//123
                ]);
                $user->folders()->find(21)->words()->attach([
                    $food_drinks + 1 => ['board_x' => 1, 'board_y' => 1],
                    $food_drinks + 4 => ['board_x' => 2, 'board_y' => 1],
                    $food_drinks + 2 => ['board_x' => 3, 'board_y' => 1],
                    $food_drinks + 3 => ['board_x' => 4, 'board_y' => 1],
                    $food_drinks + 5 => ['board_x' => 5, 'board_y' => 1],
                    $empty => ['board_x' => 6, 'board_y' => 1],

                    $empty => ['board_x' => 1, 'board_y' => 2],

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]
                ]);

        //Comfort
            $user->words()->createMany([
                ['id' => $comfort + 1, 'text' => 'Comfort', 'color' => '#cceeff'],//124
                ['id' => $comfort + 2, 'text' => 'Blanket', 'color' => $default_color],
                ['id' => $comfort + 3, 'text' => 'Stuffed animal', 'color' => '#cccccc'],
                ['id' => $comfort + 4, 'text' => 'Hug', 'color' => '#eee6ff'],
                ['id' => $comfort + 5, 'text' => 'Gentle touch', 'color' => $default_color],
                ['id' => $comfort + 6, 'text' => 'Pressure', 'color' => $default_color],
                ['id' => $comfort + 7, 'text' => 'Distance', 'color' => $default_color]//130
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
                $food_snacks + 1 => ['board_x' => 2, 'board_y' => 2],

                $empty => ['board_x' => 1, 'board_y' => 3],

                $empty => ['board_x' => 1, 'board_y' => 4]
            ]);

        //Quantity
            $user->words()->createMany([
                ['id' => $quantity + 1, 'text' => 'More', 'color' => $quantity_color],//125
                ['id' => $quantity + 2, 'text' => 'Less', 'color' => $quantity_color],
                ['id' => $quantity + 3, 'text' => 'Lot', 'color' => $quantity_color],
                ['id' => $quantity + 4, 'text' => 'Little', 'color' => $quantity_color],
                ['id' => $quantity + 5, 'text' => 'None', 'color' => $quantity_color],
                ['id' => $quantity + 6, 'text' => 'All', 'color' => $quantity_color],
                ['id' => $quantity + 7, 'text' => 'Many', 'color' => $quantity_color],
                ['id' => $quantity + 8, 'text' => 'Few', 'color' => $quantity_color],
                ['id' => $quantity + 9, 'text' => 'Light', 'color' => $quantity_color],
                ['id' => $quantity + 10, 'text' => 'Heavy', 'color' => $quantity_color]//133
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
                $quantity + 10 => ['board_x' => 4, 'board_y' => 2],

                $empty => ['board_x' => 1, 'board_y' => 3],

                $empty => ['board_x' => 1, 'board_y' => 4]
            ]);

        //Articles
            $user->words()->createMany([
                ['id' => $article + 1, 'text' => 'A', 'color' => $article_color],//134
                ['id' => $article + 2, 'text' => 'An', 'color' => $article_color],
                ['id' => $article + 3, 'text' => 'The', 'color' => $article_color]
            ]);
            $user->folders()->createMany([
                ['id' => 3, 'name' => 'Article', 'color' => $article_color]
            ]);
            $user->folders()->find(3)->words()->attach([
                $article + 1 => ['board_x' => 1, 'board_y' => 1],
                $article + 2 => ['board_x' => 2, 'board_y' => 1],
                $article + 3 => ['board_x' => 3, 'board_y' => 1],
                $empty => ['board_x' => 4, 'board_y' => 1],
                $empty => ['board_x' => 5, 'board_y' => 1],
                $empty => ['board_x' => 6, 'board_y' => 1],

                $empty => ['board_x' => 1, 'board_y' => 2],

                $empty => ['board_x' => 1, 'board_y' => 3],

                $empty => ['board_x' => 1, 'board_y' => 4]
            ]);

        //Help
            $user->words()->createMany([
                ['id' => $help + 1, 'text' => 'Help', 'color' => '#e6e6ff'],//137
                ['id' => $help + 2, 'text' => 'Help me', 'color' => '#e6e6ff'],
                ['id' => $help + 3, 'text' => 'Call for help', 'color' => '#ff99c2'],
                ['id' => $help + 4, 'text' => 'Medical emergency', 'color' => '#ff8080'],
                ['id' => $help + 5, 'text' => 'Medical symptoms', 'color' => '#ffcccc'],
                ['id' => $help + 6, 'text' => 'Ask companion', 'color' => '#ccffcc'],
                ['id' => $help + 7, 'text' => 'I cannot speak', 'color' => '#ffdf80'],
                ['id' => $help + 8, 'text' => 'I am using a talker', 'color' => '#ffecb3'],
                ['id' => $help + 9, 'text' => 'I Need', 'color' => $default_color],
                ['id' => $help + 10, 'text' => 'Stop', 'color' => '#c42b2b']//146
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
                $help + 6 => ['board_x' => 3, 'board_y' => 3],

                $empty => ['board_x' => 1, 'board_y' => 4]
            ]);
        //Toys
            $user->words()->createMany([
                ['id' => $toys + 1, 'text' => 'Toy', 'color' => '#60d164'],//147
                ['id' => $toys + 2, 'text' => 'Ball', 'color' => '#596df0'],
                ['id' => $toys + 3, 'text' => 'Block', 'color' => '#f23a3a'],
                ['id' => $toys + 4, 'text' => 'Doll', 'color' => '#ffefad']//150
            ]);
            $user->folders()->createMany([
                ['id' => 26, 'name' => 'Toys', 'color' => '#60d164']
            ]);
            $user->folders()->find(26)->words()->attach([
                $toys + 1 => ['board_x' => 1, 'board_y' => 1],
                $toys + 2 => ['board_x' => 2, 'board_y' => 1],
                $toys + 3 => ['board_x' => 3, 'board_y' => 1],
                $toys + 4 => ['board_x' => 4, 'board_y' => 1],
                //attach book
                $empty => ['board_x' => 6, 'board_y' => 1],

                $empty => ['board_x' => 1, 'board_y' => 2],

                $empty => ['board_x' => 1, 'board_y' => 3],

                $empty => ['board_x' => 1, 'board_y' => 4] 
            ]);
            //attach vehicles folder

        //People
            $user->words()->createMany([
                ['id' => $people + 1, 'text' => 'People', 'color' => $default_color],//151
                ['id' => $people + 2, 'text' => 'Teacher', 'color' => $default_color],
                ['id' => $people + 3, 'text' => 'Classmate', 'color' => $default_color],
                ['id' => $people + 4, 'text' => 'Friend', 'color' => $default_color],
                ['id' => $people + 5, 'text' => 'Doctor', 'color' => $default_color],
                ['id' => $people + 6, 'text' => 'Nurse', 'color' => $default_color],
                ['id' => $people + 7, 'text' => 'Cashier', 'color' => $default_color],
                ['id' => $people + 8, 'text' => 'Wait Staff', 'color' => $default_color],
                ['id' => $people + 9, 'text' => 'Pilot', 'color' => $default_color],
                ['id' => $people + 10, 'text' => 'Staff', 'color' => $default_color]//160
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
                $adjectives + 20 => ['board_x' => 6, 'board_y' => 4]
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

                //space for light $ => ['board_x' => 1, 'board_y' => 3]
                //space for dark $ => ['board_x' => 2, 'board_y' => 3]
                $colors + 12 => ['board_x' => 3, 'board_y' => 3],

                $empty => ['board_x' => 1, 'board_y' => 4]
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
            $user->folders()->find(31)->words()->attach([
                $patterns + 1 => ['board_x' => 1, 'board_y' => 1],
                $patterns + 2 => ['board_x' => 2, 'board_y' => 1],
                $patterns + 3 => ['board_x' => 3, 'board_y' => 1],
                $patterns + 4 => ['board_x' => 4, 'board_y' => 1],
                $patterns + 5 => ['board_x' => 5, 'board_y' => 1],
                $patterns + 6 => ['board_x' => 6, 'board_y' => 1],

                $patterns + 7 => ['board_x' => 1, 'board_y' => 2],

                $empty => ['board_x' => 1, 'board_y' => 3],

                $empty => ['board_x' => 1, 'board_y' => 4]
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
            $user->folders()->find(32)->words()->attach([
                $vehicles + 1 => ['board_x' => 1, 'board_y' => 1],
                $vehicles + 2 => ['board_x' => 2, 'board_y' => 1],
                $vehicles + 3 => ['board_x' => 3, 'board_y' => 1],
                $vehicles + 4 => ['board_x' => 4, 'board_y' => 1],
                $vehicles + 5 => ['board_x' => 5, 'board_y' => 1],
                $vehicles + 6 => ['board_x' => 6, 'board_y' => 1],

                $vehicles + 7 => ['board_x' => 1, 'board_y' => 2],

                $empty => ['board_x' => 1, 'board_y' => 3],

                $empty => ['board_x' => 1, 'board_y' => 4]
            ]);
            //attaching vehicles to toys
            $user->folders()->find(26)->folders()->attach([
                32 => ['board_x' => 1, 'board_y' => 2]
            ]);          
        
        //clothes
            $user->words()->createMany([
                ['id' => $clothes + 1, 'text' => 'Clothes', 'color' => $default_color],
                ['id' => $clothes + 2, 'text' => 'Compression', 'color' => $default_color]
            ]);
            $user->folders()->createMany([
                ['id' => 44, 'name' => 'Material', 'color' => $default_color],
                ['id' => 45, 'name' => 'Shirts', 'color' => $default_color],
                ['id' => 46, 'name' => 'Pants', 'color' => $default_color],
                ['id' => 47, 'name' => 'Dress', 'color' => $default_color],
                ['id' => 48, 'name' => 'Jacket', 'color' => $default_color],
                ['id' => 49, 'name' => 'Skirt', 'color' => $default_color],
                ['id' => 50, 'name' => 'Socks', 'color' => $default_color],
                ['id' => 51, 'name' => 'Shoes', 'color' => $default_color],
                ['id' => 52, 'name' => 'Underwear', 'color' => $default_color],
                ['id' => 53, 'name' => 'Laundry', 'color' => $default_color],
                ['id' => 54, 'name' => 'Location', 'color' => $default_color],
                ['id' => 55, 'name' => 'Clothes', 'color' => $default_color]
            ]);
            $user->folders()->find(55)->words()->attach([
                $clothes + 1 => ['board_x' => 1, 'board_y' => 1],
                $clothes + 2 => ['board_x' => 2, 'board_y' => 1],

                //room for folders

                $empty => ['board_x' => 1, 'board_y' => 4]

            ]);
            $user->folders()->find(55)->Folders()->attach([
                44 => ['board_x' => 2, 'board_y' => 1],

                45 => ['board_x' => 1, 'board_y' => 2],
                46 => ['board_x' => 2, 'board_y' => 2],
                47 => ['board_x' => 3, 'board_y' => 2],
                48 => ['board_x' => 4, 'board_y' => 2],
                49 => ['board_x' => 5, 'board_y' => 2],
                50 => ['board_x' => 6, 'board_y' => 2],

                51 => ['board_x' => 1, 'board_y' => 3],
                52 => ['board_x' => 1, 'board_y' => 3],
                53 => ['board_x' => 1, 'board_y' => 3],
                54 => ['board_x' => 1, 'board_y' => 3],
                55 => ['board_x' => 1, 'board_y' => 3]
            ]);
            
            //material
                $user->words()->createMany([
                    ['id' => $clothes + 3, 'text' => 'Jean', 'color' => $default_color],
                    ['id' => $clothes + 4, 'text' => 'Corderoy', 'color' => $default_color],
                    ['id' => $clothes + 5, 'text' => 'Cotton', 'color' => $default_color],
                    ['id' => $clothes + 6, 'text' => 'Flannel', 'color' => $default_color],
                    ['id' => $clothes + 7, 'text' => 'Silk', 'color' => $default_color],
                    ['id' => $clothes + 8, 'text' => 'Satin', 'color' => $default_color]
                ]);
                $user->folders()->find(44)->words()->attach([
                    $clothes + 3 => ['board_x' => 1, 'board_y' => 1],
                    $clothes + 4 => ['board_x' => 2, 'board_y' => 1],
                    $clothes + 5 => ['board_x' => 3, 'board_y' => 1],
                    $clothes + 6 => ['board_x' => 4, 'board_y' => 1],
                    $clothes + 7 => ['board_x' => 5, 'board_y' => 1],
                    $clothes + 8 => ['board_x' => 6, 'board_y' => 1],

                    //space here for words added from other sections

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]
                ]);
            
            //Shirts
                $user->words()->createMany([
                    ['id' => $clothes + 9, 'text' => 'Shirt', 'color' => $default_color],
                    ['id' => $clothes + 10, 'text' => 'T-shirt', 'color' => $default_color],
                    ['id' => $clothes + 11, 'text' => 'Long Sleeve Shirt', 'color' => $default_color],
                    ['id' => $clothes + 12, 'text' => 'Short Sleeve Shirt', 'color' => $default_color],
                    ['id' => $clothes + 13, 'text' => 'Dress Shirt', 'color' => $default_color],
                    ['id' => $clothes + 14, 'text' => 'Button Up Shirt', 'color' => $default_color],
                    ['id' => $clothes + 15, 'text' => 'Blouse', 'color' => $default_color],
                    ['id' => $clothes + 16, 'text' => 'Crop Top', 'color' => $default_color]
                ]);
                $user->folders()->find(45)->words()->attach([
                    $clothes + 9 => ['board_x' => 1, 'board_y' => 1],
                    $clothes + 10 => ['board_x' => 2, 'board_y' => 1],
                    $clothes + 11 => ['board_x' => 3, 'board_y' => 1],
                    $clothes + 12 => ['board_x' => 4, 'board_y' => 1],
                    $clothes + 13 => ['board_x' => 5, 'board_y' => 1],
                    $clothes + 14 => ['board_x' => 6, 'board_y' => 1],

                    $clothes + 15 => ['board_x' => 1, 'board_y' => 2],
                    $clothes + 16 => ['board_x' => 2, 'board_y' => 2],

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]              
                ]);
            
            //Pants
                $user->words()->createMany([
                    ['id' => $clothes + 17, 'text' => 'Pants', 'color' => $default_color],
                    ['id' => $clothes + 18, 'text' => 'Dress Pants', 'color' => $default_color],
                    ['id' => $clothes + 19, 'text' => 'Jeans', 'color' => $default_color],
                    ['id' => $clothes + 20, 'text' => 'Khakis', 'color' => $default_color],
                    ['id' => $clothes + 21, 'text' => 'Cargo Pants', 'color' => $default_color],
                    ['id' => $clothes + 22, 'text' => 'Joggers', 'color' => $default_color],
                    ['id' => $clothes + 23, 'text' => 'Leggings', 'color' => $default_color]

                ]);
                $user->folders()->find(46)->words()->attach([
                    $clothes + 17 => ['board_x' => 1, 'board_y' => 1],
                    $clothes + 18 => ['board_x' => 2, 'board_y' => 1],
                    $clothes + 19 => ['board_x' => 3, 'board_y' => 1],
                    $clothes + 20 => ['board_x' => 4, 'board_y' => 1],
                    $clothes + 21 => ['board_x' => 5, 'board_y' => 1],
                    $clothes + 22 => ['board_x' => 6, 'board_y' => 1],

                    $clothes + 23 => ['board_x' => 6, 'board_y' => 2],

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]              
                ]);
            
            //Dresses
                $user->words()->createMany([
                    ['id' => $clothes + 24, 'text' => 'Dress', 'color' => $default_color],
                    ['id' => $clothes + 25, 'text' => 'Maxi Dress', 'color' => $default_color],
                    ['id' => $clothes + 26, 'text' => 'Coctail Dress', 'color' => $default_color],
                    ['id' => $clothes + 27, 'text' => 'Evening Dress', 'color' => $default_color],
                    ['id' => $clothes + 28, 'text' => 'Short Dress', 'color' => $default_color],
                    ['id' => $clothes + 29, 'text' => 'Fluffy Dress', 'color' => $default_color],
                    ['id' => $clothes + 30, 'text' => 'Sun Dress', 'color' => $default_color]
                ]);
                $user->folders()->find(47)->words()->attach([
                    $clothes + 24 => ['board_x' => 1, 'board_y' => 1],
                    $clothes + 25 => ['board_x' => 2, 'board_y' => 1],
                    $clothes + 26 => ['board_x' => 3, 'board_y' => 1],
                    $clothes + 27 => ['board_x' => 4, 'board_y' => 1],
                    $clothes + 28 => ['board_x' => 5, 'board_y' => 1],
                    $clothes + 29 => ['board_x' => 6, 'board_y' => 1],

                    $clothes + 30 => ['board_x' => 1, 'board_y' => 2],

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]              
                ]);
           
             //Jackets
                $user->words()->createMany([
                    ['id' => $clothes + 31, 'text' => 'Jacket', 'color' => $default_color],
                    ['id' => $clothes + 32, 'text' => 'Windbreaker', 'color' => $default_color],
                    ['id' => $clothes + 33, 'text' => 'Winter Coat', 'color' => $default_color],
                    ['id' => $clothes + 34, 'text' => 'Coat', 'color' => $default_color],
                    ['id' => $clothes + 35, 'text' => 'Sweater', 'color' => $default_color],
                    ['id' => $clothes + 36, 'text' => 'Sweatshirt', 'color' => $default_color]
                ]);
                $user->folders()->find(48)->words()->attach([
                    $clothes + 31 => ['board_x' => 1, 'board_y' => 1],
                    $clothes + 32 => ['board_x' => 2, 'board_y' => 1],
                    $clothes + 33 => ['board_x' => 3, 'board_y' => 1],
                    $clothes + 34 => ['board_x' => 4, 'board_y' => 1],
                    $clothes + 35 => ['board_x' => 5, 'board_y' => 1],
                    $clothes + 36 => ['board_x' => 6, 'board_y' => 1],

                    $empty => ['board_x' => 1, 'board_y' => 2],

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]              
                ]);
            
            //Skirts
                $user->words()->createMany([
                    ['id' => $clothes + 37, 'text' => 'Skirt', 'color' => $default_color],
                    ['id' => $clothes + 38, 'text' => 'Short Skirt', 'color' => $default_color],
                    ['id' => $clothes + 39, 'text' => 'Knee Length Skirt', 'color' => $default_color],
                    ['id' => $clothes + 40, 'text' => 'Long Skirt', 'color' => $default_color],
                    ['id' => $clothes + 41, 'text' => 'Skater Skirt', 'color' => $default_color]
                ]);
                $user->folders()->find(49)->words()->attach([
                    $clothes + 37 => ['board_x' => 1, 'board_y' => 1],
                    $clothes + 38 => ['board_x' => 2, 'board_y' => 1],
                    $clothes + 39 => ['board_x' => 3, 'board_y' => 1],
                    $clothes + 40 => ['board_x' => 4, 'board_y' => 1],
                    $clothes + 41 => ['board_x' => 5, 'board_y' => 1],
                    $empty => ['board_x' => 6, 'board_y' => 1],

                    $empty => ['board_x' => 1, 'board_y' => 2],

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]              
                ]);
           
            //Socks
                $user->words()->createMany([
                    ['id' => $clothes + 42, 'text' => 'Socks', 'color' => $default_color],
                    ['id' => $clothes + 43, 'text' => 'No Show Socks', 'color' => $default_color],
                    ['id' => $clothes + 44, 'text' => 'Ankle Socks', 'color' => $default_color],
                    ['id' => $clothes + 45, 'text' => 'Knee Socks', 'color' => $default_color],
                    ['id' => $clothes + 46, 'text' => 'Tights', 'color' => $default_color],
                    ['id' => $clothes + 47, 'text' => 'Stockings', 'color' => $default_color]
                ]);
                $user->folders()->find(50)->words()->attach([
                    $clothes + 42 => ['board_x' => 1, 'board_y' => 1],
                    $clothes + 43 => ['board_x' => 2, 'board_y' => 1],
                    $clothes + 44 => ['board_x' => 3, 'board_y' => 1],
                    $clothes + 45 => ['board_x' => 4, 'board_y' => 1],
                    $clothes + 46 => ['board_x' => 5, 'board_y' => 1],
                    $clothes + 47 => ['board_x' => 6, 'board_y' => 1],

                    $empty => ['board_x' => 1, 'board_y' => 2],

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]              
                ]);
            
            //Shoes
                $user->words()->createMany([
                    ['id' => $clothes + 48, 'text' => 'Shoes', 'color' => $default_color],
                    ['id' => $clothes + 49, 'text' => 'Tennis Shoes', 'color' => $default_color],
                    ['id' => $clothes + 50, 'text' => 'Sneakers', 'color' => $default_color],
                    ['id' => $clothes + 51, 'text' => 'Heels', 'color' => $default_color],
                    ['id' => $clothes + 52, 'text' => 'Dress Shoes', 'color' => $default_color],
                    ['id' => $clothes + 53, 'text' => 'Sandals', 'color' => $default_color],
                    ['id' => $clothes + 54, 'text' => 'Flats', 'color' => $default_color],
                    ['id' => $clothes + 55, 'text' => 'Boots', 'color' => $default_color],
                    ['id' => $clothes + 56, 'text' => 'Snow Boots', 'color' => $default_color],
                    ['id' => $clothes + 57, 'text' => 'Wedges', 'color' => $default_color],
                    ['id' => $clothes + 58, 'text' => 'Laces', 'color' => $default_color],
                    ['id' => $clothes + 59, 'text' => 'Velcro', 'color' => $default_color]
                ]);
                $user->folders()->find(34)->words()->attach([
                    $clothes + 48 => ['board_x' => 1, 'board_y' => 1],
                    $clothes + 49 => ['board_x' => 2, 'board_y' => 1],
                    $clothes + 50 => ['board_x' => 3, 'board_y' => 1],
                    $clothes + 51 => ['board_x' => 4, 'board_y' => 1],
                    $clothes + 52 => ['board_x' => 5, 'board_y' => 1],
                    $clothes + 53 => ['board_x' => 6, 'board_y' => 1],

                    $clothes + 54 => ['board_x' => 1, 'board_y' => 2],
                    $clothes + 55 => ['board_x' => 2, 'board_y' => 2],
                    $clothes + 56 => ['board_x' => 3, 'board_y' => 2],
                    $clothes + 57 => ['board_x' => 4, 'board_y' => 2],
                    $clothes + 58 => ['board_x' => 5, 'board_y' => 2],
                    $clothes + 59 => ['board_x' => 6, 'board_y' => 2],

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]              
                ]);
            
            //Underwear
                $user->words()->createMany([
                    ['id' => $clothes + 60, 'text' => 'Underwear', 'color' => $default_color],
                    ['id' => $clothes + 61, 'text' => 'Bra', 'color' => $default_color],
                    ['id' => $clothes + 62, 'text' => 'Sports Bra', 'color' => $default_color],
                    ['id' => $clothes + 63, 'text' => 'Boxers', 'color' => $default_color],
                    ['id' => $clothes + 64, 'text' => 'Breifs', 'color' => $default_color],
                    ['id' => $clothes + 65, 'text' => 'Panties', 'color' => $default_color]
                ]);
                $user->folders()->find(52)->words()->attach([
                    $clothes + 60 => ['board_x' => 1, 'board_y' => 1],
                    $clothes + 61 => ['board_x' => 2, 'board_y' => 1],
                    $clothes + 62 => ['board_x' => 3, 'board_y' => 1],
                    $clothes + 63 => ['board_x' => 4, 'board_y' => 1],
                    $clothes + 64 => ['board_x' => 5, 'board_y' => 1],
                    $clothes + 65 => ['board_x' => 6, 'board_y' => 1],

                    $empty => ['board_x' => 1, 'board_y' => 2],

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]              
                ]);
            
            //Laundry
                $user->words()->createMany([
                    ['id' => $clothes + 55, 'text' => 'Hamper', 'color' => $default_color],
                    ['id' => $clothes + 56, 'text' => 'Hanger', 'color' => $default_color],
                    ['id' => $clothes + 57, 'text' => 'Detergant', 'color' => $default_color],
                    ['id' => $clothes + 58, 'text' => 'Clothesline', 'color' => $default_color],
                ]);
                $user->folders()->find(53)->words()->attach([
                    $clothes + 55 => ['board_x' => 1, 'board_y' => 1],
                    $clothes + 56 => ['board_x' => 2, 'board_y' => 1],
                    $clothes + 57 => ['board_x' => 3, 'board_y' => 1],
                    $clothes + 58 => ['board_x' => 4, 'board_y' => 1],
                    //washer and dryer
                    
                    $adjectives + 3 => ['board_x' => 1, 'board_y' => 2],
                    $adjectives + 4 => ['board_x' => 2, 'board_y' => 2,

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]              
                ]);

        //numbers
            $user->words()->createMany([
                ['id' => $numbers + 1, 'text' => '1', 'color' => $default_color],
                ['id' => $numbers + 2, 'text' => '2', 'color' => $default_color],
                ['id' => $numbers + 3, 'text' => '3', 'color' => $default_color],
                ['id' => $numbers + 4, 'text' => '4', 'color' => $default_color],
                ['id' => $numbers + 5, 'text' => '5', 'color' => $default_color],
                ['id' => $numbers + 6, 'text' => '6', 'color' => $default_color],
                ['id' => $numbers + 7, 'text' => '7', 'color' => $default_color],
                ['id' => $numbers + 8, 'text' => '8', 'color' => $default_color],
                ['id' => $numbers + 9, 'text' => '9', 'color' => $default_color],
                ['id' => $numbers + 10, 'text' => '10', 'color' => $default_color],
                ['id' => $numbers + 11, 'text' => '11', 'color' => $default_color],
                ['id' => $numbers + 12, 'text' => '12', 'color' => $default_color],
                ['id' => $numbers + 13, 'text' => '13', 'color' => $default_color],
                ['id' => $numbers + 14, 'text' => '14', 'color' => $default_color],
                ['id' => $numbers + 15, 'text' => '15', 'color' => $default_color],
                ['id' => $numbers + 16, 'text' => '16', 'color' => $default_color],
                ['id' => $numbers + 17, 'text' => '17', 'color' => $default_color],
                ['id' => $numbers + 18, 'text' => '18', 'color' => $default_color],
                ['id' => $numbers + 19, 'text' => '19', 'color' => $default_color],
                ['id' => $numbers + 20, 'text' => '20', 'color' => $default_color],
                ['id' => $numbers + 21, 'text' => '30', 'color' => $default_color],
                ['id' => $numbers + 22, 'text' => '40', 'color' => $default_color],
                ['id' => $numbers + 23, 'text' => '50', 'color' => $default_color],
                ['id' => $numbers + 24, 'text' => '60', 'color' => $default_color],
                ['id' => $numbers + 25, 'text' => '70', 'color' => $default_color],
                ['id' => $numbers + 26, 'text' => '80', 'color' => $default_color],
                ['id' => $numbers + 27, 'text' => '90', 'color' => $default_color],
                ['id' => $numbers + 28, 'text' => '0', 'color' => $default_color],
                ['id' => $numbers + 29, 'text' => 'Hundred', 'color' => $default_color],
                ['id' => $numbers + 30, 'text' => 'Thousand', 'color' => $default_color],
                ['id' => $numbers + 31, 'text' => 'Million', 'color' => $default_color],
                ['id' => $numbers + 32, 'text' => 'Billion', 'color' => $default_color]
            ]);
            $user->folders()->createMany([
                ['id' => 58, 'name' => 'Numbers', 'color' => $default_color],
                ['id' => 59, 'name' => 'Page 2', 'color' => $default_color]
            ]);
            $user->folders()->find(58)->words()->attach([
                $numbers + 1 => ['board_x' => 1, 'board_y' => 1],
                $numbers + 2 => ['board_x' => 2, 'board_y' => 1],
                $numbers + 3 => ['board_x' => 3, 'board_y' => 1],
                $numbers + 4 => ['board_x' => 4, 'board_y' => 1],
                $numbers + 5 => ['board_x' => 5, 'board_y' => 1],
                $numbers + 6 => ['board_x' => 6, 'board_y' => 1],

                $numbers + 7 => ['board_x' => 1, 'board_y' => 2],
                $numbers + 8 => ['board_x' => 2, 'board_y' => 2],
                $numbers + 9 => ['board_x' => 3, 'board_y' => 2],
                $numbers + 10 => ['board_x' => 4, 'board_y' => 2],
                $numbers + 11 => ['board_x' => 5, 'board_y' => 2],
                $numbers + 12 => ['board_x' => 6, 'board_y' => 2],

                $numbers + 13 => ['board_x' => 1, 'board_y' => 3],
                $numbers + 14 => ['board_x' => 2, 'board_y' => 3],
                $numbers + 15 => ['board_x' => 3, 'board_y' => 3],
                $numbers + 16 => ['board_x' => 4, 'board_y' => 3],
                $numbers + 17 => ['board_x' => 5, 'board_y' => 3],
                $numbers + 18 => ['board_x' => 6, 'board_y' => 3],

                $numbers + 19 => ['board_x' => 1, 'board_y' => 4],
                $numbers + 20 => ['board_x' => 2, 'board_y' => 4],
                $numbers + 21 => ['board_x' => 3, 'board_y' => 4],
                $numbers + 22 => ['board_x' => 4, 'board_y' => 4],
                $numbers + 23 => ['board_x' => 5, 'board_y' => 4]
                //spot for folder to next page
            ]);
            $user->folders()->find(59)->words()->attach([
                $numbers + 24 => ['board_x' => 1, 'board_y' => 1],
                $numbers + 25 => ['board_x' => 2, 'board_y' => 1],
                $numbers + 26 => ['board_x' => 3, 'board_y' => 1],
                $numbers + 27 => ['board_x' => 4, 'board_y' => 1],
                $numbers + 28 => ['board_x' => 5, 'board_y' => 1],
                $empty => ['board_x' => 6, 'board_y' => 1],

                $numbers + 29 => ['board_x' => 1, 'board_y' => 2],
                $numbers + 30 => ['board_x' => 2, 'board_y' => 2],
                $numbers + 31 => ['board_x' => 3, 'board_y' => 2],
                $numbers + 32 => ['board_x' => 4, 'board_y' => 2],

                $empty => ['board_x' => 1, 'board_y' => 3],
            

                $empty => ['board_x' => 1, 'board_y' => 4]
            ]);
        
        //weather
            $user->words()->createMany([
                ['id' => $weather + 1, 'text' => 'Cloudy', 'color' => $default_color],
                ['id' => $weather + 2, 'text' => 'Sunny', 'color' => $default_color],
                ['id' => $weather + 3, 'text' => 'Overcast', 'color' => $default_color],
                ['id' => $weather + 4, 'text' => 'Rain', 'color' => $default_color],
                ['id' => $weather + 5, 'text' => 'Fog', 'color' => $default_color],
                ['id' => $weather + 6, 'text' => 'Smog', 'color' => $default_color],
                ['id' => $weather + 7, 'text' => 'Wind', 'color' => $default_color],
                ['id' => $weather + 8, 'text' => 'Breeze', 'color' => $default_color],
                ['id' => $weather + 9, 'text' => 'Flood', 'color' => $default_color],
                ['id' => $weather + 10, 'text' => 'Frost', 'color' => $default_color],
                ['id' => $weather + 11, 'text' => 'Blizzard', 'color' => $default_color],
                ['id' => $weather + 12, 'text' => 'Snow', 'color' => $default_color],
                ['id' => $weather + 13, 'text' => 'Sleet', 'color' => $default_color],
                ['id' => $weather + 14, 'text' => 'Hail', 'color' => $default_color],
                ['id' => $weather + 15, 'text' => 'Thunder', 'color' => $default_color],
                ['id' => $weather + 16, 'text' => 'Lightening', 'color' => $default_color],
                ['id' => $weather + 17, 'text' => 'Tornado', 'color' => $default_color],
                ['id' => $weather + 18, 'text' => 'Hurricane', 'color' => $default_color],
                ['id' => $weather + 19, 'text' => 'Storm', 'color' => $default_color]
            ]);
            $user->folders()->createMany([
                ['id' => 56, 'name' => 'Weather', 'color' => $default_color]
            ]);
            $user->folders()->find(56)->words()->attach([
                $weather + 1 => ['board_x' => 1, 'board_y' => 1],
                $weather + 2 => ['board_x' => 2, 'board_y' => 1],
                $weather + 3 => ['board_x' => 3, 'board_y' => 1],
                $weather + 4 => ['board_x' => 4, 'board_y' => 1],
                $weather + 5 => ['board_x' => 5, 'board_y' => 1],
                $weather + 6 => ['board_x' => 6, 'board_y' => 1],

                $weather + 7 => ['board_x' => 1, 'board_y' => 2],
                $weather + 8 => ['board_x' => 2, 'board_y' => 2],
                $weather + 9 => ['board_x' => 3, 'board_y' => 2],
                $weather + 10 => ['board_x' => 4, 'board_y' => 2],
                $weather + 11 => ['board_x' => 5, 'board_y' => 2],
                $weather + 12 => ['board_x' => 6, 'board_y' => 2],

                //spot for light and heavy, wet and dry
                $weather + 13 => ['board_x' => 5, 'board_y' => 3],
                $weather + 14 => ['board_x' => 6, 'board_y' => 3],

                $weather + 15 => ['board_x' => 1, 'board_y' => 4],
                $weather + 16 => ['board_x' => 2, 'board_y' => 4],
                $weather + 17 => ['board_x' => 3, 'board_y' => 4],
                $weather + 18 => ['board_x' => 4, 'board_y' => 4],
                $weather + 19 => ['board_x' => 5, 'board_y' => 4]
                //room for temourature folder
            ]);

        //tempurature
            $user->words()->createMany([
                ['id' => $tempurature + 1, 'text' => 'Temputrature', 'color' => $default_color],
                ['id' => $tempurature + 2, 'text' => 'Farenheight', 'color' => $default_color],
                ['id' => $tempurature + 3, 'text' => 'Celcius', 'color' => $default_color],
                ['id' => $tempurature + 4, 'text' => 'Degrees', 'color' => $default_color]
            ]);
            $user->folders()->createMany([
                ['id' => 57, 'name' => 'Tempurature', 'color' => $default_color]
            ]);
            $user->folders()->find(56)->words()->attach([
                $tempurature + 1 => ['board_x' => 1, 'board_y' => 1],
                $tempurature + 2 => ['board_x' => 2, 'board_y' => 1],
                $tempurature + 3 => ['board_x' => 3, 'board_y' => 1],
                $tempurature + 4 => ['board_x' => 4, 'board_y' => 1],
                //spot for hot and cold

                $empty => ['board_x' => 1, 'board_y' => 2],

                $empty => ['board_x' => 1, 'board_y' => 3],

                $empty => ['board_x' => 1, 'board_y' => 4]
            ]);
            
            

        //letters
            $user->words()->createMany([
                ['id' => $letters + 1, 'text' => 'A', 'color' => $default_color],
                ['id' => $letters + 2, 'text' => 'B', 'color' => $default_color],
                ['id' => $letters + 3, 'text' => 'C', 'color' => $default_color],
                ['id' => $letters + 4, 'text' => 'D', 'color' => $default_color],
                ['id' => $letters + 5, 'text' => 'E', 'color' => $default_color],
                ['id' => $letters + 6, 'text' => 'F', 'color' => $default_color],
                ['id' => $letters + 7, 'text' => 'G', 'color' => $default_color],
                ['id' => $letters + 8, 'text' => 'H', 'color' => $default_color],
                ['id' => $letters + 9, 'text' => 'I', 'color' => $default_color],
                ['id' => $letters + 10, 'text' => 'J', 'color' => $default_color],
                ['id' => $letters + 11, 'text' => 'K', 'color' => $default_color],
                ['id' => $letters + 12, 'text' => 'L', 'color' => $default_color],
                ['id' => $letters + 13, 'text' => 'M', 'color' => $default_color],
                ['id' => $letters + 14, 'text' => 'N', 'color' => $default_color],
                ['id' => $letters + 15, 'text' => 'O', 'color' => $default_color],
                ['id' => $letters + 16, 'text' => 'P', 'color' => $default_color],
                ['id' => $letters + 17, 'text' => 'Q', 'color' => $default_color],
                ['id' => $letters + 18, 'text' => 'R', 'color' => $default_color],
                ['id' => $letters + 19, 'text' => 'S', 'color' => $default_color],
                ['id' => $letters + 20, 'text' => 'T', 'color' => $default_color],
                ['id' => $letters + 21, 'text' => 'U', 'color' => $default_color],
                ['id' => $letters + 22, 'text' => 'V', 'color' => $default_color],
                ['id' => $letters + 23, 'text' => 'W', 'color' => $default_color],
                ['id' => $letters + 24, 'text' => 'X', 'color' => $default_color],
                ['id' => $letters + 25, 'text' => 'Y', 'color' => $default_color],
                ['id' => $letters + 26, 'text' => 'Z', 'color' => $default_color],
                ['id' => $letters + 27, 'text' => 'Uppercase', 'color' => $default_color],
                ['id' => $letters + 28, 'text' => 'Lowercase', 'color' => $default_color]
            ]);
            $user->folders()->createMany([
                ['id' => 60, 'name' => 'Letters', 'color' => $default_color],
                ['id' => 61, 'name' => 'Page 2', 'color' => $default_color]
            ]);
            $user->folders()->find(60)->words()->attach([
                $letters + 1 => ['board_x' => 1, 'board_y' => 1],
                $letters + 2 => ['board_x' => 2, 'board_y' => 1],
                $letters + 3 => ['board_x' => 3, 'board_y' => 1],
                $letters + 4 => ['board_x' => 4, 'board_y' => 1],
                $letters + 5 => ['board_x' => 5, 'board_y' => 1],
                $letters + 6 => ['board_x' => 6, 'board_y' => 1],

                $letters + 7 => ['board_x' => 1, 'board_y' => 2],
                $letters + 8 => ['board_x' => 2, 'board_y' => 2],
                $letters + 9 => ['board_x' => 3, 'board_y' => 2],
                $letters + 10 => ['board_x' => 4, 'board_y' => 2],
                $letters + 11 => ['board_x' => 5, 'board_y' => 2],
                $letters + 12 => ['board_x' => 6, 'board_y' => 2],

                $letters + 13 => ['board_x' => 1, 'board_y' => 3],
                $letters + 14 => ['board_x' => 2, 'board_y' => 3],
                $letters + 15 => ['board_x' => 3, 'board_y' => 3],
                $letters + 16 => ['board_x' => 4, 'board_y' => 3],
                $letters + 17 => ['board_x' => 5, 'board_y' => 3],
                $letters + 18 => ['board_x' => 6, 'board_y' => 3],

                $letters + 19 => ['board_x' => 1, 'board_y' => 4],
                $letters + 20 => ['board_x' => 2, 'board_y' => 4],
                $letters + 21 => ['board_x' => 3, 'board_y' => 4],
                $letters + 22 => ['board_x' => 4, 'board_y' => 4],
                $letters + 23 => ['board_x' => 5, 'board_y' => 4]
                //spot for folder to next page
            ]);
            $user->folders()->find(61)->words()->attach([
                $letters + 24 => ['board_x' => 1, 'board_y' => 1],
                $letters + 25 => ['board_x' => 2, 'board_y' => 1],
                $letters + 26 => ['board_x' => 3, 'board_y' => 1],
                $letters + 27 => ['board_x' => 4, 'board_y' => 1],
                $letters + 28 => ['board_x' => 5, 'board_y' => 1],
                $empty => ['board_x' => 6, 'board_y' => 1],

                $empty => ['board_x' => 1, 'board_y' => 2],

                $empty => ['board_x' => 1, 'board_y' => 3],
            

                $empty => ['board_x' => 1, 'board_y' => 4]
            ]);
        
        //personal care
            $user->words()->createMany([
                ['id' => $person_care + 1, 'text' => 'Brush Teeth', 'color' => $default_color],
                ['id' => $person_care + 2, 'text' => 'Brush Teeth', 'color' => $default_color],
                ['id' => $person_care + 3, 'text' => 'Take Shower', 'color' => $default_color],
                ['id' => $person_care + 4, 'text' => 'Take Bath', 'color' => $default_color],
                ['id' => $person_care + 5, 'text' => 'Change Clothes', 'color' => $default_color],
                ['id' => $person_care + 6, 'text' => 'Go to the Bathroom', 'color' => $default_color]
            ]);
            $user->folders()->createMany([
                ['id' => 62, 'name' => 'Personal Care', 'color' => $default_color]
            ]);
            $user->folders()->find(62)->words()->attach([
                $person_care + 1 => ['board_x' => 1, 'board_y' => 1],
                $person_care + 2 => ['board_x' => 2, 'board_y' => 1],
                $person_care + 3 => ['board_x' => 3, 'board_y' => 1],
                $person_care + 4 => ['board_x' => 4, 'board_y' => 1],
                $person_care + 5 => ['board_x' => 5, 'board_y' => 1],
                $person_care + 6 => ['board_x' => 6, 'board_y' => 1],

                $empty => ['board_x' => 1, 'board_y' => 2],

                $empty => ['board_x' => 1, 'board_y' => 3],

                $empty => ['board_x' => 1, 'board_y' => 4]                   
            ]);  
        
        //entertainment
            $user->words()->createMany([
                ['id' => $entertainment + 1, 'text' => 'TV', 'color' => $default_color],
                ['id' => $entertainment + 2, 'text' => 'Movie', 'color' => $default_color],
                ['id' => $entertainment + 3, 'text' => 'Game', 'color' => $default_color],
                ['id' => $entertainment + 4, 'text' => 'Reading', 'color' => $default_color],
                ['id' => $entertainment + 5, 'text' => 'Hobby', 'color' => $default_color],
                ['id' => $entertainment + 6, 'text' => 'Play', 'color' => $default_color],
                ['id' => $entertainment + 7, 'text' => 'Music', 'color' => $default_color]
            ]);
            $user->folders()->createMany([
                ['id' => 63, 'name' => 'Entertainment', 'color' => $default_color]
            ]);
            $user->folders()->find(63)->words()->attach([
                $entertainment + 1 => ['board_x' => 1, 'board_y' => 1],
                $entertainment + 2 => ['board_x' => 2, 'board_y' => 1],
                $entertainment + 3 => ['board_x' => 3, 'board_y' => 1],
                $entertainment + 4 => ['board_x' => 4, 'board_y' => 1],
                $entertainment + 5 => ['board_x' => 5, 'board_y' => 1],
                $entertainment + 6 => ['board_x' => 6, 'board_y' => 1],

                $entertainment + 7 => ['board_x' => 1, 'board_y' => 2],

                $empty => ['board_x' => 1, 'board_y' => 3],

                $empty => ['board_x' => 1, 'board_y' => 4]                   
            ]);  

        //talker
            $user->words()->createMany([
                ['id' => $talker + 1, 'text' => 'Word', 'color' => $default_color],
                ['id' => $talker + 2, 'text' => 'Words', 'color' => $default_color],
                ['id' => $talker + 3, 'text' => 'Speak', 'color' => $default_color],
                ['id' => $talker + 4, 'text' => 'Say', 'color' => $default_color],
                ['id' => $talker + 5, 'text' => 'Say', 'color' => $default_color]
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

                $talker + 5 => ['board_x' => 1, 'board_y' => 2],

                $empty => ['board_x' => 1, 'board_y' => 3],

                $empty => ['board_x' => 1, 'board_y' => 4]                   
            ]);

        //Medical
            $user->words()->createMany([
                ['id' => $medical + 1, 'text' => 'Sick', 'color' => $default_color],
                ['id' => $medical + 2, 'text' => 'Pain', 'color' => $default_color],
                ['id' => $medical + 3, 'text' => 'Dizzy', 'color' => $default_color],
                ['id' => $medical + 4, 'text' => 'Nausous', 'color' => $default_color],
                ['id' => $medical + 5, 'text' => 'Ouch', 'color' => $default_color],
                ['id' => $medical + 6, 'text' => 'Allergic', 'color' => $default_color]
            ]);
            $user->folders()->createMany([
                ['id' => 64, 'name' => 'Medical', 'color' => $default_color]
            ]);
            $user->folders()->find(64)->words()->attach([
                $medical + 1 => ['board_x' => 1, 'board_y' => 1],
                $medical + 2 => ['board_x' => 2, 'board_y' => 1],
                $medical + 3 => ['board_x' => 3, 'board_y' => 1],
                $medical + 4 => ['board_x' => 4, 'board_y' => 1],
                $medical + 5 => ['board_x' => 5, 'board_y' => 1],
                $medical + 6 => ['board_x' => 6, 'board_y' => 1],

                //space for doctor, doctor's office and body parts

                $empty => ['board_x' => 1, 'board_y' => 3],

                $empty => ['board_x' => 1, 'board_y' => 4]                   
            ]);

        //Plants
            $user->words()->createMany([
                ['id' => $plants + 1, 'text' => 'Plant', 'color' => $default_color],
                ['id' => $plants + 2, 'text' => 'Flower', 'color' => $default_color],
                ['id' => $plants + 3, 'text' => 'Tree', 'color' => $default_color],
                ['id' => $plants + 4, 'text' => 'Bush', 'color' => $default_color],
                ['id' => $plants + 5, 'text' => 'Grass', 'color' => $default_color],
                ['id' => $plants + 6, 'text' => 'Leaf', 'color' => $default_color]
            ]);
            $user->folders()->createMany([
                ['id' => 65, 'name' => 'Plants', 'color' => $default_color]
            ]);
            $user->folders()->find(65)->words()->attach([
                $plants + 1 => ['board_x' => 1, 'board_y' => 1],
                $plants + 2 => ['board_x' => 2, 'board_y' => 1],
                $plants + 3 => ['board_x' => 3, 'board_y' => 1],
                $plants + 4 => ['board_x' => 4, 'board_y' => 1],
                $plants + 5 => ['board_x' => 5, 'board_y' => 1],
                $plants + 6 => ['board_x' => 6, 'board_y' => 1],

                $empty => ['board_x' => 1, 'board_y' => 2],

                $empty => ['board_x' => 1, 'board_y' => 3],

                $empty => ['board_x' => 1, 'board_y' => 4]                   
            ]);
        
        //Animals
            $user->words()->createMany([
                ['id' => $animals + 1, 'text' => 'Animal', 'color' => $default_color],
                ['id' => $animals + 2, 'text' => 'Pet', 'color' => $default_color],
                ['id' => $animals + 3, 'text' => 'Dog', 'color' => $default_color],
                ['id' => $animals + 4, 'text' => 'Cat', 'color' => $default_color],
                ['id' => $animals + 5, 'text' => 'Mammal', 'color' => $default_color],
                ['id' => $animals + 6, 'text' => 'Bird', 'color' => $default_color],
                ['id' => $animals + 7, 'text' => 'Reptile', 'color' => $default_color],
                ['id' => $animals + 8, 'text' => 'Amphibian', 'color' => $default_color],
                ['id' => $animals + 9, 'text' => 'Bug', 'color' => $default_color],
                ['id' => $animals + 10, 'text' => 'Rabbit', 'color' => $default_color],
                ['id' => $animals + 11, 'text' => 'Wolf', 'color' => $default_color],
                ['id' => $animals + 12, 'text' => 'Mouse', 'color' => $default_color],
                ['id' => $animals + 13, 'text' => 'Lizard', 'color' => $default_color],
                ['id' => $animals + 14, 'text' => 'Snake', 'color' => $default_color],
                ['id' => $animals + 15, 'text' => 'Frog', 'color' => $default_color],
                ['id' => $animals + 16, 'text' => 'Salamander', 'color' => $default_color],
                ['id' => $animals + 17, 'text' => 'Spider', 'color' => $default_color],
                ['id' => $animals + 18, 'text' => 'Fly', 'color' => $default_color],
                ['id' => $animals + 19, 'text' => 'Crow', 'color' => $default_color],
                ['id' => $animals + 20, 'text' => 'Robin', 'color' => $default_color],
                ['id' => $animals + 21, 'text' => 'Finch', 'color' => $default_color],
                ['id' => $animals + 22, 'text' => 'Blackbird', 'color' => $default_color],
                ['id' => $animals + 23, 'text' => 'Hawk', 'color' => $default_color],
                ['id' => $animals + 24, 'text' => 'Eagle', 'color' => $default_color]
            ]);
            $user->folders()->createMany([
                ['id' => 66, 'name' => 'Animals', 'color' => $default_color]
            ]);
            $user->folders()->find(66)->words()->attach([
                $animals + 1 => ['board_x' => 1, 'board_y' => 1],
                $animals + 2 => ['board_x' => 2, 'board_y' => 1],
                $animals + 3 => ['board_x' => 3, 'board_y' => 1],
                $animals + 4 => ['board_x' => 4, 'board_y' => 1],
                $animals + 5 => ['board_x' => 5, 'board_y' => 1],
                $animals + 6 => ['board_x' => 6, 'board_y' => 1],

                $animals + 7 => ['board_x' => 1, 'board_y' => 2],
                $animals + 8 => ['board_x' => 2, 'board_y' => 2],
                $animals + 9 => ['board_x' => 3, 'board_y' => 2],
                $animals + 10 => ['board_x' => 4, 'board_y' => 2],
                $animals + 11 => ['board_x' => 5, 'board_y' => 2],
                $animals + 12 => ['board_x' => 6, 'board_y' => 2],

                $animals + 13 => ['board_x' => 1, 'board_y' => 3],
                $animals + 14 => ['board_x' => 2, 'board_y' => 3],
                $animals + 15 => ['board_x' => 3, 'board_y' => 3],
                $animals + 16 => ['board_x' => 4, 'board_y' => 3],
                $animals + 17 => ['board_x' => 5, 'board_y' => 3],
                $animals + 18 => ['board_x' => 6, 'board_y' => 3],

                $animals + 20 => ['board_x' => 2, 'board_y' => 4],
                $animals + 21 => ['board_x' => 3, 'board_y' => 4],
                $animals + 22 => ['board_x' => 4, 'board_y' => 4],
                $animals + 23 => ['board_x' => 5, 'board_y' => 4],
                $animals + 24 => ['board_x' => 5, 'board_y' => 4]
            ]);
            
        //Manners
            $user->words()->createMany([
                ['id' => $manners + 1, 'text' => 'Please', 'color' => $default_color],
                ['id' => $manners + 2, 'text' => 'Thank You', 'color' => $default_color],
                ['id' => $manners + 3, 'text' => 'You\'re welcome', 'color' => $default_color],
                ['id' => $manners + 4, 'text' => 'Bless you', 'color' => $default_color]
            ]);
            $user->folders()->createMany([
                ['id' => 67, 'name' => 'Plants', 'color' => $default_color]
            ]);
            $user->folders()->find(67)->words()->attach([
                $plants + 1 => ['board_x' => 1, 'board_y' => 1],
                $plants + 2 => ['board_x' => 2, 'board_y' => 1],
                $plants + 3 => ['board_x' => 3, 'board_y' => 1],
                $plants + 4 => ['board_x' => 4, 'board_y' => 1],
                $empty => ['board_x' => 5, 'board_y' => 1],
                $empty => ['board_x' => 6, 'board_y' => 1],

                $empty => ['board_x' => 1, 'board_y' => 2],

                $empty => ['board_x' => 1, 'board_y' => 3],

                $empty => ['board_x' => 1, 'board_y' => 4]                   
            ]);

        //House
            $user->words()->createMany([
                ['id' => $house + 1, 'text' => 'House', 'color' => $default_color],
                ['id' => $house + 2, 'text' => 'Door', 'color' => $default_color],
                ['id' => $house + 3, 'text' => 'Closet', 'color' => $default_color],
                ['id' => $house + 4, 'text' => 'Shelf', 'color' => $default_color],
                ['id' => $house + 5, 'text' => 'Window', 'color' => $default_color],
                ['id' => $house + 6, 'text' => 'Floor', 'color' => $default_color],
                ['id' => $house + 7, 'text' => 'Wall', 'color' => $default_color],
                ['id' => $house + 8, 'text' => 'Ceiling', 'color' => $default_color]
            ]);
            $user->folders()->createMany([
                ['id' => 68, 'name' => 'House', 'color' => $default_color],
                ['id' => 69, 'name' => 'Rooms', 'color' => $default_color],
                ['id' => 70, 'name' => 'Bedroom', 'color' => $default_color],
                ['id' => 71, 'name' => 'Bathroom', 'color' => $default_color],
                ['id' => 72, 'name' => 'Kitchen', 'color' => $default_color],
                ['id' => 73, 'name' => 'Living Room', 'color' => $default_color],
                ['id' => 74, 'name' => 'Family Room', 'color' => $default_color],
                ['id' => 75, 'name' => 'Linen', 'color' => $default_color],
                ['id' => 76, 'name' => 'Office', 'color' => $default_color],
                ['id' => 77, 'name' => 'Play Room', 'color' => $default_color],
                ['id' => 78, 'name' => 'Laundry Room', 'color' => $default_color],
                ['id' => 79, 'name' => 'Furnature', 'color' => $default_color],
                ['id' => 80, 'name' => 'Furnashings', 'color' => $default_color],
                ['id' => 81, 'name' => 'Cutlery', 'color' => $default_color],
                ['id' => 82, 'name' => 'Cooking Tools', 'color' => $default_color],
                ['id' => 83, 'name' => 'Dishes', 'color' => $default_color],
                ['id' => 84, 'name' => 'Meals', 'color' => $default_color],
                ['id' => 85, 'name' => 'Cleaning Supplies', 'color' => $default_color]

            ]);
            $user->folders()->find(68)->folders()->attach([
                69 => ['board_x' => 1, 'board_y' => 3]        
            ]);
            $user->folders()->find(68)->words()->attach([
                $house + 1 => ['board_x' => 1, 'board_y' => 1],
                $house + 2 => ['board_x' => 2, 'board_y' => 1],
                $house + 3 => ['board_x' => 3, 'board_y' => 1],
                $house + 4 => ['board_x' => 4, 'board_y' => 1],
                $house + 5 => ['board_x' => 5, 'board_y' => 1],
                $house + 6 => ['board_x' => 6, 'board_y' => 1],

                $house + 7 => ['board_x' => 1, 'board_y' => 2],
                $house + 8 => ['board_x' => 2, 'board_y' => 2],

                //rooms folder here

                $empty => ['board_x' => 1, 'board_y' => 4]                   
            ]);

            //Furnature
                $user->words()->createMany([
                    ['id' => $furnature + 1, 'text' => 'Bed', 'color' => $default_color],
                    ['id' => $furnature + 2, 'text' => 'Couch', 'color' => $default_color],
                    ['id' => $furnature + 3, 'text' => 'Chair', 'color' => $default_color],
                    ['id' => $furnature + 4, 'text' => 'Table', 'color' => $default_color],
                    ['id' => $furnature + 5, 'text' => 'Desk', 'color' => $default_color],
                    ['id' => $furnature + 6, 'text' => 'Drawer', 'color' => $default_color],
                    ['id' => $furnature + 7, 'text' => 'Dresser', 'color' => $default_color],
                    ['id' => $furnature + 8, 'text' => 'Office Chair', 'color' => $default_color],
                    ['id' => $furnature + 9, 'text' => 'Lamp', 'color' => $default_color],
                    ['id' => $furnature + 10, 'text' => 'Sink', 'color' => $default_color]
                ]);
                $user->folders()->find(79)->words()->attach([
                    $furnature + 1 => ['board_x' => 1, 'board_y' => 1],
                    $furnature + 2 => ['board_x' => 2, 'board_y' => 1],
                    $furnature + 3 => ['board_x' => 3, 'board_y' => 1],
                    $furnature + 4 => ['board_x' => 4, 'board_y' => 1],
                    $furnature + 5 => ['board_x' => 5, 'board_y' => 1],
                    $furnature + 6 => ['board_x' => 6, 'board_y' => 1],

                    $furnature + 7 => ['board_x' => 1, 'board_y' => 2],
                    $furnature + 8 => ['board_x' => 2, 'board_y' => 2],
                    $furnature + 9 => ['board_x' => 3, 'board_y' => 2],
                    $furnature + 10 => ['board_x' => 4, 'board_y' => 2],
                    
                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]                   
                ]);

            //Furnishings
                $user->words()->createMany([
                    ['id' => $furnishings + 1, 'text' => 'Rug', 'color' => $default_color],
                    ['id' => $furnishings + 2, 'text' => 'Pillow', 'color' => $default_color],
                    ['id' => $furnishings + 3, 'text' => 'Curtain', 'color' => $default_color],
                    ['id' => $furnishings + 4, 'text' => 'Blinds', 'color' => $default_color],
                    ['id' => $furnishings + 5, 'text' => 'Decor', 'color' => $default_color]
                ]);
                $user->folders()->find(80)->words()->attach([
                    $furnishings + 1 => ['board_x' => 1, 'board_y' => 1],
                    $furnishings + 2 => ['board_x' => 2, 'board_y' => 1],
                    $furnishings + 3 => ['board_x' => 3, 'board_y' => 1],
                    $furnishings + 4 => ['board_x' => 4, 'board_y' => 1],
                    $furnishings + 5 => ['board_x' => 5, 'board_y' => 1],
                    $empty => ['board_x' => 6, 'board_y' => 1],

                    $empty => ['board_x' => 1, 'board_y' => 2],
                    
                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]                   
                ]);

            //Linen
                $user->words()->createMany([
                    ['id' => $linin + 1, 'text' => 'Towel', 'color' => $default_color],
                    ['id' => $linin + 2, 'text' => 'Hand Towel', 'color' => $default_color],
                    ['id' => $linin + 3, 'text' => 'Bath Towel', 'color' => $default_color],
                    ['id' => $linin + 4, 'text' => 'Beach Towel', 'color' => $default_color],
                    ['id' => $linin + 5, 'text' => 'Rag', 'color' => $default_color],
                    ['id' => $linin + 6, 'text' => 'Washcloth', 'color' => $default_color],
                    ['id' => $linin + 7, 'text' => 'Pillowcase', 'color' => $default_color],
                    ['id' => $linin + 8, 'text' => 'Sheets', 'color' => $default_color],
                    ['id' => $linin + 9, 'text' => 'Top Sheet', 'color' => $default_color],
                    ['id' => $linin + 10, 'text' => 'Fitted Sheet', 'color' => $default_color],
                    ['id' => $linin + 11, 'text' => 'Comforter', 'color' => $default_color],
                    ['id' => $linin + 12, 'text' => 'Comforter Cover', 'color' => $default_color]
                ]);
                $user->folders()->find(75)->words()->attach([
                    $linin + 1 => ['board_x' => 1, 'board_y' => 1],
                    $linin + 2 => ['board_x' => 2, 'board_y' => 1],
                    $linin + 3 => ['board_x' => 3, 'board_y' => 1],
                    $linin + 4 => ['board_x' => 4, 'board_y' => 1],
                    $linin + 5 => ['board_x' => 5, 'board_y' => 1],
                    $linin + 6 => ['board_x' => 6, 'board_y' => 1],

                    $linin + 7 => ['board_x' => 1, 'board_y' => 2],
                    $linin + 8 => ['board_x' => 2, 'board_y' => 2],
                    $linin + 9 => ['board_x' => 3, 'board_y' => 2],
                    $linin + 10 => ['board_x' => 4, 'board_y' => 2],
                    $linin + 11 => ['board_x' => 5, 'board_y' => 2],
                    $linin + 12 => ['board_x' => 6, 'board_y' => 2],

                    $comfort + 2 => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]                   
                ]);

            //Cleaning Supplies
                $user->words()->createMany([
                    ['id' => $clean_supply + 1, 'text' => 'Soap', 'color' => $default_color],
                    ['id' => $clean_supply + 2, 'text' => 'Detergent', 'color' => $default_color],
                    ['id' => $clean_supply + 3, 'text' => 'Sponge', 'color' => $default_color],
                    ['id' => $clean_supply + 4, 'text' => 'Brush', 'color' => $default_color],
                    ['id' => $clean_supply + 5, 'text' => 'Paper Towel', 'color' => $default_color]
                ]);
                $user->folders()->find(85)->words()->attach([
                    $clean_supply + 1 => ['board_x' => 1, 'board_y' => 1],
                    $clean_supply + 2 => ['board_x' => 2, 'board_y' => 1],
                    $clean_supply + 3 => ['board_x' => 3, 'board_y' => 1],
                    $clean_supply + 4 => ['board_x' => 4, 'board_y' => 1],
                    $clean_supply + 5 => ['board_x' => 5, 'board_y' => 1],
                    $linin + 5 => ['board_x' => 6, 'board_y' => 1],

                    $empty => ['board_x' => 1, 'board_y' => 2],

                    $empty => ['board_x' => 1, 'board_y' => 3],

                    $empty => ['board_x' => 1, 'board_y' => 4]                   
                ]);
        
            //Rooms
                $user->words()->createMany([
                    ['id' => $rooms + 1, 'text' => 'Room', 'color' => $default_color],
                    ['id' => $rooms + 2, 'text' => 'Hallway', 'color' => $default_color],
                    ['id' => $rooms + 3, 'text' => 'Den', 'color' => $default_color],
                    ['id' => $rooms + 4, 'text' => 'Mud Room', 'color' => $default_color],
                    ['id' => $rooms + 5, 'text' => 'Closet', 'color' => $default_color]
                ]);
                $user->folders()->find(69)->words()->attach([
                    $rooms + 1 => ['board_x' => 1, 'board_y' => 1],
                    $rooms + 2 => ['board_x' => 2, 'board_y' => 1],
                    $rooms + 3 => ['board_x' => 3, 'board_y' => 1],
                    $rooms + 4 => ['board_x' => 4, 'board_y' => 1],
                    $rooms + 5 => ['board_x' => 5, 'board_y' => 1],
                    $empty => ['board_x' => 6, 'board_y' => 1],

                    //space for room folders

                    $empty => ['board_x' => 1, 'board_y' => 4]                   
                ]);
                $user->folders()->find(69)->folders()->attach([
                    70 => ['board_x' => 1, 'board_y' => 2],
                    71 => ['board_x' => 2, 'board_y' => 2],
                    72 => ['board_x' => 3, 'board_y' => 2],
                    73 => ['board_x' => 4, 'board_y' => 2],
                    74 => ['board_x' => 5, 'board_y' => 2],
                    76 => ['board_x' => 6, 'board_y' => 2],
    
                    77 => ['board_x' => 1, 'board_y' => 3],
                    78 => ['board_x' => 2, 'board_y' => 3]                  
                ]);

                //Bedroom
                    $user->words()->createMany([
                        ['id' => $bedroom + 1, 'text' => 'Bedroom', 'color' => $default_color]
                    ]);
                    $user->folders()->find(70)->words()->attach([
                        $bedroom + 1 => ['board_x' => 1, 'board_y' => 1],
                        $furnature + 1 => ['board_x' => 2, 'board_y' => 1],
                        $linin + 8 => ['board_x' => 3, 'board_y' => 1],
                        $furnishings + 2 => ['board_x' => 4, 'board_y' => 1],
                        $bedroom + 1 => ['board_x' => 5, 'board_y' => 1],
                        $comfort + 2 => ['board_x' => 6, 'board_y' => 1],

                        //spot for toys, book
                        $furnature + 5
                        $furnature + 3

                        //spot for clothes folder

                        $empty => ['board_x' => 1, 'board_y' => 4]                   
                    ]);
                    $user->folders()->find(70)->folders()->attach([
                        55 => ['board_x' => 1, 'board_y' => 3]                 
                    ]);

                //Bathroom
                    $user->words()->createMany([
                        ['id' => $bathroom + 1, 'text' => 'Bathroom', 'color' => $default_color],
                        ['id' => $bathroom + 2, 'text' => 'Bathtub', 'color' => $default_color],
                        ['id' => $bathroom + 3, 'text' => 'Shower', 'color' => $default_color],
                        ['id' => $bathroom + 4, 'text' => 'Toilet', 'color' => $default_color]
                    ]);
                    $user->folders()->find(71)->words()->attach([
                        $bathroom + 1 => ['board_x' => 1, 'board_y' => 1],
                        $bathroom + 2 => ['board_x' => 2 'board_y' => 1],
                        $bathroom + 3 => ['board_x' => 3, 'board_y' => 1],
                        $bathroom + 4 => ['board_x' => 4, 'board_y' => 1],
                        $furnature + 10 => ['board_x' => 5, 'board_y' => 1],
                        $furnishings + 1 => ['board_x' => 6, 'board_y' => 1],

                        $linin + 1 => ['board_x' => 1, 'board_y' => 2],
                        $linin + 3 => ['board_x' => 2, 'board_y' => 2],
                        $linin + 2 => ['board_x' => 3, 'board_y' => 2],

                        $empty => ['board_x' => 1, 'board_y' => 3],

                        $empty => ['board_x' => 1, 'board_y' => 4]                   
                    ]);

                //Family Room
                    $user->words()->createMany([
                        ['id' => $fam_room + 1, 'text' => 'Family Room', 'color' => $default_color]
                    ]);
                    $user->folders()->find(74)->words()->attach([
                        $fam_room + 1 => ['board_x' => 1, 'board_y' => 1],
                        $furnature + 2 => ['board_x' => 2, 'board_y' => 1],
                        $furnature + 3 => ['board_x' => 3, 'board_y' => 1],
                        $furnature + 4 => ['board_x' => 4, 'board_y' => 1],
                        $furnature + 9 => ['board_x' => 5, 'board_y' => 1],
                        $empty => ['board_x' => 6, 'board_y' => 1],

                        //spot for TV and remote

                        $empty => ['board_x' => 1, 'board_y' => 3],

                        $empty => ['board_x' => 1, 'board_y' => 4]                   
                    ]);

                //Living Room
                    $user->words()->createMany([
                        ['id' => $live_room + 1, 'text' => 'Living Room', 'color' => $default_color]
                    ]);
                    $user->folders()->find(73)->words()->attach([
                        $live_room + 1 => ['board_x' => 1, 'board_y' => 1],
                        $furnature + 2 => ['board_x' => 2, 'board_y' => 1],
                        $furnature + 3 => ['board_x' => 3, 'board_y' => 1],
                        $furnature + 4 => ['board_x' => 4, 'board_y' => 1],
                        $furnature + 9 => ['board_x' => 5, 'board_y' => 1],
                        $empty => ['board_x' => 6, 'board_y' => 1],

                        //spot for TV and remote

                        $empty => ['board_x' => 1, 'board_y' => 3],

                        $empty => ['board_x' => 1, 'board_y' => 4]                   
                    ]);

                //Office
                    $user->words()->createMany([
                        ['id' => $office + 1, 'text' => 'Office', 'color' => $default_color]
                    ]);
                    $user->folders()->find(76)->words()->attach([
                        $office + 1 => ['board_x' => 1, 'board_y' => 1],
                        $furnature + 3 => ['board_x' => 2, 'board_y' => 1],
                        $furnature + 5 => ['board_x' => 3, 'board_y' => 1],
                        $furnature + 8 => ['board_x' => 4, 'board_y' => 1],
                        //spot for and computer
                        $empty => ['board_x' => 6, 'board_y' => 1],

                        //spot for computer words and school supplies folders

                        $empty => ['board_x' => 1, 'board_y' => 3],

                        $empty => ['board_x' => 1, 'board_y' => 4]                   
                    ]);
                    $user->folders()->find(72)->folders()->attach([
                        // => ['board_x' => 1, 'board_y' => 2]                 
                    ]);

                //Play Room
                    $user->words()->createMany([
                        ['id' => $play_room + 1, 'text' => 'Play Room', 'color' => $default_color]
                    ]);
                    $user->folders()->find(77)->words()->attach([
                        $play_room + 1 => ['board_x' => 1, 'board_y' => 1],
                        $furnature + 5 => ['board_x' => 2, 'board_y' => 1],
                        $furnature + 3 => ['board_x' => 3, 'board_y' => 1],
                        $furnishings + 1 => ['board_x' => 4, 'board_y' => 1],
                        $empty => ['board_x' => 5, 'board_y' => 1],
                        $empty => ['board_x' => 6, 'board_y' => 1],

                        //spot for toys folder

                        $empty => ['board_x' => 1, 'board_y' => 3],

                        $empty => ['board_x' => 1, 'board_y' => 4]                   
                    ]);
                    $user->folders()->find(72)->folders()->attach([
                        // => ['board_x' => 1, 'board_y' => 2]                 
                    ]);

                //Laundry Room
                    $user->words()->createMany([
                        ['id' => $laundry_room + 1, 'text' => 'Laundry Room', 'color' => $default_color],
                        ['id' => $laundry_room + 2, 'text' => 'Washer', 'color' => $default_color],
                        ['id' => $laundry_room + 3, 'text' => 'Dryer', 'color' => $default_color]
                    ]);
                    $user->folders()->find(78)->words()->attach([
                        $laundry_room + 1 => ['board_x' => 1, 'board_y' => 1],
                        $laundry_room + 2 => ['board_x' => 2, 'board_y' => 1],
                        $laundry_room + 3 => ['board_x' => 3, 'board_y' => 1],
                        $clean_supply + 2 => ['board_x' => 4, 'board_y' => 1],
                        $empty => ['board_x' => 5, 'board_y' => 1],
                        $empty => ['board_x' => 6, 'board_y' => 1],

                        //spot for laundry folder

                        $empty => ['board_x' => 1, 'board_y' => 3],

                        $empty => ['board_x' => 1, 'board_y' => 4]                   
                    ]);
                    $user->folders()->find(72)->folders()->attach([
                        // => ['board_x' => 1, 'board_y' => 2]                 
                    ]);

                //Kitchen
                    $user->words()->createMany([
                        ['id' => $kitchen + 1, 'text' => 'Kitchen', 'color' => $default_color],
                        ['id' => $kitchen + 2, 'text' => 'Counter', 'color' => $default_color],
                        ['id' => $kitchen + 3, 'text' => 'Refridurator', 'color' => $default_color]
                    ]);
                    $user->folders()->find(72)->words()->attach([
                        $kitchen + 1 => ['board_x' => 1, 'board_y' => 1],
                        $kitchen + 2 => ['board_x' => 2, 'board_y' => 1],
                        $kitchen + 3 => ['board_x' => 3, 'board_y' => 1],
                        $furnature + 10 => ['board_x' => 4, 'board_y' => 1],
                        $empty => ['board_x' => 5, 'board_y' => 1],
                        $empty => ['board_x' => 6, 'board_y' => 1],

                        //spot for dishes, cutlery and cooking tools folders

                        //spot for meals and foods folders

                        $empty => ['board_x' => 1, 'board_y' => 4]                   
                    ]);
                    $user->folders()->find(72)->folders()->attach([
                        82 => ['board_x' => 1, 'board_y' => 2],   
                        83 => ['board_x' => 2, 'board_y' => 2],  
                        81 => ['board_x' => 3, 'board_y' => 2],  

                        84 => ['board_x' => 1, 'board_y' => 3],
                    ]);

                    //Meals
                        $user->words()->createMany([
                            ['id' => $meals + 1, 'text' => 'Breakfast', 'color' => $default_color],
                            ['id' => $meals + 2, 'text' => 'Lunch', 'color' => $default_color],
                            ['id' => $meals + 3, 'text' => 'Dinner', 'color' => $default_color],
                            ['id' => $meals + 4, 'text' => 'Supper', 'color' => $default_color],
                            ['id' => $meals + 5, 'text' => 'Dessert', 'color' => $default_color],
                            ['id' => $meals + 6, 'text' => 'Entre', 'color' => $default_color],
                            ['id' => $meals + 7, 'text' => 'Side Dish', 'color' => $default_color]
                        ]);
                        $user->folders()->find(84)->words()->attach([
                            $meals + 1 => ['board_x' => 1, 'board_y' => 1],
                            $meals + 2 => ['board_x' => 2, 'board_y' => 1],
                            $meals + 3 => ['board_x' => 3, 'board_y' => 1],
                            $meals + 4 => ['board_x' => 4, 'board_y' => 1],
                            $meals + 5 => ['board_x' => 5, 'board_y' => 1],
                            $meals + 6 => ['board_x' => 6, 'board_y' => 1],
        
                            $meals + 7 => ['board_x' => 1, 'board_y' => 2],
        
                            $empty => ['board_x' => 1, 'board_y' => 3],
        
                            $empty => ['board_x' => 1, 'board_y' => 4]                   
                        ]);

                    //Cooking Tools
                        $user->words()->createMany([
                            ['id' => $cook_tool + 1, 'text' => 'Pot', 'color' => $default_color],
                            ['id' => $cook_tool + 2, 'text' => 'Pan', 'color' => $default_color],
                            ['id' => $cook_tool + 3, 'text' => 'Frying Pan', 'color' => $default_color],
                            ['id' => $cook_tool + 4, 'text' => 'Sauce Pan', 'color' => $default_color],
                            ['id' => $cook_tool + 5, 'text' => 'Spatuala', 'color' => $default_color],
                            ['id' => $cook_tool + 6, 'text' => 'Whisk', 'color' => $default_color],
                            ['id' => $cook_tool + 7, 'text' => 'Strainer', 'color' => $default_color],
                            ['id' => $cook_tool + 8, 'text' => 'Cookie Sheet', 'color' => $default_color],
                            ['id' => $cook_tool + 9, 'text' => 'Mixer', 'color' => $default_color],
                            ['id' => $cook_tool + 10, 'text' => 'Measuring Spoon', 'color' => $default_color],
                            ['id' => $cook_tool + 11, 'text' => 'Measuring cup', 'color' => $default_color],
                            ['id' => $cook_tool + 12, 'text' => 'Teaspoon', 'color' => $default_color],
                            ['id' => $cook_tool + 13, 'text' => 'Tablespoon', 'color' => $default_color]
                        ]);
                        $user->folders()->find(82)->words()->attach([
                            $cook_tool + 1 => ['board_x' => 1, 'board_y' => 1],
                            $cook_tool + 2 => ['board_x' => 2, 'board_y' => 1],
                            $cook_tool + 3 => ['board_x' => 3, 'board_y' => 1],
                            $cook_tool + 4 => ['board_x' => 4, 'board_y' => 1],
                            $cook_tool + 5 => ['board_x' => 5, 'board_y' => 1],
                            $cook_tool + 6 => ['board_x' => 6, 'board_y' => 1],
        
                            $cook_tool + 7 => ['board_x' => 1, 'board_y' => 2],
                            $cook_tool + 8 => ['board_x' => 2, 'board_y' => 2],
                            $cook_tool + 9 => ['board_x' => 3, 'board_y' => 2],
                            $cook_tool + 10 => ['board_x' => 4, 'board_y' => 2],
                            $cook_tool + 11 => ['board_x' => 5, 'board_y' => 2],
                            $cook_tool + 12 => ['board_x' => 6, 'board_y' => 2],
        
                            $cook_tool + 13 => ['board_x' => 1, 'board_y' => 3],
        
                            $empty => ['board_x' => 1, 'board_y' => 4]                   
                        ]);

                    //Dishes
                        $user->words()->createMany([
                            ['id' => $dishes + 1, 'text' => 'Dish', 'color' => $default_color],
                            ['id' => $dishes + 2, 'text' => 'Dishes', 'color' => $default_color],
                            ['id' => $dishes + 3, 'text' => 'Plate', 'color' => $default_color],
                            ['id' => $dishes + 4, 'text' => 'Bowl', 'color' => $default_color],
                            ['id' => $dishes + 5, 'text' => 'Cup', 'color' => $default_color],
                            ['id' => $dishes + 6, 'text' => 'Mug', 'color' => $default_color]
                        ]);
                        $user->folders()->find(83)->words()->attach([
                            $dishes + 1 => ['board_x' => 1, 'board_y' => 1],
                            $dishes + 2 => ['board_x' => 2, 'board_y' => 1],
                            $dishes + 3 => ['board_x' => 3, 'board_y' => 1],
                            $dishes + 4 => ['board_x' => 4, 'board_y' => 1],
                            $dishes + 5 => ['board_x' => 5, 'board_y' => 1],
                            $dishes + 6 => ['board_x' => 6, 'board_y' => 1],
        
                            $empty => ['board_x' => 1, 'board_y' => 2],
        
                            $empty => ['board_x' => 1, 'board_y' => 3],
        
                            $empty => ['board_x' => 1, 'board_y' => 4]                   
                        ]);

                    //Cutlery
                        $user->words()->createMany([
                            ['id' => $cutlery + 1, 'text' => 'Fork', 'color' => $default_color],
                            ['id' => $cutlery + 2, 'text' => 'Knife', 'color' => $default_color],
                            ['id' => $cutlery + 3, 'text' => 'Spoon', 'color' => $default_color],
                            ['id' => $cutlery + 4, 'text' => 'Chopsticks', 'color' => $default_color],
                            ['id' => $cutlery + 5, 'text' => 'Cutlery', 'color' => $default_color],
                            ['id' => $cutlery + 6, 'text' => 'Utensils', 'color' => $default_color]
                        ]);
                        $user->folders()->find(81)->words()->attach([
                            $cutlery + 1 => ['board_x' => 1, 'board_y' => 1],
                            $cutlery + 2 => ['board_x' => 2, 'board_y' => 1],
                            $cutlery + 3 => ['board_x' => 3, 'board_y' => 1],
                            $cutlery + 4 => ['board_x' => 4, 'board_y' => 1],
                            $cutlery + 5 => ['board_x' => 5, 'board_y' => 1],
                            $cutlery + 6 => ['board_x' => 6, 'board_y' => 1],
        
                            //space for big and small
        
                            $empty => ['board_x' => 1, 'board_y' => 3],
        
                            $empty => ['board_x' => 1, 'board_y' => 4]                   
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
                30 => ['board_x' => 5, 'board_y' => 3],
                31 => ['board_x' => 6, 'board_y' => 3],

                3 => ['board_x' => 1, 'board_y' => 4],
                24 => ['board_x' => 2, 'board_y' => 4],
                4 => ['board_x' => 3, 'board_y' => 4],
                5 => ['board_x' => 4, 'board_y' => 4],
                26 => ['board_x' => 5, 'board_y' => 4],
                28 => ['board_x' => 6, 'board_y' => 4]
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
