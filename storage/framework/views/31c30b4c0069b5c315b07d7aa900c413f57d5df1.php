<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('User Grid view'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Users
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Grid
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                if ($user->avatar) {
                    $profile = $user->avatar;
                } else {
                    $profile = '/assets/images/users/avatar-5.jpg';
                }
            ?>
            <div class="col-xl-3 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="mb-4">
                            <img class="rounded-circle avatar-sm" src="<?php echo e(asset($profile)); ?>" alt="">
                        </div>
                        <h5 class="font-size-15 mb-1"><a href="#" class="text-dark"><?php echo e($user->name); ?></a></h5>
                        <p class="text-muted"><?php echo e($user->email); ?></p>
                        <div>
                            <?php if($user->status = 0): ?>
                                <a href="#" class="badge bg-danger font-size-12"><?php echo app('translator')->get('Banned'); ?></a>
                            <?php else: ?>
                                <a href="#" class="badge bg-success font-size-12"><?php echo app('translator')->get('Active'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top">
                        <div class="contact-links d-flex font-size-20">
                            <div class="flex-fill">
                                <a href=""><i class="bx bx-message-square-dots"></i></a>
                            </div>
                            <div class="flex-fill">
                                <a href=""><i class="bx bx-pie-chart-alt"></i></a>
                            </div>
                            <div class="flex-fill">
                                <a href=""><i class="bx bx-user-circle"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-xl-3 col-sm-6">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="mb-4">
                            <img class="rounded-circle avatar-sm"
                                src="<?php echo e(URL::asset('/assets/images/users/avatar-5.jpg')); ?>" alt="">
                        </div>
                        <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">Shirley Smith</a></h5>
                        <p class="text-muted">UI/UX Designer</p>

                        <div>
                            <a href="#" class="badge bg-primary font-size-11 m-1">Photoshop</a>
                            <a href="#" class="badge bg-primary font-size-11 m-1">illustrator</a>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top">
                        <div class="contact-links d-flex font-size-20">
                            <div class="flex-fill">
                                <a href=""><i class="bx bx-message-square-dots"></i></a>
                            </div>
                            <div class="flex-fill">
                                <a href=""><i class="bx bx-pie-chart-alt"></i></a>
                            </div>
                            <div class="flex-fill">
                                <a href=""><i class="bx bx-user-circle"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>


    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="text-center my-3">
                <a href="javascript:void(0);" class="text-success"><i class="bx bx-hourglass bx-spin me-2"></i> Load
                    more
                </a>
            </div>
        </div> <!-- end col-->
    </div>
    <!-- end row -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/connect.pk/resources/views/supperadmin/contacts-grid.blade.php ENDPATH**/ ?>