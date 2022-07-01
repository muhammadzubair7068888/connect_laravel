@extends('supperadmin.layouts.master')

@section('title')
    @lang('Plugin')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Plugin')
        @endslot
        @slot('title')
            @lang('Plugin')
        @endslot
    @endcomponent

    <div class="container-fluid user-card">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card d-flex flex-row py-4 px-4" style="">
                    <div><img class="" style="width: 75px;" src="https://trading.agnimble.com/assets/images/google.png"
                            alt="Card image cap">
                    </div>
                    <div class="card-body p-0 ps-4">
                        <h5 class="fw-bold">Google</h5>
                        <button id="google+" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#google">
                            Update</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card d-flex flex-row py-4 px-4" style="">
                    <div>
                        <img class="" style="width: 75px;" src="https://trading.agnimble.com/assets/images/mail.png"
                            alt="Card image cap">
                    </div>
                    <div class="card-body p-0 ps-4">
                        <h5 class="fw-bold">Mail Settings</h5>
                        <a href="#"> <button id="google+" class="btn btn-dark" data-bs-toggle="modal">
                                Update</button></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card d-flex flex-row py-4 px-4" style="">
                    <div>
                        <img class=" rounded-circle" style="width: 75px;"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/800px-2021_Facebook_icon.svg.png"
                            alt="Card image cap">
                    </div>
                    <div class="card-body p-0 ps-4">
                        <h5 class="fw-bold">Facebook</h5>
                        <button id="google+" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#facebook"
                            style="background-color: #0089ff">
                            Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-plugins-model action="{{ route('google-credentials') }}" title="Google Plugin" id="google" :pluginID="$google_clientid"
        :pluginSecret="$google_clientsecret" :status='$google' />
    <x-plugins-model action="{{ route('facebook-credentials') }}" title="Facebook Plugin" id="facebook" :pluginID="$facebook_clientid"
        :pluginSecret="$facebook_clientsecret" :status='$facebook' />
@endsection
