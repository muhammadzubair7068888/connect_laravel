
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Schedule'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('/assets/css/main.css')); ?>" rel="stylesheet" type="text/css" />
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
        <div class="col-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="external-events" class="mt-2">
                                <br>
                            </div>
                            <div class="row justify-content-center mt-5">
                            </div>
                        </div>
                    </div>
                </div> <!-- end col-->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div> <!-- end col -->

            </div>

            <div style='clear:both'></div>


            <!-- Add New Event MODAL -->
            <div class="modal fade" id="event-modal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header py-3 px-4 border-bottom-0">
                            <h5 class="modal-title" id="modal-title"></h5>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                        </div>
                        <div class="modal-body p-4">
                            <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                <div class="row">
                                    <div class="col-12">
                                        
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label"><?php echo app('translator')->get('Exercises'); ?></label>
                                            <select class="form-control form-select" name="exercise_id" id="exercise">
                                                <option selected><?php echo app('translator')->get('Select Exercise'); ?></option>
                                                <?php $__currentLoopData = $exercises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($exercise->id); ?>"><?php echo e($exercise->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <div class="invalid-feedback">Please select a valid event category</div>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="color" id="color" name="color" value="#e66465">
                                        <label for="head"><?php echo app('translator')->get('Color'); ?></label>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                    </div>
                                    <div class="col-6 text-end">
                                        <button type="button" class="btn btn-light me-1"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- end modal-content-->
                </div> <!-- end modal dialog-->
            </div>
            <!-- end modal-->

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('assets/js/main.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/schedule/calendars-full.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views/supperadmin/schedule.blade.php ENDPATH**/ ?>