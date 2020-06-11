<?php

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
        $this->call(
            [
                // UserSeeder::class,
                UsersTableSeeder::class,
                CountriesTableSeeder::class,
                GenresTableSeeder::class,
                FilmsTableSeeder::class,
                CommentsTableSeeder::class

            ]
        );
    }
}
