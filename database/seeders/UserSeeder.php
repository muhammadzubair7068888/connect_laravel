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
     *
     * @return void
     */
    public function run()
    {
        //
        User::create(['name' => 'admin', 'height' => 7, 'starting_weight' => '50Kg', 'handedness' => 'left', 'age' => 22, 'school' => 'international', 'level' => 9, 'role' => 'superadmin', 'status' => 1,'dob' => '2000-10-10', 'email' => 'admin@example.com', 'password' => Hash::make('123456'), 'email_verified_at' => '2022-01-02 17:04:58', 'avatar' => 'images/avatar-1.jpg', 'created_at' => now(),]);
        User::create(['name' => 'coach','height' => 6, 'starting_weight' => '40Kg', 'handedness' => 'left', 'age' => 21, 'school' => 'national', 'level' => 8, 'role' => 'admin', 'status' => 1, 'created_by' => 1, 'dob' => '2000-10-10', 'email' => 'coach@example.com', 'password' => Hash::make('123456'), 'email_verified_at' => '2022-01-02 17:04:58', 'avatar' => 'images/1643281424.jpg', 'created_at' => now(),]);
        User::create(['name' => 'user','height' => 5, 'starting_weight' => '30Kg', 'handedness' => 'left', 'age' => 20, 'school' => 'private', 'level' => 7, 'role' => 'user', 'status' => 1, 'created_by' => 1, 'dob' => '2000-10-10', 'email' => 'athlete@example.com', 'password' => Hash::make('123456'), 'email_verified_at' => '2022-01-02 17:04:58', 'avatar' => 'images/1641266162.jpg', 'created_at' => now(),]);
    }
}
