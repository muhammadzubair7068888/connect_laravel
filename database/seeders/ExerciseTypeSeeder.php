<?php

namespace Database\Seeders;

use App\Models\ExerciseType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExerciseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ExerciseType::create([
            'name' => 'Lifting',
        ]);
        ExerciseType::create([
            'name' => 'Mobility',
        ]);
        ExerciseType::create([
            'name' => 'Throwing',
        ]);

    }
}
