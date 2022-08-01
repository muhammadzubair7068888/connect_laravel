<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Pitch;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PitchController extends Controller
{
    //
    public function index(){
       $data = Pitch::paginate(10);
       return view('supperadmin.pitch',compact('data'));
    }
    public function pitch(Request $request)
    {
        $user = User::where('id',$request->user_id)->first();
        $records = Pitch::where('pitcher_id',$user->pitcher_Id)->get();
        return Datatables::of($records)
            // ->addIndexColumn()
            // ->rawColumns(['action'])
            ->make(true);
    
    }
    public function import_pitch(Request $request)
    {
        try {
            $path = $request->file('file')->getRealPath();
            $records = array_map('str_getcsv', file($path));
            if (!count($records) > 0) {
                return back()->with('error', 'Something Is Wrong!');
            }
            $fields = array_map('strtolower', $records[0]);
            array_shift($records);
            foreach ($records as $record) {
                if (count($fields) != count($record)) {
                    return back()->with('error', 'Invailed Dat!');;
                }
                $record =  array_map("html_entity_decode", $record);
                $record = array_combine($fields, $record);
                $this->rows[] = $this->clear_encoding_str($record);
            }
         //   dd($this->rows);
            $user_id = auth()->user()->id;
            foreach ($this->rows as $data) {
                $pitch = new Pitch();
                $pitch->date = $data['date'];
                $pitch->time = $data['time'];
                $pitch->pa_of_inning = $data['paofinning'];
                $pitch->pitch_of_pa = $data['pitchofpa'];
                $pitch->pitcher = $data['pitcher'];
                $pitch->pitcher_id =$data['pitcherid'];
                $pitch->pitcher_throws =$data['pitcherthrows'];
                $pitch->pitcher_team = $data['pitcherteam'];
                $pitch->batter = $data['batter'];
                $pitch->batter_id = $data['batterid'];
                $pitch->batter_side = $data['batterside'];
                $pitch->batter_team = $data['batterteam'];
                $pitch->pitcher_set = $data['pitcherset'];
                $pitch->inning = $data['inning'];
                $pitch->top_bottom = $data['top/bottom'];
                $pitch->outs = $data['outs'];
                $pitch->balls = $data['balls'];
                $pitch->strikes = $data['strikes'];
                $pitch->tagged_pitch_type = $data['taggedpitchtype'];
                $pitch->auto_pitch = $data['autopitchtype'];
                $pitch->pitch_call = $data['pitchcall'];
                $pitch->kor_bb = $data['korbb'];
                $pitch->hit_type = $data['hittype'];
                $pitch->play_result  = $data['playresult'];
                $pitch->outs_on_play = $data['outsonplay'];
                $pitch->runs_scored = $data['runsscored'];
                $pitch->notes = $data['notes'];
                $pitch->rel_speed = $data['relspeed'];
                $pitch->vert_rel_angle = $data['vertrelangle'];
                $pitch->horz_rel_angle = $data['horzrelangle'];
                $pitch->spin_rate = $data['spinrate'];
                $pitch->spin_axis = $data['spinaxis'];
                $pitch->tilt = $data['tilt'];
                $pitch->rel_height = $data['relheight'];
                $pitch->rel_side = $data['relside'];
                $pitch->extension = $data['extension'];
                $pitch->vert_break= $data['vertbreak'];
                $pitch->induced_vert_break = $data['inducedvertbreak'];
                $pitch->horz_break = $data['horzbreak'];
                $pitch->plate_loc_height = $data['platelocheight'];
                $pitch->plate_loc_side = $data['platelocside'];
                $pitch->zone_speed = $data['zonespeed'];
                $pitch->vert_appr_angle = $data['vertapprangle'];
                $pitch->horz_appr_angle = $data['horzapprangle'];
                $pitch->zone_time = $data['zonetime'];
                $pitch->exit_speed = $data['exitspeed'];
                $pitch->angle = $data['angle'];
                $pitch->direction = $data['direction'];
                $pitch->hit_spin_rate = $data['hitspinrate'];
                $pitch->position_at_110_x = $data['positionat110x'];
                $pitch->position_at_110_y = $data['positionat110y'];
                $pitch->position_at_110_z = $data['positionat110z'];
                $pitch->distance = $data['distance'];
                $pitch->last_tracked_distance = $data['lasttrackeddistance'];
                $pitch->bearing = $data['bearing'];
                $pitch->hang_time = $data['hangtime'];
                $pitch->pfxx = $data['pfxx'];
                $pitch->pfxz = $data['pfxz'];
                $pitch->x0 =$data['x0'];
                $pitch->y0 = $data['y0'];
                $pitch->z0= $data['z0'];
                $pitch->vx0 = $data['vx0'];
                $pitch->vy0 =$data['vy0'];
                $pitch->vz0 =$data['vz0'];
                $pitch->ax0 = $data['ax0'];
                $pitch->ay0=$data['ay0'];
                $pitch->az0 = $data['az0'];
                $pitch->home_team = $data['hometeam'];
                $pitch->away_team = $data['awayteam'];
                $pitch->stadium = $data['stadium'];
                $pitch->level = $data['level'];
                $pitch->league = $data['league'];
                $pitch->game_id = $data['gameid'];
                $pitch->pitch_uid = $data['pitchuid'];
                $pitch->save();
            }
        } catch (\Throwable $th) {
            $response = [
                'error' => false,
                'message' => $th->getMessage(),
            ];
            return back()->with('error', $th->getMessage());
        }
        return back()->with('success', 'CVS file success full Imoprt');
    }
    private function clear_encoding_str($value)
    {
        if (is_array($value)) {
            $clean = [];
            foreach ($value as $key => $val) {
                $clean[$key] = mb_convert_encoding($val, 'UTF-8', 'UTF-8');
            }
            return $clean;
        }
        return mb_convert_encoding($value, 'UTF-8', 'UTF-8');
    }
}
