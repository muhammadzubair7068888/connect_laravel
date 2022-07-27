<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use App\Models\Pitch;
use Illuminate\Http\Request;

class PitchController extends Controller
{
    //
    public function index(){
       $data = Pitch::paginate(10);
       return view('supperadmin.pitch',compact('data'));
    }
    // public function pitch(Request $request)
    // {
    //     $draw = $request->get('draw');
    //     $start = $request->get("start");
    //     $rowperpage = $request->get("length"); // Rows display per page
    //     $columnIndex_arr = $request->get('order');
    //     $columnName_arr = $request->get('columns');
    //     $order_arr = $request->get('order');
    //     $search_arr = $request->get('search');
    //     $columnIndex = $columnIndex_arr[0]['column']; // Column index
    //     $columnName = $columnName_arr[$columnIndex]['data']; // Column name
    //     $columnSortOrder = $order_arr[0]['dir']; // asc or desc
    //     $searchValue = $search_arr['value']; // Search value
    //     // Total records
    //     $totalRecords = Pitch::select('count(*) as allcount')->count();
    //     $totalRecordswithFilter = Pitch::select('count(*) as allcount')->where('pitcher_id', 'like', '%' . $searchValue . '%')->count();

    //     // Fetch records
    //     $records = Pitch::orderBy($columnName, $columnSortOrder)
    //         ->where('pitchers.pitcher_id', 'like', '%' . $searchValue . '%')
    //         ->select('pitchers.*')
    //         ->skip($start)
    //         ->take($rowperpage)
    //         ->get();

    //     $data_arr = array();
    //     $sno = $start + 1;
    //     foreach ($records as $pitch) {
    //         $id = $pitch->id;
    //         $date = $pitch->date;
    //         $time=$pitch->time ;
    //         $pa_of_inning=$pitch->pa_of_inning ;
    //         $pitch_of_pa = $pitch->pitch_of_pa ;
    //         $pitcher = $pitch->pitcher ;
    //         $pitcher_id = $pitch->pitcher_id ;
    //         $pitcher_throws=$pitch->pitcher_throws ;
    //         $pitcher_team= $pitch->pitcher_team ;
    //         $batter= $pitch->batter ;
    //         $batter_id= $pitch->batter_id ;
    //         $batter_side= $pitch->batter_side ;
    //         $batter_team =$pitch->batter_team ;
    //         $pitcher_set =$pitch->pitcher_set ;
    //         $inning =$pitch->inning ;
    //         $top_bottom=  $pitch->top_bottom ;
    //         $outs= $pitch->outs ;
    //         $balls =$pitch->balls ;
    //         $strikes =$pitch->strikes ;
    //         $tagged_pitch_type=$pitch->tagged_pitch_type ;
    //        $auto_pitch =$pitch->auto_pitch ;
    //         $pitch_call = $pitch->pitch_call ;
    //         $kor_bb =$pitch->kor_bb ;
    //         $hit_type =$pitch->hit_type ;
    //        $play_result=   $pitch->play_result ;
    //        $outs_on_play = $pitch->outs_on_play ;
    //         $runs_scored=$pitch->runs_scored ;
    //         $notes= $pitch->notes ;
    //        $rel_speed =$pitch->rel_speed ;
    //         $vert_rel_angle= $pitch->vert_rel_angle ;
    //         $horz_rel_angle= $pitch->horz_rel_angle ;
    //         $spin_rate= $pitch->spin_rate ;
    //        $spin_axis = $pitch->spin_axis ;
    //        $tilt= $pitch->tilt ;
    //        $rel_height =$pitch->rel_height ;
    //        $rel_side= $pitch->rel_side ;
    //        $extension =$pitch->extension ;
    //        $vert_break =$pitch->vert_break ;
    //        $induced_vert_break =$pitch->induced_vert_break ;
    //        $horz_break=$pitch->horz_break ;
    //        $plate_loc_height=$pitch->plate_loc_height ;
    //        $plate_loc_side= $pitch->plate_loc_side ;
    //         $zone_speed  =$pitch->zone_speed ;
    //         $vert_appr_angle =$pitch->vert_appr_angle ;
    //         $horz_appr_angle= $pitch->horz_appr_angle ;
    //         $zone_time =$pitch->zone_time ;
    //         $exit_speed =$pitch->exit_speed ;
    //         $angle= $pitch->angle ;
    //         $direction =$pitch->direction ;
    //         $hit_spin_rate =$pitch->hit_spin_rate ;
    //         $position_at_110_x= $pitch->position_at_110_x ;
    //         $position_at_110_y =$pitch->position_at_110_y ;
    //         $position_at_110_z =$pitch->position_at_110_z ;
    //         $distance= $pitch->distance ;
    //         $last_tracked_distance =$pitch->last_tracked_distance ;
    //         $bearing= $pitch->bearing ;
    //         $hang_time =$pitch->hang_time ;
    //         $pfxx =$pitch->pfxx ;
    //         $pfxz =$pitch->pfxz ;
    //         $x0 =$pitch->x0 ;
    //         $y0 =$pitch->y0 ;
    //         $z0 =$pitch->z0 ;
    //         $vx0 =$pitch->vx0 ;
    //         $vy0 =$pitch->vy0 ;
    //         $vz0 =$pitch->vz0 ;
    //         $ax0 =$pitch->ax0 ;
    //         $ay0 =$pitch->ay0 ;
    //         $az0 =$pitch->az0 ;
    //         $home_team =$pitch->home_team ;
    //         $away_team =$pitch->away_team ;
    //         $stadium= $pitch->stadium ;
    //         $level =$pitch->level ;
    //         $league =$pitch->league ;
    //         $game_id =$pitch->game_id ;
    //         $pitch_uid =$pitch->pitch_uid;
    //         $data_arr[] = array(
    //             "id" => $id,
    //             "date" => $date,
    //             "time" => $time ,
    //           "pa_of_inning"=>$pa_of_inning ,
    //          "pitch_of_pa" => $pitch_of_pa ,
    //          "pitcher" => $pitcher ,
    //          "pitcher_id" => $pitcher_id ,
    //          "pitcher_throws"=>$pitcher_throws ,
    //         "pitcher_team"=> $pitcher_team ,
    //         "batter"=> $batter ,
    //         "batter_id"=> $batter_id ,
    //         "batter_side"=> $batter_side ,
    //         "batter_team" =>$batter_team ,
    //         "pitcher_set" =>$pitcher_set ,
    //         "inning" =>$inning ,
    //         "top_bottom"=>  $top_bottom ,
    //         "outs"=> $outs ,
    //         "balls" =>$balls ,
    //         "strikes" =>$strikes ,
    //         "tagged_pitch_type"=>$tagged_pitch_type ,
    //        "auto_pitch" =>$auto_pitch,
    //         "pitch_call" => $pitch_call ,
    //         "kor_bb" =>$kor_bb ,
    //         "hit_type" =>$hit_type ,
    //        "play_result"=>   $play_result ,
    //        "outs_on_play" => $outs_on_play ,
    //         "runs_scored"=>$runs_scored ,
    //         "notes"=> $notes ,
    //        "rel_speed" =>$rel_speed ,
    //         "vert_rel_angle"=> $vert_rel_angle ,
    //         "horz_rel_angle"=> $horz_rel_angle ,
    //         "spin_rate"=> $spin_rate ,
    //        "spin_axis" => $spin_axis ,
    //        "tilt"=> $tilt ,
    //        "rel_height" =>$rel_height ,
    //        "rel_side"=> $rel_side ,
    //        "extension" =>$extension ,
    //        "vert_break" =>$vert_break ,
    //        "induced_vert_break" =>$induced_vert_break ,
    //        "horz_break"=>$horz_break ,
    //        "plate_loc_height"=>$plate_loc_height ,
    //        "plate_loc_side"=> $plate_loc_side ,
    //         "zone_speed"  =>$zone_speed ,
    //         "vert_appr_angle" =>$vert_appr_angle ,
    //         "horz_appr_angle"=> $horz_appr_angle ,
    //         "zone_time" =>$zone_time ,
    //         "exit_speed" =>$exit_speed ,
    //         "angle"=> $angle ,
    //         "direction" =>$direction ,
    //         "hit_spin_rate" =>$hit_spin_rate ,
    //         "position_at_110_x"=> $position_at_110_x ,
    //         "position_at_110_y" =>$position_at_110_y ,
    //         "position_at_110_z" =>$position_at_110_z ,
    //         "distance"=> $distance ,
    //         "last_tracked_distance" =>$last_tracked_distance ,
    //         "bearing"=> $bearing ,
    //         "hang_time" =>$hang_time ,
    //         "pfxx" =>$pfxx ,
    //         "pfxz" =>$pfxz ,
    //         "x0" =>$x0 ,
    //         "y0" =>$y0 ,
    //         "z0" =>$z0 ,
    //         "vx0" =>$vx0 ,
    //         "vy0" =>$vy0 ,
    //         "vz0" =>$vz0 ,
    //         "ax0" =>$ax0 ,
    //         "ay0" =>$ay0 ,
    //         "az0" =>$az0 ,
    //         "home_team" =>$home_team ,
    //         "away_team" =>$away_team ,
    //         "stadium"=> $stadium ,
    //         "level" =>$level ,
    //         "league" =>$league ,
    //         "game_id" =>$game_id ,
    //         "pitch_uid" =>$pitch_uid,
               
    //         );
    //     }
    //     $response = array(
    //         "draw" => intval($draw),
    //         "iTotalRecords" => $totalRecords,
    //         "iTotalDisplayRecords" => $totalRecordswithFilter,
    //         "aaData" => $data_arr
    //     );

    //     echo json_encode($response);
    //     exit;
    // }
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
