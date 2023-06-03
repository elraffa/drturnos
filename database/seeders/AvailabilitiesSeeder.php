<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvailabilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dayIds = DB::table('days_of_week')->pluck('id');

        foreach ($dayIds as $dayId) {
            $startTime = strtotime('08:00 AM');
            $endTime = strtotime('06:00 PM');

            while ($startTime < $endTime) {
                DB::table('availabilities')->insert([
                    'day_id' => $dayId,
                    'start_time' => date('H:i', $startTime),
                    'end_time' => date('H:i', $startTime + 1800), // 30 minutes interval
                    'created_at' => now(),
                    'updated_at' => now(),
                    'doctor_id' => 1,
                ]);

                $startTime += 1800; // Increment by 30 minutes
            }
        }
    }
}
