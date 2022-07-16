<?php

namespace App\Http\Controllers\superadmin;

use App\Events\UpdatesEvent;
use App\Exceptions\ApiOperationFailedException;
use App\Http\Controllers\Controller;
use App\Models\CompanySetting;
use App\Models\EmailTemplate;
use App\Models\Plugin;
use App\Models\PluginAttributes;
use App\Models\User;
use App\Models\Velocity;
use CodeZero\DotEnvUpdater\DotEnvUpdater;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\ImageTrait;
class SettingController extends Controller
{
    //
    public function shows_ettings()
    {
        $company = CompanySetting::first();
         return view('supperadmin.settings.company_setting',compact('company'));
    }
    public function company_settings(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'company_email' => 'required',
            'company_phone' => 'required',
            'company_fax' => 'required',
            'company_city' => 'required',
            'company_postal_code' => 'required',
            'company_logo_light' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'company_logo_dark' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'company_favicon' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $data = CompanySetting::first();
        $data = $data ? $data : new CompanySetting;
        $data->name = $request->company_name;
        $data->email = $request->company_email;
        $data->phone = $request->company_phone;
        $data->fax = $request->company_fax;
        $data->city = $request->company_city;
        $data->postal_code = $request->company_postal_code;
        $data->description = $request->description;
        if ($request->hasFile('company_logo_light')) {
            $file = $request->file('company_logo_light');
            $foldername = 'uploads/company-settings/logos/light/';
            $filename = time() . '-' . rand(0000000, 9999999) . '.' . $request->file('company_logo_light')->extension();
            $file->move(public_path() . '/' . $foldername, $filename);
            $data->logo_light = $foldername . $filename;
        }
        if ($request->hasFile('company_logo_dark')) {
            $file = $request->file('company_logo_dark');
            $foldername = 'uploads/company-settings/logos/dark/';
            $filename = time() . '-' . rand(0000000, 9999999) . '.' . $request->file('company_logo_dark')->extension();

            $file->move(public_path() . '/' . $foldername, $filename);
            $data->logo_dark = $foldername . $filename;
        }
        if ($request->hasFile('company_favicon')) {
            $file = $request->file('company_favicon');
            $foldername = 'uploads/company-settings/favicon/';
            $filename = time() . '-' . rand(0000000, 9999999) . '.' . $request->file('company_favicon')->extension();
            $file->move(public_path() . '/' . $foldername, $filename);
            $data->favicon = $foldername . $filename;
        }
        $data->save();
        return redirect()->back()->with('success', ' Company Profile Updated');
    }
    public function get_tempalte($template = null)
    {
        if (!$template) {
            $template = 'test-email';
        }
        $templates = EmailTemplate::all();
        return view('supperadmin.templates.email_template', compact('templates', 'template'));
    }
    public function saveTemplate(Request $req, $name)
    {
        try {
            $template = EmailTemplate::where('email_type', $name)->first();
            if (!$template) {
                $template = new EmailTemplate;
            }
            $template->email_type = $name;
            $template->title = $name;
            $template->subject = $name;
            $template->content = $req->template;
            $template->save();
            return redirect()->back()->with('success', 'Template has been updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Unable to update template. Something unexpected happened!');
        }
    }
    public function plugin(){
        $google = Plugin::where('name', 'google_login')->first();
        $facebook = Plugin::where('name', 'facebook_login')->first();
        if($google){
            $c_id =  $google->pluginsattribute->where('name', 'client_id')->first();
            $s_id =  $google->pluginsattribute->where('name', 'client_secret')->first();
            $google_clientid = $c_id->value;
            $google_clientsecret = $s_id->value;
        }else{
            $google_clientid = '';
            $google_clientsecret = '';
        }
        if($facebook){
            $c_id =  $facebook->pluginsattribute->where('name', 'client_id')->first();
            $s_id =  $facebook->pluginsattribute->where('name', 'client_secret')->first();
            $facebook_clientid = $c_id->value;
            $facebook_clientsecret =$s_id->value;
        }else{
            $facebook_clientid = '';
            $facebook_clientsecret = '';
        }
        return view('supperadmin.plugin.cards', compact(
            'google',
            'facebook',
            'google_clientid',
            'google_clientsecret',
            'facebook_clientid',
            'facebook_clientsecret',
        ));
    }
    public function google_creditional(Request $request){
        $p = Plugin::where('name', 'google_login')->first();
        if ($p) {
            $request->enable ? $p->active = 1 : $p->active = 0;
            $p->save();
            $client_id = $request->client_id;
            $client_secret = $request->client_secret;
            $db_client_id = PluginAttributes::where('name', 'client_id')->where('plugin_id', $p->id)->first();
            $db_client_id->value = $client_id;
            $db_client_id->save();
            $db_client_secret = PluginAttributes::where('name', 'client_secret')->where('plugin_id', $p->id)->first();
            $db_client_secret->value = $client_secret;
            $db_client_secret->save();
        } else {
            $p = new Plugin;
            $p->name = 'google_login';
            $request->enable ? $p->active = 1 : $p->active = 0;
            $p->save();
            $client_id = $request->client_id;
            $client_secret = $request->client_secret;
            $db_client_id = new PluginAttributes;
            $db_client_id->name = 'client_id';
            $db_client_id->value = $client_id;
            $db_client_id->plugin_id = $p->id;
            $db_client_id->save();
            $db_client_secret = new PluginAttributes;
            $db_client_secret->name = 'client_secret';
            $db_client_secret->value = $client_secret;
            $db_client_secret->plugin_id = $p->id;
            $db_client_secret->save();
        }
        $env = new DotEnvUpdater(base_path('.env'));
        $env->set('GOOGLE_CLIENT_ID', plugin_val('google_login', 'client_id'));
        $env->set('GOOGLE_CLIENT_SECRET', plugin_val('google_login', 'client_secret'));
        return redirect()->route('plugin.cards')->with('status', 'Plugin has been updated successfully');
    }

    public function facebook_credentials(Request $request){
        $p = Plugin::where('name', 'facebook_login')->first();
        if ($p) {
            $request->enable ? $p->active = 1 : $p->active = 0;
            $p->save();
            $client_id = $request->client_id;
            $client_secret = $request->client_secret;
            $db_client_id = PluginAttributes::where('name', 'client_id')->where('plugin_id', $p->id)->first();
            $db_client_id->value = $client_id;
            $db_client_id->save();
            $db_client_secret = PluginAttributes::where('name', 'client_secret')->where('plugin_id', $p->id)->first();
            $db_client_secret->value = $client_secret;
            $db_client_secret->save();
        } else {
            $p = new Plugin;
            $p->name = 'facebook_login';
            $request->enable ? $p->active = 1 : $p->active = 0;
            $p->save();
            $client_id = $request->client_id;
            $client_secret = $request->client_secret;
            $db_client_id = new PluginAttributes;
            $db_client_id->name = 'client_id';
            $db_client_id->value = $client_id;
            $db_client_id->plugin_id = $p->id;
            $db_client_id->save();
            $db_client_secret = new PluginAttributes;
            $db_client_secret->name = 'client_secret';
            $db_client_secret->value = $client_secret;
            $db_client_secret->plugin_id = $p->id;
            $db_client_secret->save();
        }
        $env = new DotEnvUpdater(base_path('.env'));
        $env->set('FACEBOOK_CLIENT_ID', plugin_val('facebook_login', 'client_id'));
        $env->set('FACEBOOK_CLIENT_SECRET', plugin_val('facebook_login', 'client_secret'));
        return redirect()->route('plugin.cards')->with('status', 'Plugin has been updated successfully');
    }
    public function profiel(){
        $user_id = auth()->user()->id;
        $user = User::where('id',$user_id)->first();
        return view('supperadmin.contacts-profile',compact('user'));
    }
    public function update_profile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'height' => 'required',
            'starting_weight' => 'required',
            'hand_type' => 'required',
            'age' => 'required',
            'file' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'school' => 'required',
            'level' => 'required',
        ]);
        if($request->password){
            $request->validate([
                'password' => 'required|confirmed|min:6',
            ]);
        }
        $user = User::find($id);
        $this->updateProfilePhoto($user, $request->all());
        if($request->password){
            $user->password = Hash::make($request->password);
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
        return redirect()->back()->with('success', 'Successfully Update.');
    }

    public function updateProfilePhoto(User $user, $input)
    {
        try {
            $options = ['height' => User::HEIGHT, 'width' => User::WIDTH];
            if (! empty($input['photo'])) {
                $input['avatar'] = ImageTrait::makeImage($input['photo'], User::$PATH, $options);

                $oldImageName = $user->avatar;
                if (! empty($oldImageName)) {
                    $user->deleteImage();
                }
            }

            $user->update($input);

            $broadcastData['type'] = User::PROFILE_UPDATES;
            $broadcastData['user'] = $user->fresh()->toArray();
            broadcast(new UpdatesEvent($broadcastData))->toOthers();
        } catch (Exception $e) {
            throw new ApiOperationFailedException($e->getMessage());
        }
    }
    public function site_setting(){

        $user_id = auth()->user()->id;
         $velocities = Velocity::where('admin_id', $user_id)->get();
        return view('supperadmin.settings.site_setting',compact('velocities'));
    }

}
