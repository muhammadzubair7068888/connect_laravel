<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Rapsode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
class RapsodoController extends Controller
{
    //
    public function index(){
        $user_id = auth()->id();
        $rapsodo_user = Rapsode::where('user_id',$user_id)->get();
        return view('supperadmin.rapsodo.rabsodo',compact('rapsodo_user'));
    }
    public function save_rapsodo_credentials(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
 
        $response = Http::post('https://cloud.rapsodo.com/v3/auth/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $data = $response->json();
        if($data['success'] == false){
            return redirect()->back()->with('error','Invalid Email Or Password');
        }elseif($data['success'] == true){
            $rapsodo_user = Rapsode::where('user_id',auth()->id())->first();
            if($rapsodo_user){
                $rapsodo_user->first_name = $data['data']['user']['firstName'];
                $rapsodo_user->last_name = $data['data']['user']['lastName'];
                $rapsodo_user->user_type = $data['data']['user']['userType'][0];
                $rapsodo_user->email =  $request->email;
                $rapsodo_user->password = $request->password;
                $rapsodo_user->token =    $data['token'];
                $rapsodo_user->organization_name = $data['data']['user']['orgName'];
                $rapsodo_user->avatar = $data['data']['coach']['profilePhotoUrl'];
                $rapsodo_user->save();
            return redirect()->back()->with('success','Credentials Successfully Save');
               
            }
            $rapsodo_user = new Rapsode();
            $rapsodo_user->user_id = auth()->id();
            $rapsodo_user->first_name = $data['data']['user']['firstName'];
            $rapsodo_user->last_name = $data['data']['user']['lastName'];
            $rapsodo_user->user_type= $data['data']['user']['userType'][0];
            $rapsodo_user->email =  $request->email;
            $rapsodo_user->password = $request->password;
            $rapsodo_user->token = $data['token'];
            $rapsodo_user->organization_name = $data['data']['user']['orgName'];
            $rapsodo_user->avatar = $data['data']['coach']['profilePhotoUrl'];
            $rapsodo_user->save();
            return redirect()->back()->with('success', 'Credentials Successfully Save');
        }else{
            return redirect()->back()->with('error', 'Invalid Email Or Password');
        }

    }
    public function team(){

        $user = auth()->user()->rapsodos;
        if($user){
            $password = auth()->user()->rapsodos->password;
            $email =auth()->user()->rapsodos->email;
        }else{
            return redirect()->route('rapsodo')->with('error', 'Pleas Save Your Rapsodo Credentials Here!');
        }
        $response = Http::post('https://cloud.rapsodo.com/v3/auth/login', [
            'email' => $email,
            'password' => $password,
        ]);
        $data = json_decode($response);
        $token =  $data->token;
        $headers = [
            'Accept' => 'application/json',
            'Referer' => 'https://cloud.rapsodo.com/team',
            'Authorization' => $token,
        ];
        $client = new Client();
        $response = $client->request('GET', 'https://cloud.rapsodo.com/v2/group', [
            'headers' => $headers
        ])->getBody()->getContents();
        $Js_data = json_decode($response);
        $data = $Js_data->data;
        return view('supperadmin.rapsodo.team',compact('data'));
    }
}
