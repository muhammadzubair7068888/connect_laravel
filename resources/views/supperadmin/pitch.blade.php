@extends('supperadmin.layouts.master')

@section('title')
    @lang('Pitch')
@endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .large {
            width: 30px;
            height: 30px;
        }
    </style>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Pitch')
        @endslot
        @slot('title')
            @lang('Pitch')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-greetings />
                    <div class="mb-3">
                        <a><button type="button" class="btn btn-info" onclick="impot_cvs()">@lang('Import CSV')</button></a>

                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>@lang('So.No')</th>
                                <th>@lang('Date')</th>
                                <th>@lang('Time')</th>
                                <th>@lang('PaOfInning')</th>
                                <th>@lang('PitchOfPa')</th>
                                <th>@lang('Pitcher')</th>
                                <th>@lang('PitcherID')</th>
                                <th>@lang('PitcherThrows')</th>
                                <th>@lang('PitcherTeam')</th>
                                <th>@lang('Batter')</th>
                                <th>@lang('BatterID')</th>
                                <th>@lang('BatterSide')</th>
                                <th>@lang('BatterTeam')</th>
                                <th>@lang('PitcherSet')</th>
                                <th>@lang('Inning')</th>
                                <th>@lang('Top/Bottom')</th>
                                <th>@lang('Outs')</th>
                                <th>@lang('Balls')</th>
                                <th>@lang('Strikes')</th>
                                <th>@lang('Tagged Pitch Type')</th>
                                <th>@lang('Auto Pitch')</th>
                                <th>@lang('Pitch Call')</th>
                                <th>@lang('Kor BB')</th>
                                <th>@lang('Hit Type')</th>
                                <th>@lang('Play Result')</th>
                                <th>@lang('Outs On Play')</th>
                                <th>@lang('Runs Scored')</th>
                                <th>@lang('Notes')</th>
                                <th>@lang('Rel Speed')</th>
                                <th>@lang('Vert Rel Angle')</th>
                                <th>@lang('Horz Rel Angle')</th>
                                <th>@lang('Spin Rate')</th>
                                <th>@lang('Spin Axis')</th>
                                <th>@lang('Tilt')</th>
                                <th>@lang('Rel Height')</th>
                                <th>@lang('Rel Side')</th>
                                <th>@lang('Extension')</th>
                                <th>@lang('Vert Break')</th>
                                <th>@lang('Induced Vert Break')</th>
                                <th>@lang('Horz Break')</th>
                                <th>@lang('Plate Loc Height')</th>
                                <th>@lang('Plate Loc Side')</th>
                                <th>@lang('Zone Speed')</th>
                                <th>@lang('Vert Appr Angle')</th>
                                <th>@lang('Horz Appr Angle')</th>
                                <th>@lang('Zone Time')</th>
                                <th>@lang('Exit Speed')</th>
                                <th>@lang('Angle')</th>
                                <th>@lang('Direction')</th>
                                <th>@lang('Hit Spin Rate')</th>
                                <th>@lang('Position At 110 X')</th>
                                <th>@lang('Position At 110 Y')</th>
                                <th>@lang('Position At 110 Z')</th>
                                <th>@lang('Distance')</th>
                                <th>@lang('Last Tracked Distance')</th>
                                <th>@lang('Bearing')</th>
                                <th>@lang('Hang Time')</th>
                                <th>@lang('Pfxx')</th>
                                <th>@lang('Pfxz')</th>
                                <th>@lang('X0')</th>
                                <th>@lang('Y0')</th>
                                <th>@lang('Z0')</th>
                                <th>@lang('VX0')</th>
                                <th>@lang('VY0')</th>
                                <th>@lang('VZ0')</th>
                                <th>@lang('AX0')</th>
                                <th>@lang('AY0')</th>
                                <th>@lang('AZ0')</th>
                                <th>@lang('Home Team')</th>
                                <th>@lang('Away Team')</th>
                                <th>@lang('Stadium')</th>
                                <th>@lang('Level')</th>
                                <th>@lang('League')</th>
                                <th>@lang('GameID')</th>
                                <th>@lang('PitchUID')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $j = 0;
                            @endphp
                            @forelse ($data as $pitch)
                                @php
                                    $j++;
                                @endphp
                                <tr>
                                    <td>{{ $j }}</td>
                                    <td>{{ $pitch->date }}</td>
                                    <td>{{ $pitch->time }}</td>
                                    <td>{{ $pitch->pa_of_inning }}</td>
                                    <td>{{ $pitch->pitch_of_pa }}</td>
                                    <td>{{ $pitch->pitcher }}</td>
                                    <td>{{ $pitch->pitcher_id }}</td>
                                    <td>{{ $pitch->pitcher_throws }}</td>
                                    <td>{{ $pitch->pitcher_team }}</td>
                                    <td>{{ $pitch->batter }}</td>
                                    <td>{{ $pitch->batter_id }}</td>
                                    <td>{{ $pitch->batter_side }}</td>
                                    <td>{{ $pitch->batter_team }}</td>
                                    <td>{{ $pitch->pitcher_set }}</td>
                                    <td>{{ $pitch->inning }}</td>
                                    <td>{{ $pitch->top_bottom }}</td>
                                    <td>{{ $pitch->outs }}</td>
                                    <td>{{ $pitch->balls }}</td>
                                    <td>{{ $pitch->strikes }}</td>
                                    <td>{{ $pitch->tagged_pitch_type }}</td>
                                    <td>{{ $pitch->auto_pitch }}</td>
                                    <td>{{ $pitch->pitch_call }}</td>
                                    <td>{{ $pitch->kor_bb }}</td>
                                    <td>{{ $pitch->hit_type }}</td>
                                    <td>{{ $pitch->play_result }}</td>
                                    <td>{{ $pitch->outs_on_play }}</td>
                                    <td>{{ $pitch->runs_scored }}</td>
                                    <td>{{ $pitch->notes }}</td>
                                    <td>{{ $pitch->rel_speed }}</td>
                                    <td>{{ $pitch->vert_rel_angle }}</td>
                                    <td>{{ $pitch->horz_rel_angle }}</td>
                                    <td>{{ $pitch->spin_rate }}</td>
                                    <td>{{ $pitch->spin_axis }}</td>
                                    <td>{{ $pitch->tilt }}</td>
                                    <td>{{ $pitch->rel_height }}</td>
                                    <td>{{ $pitch->rel_side }}</td>
                                    <td>{{ $pitch->extension }}</td>
                                    <td>{{ $pitch->vert_break }}</td>
                                    <td>{{ $pitch->induced_vert_break }}</td>
                                    <td>{{ $pitch->horz_break }}</td>
                                    <td>{{ $pitch->plate_loc_height }}</td>
                                    <td>{{ $pitch->plate_loc_side }}</td>
                                    <td>{{ $pitch->zone_speed }}</td>
                                    <td>{{ $pitch->vert_appr_angle }}</td>
                                    <td>{{ $pitch->horz_appr_angle }}</td>
                                    <td>{{ $pitch->zone_time }}</td>
                                    <td>{{ $pitch->exit_speed }}</td>
                                    <td>{{ $pitch->angle }}</td>
                                    <td>{{ $pitch->direction }}</td>
                                    <td>{{ $pitch->hit_spin_rate }}</td>
                                    <td>{{ $pitch->position_at_110_x }}</td>
                                    <td>{{ $pitch->position_at_110_y }}</td>
                                    <td>{{ $pitch->position_at_110_z }}</td>
                                    <td>{{ $pitch->distance }}</td>
                                    <td>{{ $pitch->last_tracked_distance }}</td>
                                    <td>{{ $pitch->bearing }}</td>
                                    <td>{{ $pitch->hang_time }}</td>
                                    <td>{{ $pitch->pfxx }}</td>
                                    <td>{{ $pitch->pfxz }}</td>
                                    <td>{{ $pitch->x0 }}</td>
                                    <td>{{ $pitch->y0 }}</td>
                                    <td>{{ $pitch->z0 }}</td>
                                    <td>{{ $pitch->vx0 }}</td>
                                    <td>{{ $pitch->vy0 }}</td>
                                    <td>{{ $pitch->vz0 }}</td>
                                    <td>{{ $pitch->ax0 }}</td>
                                    <td>{{ $pitch->ay0 }}</td>
                                    <td>{{ $pitch->az0 }}</td>
                                    <td>{{ $pitch->home_team }}</td>
                                    <td>{{ $pitch->away_team }}</td>
                                    <td>{{ $pitch->stadium }}</td>
                                    <td>{{ $pitch->level }}</td>
                                    <td>{{ $pitch->league }}</td>
                                    <td>{{ $pitch->game_id }}</td>
                                    <td>{{ $pitch->pitch_uid }}</td>



                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="import_cvs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">@lang('Impost CVS File')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('import.pitch') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input type="file" name="file" class="form-control">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang('Cancel')</button>
                    <button type="submit" class="btn btn-success">@lang('Import')</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
    <script>
        function impot_cvs() {
            $('#import_cvs').modal('show');
        }
    </script>
@endsection
