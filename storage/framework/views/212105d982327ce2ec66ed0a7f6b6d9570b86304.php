

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Dashboard'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('Dashboard'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('Dashboard'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?php echo app('translator')->get('weight'); ?></h4>

                    <div id="line_chart_datalabel1" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
            <!--end card-->
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?php echo app('translator')->get('Arm Pain'); ?></h4>

                    <div id="line_chart_datalabel2" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
            <!--end card-->
        </div>
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?php echo app('translator')->get('Standing Long Toss'); ?></h4>

                    <div id="line_chart_datalabel3" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
            <!--end card-->
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?php echo app('translator')->get('Mound Throws Velocity'); ?></h4>

                    <div id="line_chart_datalabel4" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
            <!--end card-->
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?php echo app('translator')->get('Pull Down 3'); ?></h4>

                    <div id="line_chart_datalabel5" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
            <!--end card-->
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?php echo app('translator')->get('Pull Down 4'); ?></h4>

                    <div id="line_chart_datalabel6" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
            <!--end card-->
        </div>
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?php echo app('translator')->get('Pull Down 5'); ?></h4>

                    <div id="line_chart_datalabel7" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
            <!--end card-->
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?php echo app('translator')->get('Pull Down 6'); ?></h4>

                    <div id="line_chart_datalabel8" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
            <!--end card-->
        </div>
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?php echo app('translator')->get('Pull Down 7'); ?></h4>

                    <div id="line_chart_datalabel9" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
            <!--end card-->
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?php echo app('translator')->get('Double Crow Hop Distance'); ?></h4>

                    <div id="line_chart_datalabel10" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
            <!--end card-->
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?php echo app('translator')->get('Kneeling Long Toss'); ?></h4>

                    <div id="line_chart_datalabel11" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
            <!--end card-->
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?php echo app('translator')->get('Seated Long Toss'); ?></h4>

                    <div id="line_chart_datalabel12" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
            <!--end card-->
        </div>
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?php echo app('translator')->get('Bench'); ?></h4>

                    <div id="line_chart_datalabel13" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
            <!--end card-->
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?php echo app('translator')->get('Mound Shuffle'); ?></h4>

                    <div id="line_chart_datalabel14" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
            <!--end card-->
        </div>
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?php echo app('translator')->get('Squat'); ?></h4>

                    <div id="line_chart_datalabel15" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
            <!--end card-->
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?php echo app('translator')->get('Pull Ups'); ?></h4>

                    <div id="line_chart_datalabel16" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
            <!--end card-->
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"><?php echo app('translator')->get('Vertical Jump'); ?></h4>

                    <div id="line_chart_datalabel17" class="apex-charts" dir="ltr"></div>
                </div>
            </div>
            <!--end card-->
        </div>
    </div>
    <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        let weight = <?php echo json_encode($weight, 15, 512) ?>;
        let arm_pain = <?php echo json_encode($arm_pain, 15, 512) ?>;
        let standig_long_toss = <?php echo json_encode($standig_long_toss, 15, 512) ?>;
        let mount_throw_velocit = <?php echo json_encode($mount_throw_velocit, 15, 512) ?>;
        let pull_down_3 = <?php echo json_encode($pull_down_3, 15, 512) ?>;
        let pull_down_4 = <?php echo json_encode($pull_down_4, 15, 512) ?>;
        let pull_down_5 = <?php echo json_encode($pull_down_5, 15, 512) ?>;
        let pull_down_6 = <?php echo json_encode($pull_down_6, 15, 512) ?>;
        let pull_down_7 = <?php echo json_encode($pull_down_7, 15, 512) ?>;
        let double_crow_hop_distance = <?php echo json_encode($double_crow_hop_distance, 15, 512) ?>;
        let kneeling_long_toss = <?php echo json_encode($kneeling_long_toss, 15, 512) ?>;

        let seated_long_toss = <?php echo json_encode($seated_long_toss, 15, 512) ?>;
        let bench = <?php echo json_encode($bench, 15, 512) ?>;
        let mound_ahuffle = <?php echo json_encode($mound_ahuffle, 15, 512) ?>;
        let squat = <?php echo json_encode($squat, 15, 512) ?>;
        let pull_ups = <?php echo json_encode($pull_ups, 15, 512) ?>;
        let vertical_jump = <?php echo json_encode($vertical_jump, 15, 512) ?>;
    </script>
    <script src="<?php echo e(URL::asset('/assets/libs/apexchartsadmin/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/apexchartsadmin/apexcharts.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views/supperadmin/index.blade.php ENDPATH**/ ?>