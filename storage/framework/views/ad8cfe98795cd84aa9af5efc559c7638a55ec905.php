

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Invite User'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('User List'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('User List'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-12">
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
                    <div class="mb-3">
                        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target="#exampleModal"><?php echo app('translator')->get('New User'); ?></button>
                        
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('S.No'); ?></th>
                                <th><?php echo app('translator')->get('Name'); ?></th>
                                <th><?php echo app('translator')->get('email'); ?></th>
                                <th><?php echo app('translator')->get('Role'); ?></th>
                                <th><?php echo app('translator')->get('Added By'); ?></th>
                                <th><?php echo app('translator')->get('Height'); ?></th>
                                <th><?php echo app('translator')->get('Starting Weight'); ?></th>
                                <th><?php echo app('translator')->get('Last Login'); ?></th>
                                <th><?php echo app('translator')->get('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Steven Leicht</td>
                                <td>leichtsteven@gmail.com</td>
                                <td>User</td>
                                <td>Admin</td>
                                <td>6</td>
                                <td>180</td>
                                <td>date</td>
                                <td>
                                    <a href='#' class="link-primary"> <i class="fa fa-eye"></i></a>
                                    <a style="padding-left:10px;" class="link-success" href='#'> <i
                                            class="fas fa-edit"></i></a>
                                    <a style="padding-left:10px;" class="link-danger" href='#'><i
                                            class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"><?php echo app('translator')->get('Add New User'); ?></h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo e(route('add.user')); ?>" class="needs-validation"
                            enctype='multipart/form-data' novalidate>
                            <?php echo csrf_field(); ?>
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Avatar'); ?></label>
                                <input type="file" name="file" value="<?php echo e(old('profile')); ?>" class="form-control"
                                    id="validationTooltip01" placeholder="Name" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Name'); ?></label>
                                        <input type="text" name="name" value="<?php echo e(old('name')); ?>"
                                            class="form-control" id="validationTooltip01" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Email'); ?></label>
                                        <input type="email" name="email" value="<?php echo e(old('email')); ?>"
                                            class="form-control" id="validationTooltip01" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Height'); ?></label>
                                        <input type="text" name="height" value="<?php echo e(old('height')); ?>"
                                            class="form-control" id="validationTooltip01" placeholder="Height" required>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Starting Weight'); ?></label>
                                        <input type="text" name="starting_weight" value="<?php echo e(old('starting_weight')); ?>"
                                            class="form-control" id="validationTooltip01" placeholder="Starting Weight"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Handedness'); ?></label>
                                        <select name="hand_type" id="hand_type" value="<?php echo e(old('hand_type')); ?>"
                                            class="form-select" required>
                                            <option value=""><?php echo app('translator')->get('Select'); ?></option>
                                            <option value="Left"><?php echo app('translator')->get('Left'); ?></option>
                                            <option value="Right"><?php echo app('translator')->get('Right'); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Age'); ?></label>
                                        <input type="number" name="age" value="<?php echo e(old('age')); ?>"
                                            class="form-control" id="validationTooltip01" placeholder="Starting Weight"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('School'); ?></label>
                                        <input type="text" name="school" value="<?php echo e(old('school')); ?>"
                                            class="form-control" id="validationTooltip01" placeholder="School" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('level'); ?></label>
                                        <input type="text" name="level" value="<?php echo e(old('level')); ?>"
                                            class="form-control" id="validationTooltip01" placeholder="Level" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Password'); ?></label>
                                        <input type="Password" name="password" class="form-control"
                                            id="validationTooltip01" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Confirm Password'); ?></label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="validationTooltip01" placeholder="Password" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <?php if(auth()->user()->role == 'superadmin'): ?>
                                    <div class="col-md-6">
                                        <label for="formrow-inputState" class="form-label"><?php echo app('translator')->get('Role'); ?></label>
                                        <select id="formrow-inputState" name="role" value="<?php echo e(old('role')); ?>"
                                            class="form-select">
                                            <option selected><?php echo app('translator')->get('Select Status'); ?></option>
                                            <option value="admin"><?php echo app('translator')->get('Admin'); ?></option>
                                            <option value="user"><?php echo app('translator')->get('User'); ?></option>
                                        </select>
                                    </div>
                                <?php else: ?>
                                    <div class="col-md-6">
                                        <label for="formrow-inputState" class="form-label"><?php echo app('translator')->get('Role'); ?></label>
                                        <select id="formrow-inputState" name="role" value="<?php echo e(old('role')); ?>"
                                            class="form-select">
                                            <option value="user" selected><?php echo app('translator')->get('User'); ?></option>
                                        </select>
                                    </div>
                                <?php endif; ?>
                                <div class="col-md-6">
                                    <label for="formrow-inputState" class="form-label"><?php echo app('translator')->get('User Status'); ?></label>
                                    <select id="formrow-inputState" name="user_status"
                                        value="<?php echo e(old('user_status')); ?>" class="form-select">
                                        <option selected><?php echo app('translator')->get('Select Status'); ?></option>
                                        <option value="0"><?php echo app('translator')->get('Banned'); ?></option>
                                        <option value="1"><?php echo app('translator')->get('Active'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                    </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        
        
    <?php $__env->stopSection(); ?>
    <?php $__env->startSection('script'); ?>
        <script src="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.js')); ?>"></script>
        
        <!-- Datatable init js -->
        <script src="<?php echo e(URL::asset('/assets/js/pages/datatables.init.js')); ?>"></script>
        
        
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views/supperadmin/contacts-list.blade.php ENDPATH**/ ?>