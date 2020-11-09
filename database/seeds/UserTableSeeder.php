<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10 ; $i++) { 
            
            $newUser = new User;

            $newUser->name = $faker->firstName();
            $newUser->email = $faker->freeEmail();
            $newUser->password = $faker->password();

            $newUser->save();
        }
    }
}
