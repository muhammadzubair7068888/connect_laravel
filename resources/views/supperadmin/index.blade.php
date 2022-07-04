@extends('supperadmin.layouts.master')

@section('title')
    @lang('Dashboard')
@endsection
@section('css')
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
                                            <option value="{{ auth()->user()->id }}">@lang('Me')</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <div class="col-sm-4">
                                    <label>Date Range</label>
                                    <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy"
                                        data-date-autoclose="true" data-provide="datepicker"
                                        data-date-container='#datepicker6'>
                                        <input type="text" class="form-control" name="start" placeholder="Start Date"
                                            autocomplete="off" />
                                        <input type="text" class="form-control" name="end" placeholder="End Date"
                                            autocomplete="off" />
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

        $('#dashboard-graph-setting-form').on('submit', function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "{{ route('search.velocity') }}",
                method: "POST",
                data: form_data,
                dataType: "json",
                success: function(response) {
                    swal("Saved", "Done", "success");
                },
                error: function(response) {
                    swal("Not Saved", "Status SuccessFully Change", "error");
                }
            })
        });

        let weight = @json($weight);
        let arm_pain = @json($arm_pain);
        let mount_throw_velocit = @json($mount_throw_velocit);
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
    </script>
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/apexchartsadmin/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/apexchartsadmin/apexcharts.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>
@endsection
