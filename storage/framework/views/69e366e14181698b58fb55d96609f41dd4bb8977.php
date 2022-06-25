

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Company Setting'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('Company Setting'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('Company Setting'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="card">
        <div class="card-body">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.greetings','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('greetings'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <form action="<?php echo e(route('company_setting')); ?>" method="POST" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Company Name'); ?></label>
                            <input type="text" name="company_name" class="form-control"
                                value="<?php echo e($company->name ?? ''); ?>" id="validationTooltip01" placeholder="Name" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="recipient-name" class="form-label"><?php echo app('translator')->get('Company Email'); ?></label>
                            <input type="text" name="company_email" class="form-control"
                                value="<?php echo e($company->email ?? ''); ?>" id="validationTooltip01" placeholder="Email" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Company Phone'); ?></label>
                            <input type="text" name="company_phone" class="form-control"
                                value="<?php echo e($company->phone ?? ''); ?>" id="validationTooltip01" placeholder="Phone Number"
                                required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="recipient-name" class="form-label"><?php echo app('translator')->get('Company Fax'); ?></label>
                            <input type="text" name="company_fax" class="form-control"
                                value="<?php echo e($company->fax ?? ''); ?>" id="validationTooltip01" placeholder="Fax" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Company City'); ?></label>
                            <input type="text" name="company_city" class="form-control"
                                value="<?php echo e($company->city ?? ''); ?>" id="validationTooltip01" placeholder="City" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="recipient-name" class="form-label"><?php echo app('translator')->get('Company Postal Code'); ?></label>
                            <input type="text" name="company_postal_code" class="form-control"
                                value="<?php echo e($company->postal_code ?? ''); ?>" id="validationTooltip01"
                                placeholder="Postal Code" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label"><?php echo app('translator')->get('Site Logo Light'); ?></label>
                    <input class="form-control" type="file" name="company_logo_light" id="" required>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label"><?php echo app('translator')->get('Site Logo Dark'); ?></label>
                    <input class="form-control" type="file" name="company_logo_dark" id="" required>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label"><?php echo app('translator')->get('Site Favicon'); ?></label>
                    <input class="form-control" type="file" name="company_favicon" id="" required>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label"><?php echo app('translator')->get('Short Description'); ?></label>
                    <textarea class="form-control" name="description" id="message-text"><?php echo e($company->description ?? ''); ?></textarea>
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

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views/supperadmin/settings/company_setting.blade.php ENDPATH**/ ?>