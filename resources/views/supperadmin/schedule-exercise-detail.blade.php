@extends('supperadmin.layouts.master')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('title')
    @lang('Schedule')
@endsection

@section('css')
    <link href="{{ URL::asset('/assets/css/main.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/datepicker/datepicker.min.css') }}">
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Schedule')
        @endslot
        @slot('title')
            @lang('Schedule')
        @endslot
    @endcomponent
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Day Plan</h4>
                <div class="row" id="exercise-details-section" data-id="10">
                    <div class="col-md-12">
                        <p><strong>Title:</strong> {{$exercise->title}}</p>
                        <p><strong>Description:</strong>{{$exercise->description}}</p>
                    </div>
                    <div class="col-md-12">
                        @forelse ($exercise->excercise_details as $detail)
                            <div class="row mt-4 exercise-detail" data-id="{{$detail->id}}">
                                <div class="col-sm-6">
                                    <strong>Link: </strong>
                                    <a href="{{$detail->link}}">{{$detail->tite}}</a>
                                </div>
                                <div class="col-sm-3">
                                    <p><strong>Sets: </strong>{{$detail->sets}}</p>
                                </div>
                                <div class="col-sm-3">
                                    <p><strong>Reps: </strong>{{$detail->reps}}</p>
                                </div>
                                <div class="col-sm-6">
                                    <p><strong>Notes: </strong>{{$detail->notes}}</p>
                                </div>
                                <div class="col-sm-6">
                                    <p><strong>Strength: </strong><input type="number"
                                            class="form-control d-inline strength-field" min="0" max="9999"
                                            style="width: 30%;" value="{{$detail->strength}}"></p>
                                </div>
                            </div>
                            <hr>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('assets/js/main.js') }}"></script>
<script>
    $(function () {
        $('.strength-field').on('change', function () {
            var id = $(this).closest('.exercise-detail').data('id');
            var strength = $(this).val();
            $.ajax({
                url: id + '/strength',
                type: 'PUT',
                data: {
                    'strength' : strength,
                    '_token': '{{csrf_token()}}'
                },
                success: function (data) {
                    console.log(data);
                }
            });
        });
    });
</script>
@endsection
