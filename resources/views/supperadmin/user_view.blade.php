@extends('supperadmin.layouts.master')

@section('title')
    @lang('User')
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('User')
        @endslot
        @slot('title')
            @lang('User')
        @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <h2 class="card-title"><b>@lang('User Profile')</b></h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="avatar">
                        <img alt="" src="{{ asset($user->avatar) }}" class="users-avatar-shadow rounded-circle"
                            height="150" width="150" style="object-fit: cover; object-position: 0% 0%;">
                    </div>
                    <hr>
                    <div class="md-3" style="">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="userDetail"><strong>@lang('Name: ') </strong> {{ $user->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong>@lang('Email: ')</strong>{{ $user->email }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong>@lang('Height: ')</strong>{{ $user->height }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong>@lang('Starting Weight: ')</strong>{{ $user->starting_weight }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong>@lang('Starting Weight: ')</strong>{{ $user->handedness }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong>@lang('Age: ')</strong>{{ $user->age }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong>@lang('School: ')</strong>{{ $user->school }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong for="batch">@lang('Level: ')</strong>{{ $user->level }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="row">
                            <div class="col-md-2 p-md-0">
                                <a href="{{ route('update.user', ['id' => $user->id]) }}" type="button"
                                    class="btn btn-block btn-success btn-flat btn-edit-profile" data-id="353"
                                    style="width:100%; margin-top:5px;">@lang('Edit Profile')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title"><b>@lang('Assessments')</b></h2>
            <div class="row">
                <div class="col-md-6">
                    <h6>@lang('Physical Assessment')</h6>
                    <table class="table table-responsive table-bordered table-hover" data-type="physical">
                        <thead class="thead-dark">
                            <tr>
                                <th>@lang('Assessment')</th>
                                <th>@lang('Acceptable')</th>
                                <th>@lang('Caution')</th>
                                <th>@lang('Opportunity')</th>
                                <th>@lang('L')</th>
                                <th>@lang('R')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user->physical_assessment as $physical)
                                <tr data-id="1">
                                    <td>{{ $physical->name }}</td>
                                    <td><input type="radio" class="form-radio" name="{{ $physical->id }}"
                                            id="" {{ $physical->status == 1 ? 'checked' : '' }}
                                            onclick="phy_status_change({{ $physical->id }},{{ 1 }})" /></td>
                                    <td><input type="radio" class="form-radio" name="{{ $physical->id }}"
                                            id="" {{ $physical->status == 2 ? 'checked' : '' }}
                                            onclick="phy_status_change({{ $physical->id }},{{ 2 }})" /></td>
                                    <td><input type="radio" class="form-radio" name="{{ $physical->id }}"
                                            id="" {{ $physical->status == 3 ? 'checked' : '' }}
                                            onclick="phy_status_change({{ $physical->id }},{{ 3 }})" /></td>
                                    <td><input type="number" class="form-control phy_left" name="left"
                                            onclick="get_id({{ $physical->id }});" value="{{ $physical->left }}"
                                            id="left_right" />
                                    </td>
                                    <td><input type="number" class="form-control phy_right" name="right" id="left_right"
                                            onclick="get_id({{ $physical->id }});" value="{{ $physical->right }}" />
                                    </td>
                                </tr>
                            @empty
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <h6>@lang('Mechanical Assessment')</h6>
                    <table class="table table-responsive table-bordered table-hover" data-type="mechanical">
                        <thead class="thead-dark">
                            <tr>
                                <th>@lang('Assessment')</th>
                                <th>@lang('Acceptable')</th>
                                <th>@lang('Caution')</th>
                                <th>@lang('Opportunity')</th>
                                <th>@lang('L')</th>
                                <th>@lang('R')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($user->mechanical_assessment as $mechanical)
                                <tr data-id="1">
                                    <td>{{ $mechanical->name }}</td>
                                    <td><input type="radio" class="form-radio" name="{{ $mechanical->id }}"
                                            id="" {{ $mechanical->status == 1 ? 'checked' : '' }}
                                            onclick="mach_status_change({{ $mechanical->id }},{{ 1 }})" />
                                    </td>
                                    <td><input type="radio" class="form-radio" name="{{ $mechanical->id }}"
                                            id="" {{ $mechanical->status == 2 ? 'checked' : '' }}
                                            onclick="mach_status_change({{ $mechanical->id }},{{ 2 }})" />
                                    </td>
                                    <td><input type="radio" class="form-radio" name="{{ $mechanical->id }}"
                                            id="" {{ $mechanical->status == 3 ? 'checked' : '' }}
                                            onclick="mach_status_change({{ $mechanical->id }},{{ 3 }})" />
                                    </td>
                                    <td><input type="number" class="form-control mech_left" name="left"
                                            onclick="get_id({{ $mechanical->id }});" value="{{ $mechanical->left }}"
                                            id="left_right" />
                                    </td>
                                    <td><input type="number" class="form-control mech_right" name="right"
                                            id="left_right" onclick="get_id({{ $mechanical->id }});"
                                            value="{{ $mechanical->right }}" />
                                    </td>
                                </tr>
                            @empty
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title"><b>@lang('Questionnaire')</b></h2>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>@lang('Question')</th>
                                    <th>@lang('Answer')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($user->question as $question)
                                    <tr data-id="1">
                                        <td>{{ $question->name }}</td>
                                        <td></td>
                                    </tr>
                                @empty
                                    <tr data-id="1">
                                        <td>What are your goals regarding training?</td>
                                        <td></td>
                                    </tr>
                                    <tr data-id="2">
                                        <td>Have you had any significant injuries? (anything keeping you off the field 2
                                            weeks
                                            or more)</td>
                                        <td></td>
                                    </tr>
                                    <tr data-id="3">
                                        <td>Rank yourself amongst your peers worldwide in velocity, command, secondary
                                            stuff,
                                            and competitiveness (average, below average, above average)</td>
                                        <td></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function phy_status_change(id, status) {
            var s_data = status;
            $.ajax({
                url: "{{ url('assessment/update/phy') }}" + "/" + id + "/" + status,
                type: "GET",
                data: {},
                dataType: "json",
                success: function(response) {
                    swal("Saved", "Status SuccessFully Change", "success")
                },
                error: function(response) {
                    alert("Failed")
                }
            });
        }

        function mach_status_change(id, status) {
            var s_data = status;
            $.ajax({
                url: "{{ url('assessment/update/mach') }}" + "/" + id + "/" + status,
                type: "GET",
                data: {},
                dataType: "json",
                success: function(response) {
                    swal("Saved", "Status SuccessFully Change", "success")
                },
                error: function(response) {
                    alert("Failed")
                }
            });
        }

        function get_id(id) {
            let val_id = id;
            $(".phy_left").change(function() {

                var value = this.value;
                $.ajax({
                    url: "{{ url('/assessment/physical/left-right') }}",
                    type: "POST",
                    data: {
                        id: id,
                        left: value
                    },
                    dataType: "json",
                    success: function(response) {
                        swal("Saved", "Left SuccessFully Change", "success")
                    },
                    error: function(response) {
                        alert("Failed")
                    }
                });
            });
            $(".phy_right").change(function() {

                var value = this.value;
                $.ajax({
                    url: "{{ url('/assessment/physical/left-right') }}",
                    type: "POST",
                    data: {
                        id: id,
                        right: value
                    },
                    dataType: "json",
                    success: function(response) {
                        swal("Saved", "Right SuccessFully Change", "success")
                    },
                    error: function(response) {
                        alert("Failed")
                    }
                });
            });

            $(".mech_left").change(function() {

                var value = this.value;
                $.ajax({
                    url: "{{ url('/assessment/mechanical/left-right') }}",
                    type: "POST",
                    data: {
                        id: id,
                        left: value
                    },
                    dataType: "json",
                    success: function(response) {
                        swal("Saved", "Left SuccessFully Change", "success")
                    },
                    error: function(response) {
                        alert("Failed")
                    }
                });
            });
            $(".mech_right").change(function() {

                var value = this.value;
                $.ajax({
                    url: "{{ url('/assessment/mechanical/left-right') }}",
                    type: "POST",
                    data: {
                        id: id,
                        right: value
                    },
                    dataType: "json",
                    success: function(response) {
                        swal("Saved", "Right SuccessFully Change", "success")
                    },
                    error: function(response) {
                        alert("Failed")
                    }
                });
            });
        }
    </script>
@endsection
