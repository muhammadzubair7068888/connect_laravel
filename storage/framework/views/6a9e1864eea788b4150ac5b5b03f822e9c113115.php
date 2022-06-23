

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Mail Setting'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('Mail Setting'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('Mail Setting'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="card">
        <div class="card-body">
            <form class="needs-validation" novalidate>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('SMTP Host'); ?></label>
                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Host" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3 position-relative">
                            <label for="recipient-name" class="form-label"><?php echo app('translator')->get('Port'); ?></label>
                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Port Number"
                                required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Secuirty'); ?></label>
                            <input type="text" class="form-control" id="validationTooltip01" placeholder="Secuirty"
                                required>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3 position-relative">
                            <label for="recipient-name" class="form-label"><?php echo app('translator')->get('SMTP User'); ?></label>
                            <input type="text" class="form-control" id="validationTooltip01" placeholder="User" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Email From'); ?></label>
                            <input type="text" class="form-control" id="validationTooltip01"
                                placeholder="Company Name OR Email" required>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3 position-relative">
                            <label for="recipient-name" class="form-label"><?php echo app('translator')->get('Password'); ?></label>
                            <input type="password" class="form-control" id="validationTooltip01" placeholder="Password"
                                required>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <button class="btn btn-success" type="submit">Save Change</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/pages/form-validation.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views\supperadmin\plugin\mail_setting.blade.php ENDPATH**/ ?>