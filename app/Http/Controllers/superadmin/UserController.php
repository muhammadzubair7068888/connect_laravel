<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\MechanicalAssessment;
use App\Models\PhysicalAssessment;
use App\Models\Questionnaire;
use App\Models\User;
use App\Models\UserVelocity;
use App\Models\Velocity;
use Illuminate\Http\Request;
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

    public function index($id = null){
        $get_id = $id;
        $user_id = auth()->user()->id;
        $users = User::where('created_by',$user_id)->latest()->get();
        return  view('supperadmin.contacts-list',compact('users', 'get_id'));
    }
    public function update_user($id){
         $user = User::find($id);
        return view('supperadmin.update_user',compact('user'));
    }
    public function update_user_save(Request $request, $id){
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
        $user = User::where('id',$id)->orWhere('created_by',$id)->delete();
        return redirect()->route('users')->with('success', 'User Successfully Delete.');

    }
    public function new_user(){
        return view('supperadmin.add_new_user');
    }
    public function add_user(Request $request){
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
        $phy_assessment = PhysicalAssessment::where('user_id',$user_id)->get();
        if($phy_assessment){
            foreach ($phy_assessment as $phy) {
                $user_phy_assessment = new PhysicalAssessment();
                $user_phy_assessment->user_id = $user->id;
                $user_phy_assessment->name = $phy->name;
                $user_phy_assessment->status = 0;
                $user_phy_assessment->save();
            }
        }
        $mach_assessment = MechanicalAssessment::where('user_id',$user_id)->get();
        if($mach_assessment){
            foreach ($mach_assessment as $mach) {
                $user_mach_assessment = new MechanicalAssessment();
                $user_mach_assessment->user_id = $user->id;
                $user_mach_assessment->name = $mach->name;
                $user_mach_assessment->status = 0;
                $user_mach_assessment->save();
            }
        }
        $questions = Questionnaire::where('user_id',$user_id)->get();
        if($questions){
            foreach($questions as $question){
                $user_question = new Questionnaire();
                $user_question->name = $$question->name;
                $user_question->user_id = $user->id;
                $user_question->save();
            }
        }
        return redirect()->back()->with('success', ' New User Successfully Add.');
    }
    public function leaderboard(){
        $user_id = auth()->user()->id;
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'admin'){
            $velocities = User::where('created_by', $user_id)->get();
        }else{
            $velocities = User::where('id', $user_id)->get();
        }
        return view('supperadmin.leaderboard',compact('velocities'));
    }
    public function grid_view(){
        $user_id = auth()->user()->id;
        $users=User::where('created_by',$user_id)->latest()->get();
        return view('supperadmin.contacts-grid',compact('users'));
    }
    public function user_view($id){
        $user = User::where('id',$id)->first();
        return view('supperadmin.user_view',compact('user'));
    }
}
