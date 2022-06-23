<?php

namespace Database\Seeders;

use App\Models\Velocity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VelocitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Velocity::create([
            'name' => 'Weight',
            'user_type' => 1,
        ]);
        Velocity::create([
            'name' => 'Arm Pain',
            'user_type' => 1,
        ]);
        Velocity::create([
            'name' => 'Standing Long Toss',
            'user_type' => 1,
        ]);
        Velocity::create([
            'name' => 'Mound Throws Velocity',
            'user_type' => 1,
        ]);
        Velocity::create([
            'name' => 'Pull Down 3',
            'user_type' => 1,
        ]);
        Velocity::create([
            'name' => 'Pull Down 4',
            'user_type' => 1,
        ]);
        Velocity::create([
            'name' => 'Pull Down 5',
            'user_type' => 1,
        ]);
        Velocity::create([
            'name' => 'Pull Down 6',
            'user_type' => 1,
        ]);
        Velocity::create([
            'name' => 'Pull Down 7',
            'user_type' => 1,
        ]);
        Velocity::create([
            'name' => 'Double Crow Hop Distance',
            'user_type' => 1,
        ]);
        Velocity::create([
            'name' => 'kneeling long toss',
            'user_type' => 1,
        ]);
        Velocity::create([
            'name' => 'seated long toss',
            'user_type' => 1,
        ]);
        Velocity::create([
            'name' => 'Bench',
            'user_type' => 1,
        ]);
        Velocity::create([
            'name' => 'Mound Shuffle',
            'user_type' => 1,
        ]);
        Velocity::create([
            'name' => 'Squat',
            'user_type' => 1,
        ]);
        Velocity::create([
            'name' => 'pull ups',
            'user_type' => 1,
        ]);
        Velocity::create([
            'name' => 'Vertical Jump',
            'user_type' => 1,
        ]);



        Velocity::create([
            'name' => 'Weight',
            'user_type' => 2,
        ]);
        Velocity::create([
            'name' => 'Arm Pain',
            'user_type' => 2,
        ]);
        Velocity::create([
            'name' => 'Pull Down Velocity',
            'user_type' => 2,
        ]);
        Velocity::create([
            'name' => 'Mound Throws Velocity',
            'user_type' => 2,
        ]);
        Velocity::create([
            'name' => 'Pull Down 3',
            'user_type' => 2,
        ]);
        Velocity::create([
            'name' => 'Pull Down 4',
            'user_type' => 2,
        ]);
        Velocity::create([
            'name' => 'Pull Down 5',
            'user_type' => 2,
        ]);
        Velocity::create([
            'name' => 'Pull Down 6',
            'user_type' => 2,
        ]);
        Velocity::create([
            'name' => 'Pull Down 7',
            'user_type' => 2,
        ]);
        Velocity::create([
            'name' => 'Long Toss Distance',
            'user_type' => 2,
        ]);
        Velocity::create([
            'name' => 'Pylo 7',
            'user_type' =>2 ,
        ]);
        Velocity::create([
            'name' => 'Pylo 5',
            'user_type' => 2,
        ]);
        Velocity::create([
            'name' => 'Pylo 3',
            'user_type' => 2,
        ]);
        Velocity::create([
            'name' => 'Bench',
            'user_type' => 2,
        ]);
        Velocity::create([
            'name' => 'Squat',
            'user_type' => 2,
        ]);
        Velocity::create([
            'name' => 'Deadlift',
            'user_type' => 2,
        ]);
        Velocity::create([
            'name' => 'Vertical Jump',
            'user_type' => 2,
        ]);
     
    }
}
