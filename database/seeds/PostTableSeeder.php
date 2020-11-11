<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;
use App\User;
use App\Tag;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 40 ; $i++) { 
            
            $newUser = User::inRandomOrder()->first();
            
            $newPost = new Post;
    
            $newPost->user_id = $newUser->id;
            $newPost->title = $faker->sentence(5, true);
            $newPost->slug = $faker->slug();
            $newPost->description = $faker->paragraph(2, true);

            $newPost->save();

            $tags = Tag ::inRandomOrder()->limit(2)->get();
            $newPost->tags()->sync($tags);
        }
    }
}
