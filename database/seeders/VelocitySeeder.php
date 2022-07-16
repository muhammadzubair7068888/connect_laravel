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
            'admin_id' => 1,
            'key' => 'weight',
            'placeholder' => 'Weight',
            'label' => 'weight_label',
        ]);
        Velocity::create([
            'name' => 'Arm Pain',
            'admin_id' => 1,
            'key' => 'arm_pain',
            'placeholder' => 'Arm Pain',
            'label' => 'arm_pain_label',
        ]);
        Velocity::create([
            'name' => 'Standing Long Toss',
            'admin_id' => 1,
            'key' => 'pull_down_velocity',
            'placeholder' => 'Pull Down Velocity',
            'label' => 'pull_down_velocity_label',
        ]);
        Velocity::create([
            'name' => 'Mound Throws Velocity',
            'admin_id' => 1,
            'key' => 'mound_throws_velocity',
            'placeholder' => 'Mound Throws Velocity',
            'label' => 'mound_throws_velocity_label',
        ]);
        Velocity::create([
            'name' => 'Pull Down 3',
            'admin_id' => 1,
            'key' => 'pull_down_3',
            'placeholder' => 'Pull Down 3',
            'label' => 'pull_down_3_label',
        ]);
        Velocity::create([
            'name' => 'Pull Down 4',
            'admin_id' => 1,
            'key' => 'pull_down_4',
            'placeholder' => 'Pull Down 4',
            'label' => 'pull_down_4_label',
        ]);
        Velocity::create([
            'name' => 'Pull Down 5',
            'admin_id' => 1,
            'key' => 'pull_down_5',
            'placeholder' => 'Pull Down 5',
            'label' => 'pull_down_5_label',
        ]);
        Velocity::create([
            'name' => 'Pull Down 6',
            'admin_id' => 1,
            'key' => 'pull_down_6',
            'placeholder' => 'Pull Down 6',
            'label' => 'pull_down_6_label',
        ]);
        Velocity::create([
            'name' => 'Pull Down 7',
            'admin_id' => 1,
            'key' => 'pull_down_7',
            'placeholder' => 'Pull Down 7',
            'label' => 'pull_down_7_label',
        ]);
        Velocity::create([
            'name' => 'Double Crow Hop Distance',
            'admin_id' => 1,
            'key' => 'long_toss_distance',
            'placeholder' => 'Long Toss Distance',
            'label' => 'long_toss_distance_label',
        ]);
        Velocity::create([
            'name' => 'kneeling long toss',
            'admin_id' => 1,
            'key' => 'pylo_7',
            'placeholder' => 'Pylo 7',
            'label' => 'pylo_7_label',
        ]);
        Velocity::create([
            'name' => 'seated long toss',
            'admin_id' => 1,
            'key' => 'pylo_5',
            'placeholder' => 'Pylo 5',
            'label' => 'pylo_5_label',
        ]);
        Velocity::create([
            'name' => 'Bench',
            'admin_id' => 1,
            'key' => 'pylo_3',
            'placeholder' => 'Pylo 3',
            'label' => 'pylo_3_label',
        ]);
        Velocity::create([
            'name' => 'Mound Shuffle',
            'admin_id' => 1,
            'key' => 'bench',
            'placeholder' => 'Bench',
            'label' => 'bench_label',
        ]);
        Velocity::create([
            'name' => 'Squat',
            'admin_id' => 1,
            'key' => 'squat',
            'placeholder' => 'Squat',
            'label' => 'squat_label',
        ]);
        Velocity::create([
            'name' => 'pull ups',
            'admin_id' => 1,
            'key' => 'deadlift',
            'placeholder' => 'Deadlift',
            'label' => 'deadlift_label',
        ]);
        Velocity::create([
            'name' => 'Vertical Jump',
            'admin_id' => 1,
            'key' => 'vertical_jump',
            'placeholder' => 'Vertical Jump',
            'label' => 'vertical_jumb_label',
        ]);
        Velocity::create([
            'name' => 'Weight',
            'admin_id' => 2,
            'key' => 'weight',
            'placeholder' => 'Weight',
            'label' => 'weight_label',
        ]);
        Velocity::create([
            'name' => 'Arm Pain',
            'admin_id' => 2,
            'key' => 'arm_pain',
            'placeholder' => 'Arm pain',
            'label' => 'arm_pain_label',
        ]);
        Velocity::create([
            'name' => 'Pull Down Velocity',
            'admin_id' => 2,
            'key' => 'pull_down_velocity',
            'placeholder' => 'Pull Down Velocity',
            'label' => 'pull_down_velocity_label',
        ]);
        Velocity::create([
            'name' => 'Mound Throws Velocity',
            'admin_id' => 2,
            'key' => 'mound_throws_velocity',
            'placeholder' => 'Mound Throws Velocity',
            'label' => 'mound_throws_velocity_label',
        ]);
        Velocity::create([
            'name' => 'Pull Down 3',
            'admin_id' => 2,
            'key' => 'pull_down_3',
            'placeholder' => 'Pull Down 3',
            'label' => 'pull_down_3_label',
        ]);
        Velocity::create([
            'name' => 'Pull Down 4',
            'admin_id' => 2,
            'key' => 'pull_down_4',
            'placeholder' => 'Pull Down 4',
            'label' => 'pull_down_4_label',
        ]);
        Velocity::create([
            'name' => 'Pull Down 5',
            'admin_id' => 2,
            'key' => 'pull_down_5',
            'placeholder' => 'Pull Down 5',
            'label' => 'pull_down_5_label',
        ]);
        Velocity::create([
            'name' => 'Pull Down 6',
            'admin_id' => 2,
            'key' => 'pull_down_6',
            'placeholder' => 'Pull Down 6',
            'label' => 'pull_down_6_label',
        ]);
        Velocity::create([
            'name' => 'Pull Down 7',
            'admin_id' => 2,
            'key' => 'pull_down_7',
            'placeholder' => 'Pull Down 7',
            'label' => 'pull_down_7_label',
        ]);
        Velocity::create([
            'name' => 'Long Toss Distance',
            'admin_id' => 2,
            'key' => 'long_toss_distance',
            'placeholder' => 'Long Toss Distance',
            'label' => 'long_toss_distance_label',
        ]);
        Velocity::create([
            'name' => 'Pylo 7',
            'admin_id' => 2,
            'key' => 'pylo_7',
            'placeholder' => 'Pylo 7',
            'label' => 'pylo_7_label',
        ]);
        Velocity::create([
            'name' => 'Pylo 5',
            'admin_id' => 2,
            'key' => 'pylo_5',
            'placeholder' => 'Pylo 5',
            'label' => 'pylo_5_label',
        ]);
        Velocity::create([
            'name' => 'Pylo 3',
            'admin_id' => 2,
            'key' => 'pylo_3',
            'placeholder' => 'Pylo 3',
            'label' => 'pylo_3_label',
        ]);
        Velocity::create([
            'name' => 'Bench',
            'admin_id' => 2,
            'key' => 'bench',
            'placeholder' => 'Bench',
            'label' => 'bench_label',
        ]);
        Velocity::create([
            'name' => 'Squat',
            'admin_id' => 2,
            'key' => 'squat',
            'placeholder' => 'Squat',
            'label' => 'squat_label',
        ]);
        Velocity::create([
            'name' => 'Deadlift',
            'admin_id' => 2,
            'key' => 'deadlift',
            'placeholder' => 'Deadlift',
            'label' => 'deadlift_label',
        ]);
        Velocity::create([
            'name' => 'Vertical Jump',
            'admin_id' => 2,
            'key' => 'vertical_jump',
            'placeholder' => 'Vertical Jump',
            'label' => 'vertical_jump_label',
        ]);
    }
}