@extends('supperadmin.layouts.master')

@section('title')
    @lang('Mail Setting')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Mail Setting')
        @endslot
        @slot('title')
            @lang('Mail Setting')
        @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <form class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label">@lang('SMTP Host')</label>
                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Host" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3 position-relative">
                            <label for="recipient-name" class="form-label">@lang('Port')</label>
                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Port Number"
                                required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label">@lang('Secuirty')</label>
                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Secuirty"
                                required>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3 position-relative">
                            <label for="recipient-name" class="form-label">@lang('SMTP User')</label>
                            <input type="text" class="form-control" id="validationTooltip01" placeholder="User" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label">@lang('Email From')</label>
                            <input type="text" class="form-control" id="validationTooltip01"
                                placeholder="Company Name OR Email" required>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3 position-relative">
                            <label for="recipient-name" class="form-label">@lang('Password')</label>
                            <input type="password" class="form-control" id="validationTooltip01" placeholder="Password"
                                required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <button class="btn btn-success" type="submit">Save Change</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
@endsection
