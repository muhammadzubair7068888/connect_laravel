@extends('supperadmin.layouts.master')

@section('title')
    @lang('Exercise Detail')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Exercise Detail')
        @endslot
        @slot('title')
            @lang('Exercise Detail')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row" id="exercise-details-section" data-id="45">
                        <div class="col-md-12">
                            <p><strong>Title:</strong> {{ $exercise_detail[0]->title }}</p>
                            <p><strong>Description:</strong> {{ $exercise_detail[0]->exercise->description }}</p>
                        </div>
                        <div class="col-md-12">
                            <div class="row mt-4 exercise-detail" data-id="397">
                                <div class="col-sm-6">
                                    <strong>Link: </strong>
                                    <a href="{{ $exercise_detail[0]->link }}">6-4-5 oz Bullpen</a>
                                </div>
                                <div class="col-sm-3">
                                    <p><strong>Sets: </strong> {{ $exercise_detail[0]->sets }}</p>
                                </div>
                                <div class="col-sm-3">
                                    <p><strong>Reps: </strong> {{ $exercise_detail[0]->reps }}</p>
                                </div>
                                <div class="col-sm-12">
                                    <p><strong>Notes: </strong> {{ $exercise_detail[0]->notes }}</p>
                                </div>
                            </div>
                            @php
                                $j = -1;
                            @endphp
                            @forelse ($exercise_detail as $detail)
                                @php
                                    $j++;
                                @endphp
                                @if ($j > 0)
                                    <hr>
                                    <div class="row mt-4 exercise-detail" data-id="6037">
                                        <div class="col-sm-3">
                                            <p><strong>@lang('Title: ')</strong> {{ $detail->title }}</p>

                                        </div>
                                        <div class="col-sm-3">
                                            <strong>@lang('Link: ')</strong>
                                            <a href="{{ $detail->link }}"> {{ $detail->title }} oz
                                                {{ $detail->exercise->description }}</a>
                                        </div>
                                        <div class="col-sm-3">
                                            <p><strong>@lang('Sets: ')</strong> {{ $detail->sets }}</p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p><strong>@lang('Reps: ')</strong>{{ $detail->reps }}</p>
                                        </div>
                                        <div class="col-sm-12">
                                            <p><strong>@lang('Notes: ') </strong>{{ $detail->notes }}</p>
                                        </div>
                                    </div>
                                @endif
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
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
@endsection
