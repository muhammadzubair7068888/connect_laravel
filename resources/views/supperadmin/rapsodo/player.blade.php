@extends('supperadmin.layouts.master')

@section('title')
    @lang('Player')
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
            @lang('Player')
        @endslot
        @slot('title')
            @lang('Player')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-greetings />
                    <div class="mb-3">

                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>@lang('S.No')</th>
                                <th>@lang('Name')</th>
                                <th>@lang('Coach')</th>
                                <th>@lang('Group')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Last Played')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $j = 0;
                            @endphp
                            @forelse ($data as $user)
                                @php
                                    $j++;
                                    $last_played = $user->pitcherProfile->lastPlayedTime;
                                    $day = date('D', $last_played);
                                    $mounth = date('M', $last_played);
                                    $year = date('Y', $last_played);
                                    $C = ',';
                                @endphp
                                <tr>
                                    <td>{{ $j }}</td>
                                    <td>{{ $user->firstName }}</td>
                                    <td>{{ auth()->user()->rapsodos->first_name }}</td>
                                    <td>{{ $user->groups[0]->name ?? '-' }}</td>
                                    <td>{{ $user->status }}</td>
                                    <td>{{ $day }}{{ $C }}&nbsp;{{ $mounth }}&nbsp;{{ $year }}
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
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection
