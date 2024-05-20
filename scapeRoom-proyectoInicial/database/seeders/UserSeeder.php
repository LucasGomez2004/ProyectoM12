<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // USUARIOS
        User::create([
            'name' => 'BOL',
            'email' => 'bieloscarlucas.escaperoom@gmail.com',
            'password' => Hash::make('12345678'),
            'google_id' => '117443692783664558096',
            'avatar' => 'https://lh3.googleusercontent.com/a/ACg8ocLKfsXRvObu15zydM8L4F1Nwpasn0GiPRUMf2Wg3AWNHzDrUQ=s96-c',
            'role_id' => 1,
        ]);

        // EMPLEADOS
        User::create([
            'name' => 'Empleado 1',
            'email' => 'empleado1@escapeordie.com',
            'password' => Hash::make('empleado1'),
            'google_id' => '',
            'avatar' => '',
            'role_id' => 3,
        ]);
        
        User::create([
            'name' => 'Empleado 2',
            'email' => 'empleado2@escapeordie.com',
            'password' => Hash::make('empleado2'),
            'google_id' => '',
            'avatar' => '',
            'role_id' => 3,
        ]);
        User::create([
            'name' => 'Empleado 3',
            'email' => 'empleado3@escapeordie.com',
            'password' => Hash::make('empleado3'),
            'google_id' => '',
            'avatar' => '',
            'role_id' => 3,
        ]);
        
        User::create([
            'name' => 'Empleado 4',
            'email' => 'empleado4@escapeordie.com',
            'password' => Hash::make('empleado4'),
            'google_id' => '',
            'avatar' => '',
            'role_id' => 3,
        ]);

        //CLIENTE
        User::create([
            'name' => 'Cliente 1',
            'email' => 'cliente1@escapeordie.com',
            'password' => Hash::make('cliente1'),
            'google_id' => '',
            'avatar' => '',
            'role_id' => 2,
        ]);
    }
}
