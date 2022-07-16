@extends('supperadmin.layouts.master')

@section('title')
    @lang('Velocity')
@endsection


@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Velocity')
        @endslot
        @slot('title')
            @lang('Velocity')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <x-greetings />
                    <div class="mb-3">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            data-bs-whatever="@mdo">@lang('New Velocity')</button>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>@lang('#')</th>
                                <th>@lang('Date')</th>
                                <th>@lang('Velocity Type')</th>
                                <th>@lang('Value')</th>
                                <th class="col-1">@lang('Action')</th>
                            </tr>
                        </thead>
                        @php
                            $j = 0;
                        @endphp
                        @forelse ($user_velocities as $user_velocity)
                            @php
                                $j++;
                            @endphp
                            <tr>
                                <td>{{ $j }}</td>
                                <td>{{ $user_velocity->date }}</td>
                                <td>{{ $user_velocity->velocity_type->name }}</td>
                                <td>{{ $user_velocity->value }}</td>
                                <td>
                                    <a style="padding-left:10px;" class="link-danger" href='#'><i
                                            class="fas fa-trash-alt"
                                            onclick="delete_velocity({{ $user_velocity }})"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>{{ $j }}</td>
                                <td>Gloria Little</td>
                                <td>Systems Administrator</td>
                                <td>New York</td>
                                <td>
                                    <a style="padding-left:10px;" class="link-danger" href='#'><i
                                            class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
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
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        {{-- <div class="modal-dialog"> --}}
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('Velocity')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action ="{{ route('save.velocity') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">@lang('Date')</label>
                                <input type="date" name="date" class="form-control" id="recipient-name">
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label">@lang('Value')</label>
                                <input type="number" name="value" class="form-control" id="recipient-name"
                                    placeholerder="Value">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">@lang('Velocity')</label>
                            <select name="velocity_type" id="type" class="form-select">
                                <option value="">@lang('Select Type')</option>
                                @forelse ($velocities as $velocity)
                                    <option value="{{ $velocity->id }}">{{ $velocity->name }}</option>
                                @empty
                                    <option value="saab">@lang('Pull Down 1')</option>
                                    <option value="mercedes">@lang('Pull Down 2')</option>
                                    <option value="audi">@lang('Pull Down 3')</option>
                                @endforelse

                            </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                    <h5 class="modal-title" id="staticBackdropLabel">@lang('Delete Velocity')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-danger">@lang('Are you sure you want to delete this Velocity?')</h4>
                </div>
                <form action="{{ route('delete.velocity') }}" method="post">
                    @csrf
                    <input type="hidden" id="delete_id" name="velocity_id">
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
        function delete_velocity(velocity) {
            $('#delete_id').val(velocity.id);
            $('#staticBackdrop').modal('show');
        }
    </script>
@endsection
