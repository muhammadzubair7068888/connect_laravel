<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Exercise Detail'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('Exercise Detail'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('Exercise Detail'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row" id="exercise-details-section" data-id="45">
                        <div class="col-md-12">
                            <p><strong>Title:</strong> <?php echo e($exercise_detail[0]->title); ?></p>
                            <p><strong>Description:</strong> <?php echo e($exercise_detail[0]->exercise->description); ?></p>
                        </div>
                        <div class="col-md-12">
                            <div class="row mt-4 exercise-detail" data-id="397">
                                <div class="col-sm-6">
                                    <strong>Link: </strong>
                                    <a href="<?php echo e($exercise_detail[0]->link); ?>">6-4-5 oz Bullpen</a>
                                </div>
                                <div class="col-sm-3">
                                    <p><strong>Sets: </strong> <?php echo e($exercise_detail[0]->sets); ?></p>
                                </div>
                                <div class="col-sm-3">
                                    <p><strong>Reps: </strong> <?php echo e($exercise_detail[0]->reps); ?></p>
                                </div>
                                <div class="col-sm-12">
                                    <p><strong>Notes: </strong> <?php echo e($exercise_detail[0]->notes); ?></p>
                                </div>
                            </div>
                            <?php
                                $j = -1;
                            ?>
                            <?php $__empty_1 = true; $__currentLoopData = $exercise_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    $j++;
                                ?>
                                <?php if($j > 0): ?>
                                    <hr>
                                    <div class="row mt-4 exercise-detail" data-id="6037">
                                        <div class="col-sm-3">
                                            <p><strong><?php echo app('translator')->get('Title: '); ?></strong> <?php echo e($detail->title); ?></p>

                                        </div>
                                        <div class="col-sm-3">
                                            <strong><?php echo app('translator')->get('Link: '); ?></strong>
                                            <a href="<?php echo e($detail->link); ?>"> <?php echo e($detail->title); ?> oz
                                                <?php echo e($detail->exercise->description); ?></a>
                                        </div>
                                        <div class="col-sm-3">
                                            <p><strong><?php echo app('translator')->get('Sets: '); ?></strong> <?php echo e($detail->sets); ?></p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p><strong><?php echo app('translator')->get('Reps: '); ?></strong><?php echo e($detail->reps); ?></p>
                                        </div>
                                        <div class="col-sm-12">
                                            <p><strong><?php echo app('translator')->get('Notes: '); ?> </strong><?php echo e($detail->notes); ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
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
    <script src="<?php echo e(URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/pages/form-validation.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/connect.pk/resources/views/supperadmin/exercise_detail.blade.php ENDPATH**/ ?>