<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $patients = Patient::factory(10)->create();
        $doctors = Doctor::factory(10)->create();

        $patients->each(function ($patient) {
            $events = Event::factory(3)->create(['patient_id' => $patient->id]);;
        });

        $patients->each(function ($patient) use ($doctors) {
            $patient->doctors()->attach(
                $doctors->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        $doctors->each(function ($doctor) {
            $events = Event::factory(3)->create(['doctor_id' => $doctor->id]);;
        });

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
        ]);

        // $this->call([
        //    // EventSeeder::class,
        //     PatientSeeder::class,
        //     //DoctorSeeder::class,
        // ]);

    }
}
