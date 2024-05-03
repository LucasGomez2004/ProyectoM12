<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'name' => 'Sencillo',
            'price' => 50,
        ]);
        Service::create([
            'name' => 'Normal',
            'price' => 65,
        ]);
        Service::create([
            'name' => 'Complicado',
            'price' => 85,
        ]);
        Service::create([
            'name' => 'Life or die',
            'price' => 100,
        ]);
    }
}
