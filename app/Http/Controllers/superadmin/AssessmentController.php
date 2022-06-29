<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\MechanicalAssessment;
use App\Models\PhysicalAssessment;
use App\Models\User;
use Illuminate\Http\Request;
use PDO;

class AssessmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('role');
    }
    //
    public function phyiscal(){
        $user_id = auth()->user()->id;
        $users = User::where('created_by',$user_id)->where('role','admin')->latest()->get();
        $physical = PhysicalAssessment::where('user_id',$user_id)->latest()->get();
        return view('supperadmin.phyiscal_assessment',compact('physical','users'));
    }
    public function add_phyiscal(Request $request) {
        $request->validate([
            'label' => 'required',
            'status' => 'required',
        ]); 
        $user_id = auth()->user()->id;
        $physical = new PhysicalAssessment();
        $physical->user_id = $user_id;
        $physical->name = $request->label;
        $physical->status = $request->status;
        $physical->save();
        $his_users = User::where('created_by',$user_id)->get();
        if($his_users){
            foreach($his_users as $user){
                $user_phy_assessment = new PhysicalAssessment();
                $user_phy_assessment->name = $request->label;
                $user_phy_assessment->user_id = $user->id;
                $user_phy_assessment->status = 0;
                $user_phy_assessment->save();
            }
        }
        return redirect()->back()->with('success', 'New Physical Accessment Successfully Add.');
    }
    public function delete_phyiscal(Request $request){
        $physical = PhysicalAssessment::where('id',$request->physical_id)->first();
        PhysicalAssessment::where('name',$physical->name)->delete();
        return redirect()->route('physical')->with('success', 'Physical Accessment Successfully Delete.');
    }
    public function mechanical(){
        $user_id = auth()->user()->id;
        $users = User::where('created_by', $user_id)->where('role', 'admin')->latest()->get();
        $mechaniacl = MechanicalAssessment::where('user_id',$user_id)->latest()->get();
        return view('supperadmin.mechanical_assessment', compact('mechaniacl','users'));
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
        $his_users = User::where('created_by', $user_id)->get();
        if ($his_users) {
            foreach ($his_users as $user) {
                $user_mach_assessment = new MechanicalAssessment();
                $user_mach_assessment->name = $request->label;
                $user_mach_assessment->user_id = $user->id;
                $user_mach_assessment->status = 0;
                $user_mach_assessment->save();
            }
        }
        return redirect()->back()->with('success', 'New Mechanical Accessment Successfully Add.');
    }
    public function delete_mechanical(Request $request){
        $mechaniacl = MechanicalAssessment::where('id',$request->mechanical_id)->first();
        MechanicalAssessment::where('name',$mechaniacl->name)->delete();
        return redirect()->route('mechanical')->with('success', 'Mechanical Accessment Successfully Delete.');
    }
    public function physical_update_status($id,$status){
        PhysicalAssessment::where('id',$id)->update(array('status'=>$status));
        return response()->json("success");
    }
    public function mechanical_update_status($id, $status){
        MechanicalAssessment::where('id',$id)->update(array('status'=>$status));
        return response()->json("success");
    }
    public function shair_physical_assessment(Request $request){
        $id = $request->physical_id;
        $user_id = $request->user;
        $parent_id = PhysicalAssessment::where('parent_id',$id)->where('user_id',$user_id)->first();
        if($parent_id){
            return response()->json("success");
        }
        $phy_assessment =  PhysicalAssessment::find($id);
        $user_phy_assessment = new PhysicalAssessment();
        $user_phy_assessment->name = $phy_assessment->name;
        $user_phy_assessment->parent_id = $id;
        $user_phy_assessment->user_id = $user_id;
        $user_phy_assessment->status = 0;
        $user_phy_assessment->save();
        return response()->json("success");
    }
    public function shair_mechanical_assessment(Request $request){
        $id = $request->mechanical_id;
        $user_id = $request->user;
        $parent_id = MechanicalAssessment::where('parent_id',$id)->where('user_id',$user_id)->first();
        if($parent_id){
            return response()->json("success");
        }
        $mach_assessment = MechanicalAssessment::find($id);
        $user_mach_assessment = new MechanicalAssessment();
        $user_mach_assessment->name = $mach_assessment->name;
        $user_mach_assessment->parent_id = $id;
        $user_mach_assessment->user_id = $user_id;
        $user_mach_assessment->save();
        return response()->json("success");
    }
}
