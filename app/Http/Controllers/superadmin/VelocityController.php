<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserVelocity;
use App\Models\Velocity;
use Illuminate\Http\Request;

class VelocityController extends Controller
{
    //
    public function index(){
        if (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin') {
            $user_id = auth()->user()->id;
        } else {
            $user_id = auth()->user()->created_by;
        }
        $velocities = Velocity::where('admin_id',$user_id)->latest()->get();
        $user_velocities = UserVelocity::where('user_id',auth()->user()->id)->latest()->get();
        return view('supperadmin.velocity',compact('velocities', 'user_velocities'));
    }
    public function save_velocity(Request $request){
        $request->validate([
            
            'date' => 'required',
            'value' => 'required',
            'velocity_type' => 'required',
        ]);
        $key = Velocity::where('id',$request->velocity_type)->first('key')->key;
        $user_id = auth()->user()->id;
        $user_velocity = new UserVelocity();
        $user_velocity->user_id = $user_id;
        $user_velocity->velocity_id = $request->velocity_type;
        $user_velocity->date = $request->date;
        $user_velocity->value = $request->value;
        $user_velocity->velocity_key = $key;
        $user_velocity->save();
        return redirect()->back()->with('success', 'New Velocity Successfully Add.');
    }
    public function delte_velocity(Request $request){
        $user_velocities = UserVelocity::where('id',$request->velocity_id)->delete();
        return redirect()->back()->with('success', 'Velocity Successfully Delete.');
    }
    public function chart_velocity(){
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin'){
             $user_id = auth()->user()->id;
        }else{
             $user_id = auth()->user()->created_by;
        }
         $velocities =Velocity::where('admin_id',$user_id)->where('status','1')->get();
        $users = User::where('created_by',$user_id)->latest()->get();
        $day = date('d');
        $mounth = date('m');
            for ($i = 1; $i <= 30; $i++) {
                $weight[] = UserVelocity::where('user_id', auth()->user()->id)->where('velocity_key','weight')->whereDay('date', $i)->whereMonth('date', $mounth)->sum('value');
                $arm_pain[] = UserVelocity::where('user_id', auth()->user()->id)->where('velocity_key', 'arm_pain')->whereDay('date', $i)->whereMonth('date', $mounth)->sum('value');
                $pull_down_velocity[] = UserVelocity::where('user_id', auth()->user()->id)->where('velocity_key', 'pull_down_velocity')->whereDay('date', $i)->whereMonth('date', $mounth)->sum('value');
                $mount_throw_velocit[] = UserVelocity::where('user_id', auth()->user()->id)->where('velocity_key', 'mound_throws_velocity')->whereDay('date', $i)->whereMonth('date', $mounth)->sum('value');
                $pull_down_3[] = UserVelocity::where('user_id', auth()->user()->id)->where('velocity_key', 'pull_down_3')->whereDay('date', $i)->whereMonth('date', $mounth)->sum('value');
                $pull_down_4[] = UserVelocity::where('user_id', auth()->user()->id)->where('velocity_key', 'pull_down_4')->whereDay('date', $i)->whereMonth('date', $mounth)->sum('value');
                $pull_down_5[] = UserVelocity::where('user_id', auth()->user()->id)->where('velocity_key', 'pull_down_5')->whereDay('date', $i)->whereMonth('date', $mounth)->sum('value');
                $pull_down_6[] = UserVelocity::where('user_id', auth()->user()->id)->where('velocity_key', 'pull_down_6')->whereDay('date', $i)->whereMonth('date', $mounth)->sum('value');
                $pull_down_7[] = UserVelocity::where('user_id', auth()->user()->id)->where('velocity_key', 'pull_down_7')->whereDay('date', $i)->whereMonth('date', $mounth)->sum('value');
                $long_toss_distance[] = UserVelocity::where('user_id', auth()->user()->id)->where('velocity_key', 'long_toss_distance' )->whereDay('date', $i)->whereMonth('date', $mounth)->sum('value');
                $pylo7[] = UserVelocity::where('user_id', auth()->user()->id)->where('velocity_key', 'pylo_7')->whereDay('date', $i)->whereMonth('date', $mounth)->sum('value');
                $pylo5[] = UserVelocity::where('user_id', auth()->user()->id)->where('velocity_key', 'pylo_5')->whereDay('date', $i)->whereMonth('date', $mounth)->sum('value');
                $bench[] = UserVelocity::where('user_id', auth()->user()->id)->where('velocity_key', 'pylo_4')->whereDay('date', $i)->whereMonth('date', $mounth)->sum('value');
                $pylo3[] = UserVelocity::where('user_id', auth()->user()->id)->where('velocity_key', 'bench')->whereDay('date', $i)->whereMonth('date', $mounth)->sum('value');
                $squat[] = UserVelocity::where('user_id', auth()->user()->id)->where('velocity_key', 'squat')->whereDay('date', $i)->whereMonth('date', $mounth)->sum('value');
                $deadlift[] = UserVelocity::where('user_id', auth()->user()->id)->where('velocity_key', 'deadlift')->whereDay('date', $i)->whereMonth('date', $mounth)->sum('value');
                $vertical_jump[] = UserVelocity::where('user_id', auth()->user()->id)->where('velocity_key', 'vertical_jump')->whereDay('date', $i)->whereMonth('date', $mounth)->sum('value');
           
            }
            return view('supperadmin.index', [
                'velocities' => $velocities,
                'users' => $users,
                'weight' => $weight,
                'arm_pain' => $arm_pain,
                'pull_down_velocity' => $pull_down_velocity,
                'mount_throw_velocit' => $mount_throw_velocit,
                'pull_down_3' => $pull_down_3,
                'pull_down_4' => $pull_down_4,
                'pull_down_5' => $pull_down_4,
                'pull_down_6' => $pull_down_6,
                'pull_down_7' => $pull_down_7,
                'long_toss_distance' => $long_toss_distance,
                'pylo7' => $pylo7,
                'pylo5' => $pylo5,
                'bench' => $bench,
                'pylo3' => $pylo3,
                'squat' => $squat,
                'deadlift' => $deadlift,
                'vertical_jump' => $vertical_jump,       
            ]);

       
    }
    public function search_velocity(Request $request){
        return response()->json("success");
    }
    public function update_setting(Request $request){
        $admin_id = auth()->user()->id;
        $weight = Velocity::where('admin_id',$admin_id)->where('key','weight')->update(array('name'=>$request->weight_label,'status'=> $request->weight));
        $arm_pain = Velocity::where('admin_id', $admin_id)->where('key', 'arm_pain')->update(array('name' => $request->arm_pain_label, 'status' => $request->arm_pain));
        $pull_down_velocity = Velocity::where('admin_id', $admin_id)->where('key', 'pull_down_velocity')->update(array('name' => $request->pull_down_velocity_label, 'status'=> $request->pull_down_velocity));
        $mound_throws_velocity = Velocity::where('admin_id', $admin_id)->where('key', 'mound_throws_velocity')->update(array('name' => $request->mound_throws_velocity_label, 'status' => $request->mound_throws_velocity));
        $pull_down_3 = Velocity::where('admin_id', $admin_id)->where('key', 'pull_down_3')->update(array('name' => $request->pull_down_3_label, 'status' => $request->pull_down_3));
        $pull_down_4 = Velocity::where('admin_id', $admin_id)->where('key', 'pull_down_4')->update(array('name' => $request->pull_down_4_label, 'status' => $request->pull_down_4));
        $pull_down_5 = Velocity::where('admin_id', $admin_id)->where('key', 'pull_down_5')->update(array('name' => $request->pull_down_5_label, 'status' => $request->pull_down_5));
        $pull_down_6 = Velocity::where('admin_id', $admin_id)->where('key', 'pull_down_6')->update(array('name' => $request->pull_down_6_label, 'status' => $request->pull_down_6));
        $pull_down_7 = Velocity::where('admin_id', $admin_id)->where('key', 'pull_down_7')->update(array('name' => $request->pull_down_7_label, 'status' => $request->pull_down_7));
        $long_toss_distance_label = Velocity::where('admin_id', $admin_id)->where('key', 'long_toss_distance')->update(array('name' => $request->long_toss_distance_label, 'status' => $request->long_toss_distance));
        $pylo_7 = Velocity::where('admin_id', $admin_id)->where('key', 'pylo_7')->update(array('name' => $request->pylo_7_label, 'status' => $request->pylo_7));
        $pylo_5 = Velocity::where('admin_id', $admin_id)->where('key', 'pylo_5')->update(array('name' => $request->pylo_5_label, 'status' => $request->pylo_5));
        $pylo_3 = Velocity::where('admin_id', $admin_id)->where('key', 'pylo_3')->update(array('name' => $request->pylo_3_label, 'status' => $request->pylo_3));
        $bench = Velocity::where('admin_id', $admin_id)->where('key', 'bench')->update(array('name' => $request->bench_label, 'status' => $request->bench));
        $squat = Velocity::where('admin_id', $admin_id)->where('key', 'squat')->update(array('name' => $request->squat_label, 'status' => $request->squat));
        $deadlift = Velocity::where('admin_id', $admin_id)->where('key', 'deadlift')->update(array('name' => $request->deadlift_label, 'status' => $request->deadlift));
        $vertical_jump = Velocity::where('admin_id', $admin_id)->where('key', 'vertical_jump')->update(array('name' => $request->vertical_jump_label, 'status' => $request->vertical_jump));
        return response()->json('success');

    }
}
