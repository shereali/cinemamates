<?php

use App\Film;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $movies = [
            [
                'name' => 'First & Fury',
                'user_id' => 1,
                'slug' => 'First & Fury',
                'description' => 'Movies, also known as films, are a type of visual communication which uses moving pictures and sound to tell stories or teach people something. People in every part of the world watch movies as a type of entertainment, a way to have fun',
                'release' => 1,
                'date' => Carbon::now()->subMinutes(rand(1, 55)),
                'rating' => 5,
                'ticket' => 10,
                'price' => 620.00,
                'country_id' => 15,
                'genre_id' => '[1,2]',
                'photo' => 'action.jpg',
            ],
            [
                'name' => 'Going To Amaerica',
                'user_id' => 1,
                'slug' => 'Going To Amaerica',
                'description' => 'Movies, also known as films, are a type of visual communication which uses moving pictures and sound to tell stories or teach people something. People in every part of the world watch movies as a type of entertainment, a way to have fun',
                'release' => 1,
                'date' => Carbon::now()->subMinutes(rand(1, 55)),
                'rating' => 3,
                'ticket' => 6,
                'price' => 620.00,
                'country_id' => 66,
                'genre_id' => '[2,3,4]',
                'photo' => 'comedy.jpg',
            ],
            [
                'name' => 'Light of Mine',
                'user_id' => 1,
                'slug' => 'Light of Mine',
                'description' => 'Movies, also known as films, are a type of visual communication which uses moving pictures and sound to tell stories or teach people something. People in every part of the world watch movies as a type of entertainment, a way to have fun',
                'release' => 1,
                'date' => Carbon::now()->subMinutes(rand(1, 55)),
                'rating' => 5,
                'ticket' => 10,
                'price' => 620.00,
                'country_id' => 55,
                'genre_id' => '[2,3]',
                'photo' => 'romance.jpg',
            ],
            [
                'name' => 'Black Mountain Side',
                'user_id' => 1,
                'slug' => 'Black Mountain Side',
                'description' => 'Movies, also known as films, are a type of visual communication which uses moving pictures and sound to tell stories or teach people something. People in every part of the world watch movies as a type of entertainment, a way to have fun',
                'release' => 1,
                'date' => Carbon::now()->subMinutes(rand(1, 55)),
                'rating' => 5,
                'ticket' => 10,
                'price' => 620.00,
                'country_id' => 77,
                'genre_id' => '[7,8]',
                'photo' => 'horror.jpg',
            ],
            [
                'name' => 'Artic Blast',
                'user_id' => 1,
                'slug' => 'Artic Blast',
                'description' => 'Movies, also known as films, are a type of visual communication which uses moving pictures and sound to tell stories or teach people something. People in every part of the world watch movies as a type of entertainment, a way to have fun',
                'release' => 1,
                'date' => Carbon::now()->subMinutes(rand(1, 55)),
                'rating' => 5,
                'ticket' => 10,
                'price' => 620.00,
                'country_id' => 33,
                'genre_id' => '[11,16]',
                'photo' => 'sci-fi.jpg',
            ],
            [
                'name' => 'The Good Neighbor',
                'user_id' => 1,
                'slug' => 'The Good Neighbor',
                'description' => 'Movies, also known as films, are a type of visual communication which uses moving pictures and sound to tell stories or teach people something. People in every part of the world watch movies as a type of entertainment, a way to have fun',
                'release' => 1,
                'date' => Carbon::now()->subMinutes(rand(1, 55)),
                'rating' => 5,
                'ticket' => 10,
                'price' => 620.00,
                'country_id' => 86,
                'genre_id' => '[11,12,13]',
                'photo' => 'thriller.jpg',
            ],
            [
                'name' => 'Big Jack',
                'user_id' => 1,
                'slug' => 'Big Jack',
                'description' => 'Movies, also known as films, are a type of visual communication which uses moving pictures and sound to tell stories or teach people something. People in every part of the world watch movies as a type of entertainment, a way to have fun',
                'release' => 1,
                'date' => Carbon::now()->subMinutes(rand(1, 55)),
                'rating' => 5,
                'ticket' => 10,
                'price' => 620.00,
                'country_id' => 75,
                'genre_id' => '[5]',
                'photo' => 'drama.jpg',
            ],
            [
                'name' => 'Pilgrims Progress',
                'user_id' => 1,
                'slug' => 'Pilgrims Progress',
                'description' => 'Movies, also known as films, are a type of visual communication which uses moving pictures and sound to tell stories or teach people something. People in every part of the world watch movies as a type of entertainment, a way to have fun',
                'release' => 1,
                'date' => Carbon::now()->subMinutes(rand(1, 55)),
                'rating' => 5,
                'ticket' => 10,
                'price' => 620.00,
                'country_id' => 22,
                'genre_id' => '[6,14]',
                'photo' => 'animation.jpg',
            ],
            [
                'name' => 'Joseph',
                'user_id' => 1,
                'slug' => 'Joseph',
                'description' => 'Movies, also known as films, are a type of visual communication which uses moving pictures and sound to tell stories or teach people something. People in every part of the world watch movies as a type of entertainment, a way to have fun',
                'release' => 1,
                'date' => Carbon::now()->subMinutes(rand(1, 55)),
                'rating' => 5,
                'ticket' => 10,
                'price' => 620.00,
                'country_id' => 57,
                'genre_id' => '[14,15,16]',
                'photo' => 'joseph.jpg',
            ],
            [
                'name' => 'Pedal Driven',
                'user_id' => 1,
                'slug' => 'Pedal Driven',
                'description' => 'Movies, also known as films, are a type of visual communication which uses moving pictures and sound to tell stories or teach people something. People in every part of the world watch movies as a type of entertainment, a way to have fun',
                'release' => 1,
                'date' => Carbon::now()->subMinutes(rand(1, 55)),
                'rating' => 5,
                'ticket' => 10,
                'price' => 620.00,
                'country_id' => 54,
                'genre_id' => '[1,4,5]',
                'photo' => 'pedal-driven.jpg',
            ],
        ];
        
        foreach ($movies as $key => $movie) {
            $table              = new Film;
            $table->name        = $movie['name'];
            $table->user_id     = $movie['user_id'];
            $table->slug        = strtolower(preg_replace("![^a-z0-9]+!i", "_", $movie['slug']));
            $table->description = $movie['description'];
            $table->release     = $movie['release'];
            $table->date        = $movie['date'];
            $table->rating      = $movie['rating'];
            $table->ticket      = $movie['ticket'];
            $table->price       = $movie['price'];
            $table->country_id  = $movie['country_id'];
            $table->genre_id    = $movie['genre_id'];
            $table->photo       = $movie['photo'];
            $table->save();
        }
    }
}
