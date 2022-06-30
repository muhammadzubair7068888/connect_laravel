<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FileController extends Controller
{
    //
    public function index($id=null){
        if($id==null){
            $user_id= auth()->user()->id;
        }else{
            $user_id = $id;
            $files = File::where('user_id', 1)->get();
            return response()->json($files);
        }
        $users = User::where('created_by',auth()->user()->id)->latest()->get();
        $files = File::where('user_id',$user_id)->get();
        return view('supperadmin.files',compact('files','users'));
    }
    public function save_file(Request $request){
        $request->validate([
            'file' => 'required|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts,qt,pdf',
        ]);
        $user_id = auth()->user()->id;
        $files = new File(); 
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $file->move('uploads', $fileName);
            $files->file= $fileName;
            $files->user_id = $user_id;
            $files->title = $request->title;
            $files->save();
            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName);
        }
        return back()->with('error', 'Something is wrong');
    }
    public function delete_file(Request $request){
        File::where('id',$request->file_id)->delete();
        return redirect()->route('file')->with('success', 'File has been deleted.');  
    }
    public function download_file($id){
       $file = File::find($id);
       $data =  $file->file;
       return response()->download(public_path('uploads/'.$data));
    }
}
