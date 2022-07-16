@extends('supperadmin.layouts.master')

@section('title')
    @lang('Languages')
@endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Languages')
        @endslot
        @slot('title')
            @lang('Languages')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            data-bs-whatever="@mdo">Add Language</button>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Code')</th>
                                <th>@lang('Direction')</th>
                                <th>@lang('Flag')</th>
                                <th>@lang('Status')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>English</td>
                                <td>en</td>
                                <td>LTR</td>
                                <td> <img src="{{ URL::asset('/assets/images/flags/us.jpg') }}" alt="user-image"
                                        class="me-1" height="12"></td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                                <td> <a style="padding-left:10px;" class="link-success" href='#'> <i
                                            class="fas fa-edit"></i></a>
                                    <a style="padding-left:10px;" class="link-danger" href='#'><i
                                            class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Spanish</td>
                                <td>es</td>
                                <td>RTL</td>
                                <td> <img src="{{ URL::asset('/assets/images/flags/spain.jpg') }}" alt="user-image"
                                        class="me-1" height="12"></td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td> <a style="padding-left:10px;" class="link-success" href='#'> <i
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Language</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">@lang('Language Name')</label>
                                <input type="Name" class="form-control" id="recipient-name" placeholder="Name">
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">@lang('Direction')</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="">@lang('Selec Direction')</option>
                                    <option value="0">@lang('LTR')</option>
                                    <option value="1">@lang('RTL')</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">@lang('Language Code')</label>
                            <input type="text" class="form-control" id="recipient-name" placeholder="Code">
                        </div>
                        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                            <label class="form-check-label" for="SwitchCheckSizemd">Active</label>
                            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">

                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">@lang('Flage')</label>
                            <input class="form-control" type="file" id="formFile" required>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>
    </div> <!-- end preview-->
@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection
