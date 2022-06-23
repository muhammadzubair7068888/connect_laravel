<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Questionnaire;
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
        return redirect()->back()->with('success', 'Question Successfully Add.');
    }
    public function delete_question(Request $request){
        Questionnaire::where('id',$request->question_id)->delete();
        return redirect()->route('questionnaire')->with('success', 'Question Successfully Delete.');
        
    }
}
