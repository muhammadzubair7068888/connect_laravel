@extends('supperadmin.layouts.master')

@section('title')
    @lang('Files')
@endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('File')
        @endslot
        @slot('title')
            @lang('File')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-greetings />
                    <div class="mb-3">
                        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">@lang('New File')</button>
                    </div>
                    @if (auth()->user()->role == 'user')
                    @else
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">@lang('Select User')</label>
                                    <select class="form-control select2" onchange="getval(this);">{{-- onchange="getval(this);" --}}
                                        @forelse ($users as $user)
                                            <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
                                        @empty
                                            <option value="AK"></option>
                                            <option value="HI">Hawaii</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endif

                    <h4 class="card-title">@lang('Files')</h4>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th>@lang('#')</th>
                                <th>@lang('Title')</th>
                                <th>@lang('FileName')</th>
                                <th class="col-1">@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $j = 0;
                            @endphp
                            @forelse ($files as $file)
                                @php
                                    $j++;
                                    $pdf = explode('pdf', $file->file);
                                @endphp
                                <tr class="first_row">
                                    <td>{{ $j }}</td>
                                    <td>{{ $file->title }}</td>
                                    <td>{{ $file->file }}</td>
                                    <td>
                                        @if (isset($pdf[1]))
                                        @else
                                            <a class="link-primary view-video"
                                                data-link="{{ asset('/uploads/' . $file->file) }}" data-name="name"
                                                data-bs-target="#myModal" data-bs-toggle="modal"> <i class="fa fa-eye"></i></a>
                                        @endif
                                        <a style="padding-left:10px;" class="link-warning"
                                            href='{{ route('download.file', ['id' => $file->id]) }}'><i
                                                class="bx bx-download"></i></a>
                                        <a style="padding-left:10px;" class="link-danger"><i class="fas fa-trash-alt"
                                                onclick="delete_file({{ $file }})"></i></a>
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
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">@lang('Add New File')</h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('save.file') }}" class="needs-validation"
                            enctype='multipart/form-data'>
                            @csrf
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip01" class="form-label">@lang('Title')</label>
                                <input type="text" name="title" class="form-control" placeholder="Title">
                            </div>
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip01" class="form-label">@lang('Upload File')</label>
                                <input type="file" name="file" class="form-control" onchange="loadFile(event)"
                                    accept="video/*,.pdf">
                            </div>

                            <div class="mb-3 position-relative">
                                <video id="output" controls="" style="width: 100%;"></video>
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
    </div> <!-- end preview-->
    <div id="exampleModalFullscreen" class="modal fade" tabindex="-1" aria-labelledby="#exampleModalFullscreenLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFullscreenLabel">@lang('vedio')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body"><video id="playvideo" src="" controls=""
                            style="width: 100%;"></video></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">@lang('Close')</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div> <!-- end preview-->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">@lang('Delete File')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-danger">@lang('Are you sure you want to delete this FIle?')</h4>
                </div>
                <form action="{{ route('delete.file') }}" method="post">
                    @csrf
                    <input type="hidden" id="delete_id" name="file_id">
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
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2();
        });
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
        $(document).on('click', '.view-video', function() {
            console.log($(this).attr('data-link'));
            $('#exampleModalFullscreen').modal('show');
            $("#playvideo").attr('src', $(this).attr('data-link'));
        })

        function delete_file(file) {
            $('#delete_id').val(file.id);
            $('#staticBackdrop').modal('show');
        }

        function delete_file_js(file) {
            $('#delete_id').val(file);
            $('#staticBackdrop').modal('show');
        }

        function getval(id) {
            var user_id = id.value;
            $.ajax({
                url: "{{ url('files/index') }}" + "/" + user_id,
                type: "GET",
                data: {},
                dataType: "json",
                success: function(data) {
                    var i = 0;
                    var html = '';
                    var view = '';
                    console.log(data);
                    $.each(data, function(key, value) {
                        i++;
                        var download = "{{ url('/files/download') }}" + "/" + value.id;
                        var viewurl = "{{ asset('/uploads') }}" + "/" + value.file;
                        let text = value.file
                        const arr = text.split("pdf");
                        if (typeof arr[1] !== 'undefined') {
                            view += ''
                        } else {
                            view +=
                                '<a class="link-primary view-video"data-link = ' + viewurl +
                                ' data-name="name" data-target="#myModal"data-bs-toggle="modal" >' +
                                '<i class = "fa fa-eye" >' + '</i>' + '</a>';
                        }
                        html += '<tr>';
                        html += '<td>';
                        html += i;
                        html += '</td>';
                        html += '<td>';
                        html += value.title;
                        html += '</td>';
                        html += '<td>';
                        html += value.file;
                        html += '</td>';
                        html += '<td>';
                        html += view;
                        html += '<a style="padding-left:10px;" class="link-warning" href=';
                        html += download;
                        html += '>';
                        html += '<i class = "bx bx-download">';
                        html += '</i>';
                        html += '</a>';
                        html += '<a style="padding-left:10px;" class="link-danger" href=';
                        html += download;
                        html += '>';
                        html += '<i class = "fas fa-trash-alt">';
                        html += '</i>';
                        html += '</a>';
                        html += '</td>';
                        html += '</tr>';
                    });
                    $('tbody').html(html);
                },
                error: function(response) {
                    alert('4');
                    alert("Failed")
                }
            });

        }
    </script>
@endsection
{{-- html += '<td>';
                        html += view;
                        html += '<a style="padding-left:10px;" class="link-warning" href=';
                        html += url;
                        html += '>';
                        html += '<i class="bx bx-download">';
                        html += '</i>';
                        html += '</a>';
                        html += '<a style="padding-left:10px;" class="link-danger">';
                        html += '<i class="fas fa-trash-alt" onclick = "delete_file_js(';
                        html += value.id;
                        html += ')" >'; --}}
