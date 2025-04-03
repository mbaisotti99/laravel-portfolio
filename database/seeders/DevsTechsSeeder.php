<?php

namespace Database\Seeders;

use App\Models\Developer;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevsTechsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $devs = Developer::all();
        $techs = Technology::all();

        foreach ($devs as $dev) {

            $assignedTechs = [];


            for($i = 0; $i < rand(1, 5); $i++){
                do{
                    $tech = $techs->random();
                } while (in_array($tech->id, $assignedTechs));
            
                $assignedTechs[] = $tech->id;

                DB::table("developer_technology")->insert([
                    "developer_id" => $dev->id,
                    "technology_id" => $tech->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
