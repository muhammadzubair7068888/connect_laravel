

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Site Settings'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('Site Settings'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('Site Settings'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form id="dashboard-graph-setting-form">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <?php $__empty_1 = true; $__currentLoopData = $velocities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $velocity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="<?php echo e($velocity->label); ?>"
                                                required="" placeholder="<?php echo e($velocity->key); ?>"
                                                value="<?php echo e($velocity->name); ?>">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="radio" class="" name="<?php echo e($velocity->key); ?>"
                                                value="1" <?php echo e($velocity->status == 1 ? 'checked' : ''); ?>>
                                            Yes
                                            <input type="radio" class="ml-3" name="<?php echo e($velocity->key); ?>"
                                                value="0" <?php echo e($velocity->status == 0 ? 'checked' : ''); ?>> No
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>



                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="mt-1">Leaderboard</p>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="radio" class="" name="leaderboard" value="1"
                                            checked=""> Yes
                                        <input type="radio" class="ml-3" name="leaderboard" value="0">
                                        No
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3" style="margin-left: 80%;">
                            <button type="submit" class="btn btn-success">Save Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $('#dashboard-graph-setting-form').on('submit', function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "<?php echo e(route('graph.setting')); ?>",
                method: "POST",
                data: form_data,
                dataType: "json",
                success: function(response) {
                    $("#sahir_exampleModal").modal('hide');
                    swal("Saved", "Velocity Graph Setting Successfully", "success");
                },
                error: function(response) {
                    $("#sahir_exampleModal").modal('hide');
                    swal("Not Saved", "Somethings is wrong", "error");
                }
            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views/supperadmin/settings/site_setting.blade.php ENDPATH**/ ?>