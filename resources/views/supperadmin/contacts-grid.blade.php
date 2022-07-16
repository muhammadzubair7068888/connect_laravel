@extends('supperadmin.layouts.master')

@section('title')
    @lang('User Grid view')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Users
        @endslot
        @slot('title')
            Grid
        @endslot
    @endcomponent
    <div class="row">
        @forelse ($users as $user)
            @php
                if ($user->avatar) {
                    $profile = $user->avatar;
                } else {
                    $profile = '/assets/images/users/avatar-5.jpg';
                }
            @endphp
            <div class="col-xl-3 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="mb-4">
                            <img class="rounded-circle avatar-sm" src="{{ asset($profile) }}" alt="">
                        </div>
                        <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">{{ $user->name }}</a></h5>
                        <p class="text-muted">{{ $user->email }}</p>
                        <div>
                            @if ($user->status = 0)
                                <a href="#" class="badge bg-danger font-size-12">@lang('Banned')</a>
                            @else
                                <a href="#" class="badge bg-success font-size-12">@lang('Active')</a>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top">
                        <div class="contact-links d-flex font-size-20">
                            <div class="flex-fill">
                                <a href=""><i class="bx bx-message-square-dots"></i></a>
                            </div>
                            <div class="flex-fill">
                                {{-- <a href=""><i class="bx bx-pie-chart-alt"></i></a> --}}
                            </div>
                            <div class="flex-fill">
                                <a href="{{ route('user.view', ['id' => $user->id]) }}"><i class="bx bx-user-circle"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-xl-3 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="mb-4">
                            <img class="rounded-circle avatar-sm"
                                src="{{ URL::asset('/assets/images/users/avatar-5.jpg') }}" alt="">
                        </div>
                        <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">Shirley Smith</a></h5>
                        <p class="text-muted">UI/UX Designer</p>

                        <div>
                            <a href="#" class="badge bg-primary font-size-11 m-1">Photoshop</a>
                            <a href="#" class="badge bg-primary font-size-11 m-1">illustrator</a>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top">
                        <div class="contact-links d-flex font-size-20">
                            <div class="flex-fill">
                                <a href=""><i class="bx bx-message-square-dots"></i></a>
                            </div>
                            <div class="flex-fill">
                                <a href=""><i class="bx bx-pie-chart-alt"></i></a>
                            </div>
                            <div class="flex-fill">
                                <a href=""><i class="bx bx-user-circle"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse


    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="text-center my-3">
                <a href="javascript:void(0);" class="text-success"><i class="bx bx-hourglass bx-spin me-2"></i> Load
                    more
                </a>
            </div>
        </div> <!-- end col-->
    </div>
    <!-- end row -->
@endsection
