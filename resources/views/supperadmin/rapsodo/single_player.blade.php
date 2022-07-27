@extends('supperadmin.layouts.master')

@section('title')
    @lang('Player')
@endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
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
            @lang('Player')
        @endslot
        @slot('title')
            @lang('Player')
        @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <div class="col-2">
                        @if ($player->profilePhotoUrl == null)
                            <img class="users-avatar-shadow rounded-circle"
                                src="{{ asset('/assets/images/users/male.png') }}" height="150" width="150"
                                style="object-fit: cover; object-position: 0% 0%;">
                        @else
                            <img class="users-avatar-shadow rounded-circle" src="{{ $player->profilePhotoUrl }}"
                                height="150" width="150" style="object-fit: cover; object-position: 0% 0%;">
                        @endif

                    </div>
                </div>
                <div class="col-5">
                    <table>
                        <tr>
                            <td>
                                <h1 class=""
                                    style="font-family: BebasKai,sans-serif;
                                font-size: 47px;
                                line-height: 48px;
                                letter-spacing: .48px;
                                color: #383c41;
                                margin-bottom: 8px;
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;">
                                    {{ Str::upper($player->firstName) }}&nbsp;{{ Str::upper($player->lastName) }}</h1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img _ngcontent-kef-c137="" alt=""
                                    src="https://cloud.rapsodo.com/assets/icons/active.svg"> Active
                            </td>
                        </tr>
                        <tr>
                            <td> <img _ngcontent-kef-c137="" src="https://cloud.rapsodo.com/assets/icons/ball.svg"
                                    alt="">
                                Baseball</td>
                        </tr>
                        <td> <img _ngcontent-kef-c137="" src="https://cloud.rapsodo.com/assets/icons/playing-level.svg"
                                alt=""> College</td>
                        </tr>
                        <tr>
                            <td><img _ngcontent-kef-c137="" src="https://cloud.rapsodo.com/assets/icons/location.svg"
                                    alt=""> Berea, OH</td>

                            </td>
                        </tr>
                    </table>

                </div>
                <div class="col-2">
                    <table>
                        <tr>
                            <td>
                                <h1>{{ $player->weight }}<span style="font-size: 12px;">@lang('LBS')</span></h1>
                                <span>@lang('Weight')</span>
                            </td>
                        </tr>
                        @php
                            $timestamp = strtotime($player->dateOfBirthday);
                            $year = $day = date('Y', $timestamp);
                            $dob = date('Y') - $year;
                        @endphp
                        <td>
                            <h1>{{ $dob }}<span style="font-size: 12px;">@lang('YRS')</span></h1>
                            <span>@lang('Age')</span>
                        </td>
                        </tr>
                    </table>
                </div>
                <div class="col-2">
                    <table>
                        <tr>
                            <td>
                                <h1>{{ $player->height }}</h1>
                                <span>@lang('Height')</span>
                            </td>
                        </tr>
                        @php
                            $timestamp = strtotime($player->dateOfBirthday);
                            $year = $day = date('Y', $timestamp);
                            $dob = date('Y') - $year;
                        @endphp
                        <td>
                            <h1>R<span style="font-size: 12px;"></h1>
                            <span>@lang('Trow')</span>
                        </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title"></h4>
                <p class="card-title-desc"></p>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">@lang('Overview')</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">@lang('Sessions')</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                            <span class="d-none d-sm-block">@lang('Charts')</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#settings1" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                            <span class="d-none d-sm-block">@lang('Info')</span>
                        </a>
                    </li>
                </ul>
                @php
                    $start_date = date('d-m-Y');
                    $end_date = date('t-m-Y');
                    $timestamp_start = strtotime($start_date);
                    $timestamp_end = strtotime($end_date);
                    $start_date = date('d M,Y', $timestamp_start);
                    $end_date = date('d M,Y', $timestamp_end);
                @endphp
                <form id="rapsodo_filter">
                    @csrf
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Date Range</label>
                            <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy"
                                data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                <input type="text" class="form-control" name="start" id="to_date"
                                    placeholder="Start Date" autocomplete="off" value="{{ $start_date }}" />
                                <input type="text" class="form-control" id="to_date" name="end"
                                    placeholder="End Date" autocomplete="off" value="{{ $end_date }}" />
                                <input type="hidden" name="player_id" value="{{ $player->_id }}" />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3" style="margin-top: 27px;">
                                <button type="submit" id="filter" class="btn btn-success">@lang('Search')</button>

                            </div>
                        </div>
                    </div>
            </div>
            <!-- Tab panes -->
            <div class="tab-content p-3 text-muted">
                <div class="tab-pane active" id="home1" role="tabpanel">
                    <p>@lang('Pitching Data')</p>
                    <hr>
                    <table id="" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>@lang('Pitch Type')</th>
                                <th>@lang('Velo')</th>
                                <th>@lang('Max.velo')</th>
                                <th>@lang('RPM')</th>
                                <th>@lang('Max.RPM')</th>
                                <th>@lang('Vert Break')</th>
                                <th>@lang('Horz.Breack')</th>
                                <th>@lang('Spin Eff')</th>
                                <th>@lang('Gyro Deg')</th>
                                <th>@lang('Spin Dir')</th>
                                <th>@lang('Strike%')</th>
                                <th>@lang('Release Angle')</th>
                                <th>@lang('Horz Angle')</th>
                                <th>@lang('Release Height')</th>
                                <th>@lang('Release Side')</th>
                            </tr>
                        </thead>
                        <tbody id="over_view"></tbody>
                    </table>
                </div>
                <div class="tab-pane" id="profile1" role="tabpanel">
                    <p class="mb-0">
                        @lang('Comming Soon......')
                    </p>
                </div>
                <div class="tab-pane" id="messages1" role="tabpanel">
                    <p class="mb-0">
                        @lang('Comming Soon....')

                    </p>
                </div>
                <div class="tab-pane" id="settings1" role="tabpanel">
                    <p class="mb-0">
                        @lang('Comming Soon....')
                    </p>
                </div>
            </div>

        </div>
    </div>
    </div>

    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>
    <script>
        $('#rapsodo_filter').on('submit', function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "{{ route('filter.rapsodo') }}",
                method: "POST",
                data: form_data,
                dataType: "json",
                success: function(data) {
                    var avgVelocity = 0;
                    var html = '';
                    var i = 0;

                    console.log(data);
                    html += '<tr>';
                    html += '<td>';
                    html += 'FB';
                    html += '</td>';
                    html += '<td>';
                    html += data[i].avgVelocity;
                    html += '</td>';
                    html += '<td>';
                    html += data[i].maxVelocity;
                    html += '</td>';
                    html += '<td>';
                    html += data[i].avgRPM;
                    html += '</td>';
                    html += '<td>';
                    html += data[i].maxRPM;
                    html += '</td>';
                    html += '<td>';
                    html += data[i].avgVerticalBreak;
                    html += '</td>';
                    html += '<td>';
                    html += data[i].avgHorizontalBreak;
                    html += '</td>';
                    html += '<td>';
                    html += data[i].avgSpinEfficiency;
                    html += '</td>';
                    html += '<td>';
                    html += data[i].avgGyroDegree;
                    html += '</td>';
                    html += '<td>';
                    html += data[i].avgGyroDegree;
                    html += '</td>';
                    html += '<td>';
                    html += data[i].strikeRatio;
                    html += '%';
                    html += '</td>';
                    html += '<td>';
                    html += data[i].avgReleaseAngle;
                    html += '</td>';
                    html += '<td>';
                    html += data[i].avgHorizontalAngle;
                    html += '</td>';
                    html += '<td>';
                    html += data[i].avgReleaseHeight;
                    html += '</td>';
                    html += '<td>';
                    html += data[i].avgReleaseSide;
                    html += '</td>';
                    html += '</tr>';
                    $('#over_view').html(html);

                    if (typeof data[1] !== 'undefined') {
                        var i = 1;
                        html += '<tr>';
                        html += '<td>';
                        html += data[i].pitchType;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgVelocity;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].maxVelocity;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgRPM;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].maxRPM;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgVerticalBreak;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgHorizontalBreak;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgSpinEfficiency;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgGyroDegree;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgGyroDegree;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].strikeRatio;
                        html += '%';
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgReleaseAngle;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgHorizontalAngle;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgReleaseHeight;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgReleaseSide;
                        html += '</td>';
                        html += '</tr>';
                        $('#over_view').html(html);
                    }
                    if (typeof data[6] !== 'undefined') {
                        var i = 6;
                        html += '<tr>';
                        html += '<td>';
                        html += 'CH'
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgVelocity;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].maxVelocity;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgRPM;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].maxRPM;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgVerticalBreak;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgHorizontalBreak;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgSpinEfficiency;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgGyroDegree;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgGyroDegree;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].strikeRatio;
                        html += '%';
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgReleaseAngle;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgHorizontalAngle;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgReleaseHeight;
                        html += '</td>';
                        html += '<td>';
                        html += data[i].avgReleaseSide;
                        html += '</td>';
                        html += '</tr>';
                        $('#over_view').html(html);
                    }


                },
                error: function(response) {

                    alert("Failed")
                }
            });
        });
    </script>
@endsection
