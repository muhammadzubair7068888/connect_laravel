<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\ExerciseDetail;
use App\Models\ExerciseType;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    //
    public function index()
    {
        $user_id = auth()->user()->id;
        $exercises = Exercise::where('user_id', $user_id)->get();
        return view('supperadmin.exercises', compact('exercises'));
    }
    public function add_exercises()
    {
        $exercises_types = ExerciseType::latest()->get();
        return view('supperadmin.exercises-form', compact('exercises_types'));
    }
    public function save_exercises(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'ex_type' => 'required',
            'description' => 'required',
            'title' => 'required',
            'link' => 'required',
            'sets' => 'required',
            'reps' => 'required',
            'notes' => 'required',
        ]);
        $user_id = auth()->user()->id;
        $exercise = new Exercise();
        $exercise->name = $request->name;
        $exercise->user_id = $user_id;
        $exercise->exercises_type_id = $request->ex_type;
        $exercise->description = $request->description;
        $exercise->save();
        for ($i = 0; $i < count($request->title); $i++) {
            $exercise_detail = new ExerciseDetail();
            $exercise_detail->title = $request->title[$i];
            $exercise_detail->link = $request->link[$i];
            $exercise_detail->sets = $request->sets[$i];
            $exercise_detail->reps = $request->reps[$i];
            $exercise_detail->notes = $request->notes[$i];
            $exercise_detail->exercise_id = $exercise->id;
            $exercise_detail->save();
        }
        return redirect()->route('exercises')->with('success', 'New Exercises Successfully Add.');
    }
    public function detail_exercises($id)
    {
        $exercise_detail = ExerciseDetail::where('exercise_id', $id)->get();
        return view('supperadmin.exercise_detail', compact('exercise_detail'));
    }
    public function edit_exercises($id)
    {
        $exercises_types = ExerciseType::latest()->get();
        $exercises = Exercise::where('id', $id)->first();
        return view('supperadmin.exercise_edit', compact('exercises', 'exercises_types'));
    }
    public function save_edit_exercises(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'ex_type' => 'required',
            'description' => 'required',
            'title' => 'required',
            'link' => 'required',
            'sets' => 'required',
            'reps' => 'required',
            'notes' => 'required',
        ]);
        $exercise = Exercise::find($id);
        $exercise->name = $request->name;
        $exercise->exercises_type_id = $request->ex_type;
        $exercise->description = $request->description;
        $exercise->save();
        ExerciseDetail::where('exercise_id', $id)->delete();
        for ($i = 0; $i < count($request->title); $i++) {
            $exercise_detail = new ExerciseDetail();
            $exercise_detail->title = $request->title[$i];
            $exercise_detail->link = $request->link[$i];
            $exercise_detail->sets = $request->sets[$i];
            $exercise_detail->reps = $request->reps[$i];
            $exercise_detail->notes = $request->notes[$i];
            $exercise_detail->exercise_id = $exercise->id;
            $exercise_detail->save();
        }
        return redirect()->route('exercises')->with('success', 'Exercises  Successfully Update.');
    }
    public function delete_exercise(Request $request)
    {
        Exercise::where('id', $request->exercise_id)->delete();
        return redirect()->route('exercises')->with('success', 'Exercises  Successfully Delete.');
    }
}