<?php

namespace Database\Seeders;

use App\Models\Chart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Chart::create([
            'name' => 'Weight',
          
            'key' => 'weight',
            'placeholder' => 'Weight',
            'label' => 'weight_label',
        ]);
        Chart::create([
            'name' => 'Arm Pain',
            
            'key' => 'arm_pain',
            'placeholder' => 'Arm pain',
            'label' => 'arm_pain_label',
        ]);
        Chart::create([
            'name' => 'Pull Down Velocity',
         
            'key' => 'pull_down_velocity',
            'placeholder' => 'Pull Down Velocity',
            'label' => 'pull_down_velocity_label',
        ]);
        Chart::create([
            'name' => 'Mound Throws Velocity',
          
            'key' => 'mound_throws_velocity',
            'placeholder' => 'Mound Throws Velocity',
            'label' => 'mound_throws_velocity_label',
        ]);
        Chart::create([
            'name' => 'Pull Down 3',
            
            'key' => 'pull_down_3',
            'placeholder' => 'Pull Down 3',
            'label' => 'pull_down_3_label',
        ]);
        Chart::create([
            'name' => 'Pull Down 4',
         
            'key' => 'pull_down_4',
            'placeholder' => 'Pull Down 4',
            'label' => 'pull_down_4_label',
        ]);
        Chart::create([
            'name' => 'Pull Down 5',
    
            'key' => 'pull_down_5',
            'placeholder' => 'Pull Down 5',
            'label' => 'pull_down_5_label',
        ]);
        Chart::create([
            'name' => 'Pull Down 6',
    
            'key' => 'pull_down_6',
            'placeholder' => 'Pull Down 6',
            'label' => 'pull_down_6_label',
        ]);
        Chart::create([
            'name' => 'Pull Down 7',
   
            'key' => 'pull_down_7',
            'placeholder' => 'Pull Down 7',
            'label' => 'pull_down_7_label',
        ]);
        Chart::create([
            'name' => 'Long Toss Distance',
          
            'key' => 'long_toss_distance',
            'placeholder' => 'Long Toss Distance',
            'label' => 'long_toss_distance_label',
        ]);
        Chart::create([
            'name' => 'Pylo 7',

            'key' => 'pylo_7',
            'placeholder' => 'Pylo 7',
            'label' => 'pylo_7_label',
        ]);
        Chart::create([
            'name' => 'Pylo 5',
        
            'key' => 'pylo_5',
            'placeholder' => 'Pylo 5',
            'label' => 'pylo_5_label',
        ]);
        Chart::create([
            'name' => 'Pylo 3',
           
            'key' => 'pylo_3',
            'placeholder' => 'Pylo 3',
            'label' => 'pylo_3_label',
        ]);
        Chart::create([
            'name' => 'Bench',
          
            'key' => 'bench',
            'placeholder' => 'Bench',
            'label' => 'bench_label',
        ]);
        Chart::create([
            'name' => 'Squat',
       
            'key' => 'squat',
            'placeholder' => 'Squat',
            'label' => 'squat_label',
        ]);
        Chart::create([
            'name' => 'Deadlift',
 
            'key' => 'deadlift',
            'placeholder' => 'Deadlift',
            'label' => 'deadlift_label',
        ]);
        Chart::create([
            'name' => 'Vertical Jump',
  
            'key' => 'vertical_jump',
            'placeholder' => 'Vertical Jump',
            'label' => 'vertical_jump_label',
        ]);
    }
}
