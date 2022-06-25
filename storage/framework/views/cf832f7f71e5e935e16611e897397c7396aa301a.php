

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Update User'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('Update User'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('Update User'); ?>
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
            <form action="<?php echo e(route('update.user.save', ['id' => $user->id])); ?>" method="post" class="needs-validation"
                novalidate>
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <div class="text-start mt-2">
                        <img src="<?php echo e(asset($user->avatar)); ?>" alt="" class="rounded-circle avatar-lg">
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label"><?php echo app('translator')->get('Picture'); ?></label>
                            <input type="file" name="file" class="form-control" id="" placeholder="Name">
                            <div class="valid-feedback">
                                <?php echo app('translator')->get('Looks good!'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="validationCustom02" class="form-label"><?php echo app('translator')->get('Name'); ?></label>
                            <input type="text" name="name" value="<?php echo e($user->name); ?>" class="form-control"
                                id="validationCustom02" placeholder="Email" value="" required>
                            <div class="valid-feedback">
                                <?php echo app('translator')->get('Looks good!'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label"><?php echo app('translator')->get('Email'); ?></label>
                            <input type="text" name="email" value="<?php echo e($user->email); ?>" class="form-control"
                                id="" placeholder="Email" required>
                            <div class="valid-feedback">
                                <?php echo app('translator')->get('Looks good!'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="validationCustom02" class="form-label"><?php echo app('translator')->get('height'); ?></label>
                            <input type="text" name="height" value="<?php echo e($user->height); ?>" class="form-control"
                                id="validationCustom02" placeholder="Height" required>
                            <div class="valid-feedback">
                                <?php echo app('translator')->get('Looks good!'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label"><?php echo app('translator')->get('Handedness'); ?></label>
                            <select name="hand_type" id="hand_type" class="form-select" required>
                                <?php if($user->handedness == 'left'): ?>
                                    <option value="Left" selected><?php echo app('translator')->get('Left'); ?></option>
                                    <option value="Right"><?php echo app('translator')->get('Right'); ?></option>
                                <?php else: ?>
                                    <option value="Left"><?php echo app('translator')->get('Left'); ?></option>
                                    <option value="Right" selected><?php echo app('translator')->get('Right'); ?></option>
                                <?php endif; ?>
                            </select>
                            <div class="valid-feedback">
                                <?php echo app('translator')->get('Looks good!'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="validationCustom02" class="form-label"><?php echo app('translator')->get('Starting Weight'); ?></label>
                            <input type="text" name="starting_weight" value="<?php echo e($user->starting_weight); ?>"
                                class="form-control" id="validationCustom02" placeholder="Starting Weight" value=""
                                required>
                            <div class="valid-feedback">
                                <?php echo app('translator')->get('Looks good!'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label"><?php echo app('translator')->get('Level'); ?></label>
                            <input type="text" name="level" value="<?php echo e($user->level); ?>" class="form-control"
                                id="" placeholder="Email" required>
                            <div class="valid-feedback">
                                <?php echo app('translator')->get('Looks good!'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="validationCustom02" class="form-label"><?php echo app('translator')->get('School'); ?></label>
                            <input type="text" name="school" value="<?php echo e($user->school); ?>" class="form-control"
                                id="validationCustom02" placeholder="School" required>
                            <div class="valid-feedback">
                                <?php echo app('translator')->get('Looks good!'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label"><?php echo app('translator')->get('Age'); ?></label>
                            <input type="text" name="age" value="<?php echo e($user->age); ?>" class="form-control"
                                id="" placeholder="Email" required>
                            <div class="valid-feedback">
                                <?php echo app('translator')->get('Looks good!'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="validationCustom02" class="form-label"><?php echo app('translator')->get('Status'); ?></label>
                            <select name="user_status" id="user_status" class="form-select" required>
                                <?php if($user->handedness == 'left'): ?>
                                    <option value="0" selected><?php echo app('translator')->get('Banned'); ?></option>
                                    <option value="1"><?php echo app('translator')->get('Active'); ?></option>
                                <?php else: ?>
                                    <option value="1"><?php echo app('translator')->get('Active'); ?></option>
                                    <option value="0" selected><?php echo app('translator')->get('Banned'); ?></option>
                                <?php endif; ?>
                            </select>
                            <div class="valid-feedback">
                                <?php echo app('translator')->get('Looks good!'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Password'); ?></label>
                            <input type="Password" name="password" class="form-control" id="validationTooltip01"
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Confirm Password'); ?></label>
                            <input type="password" name="password_confirmation" class="form-control"
                                id="validationTooltip01" placeholder="Password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if(auth()->user()->role == 'superadmin'): ?>
                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <label for="formrow-inputState" class="form-label"><?php echo app('translator')->get('Role'); ?></label>
                                <select id="formrow-inputState" name="role" class="form-select">
                                    <?php if($user->role == 'admin'): ?>
                                        <option value="admin" selected><?php echo app('translator')->get('Admin'); ?></option>
                                        <option value="user"><?php echo app('translator')->get('User'); ?></option>
                                    <?php else: ?>
                                        <option value="admin"><?php echo app('translator')->get('Admin'); ?></option>
                                        <option value="user"selected><?php echo app('translator')->get('User'); ?></option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <label for="formrow-inputState" class="form-label"><?php echo app('translator')->get('Role'); ?></label>
                                <select id="formrow-inputState" name="role" value="<?php echo e(old('role')); ?>"
                                    class="form-select">
                                    <option value="user" selected><?php echo app('translator')->get('User'); ?></option>
                                </select>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </form>
        </div>




    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/pages/form-validation.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views/supperadmin/update_user.blade.php ENDPATH**/ ?>