<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserVelocity;
use App\Models\Velocity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(){
        return  view('supperadmin.contacts-list');
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
            'dob' => 'required',
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
        return redirect()->back()->with('success', ' New User Successfully Add.');
    }
    public function leaderboard(){
        $user_id = auth()->user()->id;
        $velocities = User::where('created_by',$user_id)->get();
      //  return $velocities[1]->uservelocity;
    //   if($velocities[1]->uservelocity[0]->id){
    //     return "SS";
    //   }else{
    //     "NNNN";
    //   }
        return view('supperadmin.leaderboard',compact('velocities'));
    }
    public function grid_view(){
        $user_id = auth()->user()->id;
        $users=User::where('created_by',$user_id)->latest()->get();
        return view('supperadmin.contacts-grid',compact('users'));
    }
}
