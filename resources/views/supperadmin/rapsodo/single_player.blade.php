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

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <div class="col-2">
                        @if ($player->profilePhotoUrl == null)
                            <img class="users-avatar-shadow rounded-circle" src="{{ asset('/assets/images/users/male.png') }}"
                                height="150" width="150" style="object-fit: cover; object-position: 0% 0%;">
                        @else
                            <img class="users-avatar-shadow rounded-circle" src="{{ $player->profilePhotoUrl }}"
                                height="150" width="150" style="object-fit: cover; object-position: 0% 0%;">
                        @endif

                    </div>
                </div>
                <div class="col-5">
                    <table>
                        <tr>
                            <td>
                                <h1 class=""
                                    style="font-family: BebasKai,sans-serif;
                                font-size: 47px;
                                line-height: 48px;
                                letter-spacing: .48px;
                                color: #383c41;
                                margin-bottom: 8px;
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;">
                                    {{ Str::upper($player->firstName) }}&nbsp;{{ Str::upper($player->lastName) }}</h1>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img _ngcontent-kef-c137="" alt=""
                                    src="https://cloud.rapsodo.com/assets/icons/active.svg"> Active
                            </td>
                        </tr>
                        <tr>
                            <td> <img _ngcontent-kef-c137="" src="https://cloud.rapsodo.com/assets/icons/ball.svg"
                                    alt="">
                                Baseball</td>
                        </tr>
                        <td> <img _ngcontent-kef-c137="" src="https://cloud.rapsodo.com/assets/icons/playing-level.svg"
                                alt=""> College</td>
                        </tr>
                        <tr>
                            <td><img _ngcontent-kef-c137="" src="https://cloud.rapsodo.com/assets/icons/location.svg"
                                    alt=""> Berea, OH</td>

                            </td>
                        </tr>
                    </table>

                </div>
                <div class="col-2">
                    <table>
                        <tr>
                            <td>
                                <h1>{{ $player->weight }}<span style="font-size: 12px;">@lang('LBS')</span></h1>
                                <span>@lang('Weight')</span>
                            </td>
                        </tr>
                        @php
                            $timestamp = strtotime($player->dateOfBirthday);
                            $year = $day = date('Y', $timestamp);
                            $dob = date('Y') - $year;
                        @endphp
                        <td>
                            <h1>{{ $dob }}<span style="font-size: 12px;">@lang('YRS')</span></h1>
                            <span>@lang('Age')</span>
                        </td>
                        </tr>
                    </table>
                </div>
                <div class="col-2">
                    <table>
                        <tr>
                            <td>
                                <h1>{{ $player->height }}</h1>
                                <span>@lang('Height')</span>
                            </td>
                        </tr>
                        @php
                            $timestamp = strtotime($player->dateOfBirthday);
                            $year = $day = date('Y', $timestamp);
                            $dob = date('Y') - $year;
                        @endphp
                        <td>
                            <h1>R<span style="font-size: 12px;"></h1>
                            <span>@lang('Trow')</span>
                        </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
@endsection
