@extends('supperadmin.layouts.master')

@section('title')
    @lang('Invite User')
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
            @lang('User List')
        @endslot
        @slot('title')
            @lang('User List')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-greetings />
                    <div class="mb-3">
                        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">@lang('New User')</button>
                        {{-- <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">@lang('Invite User')</button> --}}
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>@lang('S.No')</th>
                                <th>@lang('Name')</th>
                                <th>@lang('email')</th>
                                <th>@lang('Role')</th>
                                <th>@lang('Added By')</th>
                                <th>@lang('Height')</th>
                                <th>@lang('Starting Weight')</th>
                                <th>@lang('Last Login')</th>
                                <th>@lang('Actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Steven Leicht</td>
                                <td>leichtsteven@gmail.com</td>
                                <td>User</td>
                                <td>Admin</td>
                                <td>6</td>
                                <td>180</td>
                                <td>date</td>
                                <td>
                                    <a href='#' class="link-primary"> <i class="fa fa-eye"></i></a>
                                    <a style="padding-left:10px;" class="link-success" href='#'> <i
                                            class="fas fa-edit"></i></a>
                                    <a style="padding-left:10px;" class="link-danger" href='#'><i
                                            class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable"> --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">@lang('Add New User')</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('add.user') }}" class="needs-validation"
                            enctype='multipart/form-data' novalidate>
                            @csrf
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip01" class="form-label">@lang('Avatar')</label>
                                <input type="file" name="file" value="{{ old('profile') }}" class="form-control"
                                    id="validationTooltip01" placeholder="Name" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">@lang('Name')</label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control" id="validationTooltip01" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">@lang('Email')</label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control" id="validationTooltip01" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">@lang('Height')</label>
                                        <input type="text" name="height" value="{{ old('height') }}"
                                            class="form-control" id="validationTooltip01" placeholder="Height" required>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">@lang('Starting Weight')</label>
                                        <input type="text" name="starting_weight" value="{{ old('starting_weight') }}"
                                            class="form-control" id="validationTooltip01" placeholder="Starting Weight"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">@lang('Handedness')</label>
                                        <select name="hand_type" id="hand_type" value="{{ old('hand_type') }}"
                                            class="form-select" required>
                                            <option value="">@lang('Select')</option>
                                            <option value="Left">@lang('Left')</option>
                                            <option value="Right">@lang('Right')</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">@lang('DOB')</label>
                                        <input type="date" name="dob" value="{{ old('dob') }}"
                                            class="form-control" id="validationTooltip01" placeholder="Starting Weight"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">@lang('School')</label>
                                        <input type="text" name="school" value="{{ old('school') }}"
                                            class="form-control" id="validationTooltip01" placeholder="School" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">@lang('level')</label>
                                        <input type="text" name="level" value="{{ old('level') }}"
                                            class="form-control" id="validationTooltip01" placeholder="Level" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">@lang('Password')</label>
                                        <input type="Password" name="password" class="form-control"
                                            id="validationTooltip01" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label">@lang('Confirm Password')</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="validationTooltip01" placeholder="Password" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @if (auth()->user()->role == 'superadmin')
                                    <div class="col-md-6">
                                        <label for="formrow-inputState" class="form-label">@lang('Role')</label>
                                        <select id="formrow-inputState" name="role" value="{{ old('role') }}"
                                            class="form-select">
                                            <option selected>@lang('Select Status')</option>
                                            <option value="admin">@lang('Admin')</option>
                                            <option value="user">@lang('User')</option>
                                        </select>
                                    </div>
                                @else
                                    <div class="col-md-6">
                                        <label for="formrow-inputState" class="form-label">@lang('Role')</label>
                                        <select id="formrow-inputState" name="role" value="{{ old('role') }}"
                                            class="form-select">
                                            <option value="user" selected>@lang('User')</option>
                                        </select>
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <label for="formrow-inputState" class="form-label">@lang('User Status')</label>
                                    <select id="formrow-inputState" name="user_status"
                                        value="{{ old('user_status') }}" class="form-select">
                                        <option selected>@lang('Select Status')</option>
                                        <option value="0">@lang('Banned')</option>
                                        <option value="1">@lang('Active')</option>
                                    </select>
                                </div>
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

        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('add.user') }}" class="needs-validation"
                        enctype='multipart/form-data' novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3 position-relative">
                                    <label for="validationTooltip01" class="form-label">@lang('Name')</label>
                                    <input type="text" name="name" class="form-control" id="validationTooltip01"
                                        placeholder="Name" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 position-relative">
                                    <label for="validationTooltip01" class="form-label">@lang('Email')</label>
                                    <input type="email" name="email" class="form-control" id="validationTooltip01"
                                        placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">@lang('Role')</label>
                                    <select id="formrow-inputState" class="form-select">
                                        <option selected>@lang('Select Role')</option>
                                        <option value="0">@lang('User')</option>
                                        <option value="1">@lang('Admin')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">@lang('Status')</label>
                                    <select id="formrow-inputState" class="form-select">
                                        <option selected>@lang('Select Status')</option>
                                        <option>@lang('Banned')</option>
                                        <option>@lang('Active')</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <h3 class="text-success">@lang('Permissions')</h3>
                        </div>
                        <hr>

                        <div class="form-check form-check-success mb-3">
                            <input class="large" type="checkbox" id="formCheckcolor2" checked>
                            <label class="" for="formCheckcolor2">
                                Checkbox Success
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success">@lang('Invite')</button>
                </div>
            </div>
        </div>
    </div> --}}
        {{-- </div> <!-- end preview--> --}}
    @endsection
    @section('script')
        <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
        {{-- <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script> --}}
        <!-- Datatable init js -->
        <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
        {{-- <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script> --}}
        {{-- <script>
            $(document).ready(function() {
                $("input").change(function() {
                    alert("The text has been changed.");
                    $("p").hide();
                });
            });

            $("#role").click(function() {

            });
        </script> --}}
    @endsection
