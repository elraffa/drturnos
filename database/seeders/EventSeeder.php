<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'event' => 'Cita 1',
                'start_date' => '2021-03-23 10:00:00',
                'end_date' => '2021-03-23 11:00:00',
            ],
            [
                'event' => 'Cita 2',
                'start_date' => '2021-03-26 11:00:00',
                'end_date' => '2021-03-23 12:00:00',
            ],
            [ 'event' => 'Cita 3',
                'start_date' => '2021-03-29 12:00:00',
                'end_date' => '2021-03-23 13:00:00',
            ],
            [
                'event' => 'Cita 4',
                'start_date' => '2021-03-30 13:00:00',
                'end_date' => '2021-03-23 14:00:00',
            ],
            [
                'event' => 'Cita 5',
                'start_date' => '2021-03-31 14:00:00',
                'end_date' => '2021-03-23 15:00:00',
            ]
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
