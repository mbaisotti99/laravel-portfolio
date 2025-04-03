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
            for ($i = 0; $i < rand(1, 4); $i++) {
                DB::table("developer_project")->insert([
                    "project_id"=> $project->id,
                    "developer_id" => $devs[rand(0, count($devs) -1)]->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
