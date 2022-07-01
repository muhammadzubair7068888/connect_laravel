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
                    <form id="dashboard-graph-setting-form">
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
                                <th>@lang('Weight')</th>
                                <th>@lang('Arm Pain')</th>
                                <th>@lang('Pull Downs 3')</th>
                                <th>@lang('Pull Downs 4')</th>
                                <th>@lang('Pull Downs 5')</th>
                                <th>@lang('Pull Downs 6')</th>
                                <th>@lang('Pull Downs 7')</th>
                                <th>@lang('Mound Throws')</th>
                                <th>@lang('Long Toss')</th>
                                <th>@lang('plyo 7')</th>
                                <th>@lang('plyo 5')</th>
                                <th>@lang('plyo 3')</th>
                                <th>@lang('Mound Shuffle')</th>
                                <th>@lang('Squat')</th>
                                <th>@lang('Pull Ups')</th>
                                <th>@lang('Vertical Jump')</th>
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
                                            <td>{{ $velocity->uservelocity->where('velocity_id', 1)->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_id', 2)->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_id', 3)->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_id', 4)->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_id', 5)->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_id', 6)->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_id', 7)->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_id', 8)->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_id', 9)->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_id', 10)->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_id', 11)->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_id', 12)->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_id', 13)->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_id', 14)->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_id', 15)->value('value') ?? 0 }}
                                            </td>
                                            <td>{{ $velocity->uservelocity->where('velocity_id', 16)->value('value') ?? 0 }}
                                            </td>
                                        @else
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>0</td>
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
