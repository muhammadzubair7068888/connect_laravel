<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ApiController extends Controller
{
    public function signIn(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
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
    public function profile(){
      try{
        $user_id = auth()->user()->id;
        $user = User::where('id',$user_id)->first();
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
    public function update_profile(Request $request,$id){
        try {
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
}
// try {
//   } catch (\Throwable $th) {
//             $response = [
//                 'success' => false,
//                 'message' => $th->getMessage(),
//             ];
//             return response()->json($response, 500);
//         }