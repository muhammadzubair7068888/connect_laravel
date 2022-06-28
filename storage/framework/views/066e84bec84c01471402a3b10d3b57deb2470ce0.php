

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('User'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <style>
        .large {
            width: 30px;
            height: 30px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('User'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('User'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title"><b><?php echo app('translator')->get('User Profile'); ?></b></h2>
            <div class="row">
                <div class="col-md-12">
                    <div class="avatar">
                        <img alt="" src="<?php echo e(asset($user->avatar)); ?>" class="users-avatar-shadow rounded-circle"
                            height="150" width="150" style="object-fit: cover; object-position: 0% 0%;">
                    </div>
                    <hr>
                    <div class="md-3" style="">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="userDetail"><strong><?php echo app('translator')->get('Name: '); ?> </strong> <?php echo e($user->name); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong><?php echo app('translator')->get('Email: '); ?></strong><?php echo e($user->email); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong><?php echo app('translator')->get('Height: '); ?></strong><?php echo e($user->height); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong><?php echo app('translator')->get('Starting Weight: '); ?></strong><?php echo e($user->starting_weight); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong><?php echo app('translator')->get('Starting Weight: '); ?></strong><?php echo e($user->handedness); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong><?php echo app('translator')->get('Age: '); ?></strong><?php echo e($user->age); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong><?php echo app('translator')->get('School: '); ?></strong><?php echo e($user->school); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="userDetail"><strong for="batch"><?php echo app('translator')->get('Level: '); ?></strong><?php echo e($user->level); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="row">
                            <div class="col-md-2 p-md-0">
                                <a href="<?php echo e(route('update.user', ['id' => $user->id])); ?>" type="button"
                                    class="btn btn-block btn-success btn-flat btn-edit-profile" data-id="353"
                                    style="width:100%; margin-top:5px;"><?php echo app('translator')->get('Edit Profile'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h2 class="card-title"><b><?php echo app('translator')->get('Assessments'); ?></b></h2>
            <div class="row">
                <div class="col-md-6">
                    <h6><?php echo app('translator')->get('Physical Assessment'); ?></h6>
                    <table class="table table-responsive table-bordered table-hover" data-type="physical">
                        <thead class="thead-dark">
                            <tr>
                                <th><?php echo app('translator')->get('Assessment'); ?></th>
                                <th><?php echo app('translator')->get('Acceptable'); ?></th>
                                <th><?php echo app('translator')->get('Caution'); ?></th>
                                <th><?php echo app('translator')->get('Opportunity'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $user->physical_assessment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $physical): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr data-id="1">
                                    <td><?php echo e($physical->name); ?></td>
                                    <td><input type="radio" class="form-radio" name="<?php echo e($physical->id); ?>"
                                            id="" <?php echo e($physical->status == 1 ? 'checked' : ''); ?>

                                            onclick="phy_status_change(<?php echo e($physical->id); ?>,<?php echo e(1); ?>)" /></td>
                                    <td><input type="radio" class="form-radio" name="<?php echo e($physical->id); ?>"
                                            id="" <?php echo e($physical->status == 2 ? 'checked' : ''); ?>

                                            onclick="phy_status_change(<?php echo e($physical->id); ?>,<?php echo e(2); ?>)" /></td>
                                    <td><input type="radio" class="form-radio" name="<?php echo e($physical->id); ?>"
                                            id="" <?php echo e($physical->status == 3 ? 'checked' : ''); ?>

                                            onclick="phy_status_change(<?php echo e($physical->id); ?>,<?php echo e(3); ?>)" /></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <h6><?php echo app('translator')->get('Mechanical Assessment'); ?></h6>
                    <table class="table table-responsive table-bordered table-hover" data-type="mechanical">
                        <thead class="thead-dark">
                            <tr>
                                <th><?php echo app('translator')->get('Assessment'); ?></th>
                                <th><?php echo app('translator')->get('Acceptable'); ?></th>
                                <th><?php echo app('translator')->get('Caution'); ?></th>
                                <th><?php echo app('translator')->get('Opportunity'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $user->mechanical_assessment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mechanical): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr data-id="1">
                                    <td><?php echo e($mechanical->name); ?></td>
                                    <td><input type="radio" class="form-radio" name="<?php echo e($mechanical->id); ?>"
                                            id="" <?php echo e($mechanical->status == 1 ? 'checked' : ''); ?>

                                            onclick="mach_status_change(<?php echo e($mechanical->id); ?>,<?php echo e(1); ?>)" />
                                    </td>
                                    <td><input type="radio" class="form-radio" name="<?php echo e($mechanical->id); ?>"
                                            id="" <?php echo e($mechanical->status == 2 ? 'checked' : ''); ?>

                                            onclick="mach_status_change(<?php echo e($mechanical->id); ?>,<?php echo e(2); ?>)" />
                                    </td>
                                    <td><input type="radio" class="form-radio" name="<?php echo e($mechanical->id); ?>"
                                            id="" <?php echo e($mechanical->status == 3 ? 'checked' : ''); ?>

                                            onclick="mach_status_change(<?php echo e($mechanical->id); ?>,<?php echo e(3); ?>)" />
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title"><b><?php echo app('translator')->get('Questionnaire'); ?></b></h2>
                <div class="row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th><?php echo app('translator')->get('Question'); ?></th>
                                    <th><?php echo app('translator')->get('Answer'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $user->question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr data-id="1">
                                        <td><?php echo e($question->name); ?></td>
                                        <td></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr data-id="1">
                                        <td>What are your goals regarding training?</td>
                                        <td></td>
                                    </tr>
                                    <tr data-id="2">
                                        <td>Have you had any significant injuries? (anything keeping you off the field 2
                                            weeks
                                            or more)</td>
                                        <td></td>
                                    </tr>
                                    <tr data-id="3">
                                        <td>Rank yourself amongst your peers worldwide in velocity, command, secondary
                                            stuff,
                                            and competitiveness (average, below average, above average)</td>
                                        <td></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        function phy_status_change(id, status) {
            var s_data = status;
            $.ajax({
                url: "<?php echo e(url('assessment/update/phy')); ?>" + "/" + id + "/" + status,
                type: "GET",
                data: {},
                dataType: "json",
                success: function(response) {
                    swal("Saved", "Status SuccessFully Change", "success")
                },
                error: function(response) {
                    alert("Failed")
                }
            });
        }

        function mach_status_change(id, status) {
            var s_data = status;
            $.ajax({
                url: "<?php echo e(url('assessment/update/mach')); ?>" + "/" + id + "/" + status,
                type: "GET",
                data: {},
                dataType: "json",
                success: function(response) {
                    swal("Saved", "Status SuccessFully Change", "success")
                },
                error: function(response) {
                    alert("Failed")
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views/supperadmin/user_view.blade.php ENDPATH**/ ?>