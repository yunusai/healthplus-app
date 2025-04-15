<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     'nama' => Str::random(10),
        //     'alamat' => Str::random(10),
        //     'no_hp' => '08123456789',
        //     'email' => Str::random(10) . '@example.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'pasien',
        // ]);

        // User::factory()
        //     ->count(50)
        //     ->create();


        User::create([
            'nama' => 'dokter',
            'alamat' => 'st. george',
            'no_hp' => '08123456789',
            'email' => 'st.george@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'dokter',
        ]);
        User::create([
            'nama' => 'pasien',
            'alamat' => 'st. george1',
            'no_hp' => '08123456789',
            'email' => 'st.geor1ge@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'pasien',
        ]);
        User::create([
            'nama' => 'dokter2',
            'alamat' => 'st. george',
            'no_hp' => '08123456789',
            'email' => 'st.george2@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'dokter',
        ]);
    }
}
