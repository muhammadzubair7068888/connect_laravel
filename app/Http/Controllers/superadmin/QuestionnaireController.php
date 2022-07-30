<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Questionnaire;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class QuestionnaireController extends Controller
{
    //
    public function index(){
        $user_id = auth()->user()->id;
        $questionnaires = Questionnaire::where('user_id',$user_id)->latest()->get();
        return view('supperadmin.question',compact('questionnaires'));
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
        Questionnaire::where('id',$request->question_id)->delete();
        return redirect()->route('questionnaire')->with('success', 'Question Successfully Delete.');    
    }
    public function filter_question(Request $request){
        if($request->value == 'day'){
           $data =  Questionnaire::whereDate('created_at', Carbon::today())->get();
           return response()->json($data);
        }elseif($request->value == 'weak'){
            $data =  Questionnaire::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
            return response()->json($data);
        }elseif($request->value == 'mounth'){
            $data =  Questionnaire::whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->get(['name', 'created_at']);
            return response()->json($data);
        }else{
            $date = date('Y');
            $data =  Questionnaire::whereYear('created_at', '=',$date)->get();
            return response()->json($data);
        }
    }
}
