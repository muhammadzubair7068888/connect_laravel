@extends('supperadmin.layouts.master')

@section('title')
    @lang('LeaderBoard')
@endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
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
            @lang('LeaderBoard')
        @endslot
        @slot('title')
            @lang('LeaderBoard')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-greetings />
                    <form id="dashboard-graph-setting-form" action="{{ route('filter.leaderboard') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Date Range</label>
                                <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy"
                                    data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                    <input type="text" class="form-control" name="start" placeholder="Start Date"
                                        autocomplete="off" />
                                    <input type="text" class="form-control" name="end" placeholder="End Date"
                                        autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3" style="margin-top: 27px;">
                                    <button type="submit" class="btn btn-success">@lang('Search')</button>
                                    <button type="button" class="btn btn-light" id="btnClear">@lang('Clear')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>@lang('Name')</th>
                                @foreach ($velocity_names as $velocity_name)
                                    <th>{{ $velocity_name->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $j = -1;
                            @endphp
                            @forelse ($velocities as $velocity)
                                @php
                                    $j++;
                                @endphp
                                <tr>
                                    <td>{{ ucfirst($velocity->name) }}</td>
                                    @if (isset($velocity->uservelocity[0]->id))
                                        @if (isset($velocity->uservelocity[$j]->id))
                                            <td>{{ $velocity->uservelocity->where('velocity_key', 'weight')->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_key', 'arm_pain')->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_key', 'pull_down_velocity')->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_key', 'pull_down_3')->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_key', 'pull_down_4')->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_key', 'pull_down_5')->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_key', 'pull_down_6')->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_key', 'pull_down_7')->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_key', 'mound_throws_velocity')->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_key', 'long_toss_distance')->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_key', 'pylo_7')->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_key', 'pylo_5')->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_key', 'pylo_3')->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_key', 'bench')->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_key', 'squat')->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_key', 'deadlift')->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_key', 'vertical_jump')->value('value') ?? 0 }}
                                            </td>
                                        @else
                                            <td>@lang('0')</td>
                                            <td>@lang('0')</td>
                                            <td>@lang('0')</td>
                                            <td>@lang('0')</td>
                                            <td>@lang('0')</td>
                                            <td>@lang('0')</td>
                                            <td>@lang('0')</td>
                                            <td>@lang('0')</td>
                                            <td>@lang('0')</td>
                                            <td>@lang('0')</td>
                                            <td>@lang('0')</td>
                                            <td>@lang('0')</td>
                                            <td>@lang('0')</td>
                                            <td>@lang('0')</td>
                                            <td>@lang('0')</td>
                                            <td>@lang('0')</td>
                                            <td>@lang('0')</td>
                                        @endif
                                    @else
                                        <td>@lang('0')</td>
                                        <td>@lang('0')</td>
                                        <td>@lang('0')</td>
                                        <td>@lang('0')</td>
                                        <td>@lang('0')</td>
                                        <td>@lang('0')</td>
                                        <td>@lang('0')</td>
                                        <td>@lang('0')</td>
                                        <td>@lang('0')</td>
                                        <td>@lang('0')</td>
                                        <td>@lang('0')</td>
                                        <td>@lang('0')</td>
                                        <td>@lang('0')</td>
                                        <td>@lang('0')</td>
                                        <td>@lang('0')</td>
                                        <td>@lang('0')</td>
                                        <td>@lang('0')</td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td>@lang('Name')</td>
                                    <td>@lang('Weight')</td>
                                    <td>@lang('Arm Pain')</td>
                                    <td>@lang('Pull Downs')</td>
                                    <td>@lang('Pull Downs 3')</td>
                                    <td>@lang('Pull Downs 4')</td>
                                    <td>@lang('Pull Downs 5')</td>
                                    <td>@lang('Pull Downs 6')</td>
                                    <td>@lang('Pull Downs 7')</td>
                                    <td>@lang('Mound tdrows')</td>
                                    <td>@lang('Long Toss')</td>
                                    <td>@lang('plyo 7')</td>
                                    <td>@lang('plyo 5')</td>
                                    <td>@lang('plyo 3')</td>
                                    <td>@lang('Mound Shuffle')</td>
                                    <td>@lang('Squat')</td>
                                    <td>@lang('Pull Ups')</td>
                                    <td>@lang('Vertical Jump')</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#btnClear').click(function() {

                $('#dashboard-graph-setting-form input[type="text"]').val('');
                /*Clear textarea using id */
                $('#dashboard-graph-setting-form #user').val('');

            });
        });
    </script>
@endsection
{{-- $('#dashboard-graph-setting-form').on('submit', function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "{{ route('filter.leaderboard') }}",
                method: "POST",
                data: form_data,
                dataType: "json",
                success: function(response) {
                    $("#sahir_exampleModal").modal('hide');
                    swal("Saved", "Velocity Graph Setting Successfully", "success");
                },
                error: function(response) {
                    $("#sahir_exampleModal").modal('hide');
                    swal("Not Saved", "Somethings is wrong", "error");
                }
            })
        }); --}}
