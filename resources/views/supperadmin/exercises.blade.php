@extends('supperadmin.layouts.master')

@section('title')
    @lang('Exercises')
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
                    </div>
                    <br>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>@lang('#')</th>
                                <th>@lang('Name')</th>
                                <th>@lang('Type')</th>
                                <th>@lang('Description')</th>
                                <th class="col-2">Action</th>
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
                                    <td>{{ $j }}</td>
                                    <td>{{ $exercise->name }}</td>
                                    <td>{{ $exercise->exercise_type->name }}</td>
                                    <td>{{ $exercise->description }}</td>
                                    <td>
                                        {{-- data-bs-toggle="modal"
                                            data-bs-target="#exampleModal"   onclick="view_detail({{ $exercise }})" --}}
                                        <a href='{{ route('view.exercise.detail', ['id' => $exercise->id]) }}'
                                            class="link-primary"> <i class="fa fa-eye"></i></a>
                                        <a href="{{ route('edit.exercise', ['id' => $exercise->id]) }}"
                                            style="padding-left:10px;" class="link-success"> <i class="fas fa-edit"></i></a>
                                        <a style="padding-left:10px;" class="link-danger" href='#'><i
                                                class="fas fa-trash-alt"
                                                onclick="delete_exercise({{ $exercise }})"></i></a>
                                        <a style="padding-left:10px;" class="link-warning" href='#'><i
                                                class="far fa-clone"></i></a>
                                        <a style="padding-left:10px;" class="link-info" href='#'><i
                                                class="fas fa-share"></i></a>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td>{{ $j }}</td>
                                    <td>Gloria Little</td>
                                    <td>Systems Administrator</td>
                                    <td>New York</td>
                                    <td>
                                        <a href='#' class="link-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalFullscreen"><i class="fa fa-eye"></i></a>
                                        <a style="padding-left:10px;" class="link-success" href='#'> <i
                                                class="fas fa-edit"></i></a>
                                        <a style="padding-left:10px;" class="link-danger" href='#'><i
                                                class="fas fa-trash-alt"></i></a>
                                        <a style="padding-left:10px;" class="link-warning" href='#'><i
                                                class="far fa-clone"></i></a>
                                        <a style="padding-left:10px;" class="link-info" href='#'><i
                                                class="fas fa-share"></i></a>
                                    </td>
                                </tr>
                            @endforelse


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
        function delete_exercise(exercise) {
            $('#delete_id').val(exercise.id);
            $('#staticBackdrop').modal('show');
        }
    </script>
@endsection
