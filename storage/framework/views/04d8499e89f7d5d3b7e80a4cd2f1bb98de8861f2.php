

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('LeaderBoard'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('LeaderBoard'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('LeaderBoard'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('Name'); ?></th>
                                <th><?php echo app('translator')->get('Weight'); ?></th>
                                <th><?php echo app('translator')->get('Arm Pain'); ?></th>
                                <th><?php echo app('translator')->get('Pull Downs'); ?></th>
                                <th><?php echo app('translator')->get('Pull Downs 3'); ?></th>
                                <th><?php echo app('translator')->get('Pull Downs 4'); ?></th>
                                <th><?php echo app('translator')->get('Pull Downs 5'); ?></th>
                                <th><?php echo app('translator')->get('Pull Downs 6'); ?></th>
                                <th><?php echo app('translator')->get('Pull Downs 7'); ?></th>
                                <th><?php echo app('translator')->get('Mound Throws'); ?></th>
                                <th><?php echo app('translator')->get('Long Toss'); ?></th>
                                <th><?php echo app('translator')->get('plyo 7'); ?></th>
                                <th><?php echo app('translator')->get('plyo 5'); ?></th>
                                <th><?php echo app('translator')->get('plyo 3'); ?></th>
                                <th><?php echo app('translator')->get('Mound Shuffle'); ?></th>
                                <th><?php echo app('translator')->get('Squat'); ?></th>
                                <th><?php echo app('translator')->get('Pull Ups'); ?></th>
                                <th><?php echo app('translator')->get('Vertical Jump'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo app('translator')->get('Name'); ?></td>
                                <td><?php echo app('translator')->get('Weight'); ?></td>
                                <td><?php echo app('translator')->get('Arm Pain'); ?></td>
                                <td><?php echo app('translator')->get('Pull Downs'); ?></td>
                                <td><?php echo app('translator')->get('Pull Downs 3'); ?></td>
                                <td><?php echo app('translator')->get('Pull Downs 4'); ?></td>
                                <td><?php echo app('translator')->get('Pull Downs 5'); ?></td>
                                <td><?php echo app('translator')->get('Pull Downs 6'); ?></td>
                                <td><?php echo app('translator')->get('Pull Downs 7'); ?></td>
                                <td><?php echo app('translator')->get('Mound tdrows'); ?></td>
                                <td><?php echo app('translator')->get('Long Toss'); ?></td>
                                <td><?php echo app('translator')->get('plyo 7'); ?></td>
                                <td><?php echo app('translator')->get('plyo 5'); ?></td>
                                <td><?php echo app('translator')->get('plyo 3'); ?></td>
                                <td><?php echo app('translator')->get('Mound Shuffle'); ?></td>
                                <td><?php echo app('translator')->get('Squat'); ?></td>
                                <td><?php echo app('translator')->get('Pull Ups'); ?></td>
                                <td><?php echo app('translator')->get('Vertical Jump'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- Required datatable js -->
    <script src="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/pdfmake/pdfmake.min.js')); ?>"></script>
    <!-- Datatable init js -->
    <script src="<?php echo e(URL::asset('/assets/js/pages/datatables.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views/supperadmin/leaderboard.blade.php ENDPATH**/ ?>