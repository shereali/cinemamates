<?php

use App\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $comments = [
        ['name' => 'Josep', 'comment' => 'People in every part of the world watch movies as a type of entertainment, a way to have fun', 'film_id' => 1],
        ['name' => 'Hensely', 'comment' => 'People in every part of the world watch movies as a type of entertainment, a way to have fun', 'film_id' => 7],
        ['name' => 'Marcue', 'comment' => 'People in every part of the world watch movies as a type of entertainment, a way to have fun', 'film_id' => 1],
        ['name' => 'Linon', 'comment' => 'People in every part of the world watch movies as a type of entertainment, a way to have fun', 'film_id' => 2],
        ['name' => 'Jone Hussy', 'comment' => 'People in every part of the world watch movies as a type of entertainment, a way to have fun', 'film_id' => 8],
        ['name' => 'Billonis', 'comment' => 'People in every part of the world watch movies as a type of entertainment, a way to have fun', 'film_id' => 3],
        ['name' => 'Kambala', 'comment' => 'People in every part of the world watch movies as a type of entertainment, a way to have fun', 'film_id' => 4],
        ['name' => 'Himsani', 'comment' => 'People in every part of the world watch movies as a type of entertainment, a way to have fun', 'film_id' => 9],
        ['name' => 'Gozibi', 'comment' => 'People in every part of the world watch movies as a type of entertainment, a way to have fun', 'film_id' => 5],
        ['name' => 'Limen', 'comment' => 'People in every part of the world watch movies as a type of entertainment, a way to have fun', 'film_id' => 6],
      ]; 

      Comment::insert($comments);
    }
}
