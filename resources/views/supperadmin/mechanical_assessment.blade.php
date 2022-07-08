@extends('supperadmin.layouts.master')

@section('title')
    @lang('Mechanical Assessment')
@endsection
@section('css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Mechanical Assessment')
        @endslot
        @slot('title')
            @lang('Mechanical Assessment')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-greetings />
                    <div class="d-flex flex-wrap gap-3">
                        <div>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-bs-whatever="@mdo">@lang('New Label')</button>
                        </div>
                    </div>
                    <br>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th class="col-1">@lang('#')</th>
                                <th>@lang('Label')</th>
                                <th class="col-1">@lang('Acceptable')</th>
                                <th class="col-1">@lang('Caution')</th>
                                <th class="col-1">@lang('Opportunity')</th>
                                <th class="col-1">@lang('Action')</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $j = 0;
                            @endphp
                            @forelse ($mechaniacl as $mach)
                                @php
                                    $j++;
                                @endphp
                                <tr>
                                    <td>{{ $j }}</td>
                                    <td>{{ $mach->name }}</td>
                                    <td><input type="radio" name="{{ $mach->id }}" id=""
                                            {{ $mach->status == 1 ? 'checked' : '' }}
                                            onclick="status_change({{ $mach->id }},{{ 1 }})" /></td>
                                    <td><input type="radio" name="{{ $mach->id }}" id=""
                                            {{ $mach->status == 2 ? 'checked' : '' }}
                                            onclick="status_change({{ $mach->id }},{{ 2 }})" /></td>
                                    <td><input type="radio" name="{{ $mach->id }}" id=""
                                            {{ $mach->status == 3 ? 'checked' : '' }}
                                            onclick="status_change({{ $mach->id }},{{ 3 }})" /></td>
                                    @if ($mach->parent_id)
                                        <td style="text-align:center;">

                                        </td>
                                    @else
                                        <td style="text-align:center;">
                                            <a style="padding-left:10px;" class="link-warning" href='#'><i
                                                    class="fas fa-hand-spock"
                                                    onclick="left_right({{ $mach }})"></i></a>
                                            <a style="padding-left:10px;" class="link-danger" href='#'><i
                                                    class="fas fa-trash-alt"
                                                    onclick="delete_mh_assessment({{ $mach }})"></i></a>
                                            <a style="padding-left:10px;" class="link-info" href='#'><i
                                                    class="fas fa-share"
                                                    onclick="shair_mach_assessment({{ $mach }})"></i></a>
                                        </td>
                                    @endif

                                </tr>
                            @empty
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('Mechanical Assessment')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add.mechanical') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="recipient-name" class="form-label">@lang('Label')</label>
                                    <input type="text" name="label" class="form-control" id="recipient-name"
                                        placeholder="Value">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">@lang('status')</label>
                                    <select id="formrow-inputState" name="status" class="form-select">
                                        <option selected value="0">@lang('Select status')</option>
                                        <option value="1">@lang('Acceptable')</option>
                                        <option value="2">@lang('Caution')</option>
                                        <option value="3">@lang('Opportunity')</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div> <!-- end preview-->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">@lang('Delete Mechanical Assessment')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-danger">@lang('Are you sure you want to delete this assessment?')</h4>
                </div>
                <form action="{{ route('delete.mechanical') }}" method="post">
                    @csrf
                    <input type="hidden" id="delete_id" name="mechanical_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang('Cancel')</button>
                        <button type="submit" class="btn btn-danger">@lang('Delete')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="left_right" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">@lang('')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>@lang('Label')</th>
                                <th class="col-1">@lang('Left')</th>
                                <th class="col-1">@lang('Right')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ route('update.left_right.mechanical') }}" method="post">
                                @csrf
                                <tr>
                                    <td id="mech_name"></td>
                                    <td><input type="radio" name="left_right" id="mech_left" value="0" />
                                        <input type="hidden" name="mech_id" id="mech_id" />
                                    </td>
                                    <td><input type="radio" name="left_right" id="mech_right" value="1" />
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang('Cancel')</button>
                    <button type="submit" class="btn btn-success">@lang('Save')</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="sahir_exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('Shair Physical Assessment')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="shair_form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input type="hidden" id="shair_id" name="mechanical_id">
                                    <label class="form-label">@lang('Select Admin')</label>
                                    <select class="form-control select2" name="user">
                                        <option>Select</option>
                                        <optgroup label="Admin">
                                            @forelse ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @empty
                                            @endforelse
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end preview-->
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-repeater.int.js') }}"></script>
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>

    <script>
        function delete_mh_assessment(mach) {
            $('#delete_id').val(mach.id);
            $('#staticBackdrop').modal('show');
        }

        function left_right(mech) {

            if (mech.left_right == 0) {
                $("#mech_left").prop("checked", true);
            } else {
                $("#mech_right").prop("checked", true);
            }
            document.getElementById('mech_name').innerHTML = mech.name;
            $('#mech_id').val(mech.id);
            $('#left_right').modal('show');
        }

        function shair_mach_assessment(mach) {
            $('#shair_id').val(mach.id);
            $('#sahir_exampleModal').modal('show');
        }




        $('#shair_form').on('submit', function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "{{ route('shair.mechanical') }}",
                method: "POST",
                data: form_data,
                dataType: "json",
                success: function(response) {
                    $("#sahir_exampleModal").modal('hide');
                    swal("Saved", "Successfully Shair", "success");
                },
                error: function(response) {
                    $("#sahir_exampleModal").modal('hide');
                    swal("Not Saved", "Somethings is wrong", "error");
                }
            })
        });

        function status_change(id, status) {
            var s_data = status;
            $.ajax({
                url: "{{ url('assessment/update/mach') }}" + "/" + id + "/" + status,
                type: "GET",
                data: {},
                dataType: "json",
                success: function(response) {
                    swal("Saved", "Status SuccessFully Change", "success")
                },
                error: function(response) {
                    alert("Failed")
                }
            });
        }
    </script>
@endsection
