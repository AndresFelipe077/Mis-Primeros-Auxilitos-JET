<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Adivinanza;
use App\Models\Answer;
use Illuminate\Database\Seeder;
use App\Models\Contenido;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;
use App\Models\Trivia;
use App\Models\Video;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)       -> create();
        Contenido::factory(10)  -> create();
        Trivia::factory(10)     -> create();
        Adivinanza::factory(10) -> create();
        Video::factory(10)      -> create();
        Quiz::factory(10)     -> create();
        Question::factory(10) -> create();
        Answer::factory(4)    -> create();
    }
}
