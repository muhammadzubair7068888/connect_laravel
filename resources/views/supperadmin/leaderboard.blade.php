@extends('supperadmin.layouts.master')

@section('title')
    @lang('LeaderBoard')
@endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
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
@endsection
