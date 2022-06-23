

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Track'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('Track'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('Track'); ?>
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
                                data-bs-whatever="@mdo"><?php echo app('translator')->get('New Track'); ?></button>
                        </div>
                    </div>
                    <br>
                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo app('translator')->get('Date'); ?></th>
                                <th><?php echo app('translator')->get('Weight'); ?></th>
                                <th><?php echo app('translator')->get('Arm Pain'); ?></th>
                                <th class="col-1"><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $j = 0;
                            ?>
                            <?php $__empty_1 = true; $__currentLoopData = $tracks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $track): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    $j++;
                                ?>
                                <tr>
                                    <td><?php echo e($j); ?></td>
                                    <td><?php echo e($track->date); ?></td>
                                    <td><?php echo e($track->weight); ?></td>
                                    <td><?php echo e($track->arm_pain); ?></td>
                                    <td>
                                        <a style="padding-left:10px;" class="link-danger" href='#'><i
                                                class="fas fa-trash-alt"
                                                onclick="delete_track(<?php echo e($track); ?>)"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td><?php echo e($j); ?></td>
                                    <td>Bradley Greer</td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td>
                                        <a style="padding-left:10px;" class="link-danger" href='#'><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><?php echo e($j); ?></td>
                                    <td>Dai Rios</td>
                                    <td>Personnel Lead</td>
                                    <td>Edinburgh</td>
                                    <td>
                                        <a style="padding-left:10px;" class="link-danger" href='#'><i
                                                class="fas fa-trash-alt"></i></a>
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('Track'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('save.tracks')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label"><?php echo app('translator')->get('Date'); ?></label>
                                <input type="date" name="date" class="form-control" id="recipient-name">
                            </div>
                            <div class="col-6">
                                <label for="recipient-name" class="col-form-label"><?php echo app('translator')->get('Weight'); ?></label>
                                <input type="number" name="weight" class="form-control" id="recipient-name"
                                    placeholder="Value">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label"><?php echo app('translator')->get('Arm Pain'); ?></label>
                            <select name="arm_pain" id="type" class="form-control">
                                <option value="1"><?php echo app('translator')->get('1'); ?></option>
                                <option value="2"><?php echo app('translator')->get('2'); ?></option>
                                <option value="3"><?php echo app('translator')->get('3'); ?></option>
                                <option value="4"><?php echo app('translator')->get('4'); ?></option>
                                <option value="5"><?php echo app('translator')->get('5'); ?></option>
                                <option value="6"><?php echo app('translator')->get('6'); ?></option>
                                <option value="7"><?php echo app('translator')->get('7'); ?></option>
                                <option value="8"><?php echo app('translator')->get('8'); ?></option>
                                <option value="9"><?php echo app('translator')->get('9'); ?></option>
                                <option value="10"><?php echo app('translator')->get('10'); ?></option>

                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo app('translator')->get('Cancel'); ?></button>
                    <button type="submit" class="btn btn-success"><?php echo app('translator')->get('Save'); ?></button>
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
                    <h5 class="modal-title" id="staticBackdropLabel"><?php echo app('translator')->get('Delete Track'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-danger"><?php echo app('translator')->get('Are you sure you want to delete this track?'); ?></h4>
                </div>
                <form action="<?php echo e(route('delete.track')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="delete_id" name="track_id">
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
        function delete_track(track) {
            $('#delete_id').val(track.id);
            $('#staticBackdrop').modal('show');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\laragon\www\connect_laravel\resources\views/supperadmin/track.blade.php ENDPATH**/ ?>