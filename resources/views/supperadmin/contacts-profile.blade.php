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
                            <img src="{{ URL::asset('/assets/images/profile-img.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img src="{{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/assets/images/users/avatar-1.jpg') }}"
                                    alt="" class="img-thumbnail rounded-circle">
                                <h5 class="font-size-15 text-truncate">{{ Auth::user()->name }}</h5>
                            </div>
                            {{-- <h5 class="font-size-15 text-truncate">{{ Auth::user()->name }}</h5> --}}
                            {{-- <p class="text-muted mb-0 text-truncate">UI/UX Designer</p> --}}
                        </div>

                        <div class="col-sm-8">
                            <div class="pt-4">

                                {{-- <div class="row">
                                <div class="col-6">
                                    <h5 class="font-size-15">125</h5>
                                    <p class="text-muted mb-0">Projects</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="font-size-15">$1245</h5>
                                    <p class="text-muted mb-0">Revenue</p>
                                </div>
                            </div> --}}
                                <br>
                                <br>
                                <div class="mt-4">
                                    {{-- <a href="" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i
                                            class="mdi mdi-arrow-right ms-1"></i></a> --}}

                                    <a href="" class="btn btn-primary waves-effect waves-light btn-sm"
                                        data-bs-toggle="modal" data-bs-target=".update-profile">Edit Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card -->

            {{-- <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Personal Information</h4>

                    <p class="text-muted mb-4">Hi I'm Cynthia Price,has been the industry's standard dummy text To an
                        English person, it will seem like simplified English, as a skeptical Cambridge.</p>
                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">Full Name :</th>
                                    <td>{{ Auth::user()->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Birthdate :</th>
                                    <td>{{ date('d-m-Y', strtotime(Auth::user()->dob)) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">E-mail :</th>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Location :</th>
                                    <td>California, United States</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
            <!-- end card -->

            {{-- <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Experience</h4>
                    <div class="">
                        <ul class="verti-timeline list-unstyled">
                            <li class="event-list active">
                                <div class="event-timeline-dot">
                                    <i class="bx bx-right-arrow-circle bx-fade-right"></i>
                                </div>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="bx bx-server h4 text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div>
                                            <h5 class="font-size-15"><a href="javascript: void(0);"
                                                    class="text-dark">Back end Developer</a></h5>
                                            <span class="text-primary">2016 - 19</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="event-list">
                                <div class="event-timeline-dot">
                                    <i class="bx bx-right-arrow-circle"></i>
                                </div>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="bx bx-code h4 text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div>
                                            <h5 class="font-size-15"><a href="javascript: void(0);"
                                                    class="text-dark">Front end Developer</a></h5>
                                            <span class="text-primary">2013 - 16</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="event-list">
                                <div class="event-timeline-dot">
                                    <i class="bx bx-right-arrow-circle"></i>
                                </div>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="bx bx-edit h4 text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div>
                                            <h5 class="font-size-15"><a href="javascript: void(0);"
                                                    class="text-dark">UI /UX Designer</a></h5>
                                            <span class="text-primary">2011 - 13</span>

                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div> --}}
            <!-- end card -->
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Personal Information</h4>

                    <p class="text-muted mb-4">Hi I'm Cynthia Price,has been the industry's standard dummy text To an
                        English person, it will seem like simplified English, as a skeptical Cambridge.</p>
                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">Full Name :</th>
                                    <td>{{ Auth::user()->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Birthdate :</th>
                                    <td>{{ date('d-m-Y', strtotime(Auth::user()->dob)) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">E-mail :</th>
                                    <td>{{ Auth::user()->email }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Location :</th>
                                    <td>California, United States</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!--  Update Profile example -->
            <div class="modal fade update-profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myLargeModalLabel">Edit Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="update-profile">
                                @csrf
                                <input type="hidden" value="{{ Auth::user()->id }}" id="data_id">
                                <div class="mb-3">
                                    <label for="useremail" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="useremail" value="{{ Auth::user()->email }}" name="email"
                                        placeholder="Enter email" autofocus>
                                    <div class="text-danger" id="emailError" data-ajax-feedback="email"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ Auth::user()->name }}" id="username" name="name" autofocus
                                        placeholder="Enter username">
                                    <div class="text-danger" id="nameError" data-ajax-feedback="name"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="userdob">Date of Birth</label>
                                    <div class="input-group" id="datepicker1">
                                        <input type="text" class="form-control @error('dob') is-invalid @enderror"
                                            placeholder="dd-mm-yyyy" data-date-format="dd-mm-yyyy"
                                            data-date-container='#datepicker1' data-date-end-date="0d"
                                            value="{{ date('d-m-Y', strtotime(Auth::user()->dob)) }}"
                                            data-provide="datepicker" name="dob" autofocus id="dob">
                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                    </div>
                                    <div class="text-danger" id="dobError" data-ajax-feedback="dob"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="avatar">Profile Picture</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                            id="avatar" name="avatar" autofocus>
                                        <label class="input-group-text" for="avatar">Upload</label>
                                    </div>
                                    <div class="text-start mt-2">
                                        <img src="{{ asset(Auth::user()->avatar) }}" alt=""
                                            class="rounded-circle avatar-lg">
                                    </div>
                                    <div class="text-danger" role="alert" id="avatarError" data-ajax-feedback="avatar">
                                    </div>
                                </div>

                                <div class="mt-3 d-grid">
                                    <button class="btn btn-primary waves-effect waves-light UpdateProfile"
                                        data-id="{{ Auth::user()->id }}" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
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
