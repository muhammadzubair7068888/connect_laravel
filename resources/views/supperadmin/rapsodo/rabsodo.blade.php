@extends('supperadmin.layouts.master')

@section('title')
    @lang('Rapsodo')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Rapsodo')
        @endslot
        @slot('title')
            @lang('Rapsodo')
        @endslot
    @endcomponent

    <div class="container-fluid user-card">
        <x-greetings />
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card d-flex flex-row py-4 px-4" style="">
                    <div><img class="" style="width: 75px;"
                            src="https://media.glassdoor.com/sqll/2505877/rapsodo-squarelogo-1564514776007.png"
                            alt="Card image cap">
                    </div>
                    <div class="card-body p-0 ps-4">
                        <h5 class="fw-bold">Rapsodo</h5>
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            data-bs-whatever="@mdo">@lang('Credentials')</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('Rapsodo')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('save.credentials') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="recipient-name" class="col-form-label">@lang('Email')</label>
                                <input type="text" name="email" class="form-control" id="recipient-name"
                                    placeholder="Email">
                            </div>
                            <div class="col-12">
                                <label for="recipient-name" class="col-form-label">@lang('Password')</label>
                                <input type="password" name="password" class="form-control" id="recipient-name"
                                    placeholder="Password">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang('Cancel')</button>
                    <button type="submit" class="btn btn-success">@lang('Save')</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div> <!-- end preview-->
@endsection
