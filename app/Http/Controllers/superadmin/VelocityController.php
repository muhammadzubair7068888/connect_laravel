<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\UserVelocity;
use App\Models\Velocity;
use Illuminate\Http\Request;

class VelocityController extends Controller
{
    //
    public function index(){
        $user_id = auth()->user()->id;
        $velocities = Velocity::where('user_type',1)->latest()->get();
        $user_velocities = UserVelocity::where('user_id',$user_id)->latest()->get();
        return view('supperadmin.velocity',compact('velocities', 'user_velocities'));
    }
    public function save_velocity(Request $request){
        $request->validate([
            
            'date' => 'required',
            'value' => 'required',
            'velocity_type' => 'required',
        ]);
        $user_id = auth()->user()->id;
        $user_velocity = new UserVelocity();
        $user_velocity->user_id = $user_id;
        $user_velocity->velocity_id = $request->velocity_type;
        $user_velocity->date = $request->date;
        $user_velocity->value = $request->value;
        $user_velocity->save();
        return redirect()->back()->with('success', 'New Velocity Successfully Add.');
    }
    public function delte_velocity(Request $request){
        $user_velocities = UserVelocity::where('id',$request->velocity_id)->delete();
        return redirect()->back()->with('success', 'Velocity Successfully Delete.');
    }
}
