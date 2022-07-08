<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('LeaderBoard'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="<?php echo e(URL::asset('/assets/libs/datepicker/datepicker.min.css')); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
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
                    <form id="dashboard-graph-setting-form" action="<?php echo e(route('filter.leaderboard')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Date Range</label>
                                <div class="input-daterange input-group" id="datepicker6" data-date-format="dd M, yyyy"
                                    data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker6'>
                                    <input type="text" class="form-control" name="start" placeholder="Start Date"
                                        autocomplete="off" />
                                    <input type="text" class="form-control" name="end" placeholder="End Date"
                                        autocomplete="off" />
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mb-3" style="margin-top: 27px;">
                                    <button type="submit" class="btn btn-success"><?php echo app('translator')->get('Search'); ?></button>
                                    <button type="button" class="btn btn-light" id="btnClear"><?php echo app('translator')->get('Clear'); ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('Name'); ?></th>
                                <?php $__currentLoopData = $velocity_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $velocity_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <th><?php echo e($velocity_name->name); ?></th>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $j = -1;
                            ?>
                            <?php $__empty_1 = true; $__currentLoopData = $velocities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $velocity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    $j++;
                                ?>
                                <tr>
                                    <td><?php echo e(ucfirst($velocity->name)); ?></td>
                                    <?php if(isset($velocity->uservelocity[0]->id)): ?>
                                        <?php if(isset($velocity->uservelocity[$j]->id)): ?>
                                            <td><?php echo e($velocity->uservelocity->where('velocity_key', 'weight')->max('value') ?? 0); ?>

                                            </td>
                                            <td><?php echo e($velocity->uservelocity->where('velocity_key', 'arm_pain')->max('value') ?? 0); ?>

                                            </td>
                                            <td><?php echo e($velocity->uservelocity->where('velocity_key', 'pull_down_velocity')->max('value') ?? 0); ?>

                                            </td>
                                            <td><?php echo e($velocity->uservelocity->where('velocity_key', 'pull_down_3')->max('value') ?? 0); ?>

                                            </td>
                                            <td><?php echo e($velocity->uservelocity->where('velocity_key', 'pull_down_4')->max('value') ?? 0); ?>

                                            </td>
                                            <td><?php echo e($velocity->uservelocity->where('velocity_key', 'pull_down_5')->max('value') ?? 0); ?>

                                            </td>
                                            <td><?php echo e($velocity->uservelocity->where('velocity_key', 'pull_down_6')->max('value') ?? 0); ?>

                                            </td>
                                            <td><?php echo e($velocity->uservelocity->where('velocity_key', 'pull_down_7')->max('value') ?? 0); ?>

                                            </td>
                                            <td><?php echo e($velocity->uservelocity->where('velocity_key', 'mound_throws_velocity')->max('value') ?? 0); ?>

                                            </td>
                                            <td><?php echo e($velocity->uservelocity->where('velocity_key', 'long_toss_distance')->max('value') ?? 0); ?>

                                            </td>
                                            <td><?php echo e($velocity->uservelocity->where('velocity_key', 'pylo_7')->max('value') ?? 0); ?>

                                            </td>
                                            <td><?php echo e($velocity->uservelocity->where('velocity_key', 'pylo_5')->max('value') ?? 0); ?>

                                            </td>
                                            <td><?php echo e($velocity->uservelocity->where('velocity_key', 'pylo_3')->max('value') ?? 0); ?>

                                            </td>
                                            <td><?php echo e($velocity->uservelocity->where('velocity_key', 'bench')->max('value') ?? 0); ?>

                                            </td>
                                            <td><?php echo e($velocity->uservelocity->where('velocity_key', 'squat')->max('value') ?? 0); ?>

                                            </td>
                                            <td><?php echo e($velocity->uservelocity->where('velocity_key', 'deadlift')->max('value') ?? 0); ?>

                                            </td>
                                            <td><?php echo e($velocity->uservelocity->where('velocity_key', 'vertical_jump')->value('value') ?? 0); ?>

                                            </td>
                                        <?php else: ?>
                                            <td><?php echo app('translator')->get('0'); ?></td>
                                            <td><?php echo app('translator')->get('0'); ?></td>
                                            <td><?php echo app('translator')->get('0'); ?></td>
                                            <td><?php echo app('translator')->get('0'); ?></td>
                                            <td><?php echo app('translator')->get('0'); ?></td>
                                            <td><?php echo app('translator')->get('0'); ?></td>
                                            <td><?php echo app('translator')->get('0'); ?></td>
                                            <td><?php echo app('translator')->get('0'); ?></td>
                                            <td><?php echo app('translator')->get('0'); ?></td>
                                            <td><?php echo app('translator')->get('0'); ?></td>
                                            <td><?php echo app('translator')->get('0'); ?></td>
                                            <td><?php echo app('translator')->get('0'); ?></td>
                                            <td><?php echo app('translator')->get('0'); ?></td>
                                            <td><?php echo app('translator')->get('0'); ?></td>
                                            <td><?php echo app('translator')->get('0'); ?></td>
                                            <td><?php echo app('translator')->get('0'); ?></td>
                                            <td><?php echo app('translator')->get('0'); ?></td>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <td><?php echo app('translator')->get('0'); ?></td>
                                        <td><?php echo app('translator')->get('0'); ?></td>
                                        <td><?php echo app('translator')->get('0'); ?></td>
                                        <td><?php echo app('translator')->get('0'); ?></td>
                                        <td><?php echo app('translator')->get('0'); ?></td>
                                        <td><?php echo app('translator')->get('0'); ?></td>
                                        <td><?php echo app('translator')->get('0'); ?></td>
                                        <td><?php echo app('translator')->get('0'); ?></td>
                                        <td><?php echo app('translator')->get('0'); ?></td>
                                        <td><?php echo app('translator')->get('0'); ?></td>
                                        <td><?php echo app('translator')->get('0'); ?></td>
                                        <td><?php echo app('translator')->get('0'); ?></td>
                                        <td><?php echo app('translator')->get('0'); ?></td>
                                        <td><?php echo app('translator')->get('0'); ?></td>
                                        <td><?php echo app('translator')->get('0'); ?></td>
                                        <td><?php echo app('translator')->get('0'); ?></td>
                                        <td><?php echo app('translator')->get('0'); ?></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
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
                            <?php endif; ?>

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
    <script src="<?php echo e(URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/datepicker/datepicker.min.js')); ?>"></script>

    <script>
        $(document).ready(function() {
            $('#btnClear').click(function() {

                $('#dashboard-graph-setting-form input[type="text"]').val('');
                /*Clear textarea using id */
                $('#dashboard-graph-setting-form #user').val('');

            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/connect.pk/resources/views/supperadmin/leaderboard.blade.php ENDPATH**/ ?>