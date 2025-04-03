<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $techs = [
            "Intelligenza Artificiale",
            "Blockchain",
            "Internet of Things",
            "Cloud Computing",
            "Cybersecurity",
            "Realtà Virtuale",
            "Realtà Aumentata",
            "5G",
            "Big Data",
            "Machine Learning"
        ];

        foreach ($techs as $tech) {
            $newTech = new Technology();
            $newTech->nome = $tech;
            $newTech->colore = $faker->hexColor();
            $newTech->descrizione = implode(" ", $faker->paragraphs(rand(1,5)));
            
            $newTech->save();
        }
        
    }
}
