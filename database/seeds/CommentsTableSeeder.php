<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Comment;
use App\Post;
class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            
            $post = Post::inRandomOrder()->first();
            
            $newComment = new Comment;
            $newComment->post_id = $post->id;
            $newComment->author = $faker->userName(50);
            $newComment->content = $faker->paragraph(5, true);

            $newComment->save();
        }
    }
}
