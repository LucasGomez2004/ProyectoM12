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
                'reservation' => 'ScapeRoom_Level1',
                'start_date' => '2024-04-15 10:00',
                'end_date' => '2024-04-15 11:00',
            ],
            [
                'reservation' => 'ScapeRoom_Level2',
                'start_date' => '2024-04-16 10:00',
                'end_date' => '2024-04-16 11:00',
            ],
            [
                'reservation' => 'ScapeRoom_Level3',
                'start_date' => '2024-04-17 10:00',
                'end_date' => '2024-04-17 11:00',
            ]
        ];
        foreach ($reservations as $reservation){
            Reservation::create($reservation);
        }
    }
}
