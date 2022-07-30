<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\ExerciseDetail;
use App\Models\ExerciseType;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Null_;

class ExerciseController extends Controller
{
    //
    public function index()
    {
        $user_id = auth()->user()->id;
        $users = User::where('role', 'admin')
            ->latest()
            ->get();
        $exercises = Exercise::where('user_id', $user_id)->get();
        return view('supperadmin.exercises', compact('exercises', 'users'));
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
        $exercise->name = "6-4-5 bullpen " . $request->name;
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
        return redirect()
            ->route('exercises')
            ->with('success', 'New Exercises Successfully Add.');
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
        return view(
            'supperadmin.exercise_edit',
            compact('exercises', 'exercises_types')
        );
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
        $exercise->name =  $request->name;
        $exercise->exercises_type_id = $request->ex_type;
        $exercise->description = $request->description;
        $exercise->copy_id = null;
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
        return redirect()
            ->route('exercises')
            ->with('success', 'Exercises  Successfully Update.');
    }
    public function delete_exercise(Request $request)
    {
        Exercise::where('id', $request->exercise_id)->delete();
        return redirect()
            ->route('exercises')
            ->with('success', 'Exercises  Successfully Delete.');
    }
    public function copy_exercise($id)
    {
        $user_id = auth()->user()->id;
        $exercise = Exercise::find($id);
        $name = $exercise->name . '-Copy';
        $copy_exercise = new Exercise();
        $copy_exercise->user_id = $user_id;
        $copy_exercise->name = $name;
        $copy_exercise->exercises_type_id = $exercise->exercises_type_id;
        $copy_exercise->description = $exercise->description;
        $copy_exercise->copy_id = $id;
        $copy_exercise->save();
        foreach ($exercise->excercise_detail as $detail) {
            $copy_detail = new ExerciseDetail();
            $copy_detail->title = $detail->title;
            $copy_detail->link = $detail->link;
            $copy_detail->sets = $detail->sets;
            $copy_detail->reps = $detail->reps;
            $copy_detail->notes = $detail->notes;
            $copy_detail->exercise_id = $copy_exercise->id;
            $copy_detail->save();
        }
        return redirect()
            ->route('exercises')
            ->with('success', 'Exercises  Successfully Copy.');
        // $exercises = Exercise::where('user_id', $user_id)->get();
        // return response()->json($exercises);
    }
    public function shair_exercise(Request $request)
    {
        $id = $request->exercise_id;
        $user_id = $request->user;
        $parent_id = Exercise::where('parent_id', $id)
            ->where('user_id', $user_id)
            ->first();
        if ($parent_id) {
            return response()->json('success');
        }
        $exercise = Exercise::find($id);
        $shair_exercise = new Exercise();
        $shair_exercise->name =  $exercise->name;
        $shair_exercise->user_id = $user_id;
        $shair_exercise->exercises_type_id = $exercise->exercises_type_id;
        $shair_exercise->description = $exercise->description;
        $shair_exercise->parent_id = $id;
        $shair_exercise->save();
        foreach ($exercise->excercise_detail as $detail) {
            $shair_detail = new ExerciseDetail();
            $shair_detail->title = $detail->title;
            $shair_detail->link = $detail->link;
            $shair_detail->sets = $detail->sets;
            $shair_detail->reps = $detail->reps;
            $shair_detail->notes = $detail->notes;
            $shair_detail->exercise_id = $shair_exercise->id;
            $shair_detail->save();
        }
        return response()->json('success');
    }
    public function shadule_calender(Request $request)
    {

        if ($request->ajax()) {
            return @Schedule::where('user_id', $request->id)->first('events')->events ?? '[]';
        }
        $users = User::where('created_by', auth()->id())->get(['id', 'name'])
            ->prepend(['id' => auth()->id(), 'name' => 'Me'])->toArray();
        $exercises = Exercise::where('user_id', auth()->id())->latest()->get();
        return view('supperadmin.schedule', compact('exercises', 'users'));
    }

    public function schedule_update(Request $request)
    {
        Schedule::updateOrCreate(
            ['user_id' => $request->id],
            [
                'events' => $request->events,
            ]
        );
        return response()->json(['success' => true, 'msg' => 'Schedule Successfully Updated.']);
    }
    public function schedule_print(Request $request)
    {
        $schedule = Schedule::where('user_id', $request->user)->first();
        $events = json_decode($schedule->events, true);
        $date = date('Y-m-d', strtotime($request->date));
        $tasks = array_filter($events, function ($arr) use ($date) {
            return in_array($date, $arr);
        });
        return view('supperadmin.schedule-print', compact('tasks'));
    }

    public function schedule_view(Exercise $exercise)
    {
        return view('supperadmin.schedule-exercise-detail', compact('exercise'));
    }

    public function update_exercise_strength(ExerciseDetail $exercise_detail, Request $request)
    {
        $exercise_detail->strength = $request->strength;
        $exercise_detail->save();
        return response()->json(['success' => true, 'msg' => 'Strength Successfully Updated.']);
    }
    public function import_exercise(Request $request)
    {
         try{
        $path = $request->file('file')->getRealPath();
        $records = array_map('str_getcsv', file($path));
        if (!count($records) > 0) {
            return back()->with('error', 'Something Is Wrong!');
        }
        $fields = array_map('strtolower', $records[0]);
        array_shift($records);
        foreach ($records as $record) {
            if (count($fields) != count($record)) {
               return back()->with('error', 'Invailed Dat!');;
            }
            $record =  array_map("html_entity_decode", $record);
            $record = array_combine($fields, $record);
            $this->rows[] = $this->clear_encoding_str($record);
                
        }
         
        $user_id = auth()->user()->id;
        foreach ($this->rows as $data) {
              $ex_type = ExerciseType::where('name',$data['exercise_type'])->first();
            if($ex_type){
                $type_id = $ex_type->id;
            }else{
                $type_id = 1;
            }
            $exercise = new Exercise();
            $exercise->name ="6-4-5 bullpen ".$data['name'];
            $exercise->user_id = $user_id;
            $exercise->exercises_type_id = $type_id; //$request->ex_type;
            $exercise->description = $data['description'];
            $exercise->save();
            $shair_detail = new ExerciseDetail();
            $shair_detail->title = $data['title'];
            $shair_detail->link = $data['link'];
            $shair_detail->sets = $data['sets'];
            $shair_detail->reps = $data['reps'];
            $shair_detail->notes = $data['notes'];
            $shair_detail->exercise_id = $exercise->id;
            $shair_detail->save();
        }
        } catch (\Throwable $th) {
            $response = [
                'error' => false,
                'message' => $th->getMessage(),
            ];
            return back()->with('error', $th->getMessage());
        }
        return back()->with('success', 'CVS file success full Imoprt');
    }
    private function clear_encoding_str($value)
    {
        if (is_array($value)) {
            $clean = [];
            foreach ($value as $key => $val) {
                $clean[$key] = mb_convert_encoding($val, 'UTF-8', 'UTF-8');
            }
            return $clean;
        }
        return mb_convert_encoding($value, 'UTF-8', 'UTF-8');
    }
    public function demo_exercise(){
      $path  = 'demo/import_file_demo.csv';
        return response()->download($path);
    }
  
}