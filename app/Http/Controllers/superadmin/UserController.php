<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
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
    //  /   return $request->all();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'height' => 'required',
            'starting_weight' => 'required',
            'hand_type' => 'required',
            'dob' => 'required',
            'file' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'school' => 'required',
            'level' => 'required',
            'password' => 'required',
            'role' => 'required',
            'user_status' => 'required',
        ]); 
        $age =34;
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->dob = $request->dob;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $foldername = 'user/profiles/';
            $filename = time() . '-' . rand(0000000, 9999999) . '.' . $request->file('company_logo_light')->extension();
            $file->move(public_path() . '/' . $foldername, $filename);
            $user->avatar = $foldername . $filename;
        }
        $user->height = $request->height;
        $user->starting_weight = $request->starting_weight;
        $user->handedness = $request->hand_type;
        $user->age = $age;
        $user->school = $request->school;
        $user->level = $request->level;
        $user->role = $request->role;
        $user->status = $request->user_status;
        $user->can_create = $request->can_create;
        $user->save();
    }
}
