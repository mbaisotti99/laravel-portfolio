<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for( $i = 0; $i < 30; $i++ ){
            $newPost = new Post();
            $newPost->titolo = $faker->catchPhrase();
            $newPost->autore = $faker->name();
            $newPost->contenuto = $faker->realText();
            $newPost->save();
        }
    }
}
