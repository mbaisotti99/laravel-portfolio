<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTechSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $techs = Technology::all();
        $projects = Project::all();

        
        foreach ($projects as $project) {
            $assignedTechs = [];
            for ($i = 0; $i < rand(1,3); $i++){

                do{
                    $tech = $techs->random();
                } while (in_array($tech->id, $assignedTechs));
            
                $assignedTechs[] = $tech->id;

                DB::table("project_technology")->insert([
                    "project_id" => $project->id,
                    "technology_id" => $tech->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
