@extends('supperadmin.layouts.master')

@section('title')
    @lang('Company Setting')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Company Setting')
        @endslot
        @slot('title')
            @lang('Company Setting')
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <form action="{{ route('company_setting') }}" method="POST" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label">@lang('Company Name')</label>
                            <input type="text" name="company_name" class="form-control"
                                value="{{ $company->name ?? '' }}" id="validationTooltip01" placeholder="Name" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="recipient-name" class="form-label">@lang('Company Email')</label>
                            <input type="text" name="company_email" class="form-control"
                                value="{{ $company->email ?? '' }}" id="validationTooltip01" placeholder="Email" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label">@lang('Company Phone')</label>
                            <input type="text" name="company_phone" class="form-control"
                                value="{{ $company->phone ?? '' }}" id="validationTooltip01" placeholder="Phone Number"
                                required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="recipient-name" class="form-label">@lang('Company Fax')</label>
                            <input type="text" name="company_fax" class="form-control"
                                value="{{ $company->fax ?? '' }}" id="validationTooltip01" placeholder="Fax" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label">@lang('Company City')</label>
                            <input type="text" name="company_city" class="form-control"
                                value="{{ $company->city ?? '' }}" id="validationTooltip01" placeholder="City" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="recipient-name" class="form-label">@lang('Company Postal Code')</label>
                            <input type="text" name="company_postal_code" class="form-control"
                                value="{{ $company->postal_code ?? '' }}" id="validationTooltip01"
                                placeholder="Postal Code" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">@lang('Site Logo Light')</label>
                    <input class="form-control" type="file" name="company_logo_light" id="" required>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">@lang('Site Logo Dark')</label>
                    <input class="form-control" type="file" name="company_logo_dark" id="" required>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">@lang('Site Favicon')</label>
                    <input class="form-control" type="file" name="company_favicon" id="" required>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">@lang('Short Description')</label>
                    <textarea class="form-control" name="description" id="message-text">{{ $company->description ?? '' }}</textarea>
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
