<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Schedule'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('/assets/css/main.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="<?php echo e(URL::asset('/assets/libs/datepicker/datepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('Schedule'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('Schedule'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Day Plan</h4>
                <div class="row" id="exercise-details-section" data-id="10">
                    <div class="col-md-12">
                        <p><strong>Title:</strong> <?php echo e($exercise->title); ?></p>
                        <p><strong>Description:</strong><?php echo e($exercise->description); ?></p>
                    </div>
                    <div class="col-md-12">
                        <?php $__empty_1 = true; $__currentLoopData = $exercise->excercise_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="row mt-4 exercise-detail" data-id="<?php echo e($detail->id); ?>">
                                <div class="col-sm-6">
                                    <strong>Link: </strong>
                                    <a href="<?php echo e($detail->link); ?>"><?php echo e($detail->tite); ?></a>
                                </div>
                                <div class="col-sm-3">
                                    <p><strong>Sets: </strong><?php echo e($detail->sets); ?></p>
                                </div>
                                <div class="col-sm-3">
                                    <p><strong>Reps: </strong><?php echo e($detail->reps); ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><strong>Notes: </strong><?php echo e($detail->notes); ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><strong>Strength: </strong><input type="number"
                                            class="form-control d-inline strength-field" min="0" max="9999"
                                            style="width: 30%;" value="<?php echo e($detail->strength); ?>"></p>
                                </div>
                            </div>
                            <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(URL::asset('assets/js/main.js')); ?>"></script>
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
                    '_token': '<?php echo e(csrf_token()); ?>'
                },
                success: function (data) {
                    console.log(data);
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/connect.pk/resources/views/supperadmin/schedule-exercise-detail.blade.php ENDPATH**/ ?>