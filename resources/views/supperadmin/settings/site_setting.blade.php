@extends('supperadmin.layouts.master')

@section('title')
    @lang('Site Settings')
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
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="weight_label" required=""
                                            placeholder="Weight" value="Weight">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" class="" name="weight" value="1" checked=""> Yes
                                        <input type="radio" class="ml-3" name="weight" value="0"> No
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="arm_pain_label" required=""
                                            placeholder="Arm Pain" value="Arm Pain">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" class="" name="arm_pain" value="1" checked=""> Yes
                                        <input type="radio" class="ml-3" name="arm_pain" value="0"> No
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="pull_down_velocity_label"
                                            required="" placeholder="Pull Down Velocity" value="Standing Long Toss">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" class="" name="pull_down_velocity" value="1"
                                            checked=""> Yes
                                        <input type="radio" class="ml-3" name="pull_down_velocity" value="0"> No
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="mount_throws_velocity_label"
                                            required="" placeholder="Mount Throws Velocity" value="Mound Throws Velocity">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" class="" name="mount_throws_velocity" value="1"
                                            checked=""> Yes
                                        <input type="radio" class="ml-3" name="mount_throws_velocity" value="0">
                                        No
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="pull_down_3_label" required=""
                                            placeholder="Pull Down 3" value="Pull Down 3">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" class="" name="pull_down_3" value="1" checked="">
                                        Yes
                                        <input type="radio" class="ml-3" name="pull_down_3" value="0"> No
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="pull_down_4_label" required=""
                                            placeholder="Pull Down 4" value="Pull Down 4">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" class="" name="pull_down_4" value="1" checked="">
                                        Yes
                                        <input type="radio" class="ml-3" name="pull_down_4" value="0"> No
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="pull_down_5_label" required=""
                                            placeholder="Pull Down 5" value="Pull Down 5">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" class="" name="pull_down_5" value="1" checked="">
                                        Yes
                                        <input type="radio" class="ml-3" name="pull_down_5" value="0"> No
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="pull_down_6_label" required=""
                                            placeholder="Pull Down 6" value="Pull Down 6">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" class="" name="pull_down_6" value="1" checked="">
                                        Yes
                                        <input type="radio" class="ml-3" name="pull_down_6" value="0"> No
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="pull_down_7_label" required=""
                                            placeholder="Pull Down 7" value="Pull Down 7">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" class="" name="pull_down_7" value="1" checked="">
                                        Yes
                                        <input type="radio" class="ml-3" name="pull_down_7" value="0"> No
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="long_toss_distance_label"
                                            required="" placeholder="Long Toss Distance" value="Double Crow Hop Distance">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" class="" name="long_toss_distance" value="1"
                                            checked=""> Yes
                                        <input type="radio" class="ml-3" name="long_toss_distance" value="0"> No
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="pylo_7_label" required=""
                                            placeholder="Pylo 7" value="kneeling long toss">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" class="" name="pylo_7" value="1" checked=""> Yes
                                        <input type="radio" class="ml-3" name="pylo_7" value="0"> No
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="pylo_5_label" required=""
                                            placeholder="Pylo 5" value="seated long toss">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" class="" name="pylo_5" value="1" checked=""> Yes
                                        <input type="radio" class="ml-3" name="pylo_5" value="0"> No
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="pylo_3_label" required=""
                                            placeholder="Pylo 3" value="Bench">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" class="" name="pylo_3" value="1" checked=""> Yes
                                        <input type="radio" class="ml-3" name="pylo_3" value="0"> No
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="bench_label" required=""
                                            placeholder="Bench" value="Mound Shuffle">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" class="" name="bench" value="1" checked=""> Yes
                                        <input type="radio" class="ml-3" name="bench" value="0"> No
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="squat_label" required=""
                                            placeholder="Squat" value="Squat">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" class="" name="squat" value="1" checked=""> Yes
                                        <input type="radio" class="ml-3" name="squat" value="0"> No
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="deadlift_label" required=""
                                            placeholder="Deadlift" value="pull ups">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" class="" name="deadlift" value="1" checked="">
                                        Yes
                                        <input type="radio" class="ml-3" name="deadlift" value="0"> No
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="vertical_jump_label" required=""
                                            placeholder="Vertical Jump" value="Vertical Jump">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" class="" name="vertical_jump" value="1"
                                            checked=""> Yes
                                        <input type="radio" class="ml-3" name="vertical_jump" value="0"> No
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="mt-1">Leaderboard</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" class="" name="leaderboard" value="1"> Yes
                                        <input type="radio" class="ml-3" name="leaderboard" value="0" checked="">
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
