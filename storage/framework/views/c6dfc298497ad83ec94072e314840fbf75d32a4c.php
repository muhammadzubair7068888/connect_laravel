

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Languages'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('Languages'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('Languages'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            data-bs-whatever="@mdo">Add Language</button>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('Name'); ?></th>
                                <th><?php echo app('translator')->get('Code'); ?></th>
                                <th><?php echo app('translator')->get('Direction'); ?></th>
                                <th><?php echo app('translator')->get('Flag'); ?></th>
                                <th><?php echo app('translator')->get('Status'); ?></th>
                                <th><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>English</td>
                                <td>en</td>
                                <td>LTR</td>
                                <td> <img src="<?php echo e(URL::asset('/assets/images/flags/us.jpg')); ?>" alt="user-image"
                                        class="me-1" height="12"></td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                                <td> <a style="padding-left:10px;" class="link-success" href='#'> <i
                                            class="fas fa-edit"></i></a>
                                    <a style="padding-left:10px;" class="link-danger" href='#'><i
                                            class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Spanish</td>
                                <td>es</td>
                                <td>RTL</td>
                                <td> <img src="<?php echo e(URL::asset('/assets/images/flags/spain.jpg')); ?>" alt="user-image"
                                        class="me-1" height="12"></td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td> <a style="padding-left:10px;" class="link-success" href='#'> <i
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Language</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label"><?php echo app('translator')->get('Language Name'); ?></label>
                                <input type="Name" class="form-control" id="recipient-name" placeholder="Name">
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label"><?php echo app('translator')->get('Direction'); ?></label>
                                <select name="type" id="type" class="form-control">
                                    <option value=""><?php echo app('translator')->get('Selec Direction'); ?></option>
                                    <option value="0"><?php echo app('translator')->get('LTR'); ?></option>
                                    <option value="1"><?php echo app('translator')->get('RTL'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label"><?php echo app('translator')->get('Language Code'); ?></label>
                            <input type="text" class="form-control" id="recipient-name" placeholder="Code">
                        </div>
                        <div class="form-check form-switch form-switch-md mb-3" dir="ltr">
                            <label class="form-check-label" for="SwitchCheckSizemd">Active</label>
                            <input class="form-check-input" type="checkbox" id="SwitchCheckSizemd">

                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label"><?php echo app('translator')->get('Flage'); ?></label>
                            <input class="form-control" type="file" id="formFile" required>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>
    </div> <!-- end preview-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- Required datatable js -->
    <script src="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/pdfmake/pdfmake.min.js')); ?>"></script>
    <!-- Datatable init js -->
    <script src="<?php echo e(URL::asset('/assets/js/pages/datatables.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views\supperadmin\generalsettings\language.blade.php ENDPATH**/ ?>