<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            "name" => 'Administrator',
        ]);
        Role::create([
            "name" => 'Dokter',
        ]);
        Role::create([
            "name" => 'User',
        ]);
        User::create([
            "name" => "Admin",
            "email" => "admin@admin.com",
            "password" => Hash::make("admin"),
            "phone" => "085231864466",
            "address" => "Bondowoso",
            "role_id" => 1,
        ]);
    }
}
