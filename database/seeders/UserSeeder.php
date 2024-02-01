<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Suryono',
            'email' => 'petugas@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'petugas',
        ]);
        DB::table('users')->insert([
            'name' => 'Khalid',
            'email' => 'petugas2@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'petugas',
        ]);
        DB::table('users')->insert([
            'name' => 'Eryawan',
            'email' => 'anggota@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'anggota',
        ]);
        DB::table('users')->insert([
            'name' => 'Putri',
            'email' => 'anggota2@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'anggota',
        ]);
        DB::table('users')->insert([
            'name' => 'Frieska',
            'email' => 'anggota3@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'anggota',
        ]);
    }
}
