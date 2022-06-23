

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Exercises'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Exercises
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Exercises
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-3">
                        <a href="supperadmin.exercises-form"><button type="button" class="btn btn-success">Add
                                Exercise</button></a>
                    </div>
                    <br>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th class="col-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Gloria Little</td>
                                <td>Systems Administrator</td>
                                <td>New York</td>
                                <td>
                                    <a href='#' class="link-primary"> <i class="fa fa-eye"></i></a>
                                    <a style="padding-left:10px;" class="link-success" href='#'> <i
                                            class="fas fa-edit"></i></a>
                                    <a style="padding-left:10px;" class="link-danger" href='#'><i
                                            class="fas fa-trash-alt"></i></a>
                                    <a style="padding-left:10px;" class="link-warning" href='#'><i
                                            class="far fa-clone"></i></a>
                                    <a style="padding-left:10px;" class="link-info" href='#'><i
                                            class="fas fa-share"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>Bradley Greer</td>
                                <td>Software Engineer</td>
                                <td>London</td>
                                <td>
                                    <a href='#' class="link-primary"> <i class="fa fa-eye"></i></a>
                                    <a style="padding-left:10px;" class="link-success" href='#'> <i
                                            class="fas fa-edit"></i></a>
                                    <a style="padding-left:10px;" class="link-danger" href='#'><i
                                            class="fas fa-trash-alt"></i></a>
                                    <a style="padding-left:10px;" class="link-warning" href='#'><i
                                            class="far fa-clone"></i></a>


                                    <a style="padding-left:10px;" class="link-info" href='#'><i
                                            class="fas fa-share"></i></a>
                                </td>

                            </tr>
                            <tr>
                                <td>Dai Rios</td>
                                <td>Personnel Lead</td>
                                <td>Edinburgh</td>
                                <td>
                                    <a href='#' class="link-primary"> <i class="fa fa-eye"></i></a>
                                    <a style="padding-left:10px;" class="link-success" href='#'> <i
                                            class="fas fa-edit"></i></a>
                                    <a style="padding-left:10px;" class="link-danger" href='#'><i
                                            class="fas fa-trash-alt"></i></a>
                                    <a style="padding-left:10px;" class="link-warning" href='#'><i
                                            class="far fa-clone"></i></a>
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

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views\supperadmin\exercises.blade.php ENDPATH**/ ?>