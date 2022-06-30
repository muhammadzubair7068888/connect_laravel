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
    public function chart_velocity(){
        $user_id = auth()->user()->id;
        $day = date('d');
        $mounth = date('m');
         for($i=1;$i<=30 ;$i++){
            $weight[]=UserVelocity::where('user_id',$user_id)->where('velocity_id',1)->whereDay('date', $i)->whereMonth('date', $mounth)->sum('value');
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
                'pull_ups' => $squat,
                'vertical_jump' => $squat
            ]);

    }
}
