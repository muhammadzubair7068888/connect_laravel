@extends('supperadmin.layouts.master')

@section('title')
    @lang('Physical Assessment')
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Physical Assessment')
        @endslot
        @slot('title')
            @lang('Physical Assessment')
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
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
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
                            @forelse ($physical as $phy)
                                @php
                                    $j++;
                                @endphp
                                <tr>
                                    <td>{{ $j }}</td>
                                    <td>{{ $phy->name }}</td>
                                    <td><input type="radio" name="{{ $phy->id }}" id=""
                                            {{ $phy->status == 1 ? 'checked' : '' }}
                                            onclick="status_change({{ $phy->id }},{{ 1 }})" /></td>
                                    <td><input type="radio" name="{{ $phy->id }}" id=""
                                            {{ $phy->status == 2 ? 'checked' : '' }}
                                            onclick="status_change({{ $phy->id }},{{ 2 }})" /></td>
                                    <td><input type="radio" name="{{ $phy->id }}" id=""
                                            {{ $phy->status == 3 ? 'checked' : '' }}
                                            onclick="status_change({{ $phy->id }},{{ 3 }})" /></td>
                                    <td style="text-align:center;">
                                        <a style="padding-left:10px;" class="link-danger" href='#'><i
                                                class="fas fa-trash-alt"
                                                onclick="delete_ph_assessment({{ $phy }})"></i></a>
                                        <a style="padding-left:10px;" class="link-info" href='#'><i
                                                class="fas fa-share"></i></a>
                                    </td>
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
                    <h5 class="modal-title" id="exampleModalLabel">@lang('Physical Assessment')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('add.physical') }}" method="post">
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
                    <h5 class="modal-title" id="staticBackdropLabel">@lang('Delete Physical Assessment')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-danger">@lang('Are you sure you want to delete this assessment?')</h4>
                </div>
                <form action="{{ route('delete.physical') }}" method="post">
                    @csrf
                    <input type="hidden" id="delete_id" name="physical_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang('Cancel')</button>
                        <button type="submit" class="btn btn-danger">@lang('Delete')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
        function delete_ph_assessment(phy) {

            $('#delete_id').val(phy.id);
            $('#staticBackdrop').modal('show');
        }

        function status_change(id, status) {
            var s_data = status;
            $.ajax({
                url: "{{ url('assessment/update/phy') }}" + "/" + id + "/" + status,
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
