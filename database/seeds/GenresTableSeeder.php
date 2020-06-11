<?php

use Illuminate\Database\Seeder;
use App\Genre;


class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
        $genres = [
            ['name' => 'Adventure'],
            ['name' => 'Action' ],
            ['name' => 'Romantic'],
            ['name' => 'Comedy'],
            ['name' => 'Drama'],
            ['name' => 'Fantasi'],
            ['name' => 'Historical'],
            ['name' => 'Horror'],
            ['name' => 'Science Fiction'],
            ['name' => 'Magical realism'],
            ['name' => 'Mystery'],
            ['name' => 'Political'],
            ['name' => 'Thriller'],
            ['name' => 'Urban'],
            ['name' => 'Animation'],
            ['name' => 'Sci-fi'],
            ['name' => 'Political'],
            ['name' => 'Philosophical']
        ];

        Genre::insert($genres);
    }
}
