@extends('supperadmin.layouts.master')

@section('title')
    @lang('Site Settings')
@endsection
@section('css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Site Settings')
        @endslot
        @slot('title')
            @lang('Site Settings')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="dashboard-graph-setting-form">
                        @csrf
                        <div class="row">
                            @forelse ($velocities as $velocity)
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="{{ $velocity->label }}"
                                                required="" placeholder="{{ $velocity->key }}"
                                                value="{{ $velocity->name }}">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="radio" class="" name="{{ $velocity->key }}"
                                                value="1" {{ $velocity->status == 1 ? 'checked' : '' }}>
                                            Yes
                                            <input type="radio" class="ml-3" name="{{ $velocity->key }}"
                                                value="0" {{ $velocity->status == 0 ? 'checked' : '' }}> No
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse



                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="mt-1">Leaderboard</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" class="" name="leaderboard" value="1"
                                            checked=""> Yes
                                        <input type="radio" class="ml-3" name="leaderboard" value="0">
                                        No
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3" style="margin-left: 80%;">
                            <button type="submit" class="btn btn-success">Save Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
@endsection
@section('script')
    <script>
        $('#dashboard-graph-setting-form').on('submit', function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "{{ route('graph.setting') }}",
                method: "POST",
                data: form_data,
                dataType: "json",
                success: function(response) {
                    $("#sahir_exampleModal").modal('hide');
                    swal("Saved", "Velocity Graph Setting Successfully", "success");
                },
                error: function(response) {
                    $("#sahir_exampleModal").modal('hide');
                    swal("Not Saved", "Somethings is wrong", "error");
                }
            })
        });
    </script>
@endsection
