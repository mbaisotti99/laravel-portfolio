<?php

namespace Database\Seeders;


use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for( $i = 0; $i < 10; $i++ ) {
            $newProject = new Project();
            $newProject->titolo = $faker->catchPhrase();
            $devsArr = [];
            for( $j = 0; $j < rand(1,5); $j++ ){
                $devsArr[] = $faker->name();
            }
            $newProject->devs = $devsArr;
            $hasCliente = $faker->boolean(70);
            $hasCliente && $newProject->cliente = $faker->company();
            $newProject->descrizione = implode("", $faker->paragraphs(rand(3,10)));
            $newProject->data = $faker->dateTimeThisDecade();
            $newProject->type_id = $faker->numberBetween(1,10);
            $newProject->save();

        }

    }
}
