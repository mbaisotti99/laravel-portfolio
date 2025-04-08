<?php

namespace Database\Seeders;

use App\Models\Developer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DevsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 20; $i++) {
            $newDev = new Developer();
            $newDev->nome = $faker->name();
            $newDev->soprannome = $faker->word();
            $newDev->descrizione = implode(" ", $faker->paragraphs(rand(1,5)));
            $newDev->img = "devs/dev_" . $i+1 . ".png";

            $newDev->save();
        }
    }
}
