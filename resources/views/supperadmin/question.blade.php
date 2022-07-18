@extends('supperadmin.layouts.master')

@section('title')
    @lang('Question')
@endsection
@section('css')
    <!-- DataTables -->

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

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>@lang('#')</th>
                                <th>@lang('Question')</th>
                                <th class="col-1">@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $j = 0;
                            @endphp
                            @forelse ($questionnaires as $question)
                                @php
                                    $j++;
                                @endphp
                                <tr>
                                    <td>{{ $j }}</td>
                                    <td>{{ $question->name }}</td>
                                    <td>
                                        <a style="padding-left:10px;" class="link-danger" href='#'><i
                                                class="fas fa-trash-alt"
                                                onclick="delete_question({{ $question }})"></i></a>
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
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">@lang('Delete Question')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-danger">@lang('Are you sure you want to delete this track?')</h4>
                </div>
                <form action="{{ route('delete.questionnaire') }}" method="post">
                    @csrf
                    <input type="hidden" id="delete_id" name="question_id">
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
        function delete_question(question) {
            $('#delete_id').val(question.id);
            $('#staticBackdrop').modal('show');
        }
        $("#filter").change(function() {
            var value = this.value;

            $.ajax({
                url: "{{ url('/questionnaire/filter') }}",
                type: "POST",
                data: {
                    value: value
                },
                dataType: "json",
                success: function(response) {
                    var i = 0;
                    var html = '';
                    var view = '';

                    if (response) {
                        $.each(response, function(key, value) {
                            i++;
                            var delete_url = "{{ url('/questionnaire/del') }}" + "/" + value
                                .id;
                            html += '<tr>';
                            html += '<td>';
                            html += i;
                            html += '</td>';
                            html += '<td>';
                            html += value.name;
                            html += '</td>';
                            html += '<td>';
                            html += '</a>';
                            html += '<a style="padding-left:10px;" class="link-danger" href=';
                            html += '#'
                            html += '>';
                            html +=
                                '<i class = "fas fa-trash-alt">';

                            html += '</i>';
                            html += '</a>';
                            html += '</td>';
                            html += '</tr>';
                        });
                    } else {
                        alert("Sorry No data found");
                    }

                    $('tbody').html(html);
                },
                error: function(response) {
                    alert("Failed")
                }
            });
        });
    </script>
@endsection
