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
    public function chart_velocity(){
        
        $user_id = auth()->user()->id;
        $users = User::where('created_by',$user_id)->latest()->get();
        $users = [];
        $weight = [];
        $arm_pain = [];
        $pull_down_velocity = [];
        $mount_throw_velocit = [];
        $pull_down_3 = [];
        $pull_down_4 = [];
        $pull_down_4 = [];
        $pull_down_6 = [];
        $pull_down_7 = [];
        $long_toss_distance = [];
        $pylo7 = [];
        $pylo5 = [];
        $bench = [];
        $pylo3 = [];
        $squat = [];
        $deadlift = [];
        $vertical_jump = [];
        $standig_long_toss = [];
        $double_crow_hop_distance = [];
        $kneeling_long_toss = [];
        $seated_long_toss = [];
        $mound_ahuffle = [];
        $pull_ups = [];
        $day = date('d');
        $mounth = date('m');
        if(auth()->user()->role == 'superadmin' || auth()->user()->role == 'user' && auth()->user()->created_by == 1){
            for ($i = 1; $i <= 30; $i++) {
                $weight[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 1)->whereDay('date', $i)->whereMonth('date', $mounth)->sum('value');
                $arm_pain[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 2)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $standig_long_toss[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 3)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $mount_throw_velocit[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 4)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $pull_down_3[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 5)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $pull_down_4[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 6)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $pull_down_5[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 7)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $pull_down_6[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 8)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $pull_down_7[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 9)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $double_crow_hop_distance[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 10)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $kneeling_long_toss[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 11)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $seated_long_toss[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 12)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $bench[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 13)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $mound_ahuffle[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 14)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $squat[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 15)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $pull_ups[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 16)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $vertical_jump[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 17)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
            }
          
            return view('supperadmin.index', [
                'users' => $users,
                'weight' => $weight,
                'arm_pain' => $arm_pain,
                'standig_long_toss' => $standig_long_toss,
                'mount_throw_velocit' => $mount_throw_velocit,
                'pull_down_3' => $pull_down_3,
                'pull_down_4' => $pull_down_4,
                'pull_down_5' => $pull_down_4,
                'pull_down_6' => $pull_down_6,
                'pull_down_7' => $pull_down_7,
                'double_crow_hop_distance' => $double_crow_hop_distance,
                'kneeling_long_toss' => $kneeling_long_toss,
                'seated_long_toss' => $seated_long_toss,
                'bench' => $bench,
                'mound_ahuffle' => $mound_ahuffle,
                'squat' => $squat,
                'pull_ups' => $pull_ups,
                'vertical_jump' => $vertical_jump,
                'pull_down_velocity' => $pull_down_velocity,
                'long_toss_distance' => $long_toss_distance,
                'pylo7' => $pylo7,
                'pylo5' => $pylo5,
                'bench' => $bench,
                'pylo3' => $pylo3,
                'deadlift' => $deadlift,
                
            ]);
        }
        if(auth()->user()->role == 'admin' || auth()->user()->role == 'user' && auth()->user()->created_by !=1){
            for ($i = 1; $i <= 30; $i++) {
                $weight[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 18)->whereDay('date', $i)->whereMonth('date', $mounth)->sum('value');
                $arm_pain[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 19)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $pull_down_velocity[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 20)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $mount_throw_velocit[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 21)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $pull_down_3[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 22)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $pull_down_4[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 23)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $pull_down_5[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 24)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $pull_down_6[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 25)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $pull_down_7[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 26)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $long_toss_distance[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 27)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $pylo7[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 28)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $pylo5[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 29)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $bench[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 31)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $pylo3[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 30)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $squat[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 32)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $deadlift[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 33)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
                $vertical_jump[] = UserVelocity::where('user_id', $user_id)->where('velocity_id', 34)->whereDay('date', $i)->whereMonth('date', $mounth)->count();
           
            }
          
            return view('supperadmin.index', [
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
                'standig_long_toss' => $standig_long_toss,
                'double_crow_hop_distance' => $double_crow_hop_distance,
                'kneeling_long_toss' => $kneeling_long_toss,
                'seated_long_toss' => $seated_long_toss,
                'mound_ahuffle' => $mound_ahuffle,
                'pull_ups' => $pull_ups,
                
            ]);
        }
       
    }
    public function search_velocity(Request $request){
        return response()->json("success");
    }
}
