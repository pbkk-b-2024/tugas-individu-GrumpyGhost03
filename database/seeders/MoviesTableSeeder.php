<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movies')->insert([
            [
                'title' => 'Inception',
                'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.',
                'director' => 'Christopher Nolan',
                'release_date' => '2010-07-16',
                'genre' => 'Science Fiction',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Matrix',
                'description' => 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
                'director' => 'Lana Wachowski, Lilly Wachowski',
                'release_date' => '1999-03-31',
                'genre' => 'Action',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Godfather',
                'description' => 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.',
                'director' => 'Francis Ford Coppola',
                'release_date' => '1972-03-24',
                'genre' => 'Crime',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}