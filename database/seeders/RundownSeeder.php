<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rundown;

class RundownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rundowns = [
            ['id' => 1, 'description' => 'Open Gate & Foyer Activity', 'start_time' => '17:30', 'end_time' => '18:30'],
            ['id' => 2, 'description' => 'Opening Remarks', 'start_time' => '18:30', 'end_time' => '18:40'],
            ['id' => 3, 'description' => 'Agung Concern 70th Anniversary Gala Dinner', 'start_time' => '18:40', 'end_time' => '19:15'],
            ['id' => 4, 'description' => 'Performance by Lea Simanjuntak', 'start_time' => '19:15', 'end_time' => '20:00'],
            ['id' => 5, 'description' => 'Performance by Once Mekel', 'start_time' => '20:00', 'end_time' => '20:45'],
            ['id' => 6, 'description' => 'Closing', 'start_time' => '20:45', 'end_time' => '20:55'],
        ];

        foreach ($rundowns as $rundown) {
            \Log::info('Rundown data before updateOrCreate', ['rundown' => $rundown]);
            Rundown::updateOrCreate(['id' => $rundown['id']], $rundown);
            \Log::info('Rundown data after updateOrCreate', ['rundown' => $rundown]);
        }
    }
}
