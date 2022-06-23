<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\MechanicalAssessment;
use App\Models\PhysicalAssessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    //
    public function phyiscal(){
        $user_id = auth()->user()->id;
        $physical = PhysicalAssessment::where('user_id',$user_id)->latest()->get();
        return view('supperadmin.phyiscal_assessment',compact('physical'));
    }
    public function add_phyiscal(Request $request) {
        $request->validate([
            'label' => 'required',
            'status' => 'required',
        ]); 
        $user_id = auth()->user()->id;
        $phyiscal = new PhysicalAssessment();
        $phyiscal->user_id = $user_id;
        $phyiscal->name = $request->label;
        $phyiscal->status = $request->status;
        $phyiscal->save();
        return redirect()->back()->with('success', 'New Physical Accessment Successfully Add.');
    }
    public function delete_phyiscal(Request $request){
        PhysicalAssessment::where('id',$request->physical_id)->delete();
        return redirect()->route('physical')->with('success', 'Physical Accessment Successfully Delete.');
    }
    public function mechanical(){
        $user_id = auth()->user()->id;
        $mechaniacl = MechanicalAssessment::where('user_id',$user_id)->latest()->get();
        return view('supperadmin.mechanical_assessment', compact('mechaniacl'));
    }
    public function add_mechanical(Request $request){
        $request->validate([
            'label' => 'required',
            'status' => 'required',
        ]);
        $user_id = auth()->user()->id;
        $mechaniacl = new MechanicalAssessment();
        $mechaniacl->user_id = $user_id;
        $mechaniacl->name = $request->label;
        $mechaniacl->status = $request->status;
        $mechaniacl->save();
        return redirect()->back()->with('success', 'New Mechanical Accessment Successfully Add.');
    }
    public function delete_mechanical(Request $request){
        MechanicalAssessment::where('id',$request->mechanical_id)->delete();
        return redirect()->route('mechanical')->with('success', 'Mechanical Accessment Successfully Delete.');
    }

    // 
}
