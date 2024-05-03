<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EscapeRoom;

class EscapeRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EscapeRoom::create([
            'name' => 'Escape Or Die',
            'location_id' => 1,
        ]);
        EscapeRoom::create([
            'name' => 'Escape Or Die',
            'location_id' => 2,
        ]);
        EscapeRoom::create([
            'name' => 'Escape Or Die',
            'location_id' => 3,
        ]);
        EscapeRoom::create([
            'name' => 'Escape Or Die',
            'location_id' => 4,
        ]);
    }
}
