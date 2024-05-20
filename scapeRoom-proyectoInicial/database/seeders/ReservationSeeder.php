<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation;


class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservations = [
            [
                'start_date' => '2024-05-20 13:00',
                'end_date' => '2024-05-20 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 1,
                'user_id' => 2
            ],
            [
                'start_date' => '2024-05-20 20:00',
                'end_date' => '2024-05-20 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 1,
                'user_id' => 2
            ],
            [
                'start_date' => '2024-05-21 13:00',
                'end_date' => '2024-05-21 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 1,
                'user_id' => 3
            ],
            [
                'start_date' => '2024-05-21 20:00',
                'end_date' => '2024-05-21 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 1,
                'user_id' => 3
            ],
            [
                'start_date' => '2024-05-22 13:00',
                'end_date' => '2024-05-22 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 1,
                'user_id' => 2
            ],
            [
                'start_date' => '2024-05-22 20:00',
                'end_date' => '2024-05-22 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 1,
                'user_id' => 2
            ],
            [
                'start_date' => '2024-05-23 13:00',
                'end_date' => '2024-05-23 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 1,
                'user_id' => 3
            ],
            [
                'start_date' => '2024-05-23 20:00',
                'end_date' => '2024-05-23 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 1,
                'user_id' => 3
            ],
            [
                'start_date' => '2024-05-24 13:00',
                'end_date' => '2024-05-24 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 1,
                'user_id' => 2
            ],
            [
                'start_date' => '2024-05-24 20:00',
                'end_date' => '2024-05-24 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 1,
                'user_id' => 2
            ],
            [
                'start_date' => '2024-05-25 13:00',
                'end_date' => '2024-05-25 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 1,
                'user_id' => 3
            ],
            [
                'start_date' => '2024-05-25 20:00',
                'end_date' => '2024-05-25 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 1,
                'user_id' => 3
            ],
            // FRANQUESES EMPLEADOS

            [
                'start_date' => '2024-05-20 13:00',
                'end_date' => '2024-05-20 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 3,
                'user_id' => 3
            ],
            [
                'start_date' => '2024-05-20 20:00',
                'end_date' => '2024-05-20 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 3,
                'user_id' => 3
            ],
            [
                'start_date' => '2024-05-21 13:00',
                'end_date' => '2024-05-21 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 3,
                'user_id' => 2
            ],
            [
                'start_date' => '2024-05-21 20:00',
                'end_date' => '2024-05-21 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 3,
                'user_id' => 2
            ],
            [
                'start_date' => '2024-05-22 13:00',
                'end_date' => '2024-05-22 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 3,
                'user_id' => 3
            ],
            [
                'start_date' => '2024-05-22 20:00',
                'end_date' => '2024-05-22 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 3,
                'user_id' => 3
            ],
            [
                'start_date' => '2024-05-23 13:00',
                'end_date' => '2024-05-23 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 3,
                'user_id' => 2
            ],
            [
                'start_date' => '2024-05-23 20:00',
                'end_date' => '2024-05-23 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 3,
                'user_id' => 2
            ],
            [
                'start_date' => '2024-05-24 13:00',
                'end_date' => '2024-05-24 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 3,
                'user_id' => 3
            ],
            [
                'start_date' => '2024-05-24 20:00',
                'end_date' => '2024-05-24 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 3,
                'user_id' => 3
            ],
            [
                'start_date' => '2024-05-25 13:00',
                'end_date' => '2024-05-25 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 3,
                'user_id' => 2
            ],
            [
                'start_date' => '2024-05-25 20:00',
                'end_date' => '2024-05-25 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 3,
                'user_id' => 2
            ],

            // CARDEDEU EMPLEADOS

            [
                'start_date' => '2024-05-20 13:00',
                'end_date' => '2024-05-20 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 2,
                'user_id' => 4
            ],
            [
                'start_date' => '2024-05-20 20:00',
                'end_date' => '2024-05-20 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 2,
                'user_id' => 4
            ],
            [
                'start_date' => '2024-05-21 13:00',
                'end_date' => '2024-05-21 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 2,
                'user_id' => 5
            ],
            [
                'start_date' => '2024-05-21 20:00',
                'end_date' => '2024-05-21 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 2,
                'user_id' => 5
            ],
            [
                'start_date' => '2024-05-22 13:00',
                'end_date' => '2024-05-22 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 2,
                'user_id' => 4
            ],
            [
                'start_date' => '2024-05-22 20:00',
                'end_date' => '2024-05-22 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 2,
                'user_id' => 4
            ],
            [
                'start_date' => '2024-05-23 13:00',
                'end_date' => '2024-05-23 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 2,
                'user_id' => 5
            ],
            [
                'start_date' => '2024-05-23 20:00',
                'end_date' => '2024-05-23 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 2,
                'user_id' => 5
            ],
            [
                'start_date' => '2024-05-24 13:00',
                'end_date' => '2024-05-24 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 2,
                'user_id' => 4
            ],
            [
                'start_date' => '2024-05-24 20:00',
                'end_date' => '2024-05-24 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 2,
                'user_id' => 4
            ],
            [
                'start_date' => '2024-05-25 13:00',
                'end_date' => '2024-05-25 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 2,
                'user_id' => 5
            ],
            [
                'start_date' => '2024-05-25 20:00',
                'end_date' => '2024-05-25 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 2,
                'user_id' => 5
            ],

            // MATARO EMPLEADOS

            [
                'start_date' => '2024-05-20 13:00',
                'end_date' => '2024-05-20 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 4,
                'user_id' => 5
            ],
            [
                'start_date' => '2024-05-20 20:00',
                'end_date' => '2024-05-20 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 4,
                'user_id' => 5
            ],
            [
                'start_date' => '2024-05-21 13:00',
                'end_date' => '2024-05-21 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 4,
                'user_id' => 4
            ],
            [
                'start_date' => '2024-05-21 20:00',
                'end_date' => '2024-05-21 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 4,
                'user_id' => 4
            ],
            [
                'start_date' => '2024-05-22 13:00',
                'end_date' => '2024-05-22 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 4,
                'user_id' => 5
            ],
            [
                'start_date' => '2024-05-22 20:00',
                'end_date' => '2024-05-22 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 4,
                'user_id' => 5
            ],
            [
                'start_date' => '2024-05-23 13:00',
                'end_date' => '2024-05-23 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 4,
                'user_id' => 4
            ],
            [
                'start_date' => '2024-05-23 20:00',
                'end_date' => '2024-05-23 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 4,
                'user_id' => 4
            ],
            [
                'start_date' => '2024-05-24 13:00',
                'end_date' => '2024-05-24 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 4,
                'user_id' => 5
            ],
            [
                'start_date' => '2024-05-24 20:00',
                'end_date' => '2024-05-24 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 4,
                'user_id' => 5
            ],
            [
                'start_date' => '2024-05-25 13:00',
                'end_date' => '2024-05-25 14:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 4,
                'user_id' => 4
            ],
            [
                'start_date' => '2024-05-25 20:00',
                'end_date' => '2024-05-25 21:00',
                'participants' => 0,
                'service_id' => 1,
                'location_id' => 4,
                'user_id' => 4
            ],
        ];
        foreach ($reservations as $reservation){
            Reservation::create($reservation);
        }
    }
}
