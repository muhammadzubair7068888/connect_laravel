@extends('supperadmin.layouts.master')

@section('title')
    @lang('Team')
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
            @lang('Team')
        @endslot
        @slot('title')
            @lang('Team')
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
                                <th>@lang('Description')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $j = 0;
                            @endphp
                            @forelse ($data as $user)
                                @php
                                    $j++;
                                @endphp
                                <tr>
                                    <td>{{ $j }}</td>
                                    <td>{{ ucfirst($user->name) }}</td>
                                    <td>{{ $user->description }}</td>
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
