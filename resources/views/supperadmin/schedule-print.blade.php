@extends('supperadmin.layouts.master-without-nav')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('title')
    @lang('Schedule')
@endsection

@section('css')
    <link href="{{ URL::asset('/assets/css/schedule/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/css/schedule/shared.style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/css/schedule/demo.style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/css/schedule/vendor.bundle.base.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/css/schedule/vendor.bundle.addons.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3>Day Plan</h3>
                        <br>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($tasks as $task)
                                @php
                                    $exercise = \App\Models\Exercise::with('excercise_details')->find($task['extendedProps']['exerciseID']);
                                @endphp
                            <h4><u><b>Task {{$i++}}</b></u></h4><br>
                            <div class="row">

                                <div class="col-md-12">
                                    <p><strong>Title:</strong> {{$exercise->name}}</p>
                                    <p><strong>Description:</strong> {{$exercise->description}}</p>
                                </div>
                                <div class="col-md-12">
                                    @forelse ($exercise->excercise_details as $edetail)
                                        <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <strong>Link: </strong>
                                                <a href="{{$edetail->link}}">{{$edetail->title}}</a>
                                            </div>
                                            <div class="col-sm-3">
                                                <p><strong>Sets: </strong>{{$edetail->sets}}</p>
                                            </div>
                                            <div class="col-sm-3">
                                                <p><strong>Reps: </strong>{{$edetail->reps}}</p>
                                            </div>
                                            <div class="col-sm-12">
                                                <p><strong>Notes: </strong>{{$edetail->notes}}</p>
                                            </div>
                                        </div>
                                        <hr>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    window.print();
</script>
