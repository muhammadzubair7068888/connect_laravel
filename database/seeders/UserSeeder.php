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
        User::create(['name' => 'admin', 'pitcher_Id' => '11111', 'height' => 7, 'starting_weight' => '50Kg', 'handedness' => 'left', 'age' => 22, 'school' => 'international', 'level' => 9, 'role' => 'superadmin', 'created_by' => 0, 'dob' => '2000-10-10', 'email' => 'admin@example.com', 'password' => Hash::make('123456'), 'email_verified_at' => '2022-01-02 17:04:58', 'created_at' => now(),]);
        User::create(['name' => 'coach','height' => 6, 'pitcher_Id' => '222222', 'starting_weight' => '40Kg', 'handedness' => 'left', 'age' => 21, 'school' => 'national', 'level' => 8, 'role' => 'admin' , 'created_by' => 1, 'dob' => '2000-10-10', 'email' => 'coach@example.com', 'password' => Hash::make('123456'), 'email_verified_at' => '2022-01-02 17:04:58', 'created_at' => now(),]);
        User::create(['name' => 'user','height' => 5,'pitcher_Id' => '333333', 'starting_weight' => '30Kg', 'handedness' => 'left', 'age' => 20, 'school' => 'private', 'level' => 7, 'role' => 'user',  'created_by' => 1, 'dob' => '2000-10-10', 'email' => 'athlete@example.com', 'password' => Hash::make('123456'), 'email_verified_at' => '2022-01-02 17:04:58', 'created_at' => now(),]);
        User::create([
            'first_name' => 'Florentino', 
            'last_name' => 'Darling',
            'pitcher_Id' => '678918',
            'height' => 5, 
            'starting_weight' => '30Kg', 
            'handedness' => 'left', 
            'age' => 20, 
            'school' => 'private', 
            'level' => 7, 
            'role' => 'user',  
            'created_by' => 1, 
            'dob' => '2000-10-10', 
            'email' => 'florentino@example.com', 
            'password' => Hash::make('123456'), 
            'email_verified_at' => 
            '2022-01-02 17:04:58', 
            'created_at' => now(),
        ]);
        User::create([
            'first_name' => 'Witt',
            'last_name' => 'Nathan',
            'pitcher_Id' => '676739',
            'height' => 5,
            'starting_weight' => '30Kg',
            'handedness' => 'left',
            'age' => 20,
            'school' => 'private',
            'level' => 7,
            'role' => 'user',
            'created_by' => 1,
            'dob' => '2000-10-10',
            'email' => 'witt@example.com',
            'password' => Hash::make('123456'),
            'email_verified_at' =>
            '2022-01-02 17:04:58',
            'created_at' => now(),
        ]);
        User::create([
            'first_name' => 'Peoples',
            'last_name' => 'Ben',
            'pitcher_Id' => '687239',
            'height' => 5,
            'starting_weight' => '30Kg',
            'handedness' => 'left',
            'age' => 20,
            'school' => 'private',
            'level' => 7,
            'role' => 'user',
            'created_by' => 1,
            'dob' => '2000-10-10',
            'email' => 'peoples@example.com',
            'password' => Hash::make('123456'),
            'email_verified_at' =>
            '2022-01-02 17:04:58',
            'created_at' => now(),
        ]);
        User::create([
            'first_name' => 'Clouse',
            'last_name' => 'Corbin',
            'pitcher_Id' => '641462',
            'height' => 5,
            'starting_weight' => '30Kg',
            'handedness' => 'left',
            'age' => 20,
            'school' => 'private',
            'level' => 7,
            'role' => 'user',
            'created_by' => 1,
            'dob' => '2000-10-10',
            'email' => 'clouse@example.com',
            'password' => Hash::make('123456'),
            'email_verified_at' =>
            '2022-01-02 17:04:58',
            'created_at' => now(),
        ]);
        User::create([
            'first_name' => 'Spain',
            'last_name' => 'Dylan',
            'pitcher_Id' => '688125',
            'height' => 5,
            'starting_weight' => '30Kg',
            'handedness' => 'left',
            'age' => 20,
            'school' => 'private',
            'level' => 7,
            'role' => 'user',
            'created_by' => 1,
            'dob' => '2000-10-10',
            'email' => 'spain@example.com',
            'password' => Hash::make('123456'),
            'email_verified_at' =>
            '2022-01-02 17:04:58',
            'created_at' => now(),
        ]);
        User::create([
            'first_name' => 'Whitten',
            'last_name' => 'Kyle',
            'pitcher_Id' => '671093',
            'height' => 5,
            'starting_weight' => '30Kg',
            'handedness' => 'left',
            'age' => 20,
            'school' => 'private',
            'level' => 7,
            'role' => 'user',
            'created_by' => 1,
            'dob' => '2000-10-10',
            'email' => 'whitten@example.com',
            'password' => Hash::make('123456'),
            'email_verified_at' =>
            '2022-01-02 17:04:58',
            'created_at' => now(),
        ]);
        User::create([
            'first_name' => 'Corona',
            'last_name' => 'Reibyn',
            'pitcher_Id' => '685473',
            'height' => 5,
            'starting_weight' => '30Kg',
            'handedness' => 'left',
            'age' => 20,
            'school' => 'private',
            'level' => 7,
            'role' => 'user',
            'created_by' => 1,
            'dob' => '2000-10-10',
            'email' => 'corona@example.com',
            'password' => Hash::make('123456'),
            'email_verified_at' =>
            '2022-01-02 17:04:58',
            'created_at' => now(),
        ]);

        User::create([
            'first_name' => 'Niekro',
            'last_name' => 'J.J.',
            'pitcher_Id' => '673908',
            'height' => 5,
            'starting_weight' => '30Kg',
            'handedness' => 'left',
            'age' => 20,
            'school' => 'private',
            'level' => 7,
            'role' => 'user',
            'created_by' => 1,
            'dob' => '2000-10-10',
            'email' => 'niekro@example.com',
            'password' => Hash::make('123456'),
            'email_verified_at' =>
            '2022-01-02 17:04:58',
            'created_at' => now(),
        ]);

        User::create([
            'first_name' => 'Ayala',
            'last_name' => 'Alexander',
            'pitcher_Id' => '694809',
            'height' => 5,
            'starting_weight' => '30Kg',
            'handedness' => 'left',
            'age' => 20,
            'school' => 'private',
            'level' => 7,
            'role' => 'user',
            'created_by' => 1,
            'dob' => '2000-10-10',
            'email' => 'ayala@example.com',
            'password' => Hash::make('123456'),
            'email_verified_at' =>
            '2022-01-02 17:04:58',
            'created_at' => now(),
        ]);

        User::create([
            'first_name' => 'Solano',
            'last_name' => 'Kevin',
            'pitcher_Id' => '683755',
            'height' => 5,
            'starting_weight' => '30Kg',
            'handedness' => 'left',
            'age' => 20,
            'school' => 'private',
            'level' => 7,
            'role' => 'user',
            'created_by' => 1,
            'dob' => '2000-10-10',
            'email' => 'solano@example.com',
            'password' => Hash::make('123456'),
            'email_verified_at' =>
            '2022-01-02 17:04:58',
            'created_at' => now(),
        ]);

        User::create([
            'first_name' => 'Dryer',
            'last_name' => 'Conor',
            'pitcher_Id' => '679056',
            'height' => 5,
            'starting_weight' => '30Kg',
            'handedness' => 'left',
            'age' => 20,
            'school' => 'private',
            'level' => 7,
            'role' => 'user',
            'created_by' => 1,
            'dob' => '2000-10-10',
            'email' => 'dryer@example.com',
            'password' => Hash::make('123456'),
            'email_verified_at' =>
            '2022-01-02 17:04:58',
            'created_at' => now(),
        ]);
        User::create([
            'first_name' => 'Joseph',
            'last_name' => 'Elison',
            'pitcher_Id' => '693176',
            'height' => 5,
            'starting_weight' => '30Kg',
            'handedness' => 'left',
            'age' => 20,
            'school' => 'private',
            'level' => 7,
            'role' => 'user',
            'created_by' => 1,
            'dob' => '2000-10-10',
            'email' => 'joseph@example.com',
            'password' => Hash::make('123456'),
            'email_verified_at' =>
            '2022-01-02 17:04:58',
            'created_at' => now(),
        ]);
        User::create([
            'first_name' => 'Alesandro',
            'last_name' => 'Ronaldo',
            'pitcher_Id' => '682551',
            'height' => 5,
            'starting_weight' => '30Kg',
            'handedness' => 'left',
            'age' => 20,
            'school' => 'private',
            'level' => 7,
            'role' => 'user',
            'created_by' => 1,
            'dob' => '2000-10-10',
            'email' => 'alesandro@example.com',
            'password' => Hash::make('123456'),
            'email_verified_at' =>
            '2022-01-02 17:04:58',
            'created_at' => now(),
        ]);
        User::create([
            'first_name' => 'Rivera',
            'last_name' => 'Juan',
            'pitcher_Id' => '686309',
            'height' => 5,
            'starting_weight' => '30Kg',
            'handedness' => 'left',
            'age' => 20,
            'school' => 'private',
            'level' => 7,
            'role' => 'user',
            'created_by' => 1,
            'dob' => '2000-10-10',
            'email' => 'rivera@example.com',
            'password' => Hash::make('123456'),
            'email_verified_at' =>
            '2022-01-02 17:04:58',
            'created_at' => now(),
        ]);
      
    }
}
