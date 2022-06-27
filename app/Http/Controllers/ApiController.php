<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Track;
use App\Models\User;
use App\Models\UserVelocity;
use App\Models\Velocity;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    public function signIn(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $date = date('Y-m-d');
           // $user = Auth::user();
            $user_id = auth()->user();
            User::where('id',$user_id)->update(array('last_login' => $date));
            $user = Auth::user();
            $token = $user->createToken('api-application')->accessToken;
            $response = [
                'status' => 'success',
                'message' => 'You have signed in.',
                'data' => $user,
                'token' => $token,
            ];
            return response()->json($response, 200);
        } else {
            $error = ['message' => 'Incorrect email or password.'];
            return response()->json($error, 203);
        }
    }
    public function profile()
    {
        try {
            $user_id = auth()->user()->id;
            $user = User::where('id', $user_id)->first();
            $response = [
                'status' => 'success',
                'data' => $user,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function update_profile(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'height' => 'required',
                'starting_weight' => 'required',
                'hand_type' => 'required',
                'age' => 'required',
                'school' => 'required',
                'level' => 'required',
                'user_status' => 'required',
            ]);
            if ($validator->fails()) {
                $response = $validator->errors();
                return response()->json($response, 422);
            }
            if ($request->password) {
                $validator = Validator::make($request->all(), [
                    'password' => 'required|confirmed|min:6',
                ]);
                if ($validator->fails()) {
                    $response = $validator->errors();
                    return response()->json($response, 422);
                }
            }
            $user = User::find($id);
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $foldername = 'user/profiles/';
                $filename = time() . '-' . rand(0000000, 9999999) . '.' . $request->file('file')->extension();
                $file->move(public_path() . '/' . $foldername, $filename);
                $user->avatar = $foldername . $filename;
            }
            $user->name = $request->name;
            $user->height = $request->height;
            $user->level = $request->level;
            $user->starting_weight = $request->starting_weight;
            $user->age = $request->age;
            $user->handedness = $request->handedeness;
            $user->school = $request->school;
            $user->email = $request->email;
            $user->save();
            $response = [
                'status' => 'success',
                'data' => $user,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function index_track()
    {
        try {
            $user_id  = auth()->user()->id;
            $tracks = Track::where('user_id', $user_id)->get();
            $response = [
                'status' => 'success',
                'data' => $tracks,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function save_track(Request $request)
    {
        try {
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
            $response = [
                'status' => 'success',
                'data' => $track,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function delete_track(Request $request)
    {
        try {
            Track::where('id', $request->track_id)->delete();
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function velocities()
    {
        try {
            $velocities = Velocity::where('user_type', 2)->latest()->get();
            $response = [
                'status' => 'success',
                'data' => $velocities,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function user_velocities()
    {
        try {
            $user_id = auth()->user()->id;
            $user_velocities = UserVelocity::where('user_id', $user_id)->with('velocity_type')->latest()->get();
            $response = [
                'status' => 'success',
                'data' => $user_velocities,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function save_velocity(Request $request)
    {
        try {
            $request->validate([
                'date' => 'required',
                'value' => 'required',
                'velocity_type' => 'required',
            ]);
            $user_id = auth()->user()->id;
            $user_velocity = new UserVelocity();
            $user_velocity->user_id = $user_id;
            $velocity_type = Velocity::where('name', $request->velocity_type)->value('id');
            $user_velocity->velocity_id = $velocity_type;
            $user_velocity->date = $request->date;
            $user_velocity->value = $request->value;
            $user_velocity->save();
            $response = [
                'status' => 'success',
                'data' => $user_velocity,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function delete_velocity(Request $request)
    {
        try {
            $user_velocities = UserVelocity::where('id', $request->velocity_id)->delete();
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }

    public function user_profile(Request $request){
        return $request->file('file');
    }

    public function add_user(Request $request)
    {
         try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'height' => 'required',
                'starting_weight' => 'required',
                'hand_type' => 'required',
                'age' => 'required',
                //'file' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
                'school' => 'required',
                'level' => 'required',
                'password' => 'required|confirmed|min:6',
                'user_status' => 'required',
            ]);
            if ($validator->fails()) {
                $response = $validator->errors();
                return response()->json($response, 422);
            }
            $user_id = auth()->user()->id;
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            if ($request->file('file')) {
                $file = $request->file('file');
                $foldername = 'user/profiles/';
                $filename = time() . '-' . rand(0000000, 9999999) . '.' . $request->file('file')->extension();
                $file->move(public_path() . '/' . $foldername, $filename);
                $user->avatar = $foldername . $filename;
            }
            $user->height = $request->height;
            $user->starting_weight = $request->starting_weight;
            $user->handedness = $request->hand_type;
            $user->age = $request->age;
            $user->school = $request->school;
            $user->level = $request->level;
            $user->status = $request->user_status;
            $user->created_by = $user_id;
            $user->role = 'user';
            $user->save();
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function user_get()
    {
        try {
            $user_id = auth()->user()->id;
            $user = User::where('created_by', $user_id)->latest()->get();
            $response = [
                'status' => 'success',
                'data' => $user,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500); 
        }
    }
    public function update_user_save(Request $request, $id)
    {
        try {
        
            $validator =Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'height' => 'required',
                'starting_weight' => 'required',
                'hand_type' => 'required',
                'age' => 'required',
                'school' => 'required',
                'level' => 'required',
                'user_status' => 'required',
            ]);
            if ($validator->fails()) {
                $response = $validator->errors();
                return response()->json($response, 422);
            }
            if ($request->password) {
                $validator = Validator::make($request->all(), [
                    'password' => 'required|confirmed|min:6',
                ]);
                if ($validator->fails()) {
                    $response = $validator->errors();
                    return response()->json($response, 422);
                }
            }
            $user = User::find($id);
            if($request->password){
                $user->password = $request->password;
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->height = $request->height;
            $user->starting_weight = $request->starting_weight;
            $user->handedness = $request->hand_type;
            $user->age = $request->age;
            $user->school = $request->school;
            $user->level = $request->level;
            $user->role = $request->role;
            $user->status = $request->user_status;
            $user->role = 'user';
            $user->save();
            $response = [
                'status' => 'success',
                'data' => $user,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function user_delete($id){
        try {
            $user = User::where('id', $id)->delete();   
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function question()
    {
        try {
            $user_id = auth()->user()->id;
            $questionnaires = Questionnaire::where('user_id', $user_id)->latest()->get();
            $response = [
                'status' => 'success',
                'data' => $questionnaires,
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
       
    }
    public function save_question(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'question' => 'required',
            ]);
            if ($validator->fails()) {
                $response = $validator->errors();
                return response()->json($response, 422);
            }
            $user_id = auth()->user()->id;
            $question = new Questionnaire();
            $question->user_id = $user_id;
            $question->name = $request->question;
            $question->save();
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
    }
    public function delete_question($id){
        try {
            Questionnaire::where('id', $id)->delete();
            $response = [
                'status' => 'success',
            ];
            return response()->json($response, 200);
        } catch (\Throwable $th) {
            $response = [
                'success' => false,
                'message' => $th->getMessage(),
            ];
            return response()->json($response, 500);
        }
     
    }
    
}