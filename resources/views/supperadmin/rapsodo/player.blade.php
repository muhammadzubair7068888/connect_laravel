@extends('supperadmin.layouts.master')

@section('title')
    @lang('Players')
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
            @lang('Players')
        @endslot
        @slot('title')
            @lang('Players')
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
                            @forelse ($players as $player)
                                @php
                                    $j++;
                                    $last_played = $player->pitcherProfile->lastPlayedTime;
                                    $day = date('D', $last_played);
                                    $mounth = date('m', $last_played);
                                    $year = date('Y', $last_played);
                                    $C = ',';
                                @endphp
                                <tr>
                                    <td>{{ $j }}</td>
                                    <td><a href="{{ route('single.rapsodo.player', ['id' => $player->_id]) }}"
                                            class="link-dark">{{ $player->firstName }}&nbsp;{{ $player->lastName }}<a>
                                    </td>
                                    <td>{{ auth()->user()->rapsodos->first_name }}&nbsp;{{ auth()->user()->rapsodos->last_name }}
                                    </td>
                                    <td>{{ $player->groups[0]->name ?? '-' }}</td>
                                    <td>{{ $player->status }}</td>
                                    <td>{{ $day }}&nbsp;{{ $mounth }}{{ $C }}&nbsp;{{ $year }}
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
