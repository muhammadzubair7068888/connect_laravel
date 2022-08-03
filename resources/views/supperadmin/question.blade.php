@extends('supperadmin.layouts.master')

@section('title')
    @lang('Question')
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Question')
        @endslot
        @slot('title')
            @lang('Question')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-greetings />
                    <div class="row">
                        <div class="col-md-4">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-bs-whatever="@mdo">@lang('New Question')</button>
                        </div>
                        <div class="col-md-2" style="position: absolute; right:10px;">
                            <select name="hand_type" id="filter" class="form-select" required>
                                <option value="">@lang('Select')</option>
                                <option value="day">@lang('To Day')</option>
                                <option value="weak">@lang('To Week')</option>
                                <option value="mounth">@lang('To Mounth')</option>
                                <option value="year">@lang('To Year')</option>

                            </select>
                        </div>
                    </div>
                    <br>

                    <table id="question_table" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>@lang('Question')</th>
                                <th class="col-1">@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
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
                    <h5 class="modal-title" id="exampleModalLabel">@lang('Question')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('save.questionnaire') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="recipient-name" class="col-form-label">@lang('Question')</label>
                                <input type="text" class="form-control" name="question" id="recipient-name"
                                    placeholder="Question">
                            </div>
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
@endsection
@section('script')
    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/sweet-alerts.init.js') }}"></script>

    <script src="{{ URL::asset('/assets/libs/jquery-repeater/jquery-repeater.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-repeater.int.js') }}"></script>
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>

    <script>
        function delete_question(id) {
            $.ajax({
                url: "{{ route('delete.questionnaire') }}",
                mehtod: "GET",
                data: {
                    id: id
                },
                success: function(data) {
                    $('#question_table').DataTable().ajax.reload();
                }
            });
        }
        $("#filter").change(function() {
            var value = this.value;
            $('#question_table').DataTable().destroy();
            load_data(value);
        });
        load_data();

        function load_data(value = '') {
            if (value == '') {
                value = 'all';
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#question_table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                searching: true,
                ordering: false,
                ajax: {
                    url: "{{ url('/questionnaire/filter') }}",
                    type: "POST",
                    data: {
                        value: value
                    },
                },
                columns: [{
                        data: 'name'
                    },
                    {
                        data: 'action'
                    },
                ]
            });
        }

        $('#dashboard-graph-setting-form').on('submit', function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            load_data(user_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
@endsection
