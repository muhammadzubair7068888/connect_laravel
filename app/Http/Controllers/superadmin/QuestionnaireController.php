<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Questionnaire;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class QuestionnaireController extends Controller
{
    //
    public function index(){
        // $user_id = auth()->user()->id;
        // $questionnaires = Questionnaire::where('user_id',$user_id)->latest()->get();
        return view('supperadmin.question');
    }
    public function save_question(Request $request){
        $request->validate([
            'question' => 'required',
        ]);
        $user_id = auth()->user()->id;
        $question = new Questionnaire();
        $question->user_id = $user_id;
        $question->name = $request->question;
        $question->save();
        $users = User::where('created_by', $user_id)->get();
        if ($users) {
            foreach($users as $user){
                $question = new Questionnaire();
                $question->user_id = $user->id;
                $question->name = $request->question;
                $question->save();
            } 
        }
        return redirect()->back()->with('success', 'Question Successfully Add.');
    }
    public function delete_question(Request $request)
    {
        Questionnaire::where('id',$request->id)->delete(); 
        return response()->json('success');
    }
    public function filter_question(Request $request){

        if($request->value == 'all'){
            $records = Questionnaire::query()->where('user_id', auth()->id());
             return Datatables::of($records)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a style="padding-left:10px;" class="link-danger" onclick="delete_question('.$row->id.')"><i class="fas fa-trash-alt" ></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);  
        }
        if($request->value == 'day'){
            $records =  Questionnaire::query()->where('user_id', auth()->id())->whereDate('created_at', Carbon::today())->get();
            return Datatables::of($records)->addColumn('action', function ($row) {
                $btn = '<a style="padding-left:10px;" class="link-danger" onclick="delete_question(' . $row->id . ')"><i class="fas fa-trash-alt" ></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }elseif($request->value == 'weak'){
            $records =  Questionnaire::query()->where('user_id', auth()->id())->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
            return Datatables::of($records)->addColumn('action', function ($row) {
                $btn = '<a style="padding-left:10px;" class="link-danger" onclick="delete_question(' . $row->id . ')"><i class="fas fa-trash-alt" ></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }elseif($request->value == 'mounth'){
            $records =  Questionnaire::query()->where('user_id', auth()->id())->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->get(['name', 'created_at']);
            return Datatables::of($records)->addColumn('action', function ($row) {
                $btn = '<a style="padding-left:10px;" class="link-danger" onclick="delete_question(' . $row->id . ')"><i class="fas fa-trash-alt" ></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }else{
            $date = date('Y');
            $records =  Questionnaire::query()->where('user_id', auth()->id())->whereYear('created_at', '=',$date)->get();
            return Datatables::of($records)->addColumn('action', function ($row) {
                $btn = '<a style="padding-left:10px;" class="link-danger" onclick="delete_question(' . $row->id . ')"><i class="fas fa-trash-alt" ></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }       
    }
}
