<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\User;
use App\Repositories\FileUploadRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FileController extends Controller
{

    /** @var FileUploadRepository $fileUploadRepository */
    private $fileUploadRepository;

    /**
     * Create a new controller instance.
     *
     * @param  FileUploadRepository  $fileUploadRepository
     */
    public function __construct(FileUploadRepository $fileUploadRepository)
    {
        $this->fileUploadRepository = $fileUploadRepository;
    }

    public function index($id = null)
    {
        if ($id == null) {
            $user_id = auth()->user()->id;
        } else {
            $user_id = $id;
            $files = File::where('user_id', $user_id)->get();
            return response()->json($files);
        }
        $users = User::where('created_by', auth()->id())->get(['id', 'name'])
        ->prepend(['id' => auth()->id(), 'name' => 'Me'])->toArray();
        $files = File::where('user_id', $user_id)->get();
        return view('supperadmin.files', compact('files', 'users'));
    }
    public function save_file(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts,qt,pdf',
        ]);
        $user_id = auth()->user()->id;
        $files = new File();
        if ($request->hasFile('file')) {
            $fileName = $this->fileUploadRepository->addAttachment($request->file('file'), $files::$PATH);
            $files->file = $fileName;
            $files->user_id = $user_id;
            $files->title = $request->title;
            $files->save();
            return back()
                ->with('success', 'File has been uploaded.')
                ->with('file', $fileName);
        }
        return back()->with('error', 'Something is wrong');
    }
    public function delete_file(Request $request)
    {
        File::where('id', $request->file_id)->delete();
        return redirect()->route('file')->with('success', 'File has been deleted.');
    }
    public function download_file($id)
    {
        $file = File::find($id);
        $data =  $file->file;
        return response()->download(public_path('uploads/' . $data));
    }
}
