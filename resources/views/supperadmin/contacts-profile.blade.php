@extends('supperadmin.layouts.master')

@section('title')
    @lang('translation.Profile')
@endsection

@section('css')
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet"
        type="text/css">
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Contacts
        @endslot
        @slot('title')
            Profile
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-4">
            <div class="card overflow-hidden">
                <div class="bg-primary bg-soft">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Welcome Back !</h5>
                                <p>It will seem like simplified</p>
                            </div>
                        </div>
                        <div class="col-5 align-self-end">
                            <img src="{{ URL::asset('/assets/images/profile-img.png') }}" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="{{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/assets/images/users/avatar-1.jpg') }}"
                                    alt="" class="img-thumbnail rounded-circle">
                                {{-- <h5 class="font-size-15 text-truncate">{{ Auth::user()->name }}</h5> --}}
                            </div>
                        </div>

                        <div class="col-sm-8">
                            <div class="pt-4">
                                <br>
                                <br>
                                <div class="mt-4">
                                    <button type="button" class="btn btn-success waves-effect waves-light"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">@lang('Edit Profile')</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Personal Information</h4>
                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">Name :</th>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">E-mail :</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Age :</th>
                                    <td>{{ $user->age }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Height :</th>
                                    <td>{{ $user->height }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Starting Weight :</th>
                                    <td>{{ $user->starting_weight }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Handedness :</th>
                                    <td>{{ $user->handedness }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">School :</th>
                                    <td>{{ $user->school }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Level :</th>
                                    <td>{{ $user->level }}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">@lang('Add New User')</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('update.profile', ['id' => $user->id]) }}"
                            class="needs-validation" enctype='multipart/form-data' novalidate>
                            @csrf
                            <div class="mb-3">
                                <div class="text-start mt-2">
                                    <img src="{{ asset(Auth::user()->avatar) }}" alt=""
                                        class="rounded-circle avatar-lg">
                                </div>
                                <div class="text-danger" role="alert" id="avatarError" data-ajax-feedback="avatar">
                                </div>
                            </div>
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip01" class="form-label">@lang('Profile Image')</label>
                                <input type="file" name="file" class="form-control" id="validationTooltip01"
                                    placeholder="Name" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">@lang('Name')</label>
                                        <input type="text" name="name" value="{{ $user->name }}"
                                            class="form-control" id="validationTooltip01" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">@lang('Email')</label>
                                        <input type="email" name="email" value="{{ $user->email }}"
                                            class="form-control" id="validationTooltip01" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">@lang('Height')</label>
                                        <input type="text" name="height" value="{{ $user->height }}"
                                            class="form-control" id="validationTooltip01" placeholder="Height" required>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">@lang('Starting Weight')</label>
                                        <input type="text" name="starting_weight"
                                            value="{{ $user->starting_weight }}" class="form-control"
                                            id="validationTooltip01" placeholder="Starting Weight" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">@lang('Handedness')</label>
                                        <select name="hand_type" id="hand_type" value="{{ $user->handedness }}"
                                            class="form-select" required>
                                            @if ($user->handedness == 'left')
                                                <option value="Left" selected>@lang('Left')</option>
                                                <option value="Right">@lang('Right')</option>
                                            @else
                                                <option value="Left">@lang('Left')</option>
                                                <option value="Right" selected>@lang('Right')</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">@lang('Age')</label>
                                        <input type="number" name="age" value="{{ $user->age }}"
                                            class="form-control" id="validationTooltip01" placeholder="Age" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">@lang('School')</label>
                                        <input type="text" name="school" value="{{ $user->school }}"
                                            class="form-control" id="validationTooltip01" placeholder="School" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">@lang('level')</label>
                                        <input type="text" name="level" value="{{ $user->level }}"
                                            class="form-control" id="validationTooltip01" placeholder="Level" required>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">@lang('Password')</label>
                                        <input type="Password" name="password" class="form-control"
                                            id="validationTooltip01"  placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">@lang('Confirm Password')</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="validationTooltip01" placeholder="Password" required>
                                    </div>
                                </div>
                            </div> --}}


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

    <!-- profile init -->
    <script src="{{ URL::asset('/assets/js/pages/profile.init.js') }}"></script>

    <script>
        $('#update-profile').on('submit', function(event) {
            event.preventDefault();
            var Id = $('#data_id').val();
            let formData = new FormData(this);
            $('#emailError').text('');
            $('#nameError').text('');
            $('#dobError').text('');
            $('#avatarError').text('');
            $.ajax({
                url: "{{ url('update-profile') }}" + "/" + Id,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#emailError').text('');
                    $('#nameError').text('');
                    $('#dobError').text('');
                    $('#avatarError').text('');
                    if (response.isSuccess == false) {
                        alert(response.Message);
                    } else if (response.isSuccess == true) {
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                },
                error: function(response) {
                    $('#emailError').text(response.responseJSON.errors.email);
                    $('#nameError').text(response.responseJSON.errors.name);
                    $('#dobError').text(response.responseJSON.errors.dob);
                    $('#avatarError').text(response.responseJSON.errors.avatar);
                }
            });
        });
    </script>
@endsection
