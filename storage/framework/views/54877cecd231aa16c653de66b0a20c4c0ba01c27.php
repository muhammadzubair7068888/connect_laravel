

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
                    <div class="d-flex flex-wrap gap-3">
                        <div>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                data-bs-whatever="@mdo"><?php echo app('translator')->get('New Label'); ?></button>
                        </div>
                    </div>
                    <br>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th class="col-1"><?php echo app('translator')->get('#'); ?></th>
                                <th><?php echo app('translator')->get('Label'); ?></th>
                                
                                <th class="col-1"><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $j = 0;
                            ?>
                            <?php $__empty_1 = true; $__currentLoopData = $mechaniacl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mach): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    $j++;
                                ?>
                                <tr>
                                    <td><?php echo e($j); ?></td>
                                    <td><?php echo e($mach->name); ?></td>
                                    <td style="text-align:center;">
                                        <a style="padding-left:10px;" class="link-danger" href='#'><i
                                                class="fas fa-trash-alt"
                                                onclick="delete_mh_assessment(<?php echo e($mach); ?>)"></i></a>
                                        <a style="padding-left:10px;" class="link-info" href='#'><i
                                                class="fas fa-share"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td><?php echo e($j); ?></td>
                                    <td>Systems Administrator</td>
                                    <td style="text-align:center;">
                                        <a style="padding-left:10px;" class="link-danger" href='#'><i
                                                class="fas fa-trash-alt"></i></a>
                                        <a style="padding-left:10px;" class="link-info" href='#'><i
                                                class="fas fa-share"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo e($j); ?></td>
                                    <td>Software Engineer</td>
                                    <td style="text-align:center;">
                                        <a style="padding-left:10px;" class="link-danger" href='#'><i
                                                class="fas fa-trash-alt"></i></a>
                                        <a style="padding-left:10px;" class="link-info" href='#'><i
                                                class="fas fa-share"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo e($j); ?></td>
                                    <td>Personnel Lead</td>
                                    <td style="text-align:center;">
                                        <a style="padding-left:10px;" class="link-danger" href='#'><i
                                                class="fas fa-trash-alt"></i></a>
                                        <a style="padding-left:10px;" class="link-info" href='#'><i
                                                class="fas fa-share"></i></a>
                                    </td>
                                </tr>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('Mechanical Assessment'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('add.mechanical')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="recipient-name" class="form-label"><?php echo app('translator')->get('Label'); ?></label>
                                    <input type="text" name="label" class="form-control" id="recipient-name"
                                        placeholder="Value">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label"><?php echo app('translator')->get('status'); ?></label>
                                    <select id="formrow-inputState" name="status" class="form-select">
                                        <option selected value="0"><?php echo app('translator')->get('Select status'); ?></option>
                                        <option value="1"><?php echo app('translator')->get('Acceptable'); ?></option>
                                        <option value="2"><?php echo app('translator')->get('Caution'); ?></option>
                                        <option value="3"><?php echo app('translator')->get('Opportunity'); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div> <!-- end preview-->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><?php echo app('translator')->get('Delete Mechanical Assessment'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-danger"><?php echo app('translator')->get('Are you sure you want to delete this assessment?'); ?></h4>
                </div>
                <form action="<?php echo e(route('delete.mechanical')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="delete_id" name="mechanical_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo app('translator')->get('Cancel'); ?></button>
                        <button type="submit" class="btn btn-danger"><?php echo app('translator')->get('Delete'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

    <script>
        function delete_mh_assessment(mach) {
            $('#delete_id').val(mach.id);
            $('#staticBackdrop').modal('show');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views/supperadmin/mechanical_assessment.blade.php ENDPATH**/ ?>