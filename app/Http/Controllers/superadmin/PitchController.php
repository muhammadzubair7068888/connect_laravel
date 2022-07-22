<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Pitch;
use Illuminate\Http\Request;

class PitchController extends Controller
{
    //
    public function index(){
       $data = Pitch::get();
       return view('supperadmin.pitch',compact('data'));
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
            dd($this->rows);
            $user_id = auth()->user()->id;
            foreach ($this->rows as $data) {
                // $pitch = new Pitch();
                // $pitch->date = $data['date'];
                // $pitch->time = $data['time'];
                // $pitch->pa_of_inning = $data['paofinning'];
                // $pitch->pitch_of_pa = $data['paofinning'];
                // $pitch->pitcher = $data['paofinning'];
                // $pitch->pitcher_id =$data['']
                // $pitch->pitcher_throws
                // $pitch->pitcher_team
                // $pitch->batter
                // $pitch->batter_id;
                // $pitch->batter_side;
                // $pitch->batter_team;
                // $pitch->pitcher_set;
                // $pitch->inning;
                // $pitch->top_bottom;
                // $pitch->outs;
                // $pitch->balls
                // $pitch->strikes;
                // $pitch->tagged_pitch_type;
                // $pitch->sauto_pitch;
                // $pitch->pitch_call;
                // $pitch->kor_bb;
                // $pitch->hit_type;
                // $pitch->play_result;
                // $pitch->outs_on_play;
                // $pitch->runs_scored;
                // $pitch->notes;
                // $pitch->rel_speed;
                // $pitch->vert_rel_angle;
                // $pitch->horz_rel_angle;
                // $pitch->spin_rate;
                // $pitch->spin_axis;
                // $pitch->tilt;
                // $pitch->rel_height;
                // $pitch->extension_loaded;
                // $pitch->vert_break;
                // $pitch->induced_vert_break;
                // $pitch->plate_loc_height;
                // $pitch->plate_loc_side;
                // $pitch->zone_speed;
                // $pitch->vert_appr_angle;
                // $pitch->horz_appr_angle;
                // $pitch->zone_time;
                // $pitch->exit_speed;
                // $pitch->angle;
                // $pitch->direction;
                // $pitch->hit_spin_rate;
                // $pitch->position_at_110_x;
                // $pitch->position_at_110_y;
                // $pitch->position_at_110_z;
                // $pitch->distance;
                // $pitch->last_tracked_distance;
                // $pitch->bearing;
                // $pitch->hang_time;
                // $pitch->pfxx;
                // $pitch->pfxz;
                // $pitch->x0;
                // $pitch->y0;
                // $pitch->zo;
                // $pitch->vx0;
                // $pitch->vy0;
                // $pitch->vz0;
                // $pitch->ax0;
                // $pitch->ay0;
                // $pitch->az0;
                // $pitch->home_team;
                // $pitch->away_team;
                // $pitch->stadium;
                // $pitch->level;
                // $pitch->league;
                // $pitch->game_id;
                // $pitch->pitch_uid;



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
