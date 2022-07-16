<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Chart;
use App\Models\MechanicalAssessment;
use App\Models\PhysicalAssessment;
use App\Models\Questionnaire;
use App\Models\User;
use App\Models\UserVelocity;
use App\Models\Velocity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function login(Request $req)
    // {
    //     return $date = now();
    //     $admin = User::where('email', $req->email)->first();
    //     if (!$admin || !Hash::check($req->password, $admin->password)) {
    //         return redirect()->back()->with('error', 'Email or Password is invalid!');
    //     } else {
    //         session()->put('admin', $admin);

    //     }
    //     return redirect()->route('root');
    // }

    // public function logout()
    // {
    //     session()->pull('admin');
    //     return redirect()->route('login');
    // }

    public function index($id = null)
    {
        $get_id = $id;
        $user_id = auth()->user()->id;
        $users = User::where('created_by', $user_id)->latest()->get();
        return  view('supperadmin.contacts-list', compact('users', 'get_id'));
    }
    public function update_user($id)
    {
        $user = User::find($id);
        return view('supperadmin.update_user', compact('user'));
    }
    public function update_user_save(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'height' => 'required',
            'starting_weight' => 'required',
            'hand_type' => 'required',
            'age' => 'required',
            'school' => 'required',
            'level' => 'required',
            'role' => 'required',
            'user_status' => 'required',
        ]);
        $user = User::find($id);
        if ($request->file('file')) {
            $file = $request->file('file');
            $foldername = 'user/profiles/';
            $filename = time() . '-' . rand(0000000, 9999999) . '.' . $request->file('file')->extension();
            $file->move(public_path() . '/' . $foldername, $filename);
            $user->avatar = $foldername . $filename;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->height = $request->height;
        $user->starting_weight = $request->starting_weight;
        $user->handedness = $request->hand_type;
        $user->age = $request->age;
        $user->school = $request->school;
        $user->level = $request->level;
        $user->role = $request->role;
        $user->status = $request->user_status;
        $user->save();
        return redirect()->route('users')->with('success', 'User Successfully Update.');
    }
    public function delete_user($id)
    {
        $user = User::where('id', $id)->orWhere('created_by', $id)->delete();
        return redirect()->route('users')->with('success', 'User Successfully Delete.');
    }
    public function new_user()
    {
        return view('supperadmin.add_new_user');
    }
    public function add_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'height' => 'required',
            'starting_weight' => 'required',
            'hand_type' => 'required',
            'age' => 'required',
            'file' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'school' => 'required',
            'level' => 'required',
            'password' => 'required|confirmed|min:6',
            'role' => 'required',
            'user_status' => 'required',
        ]);
        $user_id = auth()->user()->id;
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // $user->dob = $request->dob;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $foldername = 'user/profiles/';
            $filename = time() . '-' . rand(0000000, 9999999) . '.' . $request->file('file')->extension();
            $file->move(public_path() . '/' . $foldername, $filename);
            $user->avatar = $foldername . $filename;
        }
        $user->height = $request->height;
        $user->starting_weight = $request->starting_weight;
        $user->handedness = $request->hand_type;
        $user->age = $request->age;
        $user->school = $request->school;
        $user->level = $request->level;
        $user->role = $request->role;
        $user->status = $request->user_status;
        $user->created_by = $user_id;
        $user->save();
        $phy_assessment = PhysicalAssessment::where('user_id', $user_id)->get();
        if ($phy_assessment) {
            foreach ($phy_assessment as $phy) {
                $user_phy_assessment = new PhysicalAssessment();
                $user_phy_assessment->user_id = $user->id;
                $user_phy_assessment->name = $phy->name;
                $user_phy_assessment->status = 0;
                $user_phy_assessment->save();
            }
        }
        $mach_assessment = MechanicalAssessment::where('user_id', $user_id)->get();
        if ($mach_assessment) {
            foreach ($mach_assessment as $mach) {
                $user_mach_assessment = new MechanicalAssessment();
                $user_mach_assessment->user_id = $user->id;
                $user_mach_assessment->name = $mach->name;
                $user_mach_assessment->status = 0;
                $user_mach_assessment->save();
            }
        }
        $questions = Questionnaire::where('user_id', $user_id)->get();
        if ($questions) {
            foreach ($questions as $question) {
                $user_question = new Questionnaire();
                $user_question->name = $question->name;
                $user_question->user_id = $user->id;
                $user_question->save();
            }
        }
        if($user->role == 'admin'){
            $charts = Chart::get();
            foreach($charts as $chart){
            $velocity = new Velocity();
            $velocity->admin_id = $user->id;
            $velocity->name = $chart->name;
            $velocity->key = $chart->key;
            $velocity->label = $chart->label;
            $velocity->placeholder = $chart->placeholder;
            $velocity->save();
            }   
        }
        return redirect()->back()->with('success', ' New User Successfully Add.');
    }
    public function leaderboard()
    {
        $user_id = auth()->user()->id;
        if (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin') {
            $velocities = User::where('created_by', $user_id)->get();
            $velocity_names = Velocity::where('admin_id', $user_id)->get();
        } else {
            $velocities = User::where('id', $user_id)->get();
            $velocity_names = Velocity::where('admin_id', auth()->user()->created_by)->get();
        }

        return view('supperadmin.leaderboard', compact('velocities', 'velocity_names'));
    }
    public function filter_leaderboard(Request $request)
    {
        $request->validate([
            'start' => 'required',
            'end' => 'required',
        ]);
        $user_id = auth()->user()->id;
        $start = strtotime($request->start);
        $end = strtotime($request->end);
        $start_date =  date('Y-m-d', $start);
        $end_date = date('Y-m-d', $end);
        if (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin') {
            $velocities = User::where('created_by', $user_id)->with(['uservelocity' => function ($query) use ($start_date, $end_date) {
                $query->whereBetween('date', [$start_date, $end_date]);
            }])->get();
            $velocity_names = Velocity::where('admin_id', $user_id)->get();
        } else {
            $velocities = User::where('id', $user_id)->with(['uservelocity' => function ($query) use ($start_date, $end_date) {
                $query->whereBetween('date', [$start_date, $end_date]);
            }])->get();
            $velocity_names = Velocity::where('admin_id', auth()->user()->created_by)->get();
        }
        return view('supperadmin.leaderboard', compact('velocities', 'velocity_names'));
    }
    public function grid_view()
    {
        $user_id = auth()->user()->id;
        $users = User::where('created_by', $user_id)->latest()->get();
        return view('supperadmin.contacts-grid', compact('users'));
    }
    public function user_view($id)
    {
        $user = User::where('id', $id)->first();
        return view('supperadmin.user_view', compact('user'));
    }
    public function passport_api(){

       
        return redirect()->route('chart.velocity');
    }
}