<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Question::create([
            'question' => 'Хто ти?'
        ]);

        Question::create([
            'question' => 'Де ти?'
        ]);

        Question::create([
            'question' => 'Кого ти там зустрів?'
        ]);

        Question::create([
            'question' => 'Що ти йому сказав?'
        ]);

        Question::create([
            'question' => 'Що він тобі відповів?'
        ]);

        Question::create([
            'question' => 'Чим це все закінчилось?'
        ]);




    }
}
