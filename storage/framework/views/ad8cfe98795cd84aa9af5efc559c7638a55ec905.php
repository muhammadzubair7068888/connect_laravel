

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
                    <div class="mb-3">
                        
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#exampleModal"><?php echo app('translator')->get('Invite User'); ?></button>
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
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo e(route('add.user')); ?>" class="needs-validation"
                        enctype='multipart/form-data' novalidate>
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3 position-relative">
                                    <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Name'); ?></label>
                                    <input type="text" name="name" class="form-control" id="validationTooltip01"
                                        placeholder="Name" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 position-relative">
                                    <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Email'); ?></label>
                                    <input type="email" name="email" class="form-control" id="validationTooltip01"
                                        placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label"><?php echo app('translator')->get('Role'); ?></label>
                                    <select id="formrow-inputState" class="form-select">
                                        <option selected><?php echo app('translator')->get('Select Role'); ?></option>
                                        <option value="0"><?php echo app('translator')->get('User'); ?></option>
                                        <option value="1"><?php echo app('translator')->get('Admin'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label"><?php echo app('translator')->get('Status'); ?></label>
                                    <select id="formrow-inputState" class="form-select">
                                        <option selected><?php echo app('translator')->get('Select Status'); ?></option>
                                        <option><?php echo app('translator')->get('Banned'); ?></option>
                                        <option><?php echo app('translator')->get('Active'); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <h3 class="text-success"><?php echo app('translator')->get('Permissions'); ?></h3>
                        </div>
                        <hr>

                        <div class="form-check form-check-success mb-3">
                            <input class="large" type="checkbox" id="formCheckcolor2" checked>
                            <label class="" for="formCheckcolor2">
                                Checkbox Success
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success"><?php echo app('translator')->get('Invite'); ?></button>
                </div>
            </div>
        </div>
    </div>
    </div> <!-- end preview-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/pdfmake/pdfmake.min.js')); ?>"></script>
    <!-- Datatable init js -->
    <script src="<?php echo e(URL::asset('/assets/js/pages/datatables.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/pages/form-validation.init.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $("input").change(function() {
                alert("The text has been changed.");
                $("p").hide();
            });
        });

        $("#role").click(function() {

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views/supperadmin/contacts-list.blade.php ENDPATH**/ ?>