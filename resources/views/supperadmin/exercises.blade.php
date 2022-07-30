@extends('supperadmin.layouts.master')

@section('title')
    @lang('Exercises')
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Exercises
        @endslot
        @slot('title')
            Exercises
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-greetings />
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('add.exercises') }}"><button type="button"
                                class="btn btn-success">@lang('New Exercise')</button></a>
                        <a><button type="button" class="btn btn-info" onclick="impot_cvs()">@lang('Import CSV')</button></a>
                        <a href="{{ route('demo.exercise') }}"><button type="button"
                                class="btn btn-primary">@lang('Demo CSV')</button></a>


                    </div>
                    <br>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                {{-- <th>@lang('#')</th> --}}
                                <th>@lang('Name')</th>
                                <th>@lang('Type')</th>
                                <th>@lang('Description')</th>
                                <th class="col-2">@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $j = 0;
                            @endphp
                            @forelse ($exercises as  $exercise)
                                @php
                                    $j++;
                                @endphp
                                <tr>
                                    {{-- <td>{{ $j }}</td> --}}
                                    <td>{{ $exercise->name }}</td>
                                    @if ($exercise->copy_id)
                                        <td></td>
                                    @else
                                        <td>{{ $exercise->exercise_type->name }}</td>
                                    @endif
                                    <td>{{ $exercise->description }}</td>
                                    <td>
                                        <a href='{{ route('view.exercise.detail', ['id' => $exercise->id]) }}'
                                            class="link-primary"> <i class="fa fa-eye"></i></a>
                                        <a href="{{ route('edit.exercise', ['id' => $exercise->id]) }}"
                                            style="padding-left:10px;" class="link-success"> <i class="fas fa-edit"></i></a>
                                        <a style="padding-left:10px;" class="link-danger" href='#'><i
                                                class="fas fa-trash-alt"
                                                onclick="delete_exercise({{ $exercise }})"></i></a>
                                        <a style="padding-left:10px;" class="link-warning"
                                            href='{{ route('copy.exercise', ['id' => $exercise->id]) }}'><i
                                                class="far fa-clone"></i></a>
                                        @if (auth()->user()->role == 'superadmin')
                                            <a style="padding-left:10px;" class="link-info"><i class="fas fa-share"
                                                    onclick="shair_exercise({{ $exercise }})"></i></a>
                                        @endif

                                    </td>

                                </tr>
                            @empty
                            @endforelse
                            <div id="copyexercise"></div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">@lang('Delete Exercise')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-danger">@lang('Are you sure you want to delete this Exercise?')</h4>
                </div>
                <form action="{{ route('delete.exercise') }}" method="post">
                    @csrf
                    <input type="hidden" id="delete_id" name="exercise_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang('Cancel')</button>
                        <button type="submit" class="btn btn-danger">@lang('Delete')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="import_cvs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">@lang('Impost CVS File')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('import.exercise') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input type="file" name="file" class="form-control">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang('Cancel')</button>
                    <button type="submit" class="btn btn-success">@lang('Import')</button>
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
                                    <input type="hidden" id="shair_id" name="exercise_id">
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
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>

    <script>
        function delete_exercise(exercise) {
            $('#delete_id').val(exercise.id);
            $('#staticBackdrop').modal('show');
        }

        function copy_exercise(id) {

            $.ajax({
                url: "{{ url('exercises/copy') }}" + "/" + id,
                type: "GET",
                data: {},
                dataType: "json",
                success: function(data) {
                    var html = '';
                    var copy = ''
                    $.each(data, function(key, value) {
                        if (value.copy_id == null) {
                            copy = value.exercises_type_id.name;
                        } else {
                            copy = '';
                        }
                        html += '<tr>';
                        html += '<td>';
                        html += value.name;
                        html += '</td>';
                        html += '<td>';
                        html += copy;
                        html += '</td>';
                        html += '<td>';
                        html += value.description;
                        html += '</td>';
                        html += '<td>';
                        html += '<a href=';
                        html += 'class="link-primary">';
                        html += '<i class="fa fa-eye">';
                        html += '</i>';
                        html += '</a>';
                        html += '<a href=';
                        html += 'class="link-success">';
                        html += '<i class="fas fa-edit">';
                        html += '</i>';
                        html += '</a>';
                        html += '<a href=';
                        html += 'class="link-danger">';
                        html += '<i class="fas fa-trash-alt">';
                        html += '</i>';
                        html += '</a>';
                        html += '<a href=';
                        html += 'class="link-warning">';
                        html += '<i class=""far fa-clone">';
                        html += '</i>';
                        html += '</a>';
                        html += '<a href=';
                        html += 'class="link-info">';
                        html += '<i class=""fas fa-share">';
                        html += '</i>';
                        html += '</a>';
                        html += '</td>';
                        html += '</tr>';
                    });
                    $('tbody').html(html);
                    swal("Saved", "Status SuccessFully Change", "success");
                },
                error: function(response) {
                    alert("Failed");
                }
            });
        }

        function shair_exercise(exercise) {
            $('#shair_id').val(exercise.id);
            $('#sahir_exampleModal').modal('show');
        }

        function impot_cvs() {
            $('#import_cvs').modal('show');
        }
        $('#shair_form').on('submit', function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();

            $.ajax({
                url: "{{ route('shair.exercise') }}",
                method: "POST",
                data: form_data,
                dataType: "json",
                success: function(response) {
                    $("#sahir_exampleModal").modal('hide');
                    swal("Saved", "Status SuccessFully Change", "success");
                },
                error: function(response) {
                    $("#sahir_exampleModal").modal('hide');
                    swal("Not Saved", "Status SuccessFully Change", "error");
                }
            })
        });
    </script>
@endsection
