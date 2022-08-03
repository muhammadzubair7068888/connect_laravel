@extends('supperadmin.layouts.master')

@section('title')
    @lang('Dashboard')
@endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/datepicker/datepicker.min.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Dashboard')
        @endslot
        @slot('title')
            @lang('Dashboard')
        @endslot
    @endcomponent
    <div class="spinner-grow text-success" role="status">
        <span class="sr-only">Loading...</span>
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
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-greetings />
                    <div class="center" style="">
                        <form id="dashboard-graph-setting-form">
                            <div class="row">
                                @if (auth()->user()->role == 'user')
                                @else
                                    <div class="col-sm-4">
                                        <label class="form-label">@lang('Select User')</label>
                                        <select class="form-control select2" id="user" name="user_id">
                                            <option value="{{ auth()->user()->id }}" selected>@lang('Me')</option>
                                            @foreach ($users as $user)
                                                @if ($user->first_name)
                                                    <option value="{{ $user->id }}">{{ $user->first_name }}&nbsp;
                                                        {{ $user->last_name }}</option>
                                                @else
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                @php
                                    $start_date = date('d-m-Y');
                                    $end_date = date('t-m-Y');
                                    $timestamp_start = strtotime($start_date);
                                    $timestamp_end = strtotime($end_date);
                                    $start_date = date('d M,Y', $timestamp_start);
                                    $end_date = date('d M,Y', $timestamp_end);
                                @endphp
                                <div class="col-sm-4">
                                    <label>Date Range</label>
                                    <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy"
                                        data-date-autoclose="true" data-provide="datepicker"
                                        data-date-container='#datepicker6'>
                                        <input type="text" class="form-control" name="start" id="start"
                                            placeholder="Start Date" autocomplete="off" value="{{ $start_date }}" />
                                        <input type="text" class="form-control" name="end" id="start"
                                            placeholder="End Date" autocomplete="off" value="{{ $end_date }}" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3" style="margin-top: 27px;">
                                        <button type="submit" class="btn btn-success">@lang('Search')</button>&nbsp;
                                        <button type="button" class="btn btn-light"
                                            id="btnClear">@lang('Clear')</button>&nbsp;
                                        @if (auth()->user()->role == 'superadmin' || auth()->user()->role == 'admin')
                                            <a><button type="button" class="btn btn-info"
                                                    onclick="impot_cvs()">@lang('Import CSV')</button></a>
                                        @endif
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
    @if (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="custom_data" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                                <tr>

                                    <th>@lang('Date')</th>
                                    <th>@lang('Time')</th>
                                    <th>@lang('PaOfInning')</th>
                                    <th>@lang('PitchOfPa')</th>
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
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    @endif

    <div class="row">
        @forelse ($velocities as $velocity)
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">{{ $velocity->name }}</h4>
                        <div id="{{ $velocity->key }}" class="apex-charts" dir="ltr"></div>
                    </div>
                </div>
                <!--end card-->
            </div>
        @empty
        @endforelse
    </div>

    <div id="chart"></div>
    {{ $id = auth()->id() }}

@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
    <script>
        function impot_cvs() {
            $('#import_cvs').modal('show');
        }
        const currentYear = new Date().getFullYear();
        const currentMonth = new Date().getMonth() + 1;
        const date = '' + currentYear + '-' + currentMonth + '-' + '1';
        $(document).ready(function() {
            $(".select2").select2();
        });
        $(document).ready(function() {
            $('#btnClear').click(function() {

                $('#dashboard-graph-setting-form input[type="text"]').val('');
                /*Clear textarea using id */
                $('#dashboard-graph-setting-form #user').val('');

            });
        });
        let weight = @json($weight);
        let arm_pain = @json($arm_pain);
        let mound_throw_velocit = @json($mount_throw_velocit);
        let pull_down_3 = @json($pull_down_3);
        let pull_down_4 = @json($pull_down_4);
        let pull_down_5 = @json($pull_down_5);
        let pull_down_6 = @json($pull_down_6);
        let pull_down_7 = @json($pull_down_7);
        let bench = @json($bench);
        let squat = @json($squat);
        let vertical_jump = @json($vertical_jump);
        let pull_down_velocity = @json($pull_down_velocity);
        let long_toss_distance = @json($long_toss_distance);
        let pylo7 = @json($pylo7);
        let pylo5 = @json($pylo5);
        let pylo3 = @json($pylo3);
        let deadlift = @json($deadlift);

        let max_weight = 0;
        let max_arm_pain = 0;
        let max_mound_throw_velocity = 0;
        let max_pull_down_3 = 0;
        let max_pull_down_4 = 0;
        let max_pull_down_5 = 0;
        let max_pull_down_6 = 0;
        let max_pull_down_7 = 0;
        let max_bench = 0;
        let max_squat = 0;
        let max_vertical_jump = 0;
        let max_pull_down_velocity = 0;
        let max_long_toss_distance = 0;
        let max_pylo_7 = 0;
        let max_pylo_5 = 0;
        let max_pylo_3 = 0;
        let max_deadlift = 0;

        for (let i = 0; i < 29; i += 1) {
            max_weight += weight[i];
            max_arm_pain += arm_pain[i];
            max_mound_throw_velocity += mound_throw_velocit[i];
            max_pull_down_3 += pull_down_3[i];
            max_pull_down_4 += pull_down_4[i];
            max_pull_down_5 += pull_down_5[i];
            max_pull_down_6 += pull_down_6[i];
            max_pull_down_7 += pull_down_7[i];
            max_bench += bench[i];
            max_squat += squat[i];
            max_vertical_jump += vertical_jump[i];
            max_pull_down_velocity += pull_down_velocity[i];
            max_long_toss_distance += long_toss_distance[i];
            max_pylo_7 += pylo7[i];
            max_pylo_5 += pylo5[i];
            max_pylo_3 += pylo7[i];
            max_deadlift += deadlift[i];
        }
    </script>
    <script></script>
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/apexchartsadmin/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/apexchartsadmin/apexcharts.init.js') }}"></script>
    {{-- <script src="{{ URL::asset('/assets/libs/apexchartsadmin/charts.js') }}"></script> --}}
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.spinner-grow').hide();
        });
        load_data();

        function load_data(user_id = '') {
            if (user_id == '') {
                user_id = {{ $id }}
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#custom_data').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                searching: true,
                ordering: false,
                ajax: {
                    url: "{{ route('pitch.filter') }}",
                    method: 'post',
                    data: {
                        user_id: user_id,
                    }
                },
                columns: [{
                        data: 'date'
                    },
                    {
                        data: "time"
                    },
                    {
                        data: "pa_of_inning"
                    },
                    {
                        data: "pitch_of_pa"
                    },
                    {
                        data: "pitcher_id"
                    },
                    {
                        data: "pitcher_throws"
                    },
                    {
                        data: "pitcher_team"
                    },
                    {
                        data: "batter"
                    },
                    {
                        data: "batter_id"
                    },
                    {
                        data: "batter_side"
                    },
                    {
                        data: "batter_team"
                    },
                    {
                        data: "pitcher_set"
                    },
                    {
                        data: "inning"
                    },
                    {
                        data: "top_bottom"
                    },
                    {
                        data: "outs"
                    },
                    {
                        data: "balls"
                    },
                    {
                        data: "strikes"
                    },
                    {
                        data: "tagged_pitch_type"
                    },
                    {
                        data: "auto_pitch"
                    },
                    {
                        data: "pitch_call"
                    },
                    {
                        data: "kor_bb"
                    },
                    {
                        data: "hit_type"
                    },
                    {
                        data: "play_result"
                    },
                    {
                        data: "outs_on_play"
                    },
                    {
                        data: "runs_scored"
                    },
                    {
                        data: "notes"
                    },
                    {
                        data: "rel_speed"
                    },
                    {
                        data: "vert_rel_angle"
                    },
                    {
                        data: "horz_rel_angle"
                    },
                    {
                        data: "spin_rate"
                    },
                    {
                        data: "spin_axis"
                    },
                    {
                        data: "tilt"
                    },
                    {
                        data: "rel_height"
                    },
                    {
                        data: "rel_side"
                    },
                    {
                        data: "extension"
                    },
                    {
                        data: "vert_break"
                    },
                    {
                        data: "induced_vert_break"
                    },
                    {
                        data: "horz_break"
                    },
                    {
                        data: "plate_loc_height"
                    },
                    {
                        data: "plate_loc_side"
                    },
                    {
                        data: "zone_speed"
                    },
                    {
                        data: "vert_appr_angle"
                    },
                    {
                        data: "horz_appr_angle"
                    },
                    {
                        data: "zone_time"
                    },
                    {
                        data: "exit_speed"
                    },
                    {
                        data: "angle"
                    },
                    {
                        data: "direction"
                    },
                    {
                        data: "hit_spin_rate"
                    },
                    {
                        data: "position_at_110_x"
                    },
                    {
                        data: "position_at_110_y"
                    },
                    {
                        data: "position_at_110_z"
                    },
                    {
                        data: "distance"
                    },
                    {
                        data: "last_tracked_distance"
                    },
                    {
                        data: "bearing"
                    },
                    {
                        data: "hang_time"
                    },
                    {
                        data: "pfxx"
                    },
                    {
                        data: "pfxz"
                    },
                    {
                        data: "x0"
                    },
                    {
                        data: "y0"
                    },
                    {
                        data: "z0"
                    },
                    {
                        data: "vx0"
                    },
                    {
                        data: "vy0"
                    },
                    {
                        data: "vz0"
                    },
                    {
                        data: "ax0"
                    },
                    {
                        data: "ay0"
                    },
                    {
                        data: "az0"
                    },
                    {
                        data: "home_team"
                    },
                    {
                        data: "away_team"
                    },
                    {
                        data: "stadium"
                    },
                    {
                        data: "level"
                    },
                    {
                        data: "league"
                    },
                    {
                        data: "game_id"
                    },
                    {
                        data: "pitch_uid"
                    },
                ]
            });
        }
    </script>


    <script>
        $(document).ready(function() {
            $('#dashboard-graph-setting-form').on('submit', function(event) {
                event.preventDefault();
                var form_data = $(this).serialize();
                var user_id = $("#user").val();
                var start = $("#start").val();
                var end = $("#end").val();
                $('#custom_data').DataTable().destroy();
                load_data(user_id, );
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{ route('search.velocity') }}",
                    method: "POST",
                    data: form_data,
                    dataType: "json",
                    async: true,
                    cache: false,
                    success: function(response) {
                        weight = response.weight;
                        arm_pain = response.arm_pain;
                        mound_throw_velocit = response.mound_throw_velocit;
                        pull_down_3 = response.pull_down_3;
                        pull_down_4 = response.pull_down_4;
                        pull_down_5 = response.pull_down_5;
                        pull_down_6 = response.pull_down_6;
                        pull_down_7 = response.pull_down_7;
                        bench = response.bench;
                        squat = response.squat;
                        vertical_jump = response.vertical_jump;
                        pull_down_velocity = response.pull_down_velocity;
                        long_toss_distance = response.long_toss_distance;
                        pylo7 = response.pylo7;
                        pylo5 = response.pylo5;
                        pylo3 = response.pylo3;
                        deadlift = response.deadlift;
                        weight_respon(weight);
                        arm_pain_respon(weight);
                        standing_long_toss_respon(pull_down_velocity);
                        mound_throws_velocity_respon(pull_down_3);
                        pull_down_3_respon(pull_down_3);
                        pull_down_4_respon(pull_down_4);
                        pull_down_5_respon(pull_down_5);
                        pull_down_6_respon(pull_down_6);
                        pull_down_7_respon(pull_down_7);
                    },
                    error: function(response) {
                        // swal("Error", "Something is wrong", "error");
                    }
                })
            });
        });
    </script>
    <script src="{{ URL::asset('/assets/libs/apexchartsadmin/charts.js') }}"></script>
@endsection
