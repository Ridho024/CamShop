<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $userAdmin = [
            [
                'username' => 'Dear God',
                'role' => 'Admin',
                'email' => 'deargod123@gmail.com',
                'password' => 'deargod123',
            ],

            [
                'username' => 'John Doe', 
                'role' => 'Admin',
                'email' => 'johndoe321@gmail.com',
                'password' => 'John123',
            ],
        ];

        foreach ($userAdmin as $admin) {
            User::insert([
                'username' => $admin['username'],
                'role' => $admin['role'],
                'email' => $admin['email'],
                'password' => bcrypt($admin['password']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
