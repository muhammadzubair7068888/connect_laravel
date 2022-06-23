

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Mechanical Assessment'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('Mechanical Assessment'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('Mechanical Assessment'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-3">
                        <div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-bs-whatever="@mdo"><?php echo app('translator')->get('Add Label'); ?></button>
                        </div>
                    </div>
                    <br>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Label</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Systems Administrator</td>
                                <td style="text-align:center;">
                                    <a style="padding-left:10px;" class="link-danger" href='#'><i
                                            class="fas fa-trash-alt"></i></a>
                                    <a style="padding-left:10px;" class="link-info" href='#'><i
                                            class="fas fa-share"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Software Engineer</td>
                                <td style="text-align:center;">
                                    <a style="padding-left:10px;" class="link-danger" href='#'><i
                                            class="fas fa-trash-alt"></i></a>
                                    <a style="padding-left:10px;" class="link-info" href='#'><i
                                            class="fas fa-share"></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Personnel Lead</td>
                                <td style="text-align:center;">
                                    <a style="padding-left:10px;" class="link-danger" href='#'><i
                                            class="fas fa-trash-alt"></i></a>
                                    <a style="padding-left:10px;" class="link-info" href='#'><i
                                            class="fas fa-share"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('Mechanical Assessment'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <label for="recipient-name" class="col-form-label"><?php echo app('translator')->get('Label'); ?></label>
                                <input type="text" class="form-control" id="recipient-name" placeholder="Value">
                            </div>
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
    <script src="<?php echo e(URL::asset('/assets/libs/jquery-repeater/jquery-repeater.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/pages/form-repeater.int.js')); ?>"></script>
    <!-- Required datatable js -->
    <script src="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/pdfmake/pdfmake.min.js')); ?>"></script>
    <!-- Datatable init js -->
    <script src="<?php echo e(URL::asset('/assets/js/pages/datatables.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views\supperadmin\mechanical_asseessment.blade.php ENDPATH**/ ?>