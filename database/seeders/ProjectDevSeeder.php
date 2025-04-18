<?php

namespace Database\Seeders;

use App\Models\Developer;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectDevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = Project::all();
        $devs = Developer::all();

        
        foreach ($projects as $project) {
            $assignedDev = [];
            
            for ($i = 0; $i < rand(1, 4); $i++) {
                do{
                    $dev = $devs->random();
                } while(in_array($dev->id, $assignedDev));
                
                $assignedDev[] = $dev->id;

                DB::table("developer_project")->insert([
                    "project_id"=> $project->id,
                    "developer_id" => $dev->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
