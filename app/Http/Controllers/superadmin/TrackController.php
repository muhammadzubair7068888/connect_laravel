<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    //
    public function index()
    {
        $user_id  = auth()->user()->id;
        $tracks = Track::where('user_id', $user_id)->get();
        return view('supperadmin.track', compact('tracks'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'weight' => 'required',
            'arm_pain' => 'required',
        ]); 
        $user_id = auth()->user()->id;
        $track = new Track();
        $track->date = $request->date;
        $track->weight = $request->weight;
        $track->arm_pain = $request->arm_pain;
        $track->user_id = $user_id;
        $track->save();
        return redirect()->back()->with('success', 'New Track Successfully Add.');
    }
    public function delete(Request $request){
        Track::where('id',$request->track_id)->delete();
        return redirect()->route('tracks')->with('success', 'Track Successfully Delete.');
    }
}
