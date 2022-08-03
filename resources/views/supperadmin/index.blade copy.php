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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="center" style="">
                        <form id="dashboard-graph-setting-form">
                            @csrf
                            <div class="row">
                                @if (auth()->user()->role == 'user')
                                @else
                                    <div class="col-sm-4">
                                        <label class="form-label">@lang('Select User')</label>
                                        <select class="form-control select2" id="user" name="name">
                                            <option value="{{ auth()->user()->id }}" selected>@lang('Me')</option>
                                            @foreach ($users as $user)
                                        @if ($user->first_name)
                                                <option value="{{ $user->id }}">{{ $user->first_name }}&nbsp; {{$user->last_name}}</option>
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
                                        <input type="text" class="form-control" name="start" placeholder="Start Date"
                                            autocomplete="off" value="{{ $start_date }}" />
                                        <input type="text" class="form-control" name="end" placeholder="End Date"
                                            autocomplete="off" value="{{ $end_date }}" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3" style="margin-top: 27px;">
                                        <button type="submit" class="btn btn-success">@lang('Search')</button>
                                        <button type="button" class="btn btn-light"
                                            id="btnClear">@lang('Clear')</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </thead>


                        <tbody>
                            <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                            </tr>
                            
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

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
@endsection
@section('script')
    <script>
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
        $('#dashboard-graph-setting-form').on('submit', function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "{{ route('search.velocity') }}",
                method: "POST",
                data: form_data,
                dataType: "json",
                success: function(response) {
                    weight = response.weight;
                    arm_pain = response.arm_pain; 
                    mound_throw_velocit = response.mound_throw_velocit ;
                    pull_down_3 =response.pull_down_3; 
                    pull_down_4 = response.pull_down_4;
                    pull_down_5 = response.pull_down_5;
                    pull_down_6 = response.pull_down_6;
                    pull_down_7 = response.pull_down_7;
                    bench = response.bench;
                    squat = response.squat;
                    vertical_jump =response.vertical_jump;
                    pull_down_velocity =response.pull_down_velocity;
                    long_toss_distance =response.long_toss_distance ;
                    pylo7 = response.pylo7;
                    pylo5 =response.pylo5;
                    pylo3 = response.pylo3;
                    deadlift =response.deadlift ;
                    swal("Success", "Done", "success");            
                    var options = {
                            chart: {
                                height: 380,
                                type: "line",
                                zoom: {
                                    enabled: !1
                                },
                                toolbar: {
                                    show: !1
                                }
                            },
                            colors: ["#556ee6", "#34c38f"],
                            dataLabels: {
                                enabled: !1
                            },
                            stroke: {
                                width: [3, 3],
                                curve: "straight"
                            },
                            series: [{
                                name: "",
                                data: weight
                            }, ],
                            title: {
                                text: "",
                                align: "left",
                                style: {
                                    fontWeight: "500"
                                }
                            },
                            grid: {
                                row: {
                                    colors: ["transparent", "transparent"],
                                    opacity: .2
                                },
                                borderColor: "#f1f1f1"
                            },
                            markers: {
                                style: "inverted",
                                size: 6
                            },
                            xaxis: {
                                categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' +
                                    currentYear + '-' + currentMonth +
                                    '-' + '2', '' + currentYear + '-' + currentMonth + '-' + '3',
                                    '' + currentYear + '-' +
                                    currentMonth + '-' + '4',
                                    '' + currentYear + '-' + currentMonth + '-' + '5', '' +
                                    currentYear + '-' + currentMonth + '-' +
                                    '6', '' + currentYear + '-' + currentMonth + '-' + '7', '' +
                                    currentYear + '-' + currentMonth +
                                    '-' + '8',
                                    '' + currentYear + '-' + currentMonth + '-' + '9', '' +
                                    currentYear + '-' + currentMonth + '-' +
                                    '10', '' + currentYear + '-' + currentMonth + '-' + '11', '' +
                                    currentYear + '-' +
                                    currentMonth + '-' + '12', '' +
                                    currentYear + '-' + currentMonth + '-' + '13', '' +
                                    currentYear + '-' + currentMonth + '-' +
                                    '14', '' + currentYear + '-' + currentMonth + '-' + '15', '' +
                                    currentYear + '-' +
                                    currentMonth + '-' + '16',
                                    '' + currentYear + '-' + currentMonth + '-' + '17', '' +
                                    currentYear + '-' + currentMonth +
                                    '-' + '18', '' + currentYear + '-' + currentMonth + '-' + '19',
                                    '' + currentYear + '-' +
                                    currentMonth + '-' + '20',
                                    '' + currentYear + '-' + currentMonth + '-' + '21', '' +
                                    currentYear + '-' + currentMonth +
                                    '-' + '22', '' + currentYear + '-' + currentMonth + '-' + '23',
                                    '' + currentYear + '-' +
                                    currentMonth + '-' + '24',
                                    '' + currentYear + '-' + currentMonth + '-' + '25', '' +
                                    currentYear + '-' + currentMonth +
                                    '-' + '26', '' + currentYear + '-' + currentMonth + '-' + '27',
                                    '' + currentYear + '-' +
                                    currentMonth + '-' + '28'
                                ],
                                title: {
                                    text: "Month"
                                }
                            },
                            yaxis: {
                                title: {
                                    text: ""
                                },
                                min: -1.0,
                                max: max_weight + 1
                            },
                            legend: {
                                position: "top",
                                horizontalAlign: "right",

                            },
                            responsive: [{
                                breakpoint: 600,
                                options: {
                                    chart: {
                                        toolbar: {
                                            show: !1
                                        }
                                    },
                                    legend: {
                                        show: !1
                                    }
                                }
                            }]
                        },
                        chart = new ApexCharts(document.querySelector("#weight"), options);
                    chart.render();

                    // Arm Pain
                    options = {
                            chart: {
                                height: 380,
                                type: "line",
                                zoom: {
                                    enabled: !1
                                },
                                toolbar: {
                                    show: !1
                                }
                            },
                            colors: ["#556ee6", "#34c38f"],
                            dataLabels: {
                                enabled: !1
                            },
                            stroke: {
                                width: [3, 3],
                                curve: "straight"
                            },
                            series: [{
                                name: "",
                                data: arm_pain
                            }, ],
                            title: {
                                text: "",
                                align: "left",
                                style: {
                                    fontWeight: "500"
                                }
                            },
                            grid: {
                                row: {
                                    colors: ["transparent", "transparent"],
                                    opacity: .2
                                },
                                borderColor: "#f1f1f1"
                            },
                            markers: {
                                style: "inverted",
                                size: 6
                            },
                            xaxis: {

                                categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' +
                                    currentYear + '-' + currentMonth + '-' + '2', '' + currentYear +
                                    '-' + currentMonth + '-' + '3', '' + currentYear + '-' +
                                    currentMonth + '-' + '4',
                                    '' + currentYear + '-' + currentMonth + '-' + '5', '' +
                                    currentYear + '-' + currentMonth + '-' + '6', '' + currentYear +
                                    '-' + currentMonth + '-' + '7', '' + currentYear + '-' +
                                    currentMonth + '-' + '8',
                                    '' + currentYear + '-' + currentMonth + '-' + '9', '' +
                                    currentYear + '-' + currentMonth + '-' + '10', '' +
                                    currentYear + '-' + currentMonth + '-' + '11', '' +
                                    currentYear + '-' + currentMonth + '-' + '12', '' +
                                    currentYear + '-' + currentMonth + '-' + '13', '' +
                                    currentYear + '-' + currentMonth + '-' + '14', '' +
                                    currentYear + '-' + currentMonth + '-' + '15', '' +
                                    currentYear + '-' + currentMonth + '-' + '16',
                                    '' + currentYear + '-' + currentMonth + '-' + '17', '' +
                                    currentYear + '-' + currentMonth + '-' + '18', '' +
                                    currentYear + '-' + currentMonth + '-' + '19', '' +
                                    currentYear + '-' + currentMonth + '-' + '20',
                                    '' + currentYear + '-' + currentMonth + '-' + '21', '' +
                                    currentYear + '-' + currentMonth + '-' + '22', '' +
                                    currentYear + '-' + currentMonth + '-' + '23', '' +
                                    currentYear + '-' + currentMonth + '-' + '24',
                                    '' + currentYear + '-' + currentMonth + '-' + '25', '' +
                                    currentYear + '-' + currentMonth + '-' + '26', '' +
                                    currentYear + '-' + currentMonth + '-' + '27', '' +
                                    currentYear + '-' + currentMonth + '-' + '28'
                                ],
                                title: {
                                    text: "Month"
                                }
                            },
                            yaxis: {
                                title: {
                                    text: ""
                                },
                                min: -1.0,
                                max: max_arm_pain + 1
                            },
                            legend: {
                                position: "top",
                                horizontalAlign: "right",
                                floating: !0,
                                offsetY: -0,
                                offsetX: -0
                            },
                            responsive: [{
                                breakpoint: 600,
                                options: {
                                    chart: {
                                        toolbar: {
                                            show: !1
                                        }
                                    },
                                    legend: {
                                        show: !1
                                    }
                                }
                            }]
                        },
                        chart = new ApexCharts(document.querySelector("#arm_pain"), options);
                    chart.render();

                    // Standing Long Toss 
                    options = {
                            chart: {
                                height: 380,
                                type: "line",
                                zoom: {
                                    enabled: !1
                                },
                                toolbar: {
                                    show: !1
                                }
                            },
                            colors: ["#556ee6", "#34c38f"],
                            dataLabels: {
                                enabled: !1
                            },
                            stroke: {
                                width: [3, 3],
                                curve: "straight"
                            },
                            series: [{
                                name: "",
                                data: pull_down_velocity
                            }, ],
                            title: {
                                text: "",
                                align: "left",
                                style: {
                                    fontWeight: "500"
                                }
                            },
                            grid: {
                                row: {
                                    colors: ["transparent", "transparent"],
                                    opacity: .2
                                },
                                borderColor: "#f1f1f1"
                            },
                            markers: {
                                style: "inverted",
                                size: 6
                            },
                            xaxis: {

                                categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' +
                                    currentYear + '-' + currentMonth + '-' + '2', '' + currentYear +
                                    '-' + currentMonth + '-' + '3', '' + currentYear + '-' +
                                    currentMonth + '-' + '4',
                                    '' + currentYear + '-' + currentMonth + '-' + '5', '' +
                                    currentYear + '-' + currentMonth + '-' + '6', '' + currentYear +
                                    '-' + currentMonth + '-' + '7', '' + currentYear + '-' +
                                    currentMonth + '-' + '8',
                                    '' + currentYear + '-' + currentMonth + '-' + '9', '' +
                                    currentYear + '-' + currentMonth + '-' + '10', '' +
                                    currentYear + '-' + currentMonth + '-' + '11', '' +
                                    currentYear + '-' + currentMonth + '-' + '12', '' +
                                    currentYear + '-' + currentMonth + '-' + '13', '' +
                                    currentYear + '-' + currentMonth + '-' + '14', '' +
                                    currentYear + '-' + currentMonth + '-' + '15', '' +
                                    currentYear + '-' + currentMonth + '-' + '16',
                                    '' + currentYear + '-' + currentMonth + '-' + '17', '' +
                                    currentYear + '-' + currentMonth + '-' + '18', '' +
                                    currentYear + '-' + currentMonth + '-' + '19', '' +
                                    currentYear + '-' + currentMonth + '-' + '20',
                                    '' + currentYear + '-' + currentMonth + '-' + '21', '' +
                                    currentYear + '-' + currentMonth + '-' + '22', '' +
                                    currentYear + '-' + currentMonth + '-' + '23', '' +
                                    currentYear + '-' + currentMonth + '-' + '24',
                                    '' + currentYear + '-' + currentMonth + '-' + '25', '' +
                                    currentYear + '-' + currentMonth + '-' + '26', '' +
                                    currentYear + '-' + currentMonth + '-' + '27', '' +
                                    currentYear + '-' + currentMonth + '-' + '28'
                                ],
                                title: {
                                    text: "Month"
                                }
                            },
                            yaxis: {
                                title: {
                                    text: " "
                                },
                                min: -1.0,
                                max: max_pull_down_velocity + 1
                            },
                            legend: {
                                position: "top",
                                horizontalAlign: "right",
                                floating: !0,
                                offsetY: -0,
                                offsetX: -0
                            },
                            responsive: [{
                                breakpoint: 600,
                                options: {
                                    chart: {
                                        toolbar: {
                                            show: !1
                                        }
                                    },
                                    legend: {
                                        show: !1
                                    }
                                }
                            }]
                        },
                        chart = new ApexCharts(document.querySelector("#pull_down_velocity"), options);
                    chart.render();

                    // Mound throws Velocity

                    options = {
                            chart: {
                                height: 380,
                                type: "line",
                                zoom: {
                                    enabled: !1
                                },
                                toolbar: {
                                    show: !1
                                }
                            },
                            colors: ["#556ee6", "#34c38f"],
                            dataLabels: {
                                enabled: !1
                            },
                            stroke: {
                                width: [3, 3],
                                curve: "straight"
                            },
                            series: [{
                                name: "",
                                data: mound_throw_velocit
                            }, ],
                            title: {
                                text: "",
                                align: "left",
                                style: {
                                    fontWeight: "500"
                                }
                            },
                            grid: {
                                row: {
                                    colors: ["transparent", "transparent"],
                                    opacity: .2
                                },
                                borderColor: "#f1f1f1"
                            },
                            markers: {
                                style: "inverted",
                                size: 6
                            },
                            xaxis: {

                                categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' +
                                    currentYear + '-' + currentMonth + '-' + '2', '' + currentYear +
                                    '-' + currentMonth + '-' + '3', '' + currentYear + '-' +
                                    currentMonth + '-' + '4',
                                    '' + currentYear + '-' + currentMonth + '-' + '5', '' +
                                    currentYear + '-' + currentMonth + '-' + '6', '' + currentYear +
                                    '-' + currentMonth + '-' + '7', '' + currentYear + '-' +
                                    currentMonth + '-' + '8',
                                    '' + currentYear + '-' + currentMonth + '-' + '9', '' +
                                    currentYear + '-' + currentMonth + '-' + '10', '' +
                                    currentYear + '-' + currentMonth + '-' + '11', '' +
                                    currentYear + '-' + currentMonth + '-' + '12', '' +
                                    currentYear + '-' + currentMonth + '-' + '13', '' +
                                    currentYear + '-' + currentMonth + '-' + '14', '' +
                                    currentYear + '-' + currentMonth + '-' + '15', '' +
                                    currentYear + '-' + currentMonth + '-' + '16',
                                    '' + currentYear + '-' + currentMonth + '-' + '17', '' +
                                    currentYear + '-' + currentMonth + '-' + '18', '' +
                                    currentYear + '-' + currentMonth + '-' + '19', '' +
                                    currentYear + '-' + currentMonth + '-' + '20',
                                    '' + currentYear + '-' + currentMonth + '-' + '21', '' +
                                    currentYear + '-' + currentMonth + '-' + '22', '' +
                                    currentYear + '-' + currentMonth + '-' + '23', '' +
                                    currentYear + '-' + currentMonth + '-' + '24',
                                    '' + currentYear + '-' + currentMonth + '-' + '25', '' +
                                    currentYear + '-' + currentMonth + '-' + '26', '' +
                                    currentYear + '-' + currentMonth + '-' + '27', '' +
                                    currentYear + '-' + currentMonth + '-' + '28'
                                ],
                                title: {
                                    text: "Month"
                                }
                            },
                            yaxis: {
                                title: {
                                    text: ""
                                },
                                min: -1.0,
                                max: max_mound_throw_velocity + 1
                            },
                            legend: {
                                position: "top",
                                horizontalAlign: "right",
                                floating: !0,
                                offsetY: -0,
                                offsetX: -0
                            },
                            responsive: [{
                                breakpoint: 600,
                                options: {
                                    chart: {
                                        toolbar: {
                                            show: !1
                                        }
                                    },
                                    legend: {
                                        show: !1
                                    }
                                }
                            }]
                        },
                        chart = new ApexCharts(document.querySelector("#mound_throws_velocity"),
                            options);
                    chart.render();
                    options = {
                            chart: {
                                height: 380,
                                type: "line",
                                zoom: {
                                    enabled: !1
                                },
                                toolbar: {
                                    show: !1
                                }
                            },
                            colors: ["#556ee6", "#34c38f"],
                            dataLabels: {
                                enabled: !1
                            },
                            stroke: {
                                width: [3, 3],
                                curve: "straight"
                            },
                            series: [{
                                name: "",
                                data: pull_down_3
                            }, ],
                            title: {
                                text: "",
                                align: "left",
                                style: {
                                    fontWeight: "500"
                                }
                            },
                            grid: {
                                row: {
                                    colors: ["transparent", "transparent"],
                                    opacity: .2
                                },
                                borderColor: "#f1f1f1"
                            },
                            markers: {
                                style: "inverted",
                                size: 6
                            },
                            xaxis: {

                                categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' +
                                    currentYear + '-' + currentMonth + '-' + '2', '' + currentYear +
                                    '-' + currentMonth + '-' + '3', '' + currentYear + '-' +
                                    currentMonth + '-' + '4',
                                    '' + currentYear + '-' + currentMonth + '-' + '5', '' +
                                    currentYear + '-' + currentMonth + '-' + '6', '' + currentYear +
                                    '-' + currentMonth + '-' + '7', '' + currentYear + '-' +
                                    currentMonth + '-' + '8',
                                    '' + currentYear + '-' + currentMonth + '-' + '9', '' +
                                    currentYear + '-' + currentMonth + '-' + '10', '' +
                                    currentYear + '-' + currentMonth + '-' + '11', '' +
                                    currentYear + '-' + currentMonth + '-' + '12', '' +
                                    currentYear + '-' + currentMonth + '-' + '13', '' +
                                    currentYear + '-' + currentMonth + '-' + '14', '' +
                                    currentYear + '-' + currentMonth + '-' + '15', '' +
                                    currentYear + '-' + currentMonth + '-' + '16',
                                    '' + currentYear + '-' + currentMonth + '-' + '17', '' +
                                    currentYear + '-' + currentMonth + '-' + '18', '' +
                                    currentYear + '-' + currentMonth + '-' + '19', '' +
                                    currentYear + '-' + currentMonth + '-' + '20',
                                    '' + currentYear + '-' + currentMonth + '-' + '21', '' +
                                    currentYear + '-' + currentMonth + '-' + '22', '' +
                                    currentYear + '-' + currentMonth + '-' + '23', '' +
                                    currentYear + '-' + currentMonth + '-' + '24',
                                    '' + currentYear + '-' + currentMonth + '-' + '25', '' +
                                    currentYear + '-' + currentMonth + '-' + '26', '' +
                                    currentYear + '-' + currentMonth + '-' + '27', '' +
                                    currentYear + '-' + currentMonth + '-' + '28'
                                ],
                                title: {
                                    text: "Month"
                                }
                            },
                            yaxis: {
                                title: {
                                    text: ""
                                },
                                min: -1.0,
                                max: max_pull_down_3 + 1
                            },
                            legend: {
                                position: "top",
                                horizontalAlign: "right",
                                floating: !0,
                                offsetY: -900,
                                offsetX: -0
                            },
                            responsive: [{
                                breakpoint: 600,
                                options: {
                                    chart: {
                                        toolbar: {
                                            show: !1
                                        }
                                    },
                                    legend: {
                                        show: !1
                                    }
                                }
                            }]
                        },
                        chart = new ApexCharts(document.querySelector("#pull_down_3"), options);
                    chart.render();


                    options = {
                            chart: {
                                height: 380,
                                type: "line",
                                zoom: {
                                    enabled: !1
                                },
                                toolbar: {
                                    show: !1
                                }
                            },
                            colors: ["#556ee6", "#34c38f"],
                            dataLabels: {
                                enabled: !1
                            },
                            stroke: {
                                width: [3, 3],
                                curve: "straight"
                            },
                            series: [{
                                name: "",
                                data: pull_down_4
                            }, ],
                            title: {
                                text: "",
                                align: "left",
                                style: {
                                    fontWeight: "500"
                                }
                            },
                            grid: {
                                row: {
                                    colors: ["transparent", "transparent"],
                                    opacity: .2
                                },
                                borderColor: "#f1f1f1"
                            },
                            markers: {
                                style: "inverted",
                                size: 6
                            },
                            xaxis: {

                                categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' +
                                    currentYear + '-' + currentMonth + '-' + '2', '' + currentYear +
                                    '-' + currentMonth + '-' + '3', '' + currentYear + '-' +
                                    currentMonth + '-' + '4',
                                    '' + currentYear + '-' + currentMonth + '-' + '5', '' +
                                    currentYear + '-' + currentMonth + '-' + '6', '' + currentYear +
                                    '-' + currentMonth + '-' + '7', '' + currentYear + '-' +
                                    currentMonth + '-' + '8',
                                    '' + currentYear + '-' + currentMonth + '-' + '9', '' +
                                    currentYear + '-' + currentMonth + '-' + '10', '' +
                                    currentYear + '-' + currentMonth + '-' + '11', '' +
                                    currentYear + '-' + currentMonth + '-' + '12', '' +
                                    currentYear + '-' + currentMonth + '-' + '13', '' +
                                    currentYear + '-' + currentMonth + '-' + '14', '' +
                                    currentYear + '-' + currentMonth + '-' + '15', '' +
                                    currentYear + '-' + currentMonth + '-' + '16',
                                    '' + currentYear + '-' + currentMonth + '-' + '17', '' +
                                    currentYear + '-' + currentMonth + '-' + '18', '' +
                                    currentYear + '-' + currentMonth + '-' + '19', '' +
                                    currentYear + '-' + currentMonth + '-' + '20',
                                    '' + currentYear + '-' + currentMonth + '-' + '21', '' +
                                    currentYear + '-' + currentMonth + '-' + '22', '' +
                                    currentYear + '-' + currentMonth + '-' + '23', '' +
                                    currentYear + '-' + currentMonth + '-' + '24',
                                    '' + currentYear + '-' + currentMonth + '-' + '25', '' +
                                    currentYear + '-' + currentMonth + '-' + '26', '' +
                                    currentYear + '-' + currentMonth + '-' + '27', '' +
                                    currentYear + '-' + currentMonth + '-' + '28'
                                ],
                                title: {
                                    text: "Month"
                                }
                            },
                            yaxis: {
                                title: {
                                    text: ""
                                },
                                min: -1.0,
                                max: max_pull_down_4 + 1
                            },
                            legend: {
                                position: "top",
                                horizontalAlign: "right",
                                floating: !0,
                                offsetY: -25,
                                offsetX: -5
                            },
                            responsive: [{
                                breakpoint: 600,
                                options: {
                                    chart: {
                                        toolbar: {
                                            show: !1
                                        }
                                    },
                                    legend: {
                                        show: !1
                                    }
                                }
                            }]
                        },
                        chart = new ApexCharts(document.querySelector("#pull_down_4"), options);
                    chart.render();


                    options = {
                            chart: {
                                height: 380,
                                type: "line",
                                zoom: {
                                    enabled: !1
                                },
                                toolbar: {
                                    show: !1
                                }
                            },
                            colors: ["#556ee6", "#34c38f"],
                            dataLabels: {
                                enabled: !1
                            },
                            stroke: {
                                width: [3, 3],
                                curve: "straight"
                            },
                            series: [{
                                name: "",
                                data: pull_down_5
                            }, ],
                            title: {
                                text: "",
                                align: "left",
                                style: {
                                    fontWeight: "500"
                                }
                            },
                            grid: {
                                row: {
                                    colors: ["transparent", "transparent"],
                                    opacity: .2
                                },
                                borderColor: "#f1f1f1"
                            },
                            markers: {
                                style: "inverted",
                                size: 6
                            },
                            xaxis: {

                                categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' +
                                    currentYear + '-' + currentMonth + '-' + '2', '' + currentYear +
                                    '-' + currentMonth + '-' + '3', '' + currentYear + '-' +
                                    currentMonth + '-' + '4',
                                    '' + currentYear + '-' + currentMonth + '-' + '5', '' +
                                    currentYear + '-' + currentMonth + '-' + '6', '' + currentYear +
                                    '-' + currentMonth + '-' + '7', '' + currentYear + '-' +
                                    currentMonth + '-' + '8',
                                    '' + currentYear + '-' + currentMonth + '-' + '9', '' +
                                    currentYear + '-' + currentMonth + '-' + '10', '' +
                                    currentYear + '-' + currentMonth + '-' + '11', '' +
                                    currentYear + '-' + currentMonth + '-' + '12', '' +
                                    currentYear + '-' + currentMonth + '-' + '13', '' +
                                    currentYear + '-' + currentMonth + '-' + '14', '' +
                                    currentYear + '-' + currentMonth + '-' + '15', '' +
                                    currentYear + '-' + currentMonth + '-' + '16',
                                    '' + currentYear + '-' + currentMonth + '-' + '17', '' +
                                    currentYear + '-' + currentMonth + '-' + '18', '' +
                                    currentYear + '-' + currentMonth + '-' + '19', '' +
                                    currentYear + '-' + currentMonth + '-' + '20',
                                    '' + currentYear + '-' + currentMonth + '-' + '21', '' +
                                    currentYear + '-' + currentMonth + '-' + '22', '' +
                                    currentYear + '-' + currentMonth + '-' + '23', '' +
                                    currentYear + '-' + currentMonth + '-' + '24',
                                    '' + currentYear + '-' + currentMonth + '-' + '25', '' +
                                    currentYear + '-' + currentMonth + '-' + '26', '' +
                                    currentYear + '-' + currentMonth + '-' + '27', '' +
                                    currentYear + '-' + currentMonth + '-' + '28'
                                ],
                                title: {
                                    text: "Month"
                                }
                            },
                            yaxis: {
                                title: {
                                    text: ""
                                },
                                min: -1.0,
                                max: max_pull_down_5 + 1
                            },
                            legend: {
                                position: "top",
                                horizontalAlign: "right",
                                floating: !0,
                                offsetY: -25,
                                offsetX: -5
                            },
                            responsive: [{
                                breakpoint: 600,
                                options: {
                                    chart: {
                                        toolbar: {
                                            show: !1
                                        }
                                    },
                                    legend: {
                                        show: !1
                                    }
                                }
                            }]
                        },
                        chart = new ApexCharts(document.querySelector("#pull_down_5"), options);
                    chart.render();
                    // Pull Downs 6

                    options = {
                            chart: {
                                height: 380,
                                type: "line",
                                zoom: {
                                    enabled: !1
                                },
                                toolbar: {
                                    show: !1
                                }
                            },
                            colors: ["#556ee6", "#34c38f"],
                            dataLabels: {
                                enabled: !1
                            },
                            stroke: {
                                width: [3, 3],
                                curve: "straight"
                            },
                            series: [{
                                name: "",
                                data: pull_down_6
                            }, ],
                            title: {
                                text: "",
                                align: "left",
                                style: {
                                    fontWeight: "500"
                                }
                            },
                            grid: {
                                row: {
                                    colors: ["transparent", "transparent"],
                                    opacity: .2
                                },
                                borderColor: "#f1f1f1"
                            },
                            markers: {
                                style: "inverted",
                                size: 6
                            },
                            xaxis: {

                                categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' +
                                    currentYear + '-' + currentMonth + '-' + '2', '' + currentYear +
                                    '-' + currentMonth + '-' + '3', '' + currentYear + '-' +
                                    currentMonth + '-' + '4',
                                    '' + currentYear + '-' + currentMonth + '-' + '5', '' +
                                    currentYear + '-' + currentMonth + '-' + '6', '' + currentYear +
                                    '-' + currentMonth + '-' + '7', '' + currentYear + '-' +
                                    currentMonth + '-' + '8',
                                    '' + currentYear + '-' + currentMonth + '-' + '9', '' +
                                    currentYear + '-' + currentMonth + '-' + '10', '' +
                                    currentYear + '-' + currentMonth + '-' + '11', '' +
                                    currentYear + '-' + currentMonth + '-' + '12', '' +
                                    currentYear + '-' + currentMonth + '-' + '13', '' +
                                    currentYear + '-' + currentMonth + '-' + '14', '' +
                                    currentYear + '-' + currentMonth + '-' + '15', '' +
                                    currentYear + '-' + currentMonth + '-' + '16',
                                    '' + currentYear + '-' + currentMonth + '-' + '17', '' +
                                    currentYear + '-' + currentMonth + '-' + '18', '' +
                                    currentYear + '-' + currentMonth + '-' + '19', '' +
                                    currentYear + '-' + currentMonth + '-' + '20',
                                    '' + currentYear + '-' + currentMonth + '-' + '21', '' +
                                    currentYear + '-' + currentMonth + '-' + '22', '' +
                                    currentYear + '-' + currentMonth + '-' + '23', '' +
                                    currentYear + '-' + currentMonth + '-' + '24',
                                    '' + currentYear + '-' + currentMonth + '-' + '25', '' +
                                    currentYear + '-' + currentMonth + '-' + '26', '' +
                                    currentYear + '-' + currentMonth + '-' + '27', '' +
                                    currentYear + '-' + currentMonth + '-' + '28'
                                ],
                                title: {
                                    text: "Month"
                                }
                            },
                            yaxis: {
                                title: {
                                    text: ""
                                },
                                min: -1.0,
                                max: max_pull_down_6 + 1
                            },
                            legend: {
                                position: "top",
                                horizontalAlign: "right",
                                floating: !0,
                                offsetY: -25,
                                offsetX: -5
                            },
                            responsive: [{
                                breakpoint: 600,
                                options: {
                                    chart: {
                                        toolbar: {
                                            show: !1
                                        }
                                    },
                                    legend: {
                                        show: !1
                                    }
                                }
                            }]
                        },
                        chart = new ApexCharts(document.querySelector("#pull_down_6"), options);
                    chart.render();
                    options = {
                            chart: {
                                height: 380,
                                type: "line",
                                zoom: {
                                    enabled: !1
                                },
                                toolbar: {
                                    show: !1
                                }
                            },
                            colors: ["#556ee6", "#34c38f"],
                            dataLabels: {
                                enabled: !1
                            },
                            stroke: {
                                width: [3, 3],
                                curve: "straight"
                            },
                            series: [{
                                name: "",
                                data: pull_down_7 //[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
                            }, ],
                            title: {
                                text: "",
                                align: "left",
                                style: {
                                    fontWeight: "500"
                                }
                            },
                            grid: {
                                row: {
                                    colors: ["transparent", "transparent"],
                                    opacity: .2
                                },
                                borderColor: "#f1f1f1"
                            },
                            markers: {
                                style: "inverted",
                                size: 6
                            },
                            xaxis: {

                                categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' +
                                    currentYear + '-' + currentMonth + '-' + '2', '' + currentYear +
                                    '-' + currentMonth + '-' + '3', '' + currentYear + '-' +
                                    currentMonth + '-' + '4',
                                    '' + currentYear + '-' + currentMonth + '-' + '5', '' +
                                    currentYear + '-' + currentMonth + '-' + '6', '' + currentYear +
                                    '-' + currentMonth + '-' + '7', '' + currentYear + '-' +
                                    currentMonth + '-' + '8',
                                    '' + currentYear + '-' + currentMonth + '-' + '9', '' +
                                    currentYear + '-' + currentMonth + '-' + '10', '' +
                                    currentYear + '-' + currentMonth + '-' + '11', '' +
                                    currentYear + '-' + currentMonth + '-' + '12', '' +
                                    currentYear + '-' + currentMonth + '-' + '13', '' +
                                    currentYear + '-' + currentMonth + '-' + '14', '' +
                                    currentYear + '-' + currentMonth + '-' + '15', '' +
                                    currentYear + '-' + currentMonth + '-' + '16',
                                    '' + currentYear + '-' + currentMonth + '-' + '17', '' +
                                    currentYear + '-' + currentMonth + '-' + '18', '' +
                                    currentYear + '-' + currentMonth + '-' + '19', '' +
                                    currentYear + '-' + currentMonth + '-' + '20',
                                    '' + currentYear + '-' + currentMonth + '-' + '21', '' +
                                    currentYear + '-' + currentMonth + '-' + '22', '' +
                                    currentYear + '-' + currentMonth + '-' + '23', '' +
                                    currentYear + '-' + currentMonth + '-' + '24',
                                    '' + currentYear + '-' + currentMonth + '-' + '25', '' +
                                    currentYear + '-' + currentMonth + '-' + '26', '' +
                                    currentYear + '-' + currentMonth + '-' + '27', '' +
                                    currentYear + '-' + currentMonth + '-' + '28'
                                ],
                                title: {
                                    text: "Month"
                                }
                            },
                            yaxis: {
                                title: {
                                    text: ""
                                },
                                min: -1.0,
                                max: max_pull_down_7 + 1
                            },
                            legend: {
                                position: "top",
                                horizontalAlign: "right",
                                floating: !0,
                                offsetY: -25,
                                offsetX: -5
                            },
                            responsive: [{
                                breakpoint: 600,
                                options: {
                                    chart: {
                                        toolbar: {
                                            show: !1
                                        }
                                    },
                                    legend: {
                                        show: !1
                                    }
                                }
                            }]
                        },
                        chart = new ApexCharts(document.querySelector("#pull_down_7"), options);
                    chart.render();

                    // Double Crow Hop Distance

                    options = {
                            chart: {
                                height: 380,
                                type: "line",
                                zoom: {
                                    enabled: !1
                                },
                                toolbar: {
                                    show: !1
                                }
                            },
                            colors: ["#556ee6", "#34c38f"],
                            dataLabels: {
                                enabled: !1
                            },
                            stroke: {
                                width: [3, 3],
                                curve: "straight"
                            },
                            series: [{
                                name: "Double Crow Hop Distance",
                                data: long_toss_distance
                            }, ],
                            title: {
                                text: "Double Crow Hop Distance",
                                align: "left",
                                style: {
                                    fontWeight: "500"
                                }
                            },
                            grid: {
                                row: {
                                    colors: ["transparent", "transparent"],
                                    opacity: .2
                                },
                                borderColor: "#f1f1f1"
                            },
                            markers: {
                                style: "inverted",
                                size: 6
                            },
                            xaxis: {

                                categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' +
                                    currentYear + '-' + currentMonth + '-' + '2', '' + currentYear +
                                    '-' + currentMonth + '-' + '3', '' + currentYear + '-' +
                                    currentMonth + '-' + '4',
                                    '' + currentYear + '-' + currentMonth + '-' + '5', '' +
                                    currentYear + '-' + currentMonth + '-' + '6', '' + currentYear +
                                    '-' + currentMonth + '-' + '7', '' + currentYear + '-' +
                                    currentMonth + '-' + '8',
                                    '' + currentYear + '-' + currentMonth + '-' + '9', '' +
                                    currentYear + '-' + currentMonth + '-' + '10', '' +
                                    currentYear + '-' + currentMonth + '-' + '11', '' +
                                    currentYear + '-' + currentMonth + '-' + '12', '' +
                                    currentYear + '-' + currentMonth + '-' + '13', '' +
                                    currentYear + '-' + currentMonth + '-' + '14', '' +
                                    currentYear + '-' + currentMonth + '-' + '15', '' +
                                    currentYear + '-' + currentMonth + '-' + '16',
                                    '' + currentYear + '-' + currentMonth + '-' + '17', '' +
                                    currentYear + '-' + currentMonth + '-' + '18', '' +
                                    currentYear + '-' + currentMonth + '-' + '19', '' +
                                    currentYear + '-' + currentMonth + '-' + '20',
                                    '' + currentYear + '-' + currentMonth + '-' + '21', '' +
                                    currentYear + '-' + currentMonth + '-' + '22', '' +
                                    currentYear + '-' + currentMonth + '-' + '23', '' +
                                    currentYear + '-' + currentMonth + '-' + '24',
                                    '' + currentYear + '-' + currentMonth + '-' + '25', '' +
                                    currentYear + '-' + currentMonth + '-' + '26', '' +
                                    currentYear + '-' + currentMonth + '-' + '27', '' +
                                    currentYear + '-' + currentMonth + '-' + '28'
                                ],
                                title: {
                                    text: "Month"
                                }
                            },
                            yaxis: {
                                title: {
                                    text: ""
                                },
                                min: -1.0,
                                max: max_long_toss_distance + 1
                            },
                            legend: {
                                position: "top",
                                horizontalAlign: "right",
                                floating: !0,
                                offsetY: -25,
                                offsetX: -5
                            },
                            responsive: [{
                                breakpoint: 600,
                                options: {
                                    chart: {
                                        toolbar: {
                                            show: !1
                                        }
                                    },
                                    legend: {
                                        show: !1
                                    }
                                }
                            }]
                        },
                        chart = new ApexCharts(document.querySelector("#long_toss_distance"), options);
                    chart.render();
                    // Kneeling Long Toss

                    options = {
                            chart: {
                                height: 380,
                                type: "line",
                                zoom: {
                                    enabled: !1
                                },
                                toolbar: {
                                    show: !1
                                }
                            },
                            colors: ["#556ee6", "#34c38f"],
                            dataLabels: {
                                enabled: !1
                            },
                            stroke: {
                                width: [3, 3],
                                curve: "straight"
                            },
                            series: [{
                                name: "",
                                data: pylo7
                            }, ],
                            title: {
                                text: "Kneeling Long Toss",
                                align: "left",
                                style: {
                                    fontWeight: "500"
                                }
                            },
                            grid: {
                                row: {
                                    colors: ["transparent", "transparent"],
                                    opacity: .2
                                },
                                borderColor: "#f1f1f1"
                            },
                            markers: {
                                style: "inverted",
                                size: 6
                            },
                            xaxis: {

                                categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' +
                                    currentYear + '-' + currentMonth + '-' + '2', '' + currentYear +
                                    '-' + currentMonth + '-' + '3', '' + currentYear + '-' +
                                    currentMonth + '-' + '4',
                                    '' + currentYear + '-' + currentMonth + '-' + '5', '' +
                                    currentYear + '-' + currentMonth + '-' + '6', '' + currentYear +
                                    '-' + currentMonth + '-' + '7', '' + currentYear + '-' +
                                    currentMonth + '-' + '8',
                                    '' + currentYear + '-' + currentMonth + '-' + '9', '' +
                                    currentYear + '-' + currentMonth + '-' + '10', '' +
                                    currentYear + '-' + currentMonth + '-' + '11', '' +
                                    currentYear + '-' + currentMonth + '-' + '12', '' +
                                    currentYear + '-' + currentMonth + '-' + '13', '' +
                                    currentYear + '-' + currentMonth + '-' + '14', '' +
                                    currentYear + '-' + currentMonth + '-' + '15', '' +
                                    currentYear + '-' + currentMonth + '-' + '16',
                                    '' + currentYear + '-' + currentMonth + '-' + '17', '' +
                                    currentYear + '-' + currentMonth + '-' + '18', '' +
                                    currentYear + '-' + currentMonth + '-' + '19', '' +
                                    currentYear + '-' + currentMonth + '-' + '20',
                                    '' + currentYear + '-' + currentMonth + '-' + '21', '' +
                                    currentYear + '-' + currentMonth + '-' + '22', '' +
                                    currentYear + '-' + currentMonth + '-' + '23', '' +
                                    currentYear + '-' + currentMonth + '-' + '24',
                                    '' + currentYear + '-' + currentMonth + '-' + '25', '' +
                                    currentYear + '-' + currentMonth + '-' + '26', '' +
                                    currentYear + '-' + currentMonth + '-' + '27', '' +
                                    currentYear + '-' + currentMonth + '-' + '28'
                                ],
                                title: {
                                    text: "Month"
                                }
                            },
                            yaxis: {
                                title: {
                                    text: ""
                                },
                                min: -1.0,
                                max: max_pylo_7 + 1
                            },
                            legend: {
                                position: "top",
                                horizontalAlign: "right",
                                floating: !0,
                                offsetY: -25,
                                offsetX: -5
                            },
                            responsive: [{
                                breakpoint: 600,
                                options: {
                                    chart: {
                                        toolbar: {
                                            show: !1
                                        }
                                    },
                                    legend: {
                                        show: !1
                                    }
                                }
                            }]
                        },
                        chart = new ApexCharts(document.querySelector("#pylo_7"), options);
                    chart.render();

                    options = {
                            chart: {
                                height: 380,
                                type: "line",
                                zoom: {
                                    enabled: !1
                                },
                                toolbar: {
                                    show: !1
                                }
                            },
                            colors: ["#556ee6", "#34c38f"],
                            dataLabels: {
                                enabled: !1
                            },
                            stroke: {
                                width: [3, 3],
                                curve: "straight"
                            },
                            series: [{
                                name: "",
                                data: pylo5
                            }, ],
                            title: {
                                text: "",
                                align: "left",
                                style: {
                                    fontWeight: "500"
                                }
                            },
                            grid: {
                                row: {
                                    colors: ["transparent", "transparent"],
                                    opacity: .2
                                },
                                borderColor: "#f1f1f1"
                            },
                            markers: {
                                style: "inverted",
                                size: 6
                            },
                            xaxis: {

                                categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' +
                                    currentYear + '-' + currentMonth + '-' + '2', '' + currentYear +
                                    '-' + currentMonth + '-' + '3', '' + currentYear + '-' +
                                    currentMonth + '-' + '4',
                                    '' + currentYear + '-' + currentMonth + '-' + '5', '' +
                                    currentYear + '-' + currentMonth + '-' + '6', '' + currentYear +
                                    '-' + currentMonth + '-' + '7', '' + currentYear + '-' +
                                    currentMonth + '-' + '8',
                                    '' + currentYear + '-' + currentMonth + '-' + '9', '' +
                                    currentYear + '-' + currentMonth + '-' + '10', '' +
                                    currentYear + '-' + currentMonth + '-' + '11', '' +
                                    currentYear + '-' + currentMonth + '-' + '12', '' +
                                    currentYear + '-' + currentMonth + '-' + '13', '' +
                                    currentYear + '-' + currentMonth + '-' + '14', '' +
                                    currentYear + '-' + currentMonth + '-' + '15', '' +
                                    currentYear + '-' + currentMonth + '-' + '16',
                                    '' + currentYear + '-' + currentMonth + '-' + '17', '' +
                                    currentYear + '-' + currentMonth + '-' + '18', '' +
                                    currentYear + '-' + currentMonth + '-' + '19', '' +
                                    currentYear + '-' + currentMonth + '-' + '20',
                                    '' + currentYear + '-' + currentMonth + '-' + '21', '' +
                                    currentYear + '-' + currentMonth + '-' + '22', '' +
                                    currentYear + '-' + currentMonth + '-' + '23', '' +
                                    currentYear + '-' + currentMonth + '-' + '24',
                                    '' + currentYear + '-' + currentMonth + '-' + '25', '' +
                                    currentYear + '-' + currentMonth + '-' + '26', '' +
                                    currentYear + '-' + currentMonth + '-' + '27', '' +
                                    currentYear + '-' + currentMonth + '-' + '28'
                                ],
                                title: {
                                    text: "Month"
                                }
                            },
                            yaxis: {
                                title: {
                                    text: ""
                                },
                                min: -1.0,
                                max: max_pylo_5 + 1
                            },
                            legend: {
                                position: "top",
                                horizontalAlign: "right",
                                floating: !0,
                                offsetY: -25,
                                offsetX: -5
                            },
                            responsive: [{
                                breakpoint: 600,
                                options: {
                                    chart: {
                                        toolbar: {
                                            show: !1
                                        }
                                    },
                                    legend: {
                                        show: !1
                                    }
                                }
                            }]
                        },
                        chart = new ApexCharts(document.querySelector("#pylo_5"), options);
                    chart.render();

                    // Bench

                    options = {
                            chart: {
                                height: 380,
                                type: "line",
                                zoom: {
                                    enabled: !1
                                },
                                toolbar: {
                                    show: !1
                                }
                            },
                            colors: ["#556ee6", "#34c38f"],
                            dataLabels: {
                                enabled: !1
                            },
                            stroke: {
                                width: [3, 3],
                                curve: "straight"
                            },
                            series: [{
                                name: "",
                                data: pylo3 //[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
                            }, ],
                            title: {
                                text: "",
                                align: "left",
                                style: {
                                    fontWeight: "500"
                                }
                            },
                            grid: {
                                row: {
                                    colors: ["transparent", "transparent"],
                                    opacity: .2
                                },
                                borderColor: "#f1f1f1"
                            },
                            markers: {
                                style: "inverted",
                                size: 6
                            },
                            xaxis: {

                                categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' +
                                    currentYear + '-' + currentMonth + '-' + '2', '' + currentYear +
                                    '-' + currentMonth + '-' + '3', '' + currentYear + '-' +
                                    currentMonth + '-' + '4',
                                    '' + currentYear + '-' + currentMonth + '-' + '5', '' +
                                    currentYear + '-' + currentMonth + '-' + '6', '' + currentYear +
                                    '-' + currentMonth + '-' + '7', '' + currentYear + '-' +
                                    currentMonth + '-' + '8',
                                    '' + currentYear + '-' + currentMonth + '-' + '9', '' +
                                    currentYear + '-' + currentMonth + '-' + '10', '' +
                                    currentYear + '-' + currentMonth + '-' + '11', '' +
                                    currentYear + '-' + currentMonth + '-' + '12', '' +
                                    currentYear + '-' + currentMonth + '-' + '13', '' +
                                    currentYear + '-' + currentMonth + '-' + '14', '' +
                                    currentYear + '-' + currentMonth + '-' + '15', '' +
                                    currentYear + '-' + currentMonth + '-' + '16',
                                    '' + currentYear + '-' + currentMonth + '-' + '17', '' +
                                    currentYear + '-' + currentMonth + '-' + '18', '' +
                                    currentYear + '-' + currentMonth + '-' + '19', '' +
                                    currentYear + '-' + currentMonth + '-' + '20',
                                    '' + currentYear + '-' + currentMonth + '-' + '21', '' +
                                    currentYear + '-' + currentMonth + '-' + '22', '' +
                                    currentYear + '-' + currentMonth + '-' + '23', '' +
                                    currentYear + '-' + currentMonth + '-' + '24',
                                    '' + currentYear + '-' + currentMonth + '-' + '25', '' +
                                    currentYear + '-' + currentMonth + '-' + '26', '' +
                                    currentYear + '-' + currentMonth + '-' + '27', '' +
                                    currentYear + '-' + currentMonth + '-' + '28'
                                ],
                                title: {
                                    text: "Month"
                                }
                            },
                            yaxis: {
                                title: {
                                    text: ""
                                },
                                min: -1.0,
                                max: max_pylo_3 + 1
                            },
                            legend: {
                                position: "top",
                                horizontalAlign: "right",
                                floating: !0,
                                offsetY: -25,
                                offsetX: -5
                            },
                            responsive: [{
                                breakpoint: 600,
                                options: {
                                    chart: {
                                        toolbar: {
                                            show: !1
                                        }
                                    },
                                    legend: {
                                        show: !1
                                    }
                                }
                            }]
                        },
                        chart = new ApexCharts(document.querySelector("#pylo_3"), options);
                    chart.render();



                    options = {
                            chart: {
                                height: 380,
                                type: "line",
                                zoom: {
                                    enabled: !1
                                },
                                toolbar: {
                                    show: !1
                                }
                            },
                            colors: ["#556ee6", "#34c38f"],
                            dataLabels: {
                                enabled: !1
                            },
                            stroke: {
                                width: [3, 3],
                                curve: "straight"
                            },
                            series: [{
                                name: "",
                                data: bench //[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
                            }, ],
                            title: {
                                text: "",
                                align: "left",
                                style: {
                                    fontWeight: "500"
                                }
                            },
                            grid: {
                                row: {
                                    colors: ["transparent", "transparent"],
                                    opacity: .2
                                },
                                borderColor: "#f1f1f1"
                            },
                            markers: {
                                style: "inverted",
                                size: 6
                            },
                            xaxis: {

                                categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' +
                                    currentYear + '-' + currentMonth + '-' + '2', '' + currentYear +
                                    '-' + currentMonth + '-' + '3', '' + currentYear + '-' +
                                    currentMonth + '-' + '4',
                                    '' + currentYear + '-' + currentMonth + '-' + '5', '' +
                                    currentYear + '-' + currentMonth + '-' + '6', '' + currentYear +
                                    '-' + currentMonth + '-' + '7', '' + currentYear + '-' +
                                    currentMonth + '-' + '8',
                                    '' + currentYear + '-' + currentMonth + '-' + '9', '' +
                                    currentYear + '-' + currentMonth + '-' + '10', '' +
                                    currentYear + '-' + currentMonth + '-' + '11', '' +
                                    currentYear + '-' + currentMonth + '-' + '12', '' +
                                    currentYear + '-' + currentMonth + '-' + '13', '' +
                                    currentYear + '-' + currentMonth + '-' + '14', '' +
                                    currentYear + '-' + currentMonth + '-' + '15', '' +
                                    currentYear + '-' + currentMonth + '-' + '16',
                                    '' + currentYear + '-' + currentMonth + '-' + '17', '' +
                                    currentYear + '-' + currentMonth + '-' + '18', '' +
                                    currentYear + '-' + currentMonth + '-' + '19', '' +
                                    currentYear + '-' + currentMonth + '-' + '20',
                                    '' + currentYear + '-' + currentMonth + '-' + '21', '' +
                                    currentYear + '-' + currentMonth + '-' + '22', '' +
                                    currentYear + '-' + currentMonth + '-' + '23', '' +
                                    currentYear + '-' + currentMonth + '-' + '24',
                                    '' + currentYear + '-' + currentMonth + '-' + '25', '' +
                                    currentYear + '-' + currentMonth + '-' + '26', '' +
                                    currentYear + '-' + currentMonth + '-' + '27', '' +
                                    currentYear + '-' + currentMonth + '-' + '28'
                                ],
                                title: {
                                    text: "Month"
                                }
                            },
                            yaxis: {
                                title: {
                                    text: ""
                                },
                                min: -1.0,
                                max: max_bench + 1
                            },
                            legend: {
                                position: "top",
                                horizontalAlign: "right",
                                floating: !0,
                                offsetY: -25,
                                offsetX: -5
                            },
                            responsive: [{
                                breakpoint: 600,
                                options: {
                                    chart: {
                                        toolbar: {
                                            show: !1
                                        }
                                    },
                                    legend: {
                                        show: !1
                                    }
                                }
                            }]
                        },
                        chart = new ApexCharts(document.querySelector("#bench"), options);
                    chart.render();

                    // Squat

                    options = {
                            chart: {
                                height: 380,
                                type: "line",
                                zoom: {
                                    enabled: !1
                                },
                                toolbar: {
                                    show: !1
                                }
                            },
                            colors: ["#556ee6", "#34c38f"],
                            dataLabels: {
                                enabled: !1
                            },
                            stroke: {
                                width: [3, 3],
                                curve: "straight"
                            },
                            series: [{
                                name: "",
                                data: squat //[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
                            }, ],
                            title: {
                                text: "",
                                align: "left",
                                style: {
                                    fontWeight: "500"
                                }
                            },
                            grid: {
                                row: {
                                    colors: ["transparent", "transparent"],
                                    opacity: .2
                                },
                                borderColor: "#f1f1f1"
                            },
                            markers: {
                                style: "inverted",
                                size: 6
                            },
                            xaxis: {

                                categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' +
                                    currentYear + '-' + currentMonth + '-' + '2', '' + currentYear +
                                    '-' + currentMonth + '-' + '3', '' + currentYear + '-' +
                                    currentMonth + '-' + '4',
                                    '' + currentYear + '-' + currentMonth + '-' + '5', '' +
                                    currentYear + '-' + currentMonth + '-' + '6', '' + currentYear +
                                    '-' + currentMonth + '-' + '7', '' + currentYear + '-' +
                                    currentMonth + '-' + '8',
                                    '' + currentYear + '-' + currentMonth + '-' + '9', '' +
                                    currentYear + '-' + currentMonth + '-' + '10', '' +
                                    currentYear + '-' + currentMonth + '-' + '11', '' +
                                    currentYear + '-' + currentMonth + '-' + '12', '' +
                                    currentYear + '-' + currentMonth + '-' + '13', '' +
                                    currentYear + '-' + currentMonth + '-' + '14', '' +
                                    currentYear + '-' + currentMonth + '-' + '15', '' +
                                    currentYear + '-' + currentMonth + '-' + '16',
                                    '' + currentYear + '-' + currentMonth + '-' + '17', '' +
                                    currentYear + '-' + currentMonth + '-' + '18', '' +
                                    currentYear + '-' + currentMonth + '-' + '19', '' +
                                    currentYear + '-' + currentMonth + '-' + '20',
                                    '' + currentYear + '-' + currentMonth + '-' + '21', '' +
                                    currentYear + '-' + currentMonth + '-' + '22', '' +
                                    currentYear + '-' + currentMonth + '-' + '23', '' +
                                    currentYear + '-' + currentMonth + '-' + '24',
                                    '' + currentYear + '-' + currentMonth + '-' + '25', '' +
                                    currentYear + '-' + currentMonth + '-' + '26', '' +
                                    currentYear + '-' + currentMonth + '-' + '27', '' +
                                    currentYear + '-' + currentMonth + '-' + '28'
                                ],
                                title: {
                                    text: "Month"
                                }
                            },
                            yaxis: {
                                title: {
                                    text: ""
                                },
                                min: -1.0,
                                max: max_squat + 1
                            },
                            legend: {
                                position: "top",
                                horizontalAlign: "right",
                                floating: !0,
                                offsetY: -25,
                                offsetX: -5
                            },
                            responsive: [{
                                breakpoint: 600,
                                options: {
                                    chart: {
                                        toolbar: {
                                            show: !1
                                        }
                                    },
                                    legend: {
                                        show: !1
                                    }
                                }
                            }]
                        },
                        chart = new ApexCharts(document.querySelector("#squat"), options);
                    chart.render();

                    // Pull Ups
                    options = {
                            chart: {
                                height: 380,
                                type: "line",
                                zoom: {
                                    enabled: !1
                                },
                                toolbar: {
                                    show: !1
                                }
                            },
                            colors: ["#556ee6", "#34c38f"],
                            dataLabels: {
                                enabled: !1
                            },
                            stroke: {
                                width: [3, 3],
                                curve: "straight"
                            },
                            series: [{
                                name: "",
                                data: deadlift //[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,,0,0,0,0,0,0,0,23,0,0,0,0,0,0]
                            }, ],
                            title: {
                                text: "",
                                align: "left",
                                style: {
                                    fontWeight: "500"
                                }
                            },
                            grid: {
                                row: {
                                    colors: ["transparent", "transparent"],
                                    opacity: .2
                                },
                                borderColor: "#f1f1f1"
                            },
                            markers: {
                                style: "inverted",
                                size: 6
                            },
                            xaxis: {

                                categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' +
                                    currentYear + '-' + currentMonth + '-' + '2', '' + currentYear +
                                    '-' + currentMonth + '-' + '3', '' + currentYear + '-' +
                                    currentMonth + '-' + '4',
                                    '' + currentYear + '-' + currentMonth + '-' + '5', '' +
                                    currentYear + '-' + currentMonth + '-' + '6', '' + currentYear +
                                    '-' + currentMonth + '-' + '7', '' + currentYear + '-' +
                                    currentMonth + '-' + '8',
                                    '' + currentYear + '-' + currentMonth + '-' + '9', '' +
                                    currentYear + '-' + currentMonth + '-' + '10', '' +
                                    currentYear + '-' + currentMonth + '-' + '11', '' +
                                    currentYear + '-' + currentMonth + '-' + '12', '' +
                                    currentYear + '-' + currentMonth + '-' + '13', '' +
                                    currentYear + '-' + currentMonth + '-' + '14', '' +
                                    currentYear + '-' + currentMonth + '-' + '15', '' +
                                    currentYear + '-' + currentMonth + '-' + '16',
                                    '' + currentYear + '-' + currentMonth + '-' + '17', '' +
                                    currentYear + '-' + currentMonth + '-' + '18', '' +
                                    currentYear + '-' + currentMonth + '-' + '19', '' +
                                    currentYear + '-' + currentMonth + '-' + '20',
                                    '' + currentYear + '-' + currentMonth + '-' + '21', '' +
                                    currentYear + '-' + currentMonth + '-' + '22', '' +
                                    currentYear + '-' + currentMonth + '-' + '23', '' +
                                    currentYear + '-' + currentMonth + '-' + '24',
                                    '' + currentYear + '-' + currentMonth + '-' + '25', '' +
                                    currentYear + '-' + currentMonth + '-' + '26', '' +
                                    currentYear + '-' + currentMonth + '-' + '27', '' +
                                    currentYear + '-' + currentMonth + '-' + '28'
                                ],
                                title: {
                                    text: "Month"
                                }
                            },
                            yaxis: {
                                title: {
                                    text: ""
                                },
                                min: -1.0,
                                max: max_deadlift + 1
                            },
                            legend: {
                                position: "top",
                                horizontalAlign: "right",
                                floating: !0,
                                offsetY: -25,
                                offsetX: -5
                            },
                            responsive: [{
                                breakpoint: 600,
                                options: {
                                    chart: {
                                        toolbar: {
                                            show: !1
                                        }
                                    },
                                    legend: {
                                        show: !1
                                    }
                                }
                            }]
                        },
                        chart = new ApexCharts(document.querySelector("#deadlift"), options);
                    chart.render();

                    //Vertical Jump
                    options = {
                            chart: {
                                height: 380,
                                type: "line",
                                zoom: {
                                    enabled: !1
                                },
                                toolbar: {
                                    show: !1
                                }
                            },
                            colors: ["#556ee6", "#34c38f"],
                            dataLabels: {
                                enabled: !1
                            },
                            stroke: {
                                width: [3, 3],
                                curve: "straight"
                            },
                            series: [{
                                name: "",
                                data: vertical_jump
                            }, ],
                            title: {
                                text: "",
                                align: "left",
                                style: {
                                    fontWeight: "500"
                                }
                            },
                            grid: {
                                row: {
                                    colors: ["transparent", "transparent"],
                                    opacity: .2
                                },
                                borderColor: "#f1f1f1"
                            },
                            markers: {
                                style: "inverted",
                                size: 6
                            },
                            xaxis: {

                                categories: ['' + currentYear + '-' + currentMonth + '-' + '1', '' +
                                    currentYear + '-' + currentMonth + '-' + '2', '' + currentYear +
                                    '-' + currentMonth + '-' + '3', '' + currentYear + '-' +
                                    currentMonth + '-' + '4',
                                    '' + currentYear + '-' + currentMonth + '-' + '5', '' +
                                    currentYear + '-' + currentMonth + '-' + '6', '' + currentYear +
                                    '-' + currentMonth + '-' + '7', '' + currentYear + '-' +
                                    currentMonth + '-' + '8',
                                    '' + currentYear + '-' + currentMonth + '-' + '9', '' +
                                    currentYear + '-' + currentMonth + '-' + '10', '' +
                                    currentYear + '-' + currentMonth + '-' + '11', '' +
                                    currentYear + '-' + currentMonth + '-' + '12', '' +
                                    currentYear + '-' + currentMonth + '-' + '13', '' +
                                    currentYear + '-' + currentMonth + '-' + '14', '' +
                                    currentYear + '-' + currentMonth + '-' + '15', '' +
                                    currentYear + '-' + currentMonth + '-' + '16',
                                    '' + currentYear + '-' + currentMonth + '-' + '17', '' +
                                    currentYear + '-' + currentMonth + '-' + '18', '' +
                                    currentYear + '-' + currentMonth + '-' + '19', '' +
                                    currentYear + '-' + currentMonth + '-' + '20',
                                    '' + currentYear + '-' + currentMonth + '-' + '21', '' +
                                    currentYear + '-' + currentMonth + '-' + '22', '' +
                                    currentYear + '-' + currentMonth + '-' + '23', '' +
                                    currentYear + '-' + currentMonth + '-' + '24',
                                    '' + currentYear + '-' + currentMonth + '-' + '25', '' +
                                    currentYear + '-' + currentMonth + '-' + '26', '' +
                                    currentYear + '-' + currentMonth + '-' + '27', '' +
                                    currentYear + '-' + currentMonth + '-' + '28'
                                ],
                                title: {
                                    text: "Month"
                                }
                            },
                            yaxis: {
                                title: {
                                    text: ""
                                },
                                min: -1.0,
                                max: max_vertical_jump + 1
                            },
                            legend: {
                                position: "top",
                                horizontalAlign: "right",
                                floating: !0,
                                offsetY: -25,
                                offsetX: -5
                            },
                            responsive: [{
                                breakpoint: 600,
                                options: {
                                    chart: {
                                        toolbar: {
                                            show: !1
                                        }
                                    },
                                    legend: {
                                        show: !1
                                    }
                                }
                            }]
                        },
                        chart = new ApexCharts(document.querySelector("#vertical_jump"), options);
                    chart.render();
                    
                },
                error: function(response) {
                    swal("Error", "Something is wrong", "error");
                }
            })
        });
    </script>
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/apexchartsadmin/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/apexchartsadmin/apexcharts.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>
    <script></script>
@endsection
