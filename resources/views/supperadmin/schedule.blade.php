@extends('supperadmin.layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title')
    @lang('Schedule')
@endsection

@section('css')
    <link href="{{ URL::asset('/assets/css/main.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Schedule')
        @endslot
        @slot('title')
            @lang('Schedule')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="external-events" class="mt-2">
                                <br>
                            </div>
                            <div class="row justify-content-center mt-5">
                            </div>
                        </div>
                    </div>
                </div> <!-- end col-->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div> <!-- end col -->

            </div>

            <div style='clear:both'></div>


            <!-- Add New Event MODAL -->
            <div class="modal fade" id="event-modal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header py-3 px-4 border-bottom-0">
                            <h5 class="modal-title" id="modal-title"></h5>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                        </div>
                        <div class="modal-body p-4">
                            <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                <div class="row">
                                    <div class="col-12">
                                        {{-- <div class="mb-3">
                                            <label class="form-label">Event Name</label>
                                            <input class="form-control" placeholder="Insert Event Name" type="text"
                                                name="title" id="event-title" required value="" />
                                            <div class="invalid-feedback">Please provide a valid event name</div>
                                        </div> --}}
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">@lang('Exercises')</label>
                                            <select class="form-control form-select" name="exercise_id" id="exercise">
                                                <option selected>@lang('Select Exercise')</option>
                                                @foreach ($exercises as $exercise)
                                                    <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Please select a valid event category</div>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="color" id="color" name="color" value="#e66465">
                                        <label for="head">@lang('Color')</label>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                    </div>
                                    <div class="col-6 text-end">
                                        <button type="button" class="btn btn-light me-1"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- end modal-content-->
                </div> <!-- end modal dialog-->
            </div>
            <!-- end modal-->

        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/main.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/schedule/calendars-full.init.js') }}"></script>
@endsection
