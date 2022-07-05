

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Dashboard'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('/assets/libs/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="<?php echo e(URL::asset('/assets/libs/datepicker/datepicker.min.css')); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="center" style="">
                        <form id="dashboard-graph-setting-form">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <?php if(auth()->user()->role == 'user'): ?>
                                <?php else: ?>
                                    <div class="col-sm-4">
                                        <label class="form-label"><?php echo app('translator')->get('Select User'); ?></label>
                                        <select class="form-control select2" id="user" name="name">
                                            <option value="<?php echo e(auth()->user()->id); ?>" selected><?php echo app('translator')->get('Me'); ?></option>
                                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                <?php endif; ?>
                                <div class="col-sm-4">
                                    <label>Date Range</label>
                                    <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy"
                                        data-date-autoclose="true" data-provide="datepicker"
                                        data-date-container='#datepicker6'>
                                        <input type="text" class="form-control" name="start" placeholder="Start Date"
                                            autocomplete="off" />
                                        <input type="text" class="form-control" name="end" placeholder="End Date"
                                            autocomplete="off" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="mb-3" style="margin-top: 27px;">
                                        <button type="submit" class="btn btn-success"><?php echo app('translator')->get('Search'); ?></button>
                                        <button type="button" class="btn btn-light"
                                            id="btnClear"><?php echo app('translator')->get('Clear'); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $velocities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $velocity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"><?php echo e($velocity->name); ?></h4>
                        <div id="<?php echo e($velocity->key); ?>" class="apex-charts" dir="ltr"></div>
                    </div>
                </div>
                <!--end card-->
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $(".select2").select2();
        });
        $(document).ready(function() {
            $('#btnClear').click(function() {

                $('#dashboard-graph-setting-form input[type="text"]').val('');
                /*Clear textarea using id */
                $('#dashboard-graph-setting-form #user').val('');

            });
        });
        let weight = <?php echo json_encode($weight, 15, 512) ?>;
        let arm_pain = <?php echo json_encode($arm_pain, 15, 512) ?>;
        let mound_throw_velocit = <?php echo json_encode($mount_throw_velocit, 15, 512) ?>;
        let pull_down_3 = <?php echo json_encode($pull_down_3, 15, 512) ?>;
        let pull_down_4 = <?php echo json_encode($pull_down_4, 15, 512) ?>;
        let pull_down_5 = <?php echo json_encode($pull_down_5, 15, 512) ?>;
        let pull_down_6 = <?php echo json_encode($pull_down_6, 15, 512) ?>;
        let pull_down_7 = <?php echo json_encode($pull_down_7, 15, 512) ?>;
        let bench = <?php echo json_encode($bench, 15, 512) ?>;
        let squat = <?php echo json_encode($squat, 15, 512) ?>;
        let vertical_jump = <?php echo json_encode($vertical_jump, 15, 512) ?>;
        let pull_down_velocity = <?php echo json_encode($pull_down_velocity, 15, 512) ?>;
        let long_toss_distance = <?php echo json_encode($long_toss_distance, 15, 512) ?>;
        let pylo7 = <?php echo json_encode($pylo7, 15, 512) ?>;
        let pylo5 = <?php echo json_encode($pylo5, 15, 512) ?>;
        let pylo3 = <?php echo json_encode($pylo3, 15, 512) ?>;
        let deadlift = <?php echo json_encode($deadlift, 15, 512) ?>;

        let max_weight = 0;
        let max_arm_pain = 0;
        let max_mound_throw_velocity = 0;
        let max_pull_down_3 = 0;
        let max_pull_down_4 = 0;
        let max_pull_down_5 = 0;
        let max_pull_down_6 = 0;
        let max_pull_down_7 = 0;
        let max_bench = 0;
        let max_squat = 0;
        let max_vertical_jump = 0;
        let max_pull_down_velocity = 0;
        let max_long_toss_distance = 0;
        let max_pylo_7 = 0;
        let max_pylo_5 = 0;
        let max_pylo_3 = 0;
        let max_deadlift = 0;

        for (let i = 0; i < 29; i += 1) {
            max_weight += weight[i];
            max_arm_pain += arm_pain[i];
            max_mound_throw_velocity += mound_throw_velocit[i];
            max_pull_down_3 += pull_down_3[i];
            max_pull_down_4 += pull_down_4[i];
            max_pull_down_5 += pull_down_5[i];
            max_pull_down_6 += pull_down_6[i];
            max_pull_down_7 += pull_down_7[i];
            max_bench += bench[i];
            max_squat += squat[i];
            max_vertical_jump += vertical_jump[i];
            max_pull_down_velocity += pull_down_velocity[i];
            max_long_toss_distance += long_toss_distance[i];
            max_pylo_7 += pylo7[i];
            max_pylo_5 += pylo5[i];
            max_pylo_3 += pylo7[i];
            max_deadlift += deadlift[i];
        }

        $('#dashboard-graph-setting-form').on('submit', function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "<?php echo e(route('search.velocity')); ?>",
                method: "POST",
                data: form_data,
                dataType: "json",
                success: function(response) {
                    swal("Saved", "Done", "success");
                },
                error: function(response) {
                    swal("Not Saved", "Status SuccessFully Change", "error");
                }
            })
        });
    </script>
    <script src="<?php echo e(URL::asset('/assets/libs/select2/select2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/apexchartsadmin/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/apexchartsadmin/apexcharts.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/datepicker/datepicker.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views/supperadmin/index.blade.php ENDPATH**/ ?>