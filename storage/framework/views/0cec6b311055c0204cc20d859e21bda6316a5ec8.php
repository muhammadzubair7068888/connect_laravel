<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Schedule'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('/assets/css/schedule/style.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('/assets/css/schedule/shared.style.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('/assets/css/schedule/demo.style.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('/assets/css/schedule/vendor.bundle.base.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('/assets/css/schedule/vendor.bundle.addons.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h3>Day Plan</h3>
                        <br>
                        <?php
                            $i = 1;
                        ?>
                        <?php $__empty_1 = true; $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    $exercise = \App\Models\Exercise::with('excercise_details')->find($task['extendedProps']['exerciseID']);
                                ?>
                            <h4><u><b>Task <?php echo e($i++); ?></b></u></h4><br>
                            <div class="row">

                                <div class="col-md-12">
                                    <p><strong>Title:</strong> <?php echo e($exercise->name); ?></p>
                                    <p><strong>Description:</strong> <?php echo e($exercise->description); ?></p>
                                </div>
                                <div class="col-md-12">
                                    <?php $__empty_2 = true; $__currentLoopData = $exercise->excercise_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $edetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                        <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <strong>Link: </strong>
                                                <a href="<?php echo e($edetail->link); ?>"><?php echo e($edetail->title); ?></a>
                                            </div>
                                            <div class="col-sm-3">
                                                <p><strong>Sets: </strong><?php echo e($edetail->sets); ?></p>
                                            </div>
                                            <div class="col-sm-3">
                                                <p><strong>Reps: </strong><?php echo e($edetail->reps); ?></p>
                                            </div>
                                            <div class="col-sm-12">
                                                <p><strong>Notes: </strong><?php echo e($edetail->notes); ?></p>
                                            </div>
                                        </div>
                                        <hr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<script>
    window.print();
</script>

<?php echo $__env->make('supperadmin.layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/connect.pk/resources/views/supperadmin/schedule-print.blade.php ENDPATH**/ ?>