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
                                <th>@lang('Date Created')</th>
                                <th>@lang('Type')</th>
                                <th>@lang('# of Players')</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $j = 0;
                            @endphp
                            @forelse ($groups as $group)
                                @php
                                    $j++;
                                    $last_played = $group->timestamp;
                                    $day = date('D', $last_played);
                                    $mounth = date('m', $last_played);
                                    $year = date('Y', $last_played);
                                    $C = ',';
                                @endphp
                                <tr>
                                    <td>{{ $j }}</td>
                                    <td>{{ $group->name }}</td>
                                    <td>{{ $day }}{{ $C }}&nbsp;{{ $mounth }}&nbsp;{{ $year }}
                                    <td>{{ $group->groupType }} </td>
                                    <td>{{ count($group->players) }}</td>

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
