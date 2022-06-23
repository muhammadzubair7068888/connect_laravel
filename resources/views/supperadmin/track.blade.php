@extends('supperadmin.layouts.master')

@section('title')
    @lang('Track')
@endsection


@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Track')
        @endslot
        @slot('title')
            @lang('Track')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-greetings />
                    <div class="d-flex flex-wrap gap-3">
                        <div>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                data-bs-whatever="@mdo">@lang('New Track')</button>
                        </div>
                    </div>
                    <br>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('Date')</th>
                                <th>@lang('Weight')</th>
                                <th>@lang('Arm Pain')</th>
                                <th class="col-1">@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $j = 0;
                            @endphp
                            @forelse ($tracks as $track)
                                @php
                                    $j++;
                                @endphp
                                <tr>
                                    <td>{{ $j }}</td>
                                    <td>{{ $track->date }}</td>
                                    <td>{{ $track->weight }}</td>
                                    <td>{{ $track->arm_pain }}</td>
                                    <td>
                                        <a style="padding-left:10px;" class="link-danger" href='#'><i
                                                class="fas fa-trash-alt"
                                                onclick="delete_track({{ $track }})"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>{{ $j }}</td>
                                    <td>Bradley Greer</td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td>
                                        <a style="padding-left:10px;" class="link-danger" href='#'><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{ $j }}</td>
                                    <td>Dai Rios</td>
                                    <td>Personnel Lead</td>
                                    <td>Edinburgh</td>
                                    <td>
                                        <a style="padding-left:10px;" class="link-danger" href='#'><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('Track')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('save.tracks') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">@lang('Date')</label>
                                <input type="date" name="date" class="form-control" id="recipient-name">
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">@lang('Weight')</label>
                                <input type="number" name="weight" class="form-control" id="recipient-name"
                                    placeholder="Value">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">@lang('Arm Pain')</label>
                            <select name="arm_pain" id="type" class="form-control">
                                <option value="1">@lang('1')</option>
                                <option value="2">@lang('2')</option>
                                <option value="3">@lang('3')</option>
                                <option value="4">@lang('4')</option>
                                <option value="5">@lang('5')</option>
                                <option value="6">@lang('6')</option>
                                <option value="7">@lang('7')</option>
                                <option value="8">@lang('8')</option>
                                <option value="9">@lang('9')</option>
                                <option value="10">@lang('10')</option>

                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang('Cancel')</button>
                    <button type="submit" class="btn btn-success">@lang('Save')</button>
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
                    <h5 class="modal-title" id="staticBackdropLabel">@lang('Delete Track')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-danger">@lang('Are you sure you want to delete this track?')</h4>
                </div>
                <form action="{{ route('delete.track') }}" method="post">
                    @csrf
                    <input type="hidden" id="delete_id" name="track_id">
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
        function delete_track(track) {
            $('#delete_id').val(track.id);
            $('#staticBackdrop').modal('show');
        }
    </script>
@endsection
