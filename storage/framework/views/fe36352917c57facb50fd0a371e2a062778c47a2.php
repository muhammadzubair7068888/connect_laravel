

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Exercises'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('/assets/libs/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
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
                        <a href="<?php echo e(route('add.exercises')); ?>"><button type="button"
                                class="btn btn-success"><?php echo app('translator')->get('New Exercise'); ?></button></a>
                        <a><button type="button" class="btn btn-info" onclick="impot_cvs()"><?php echo app('translator')->get('Import CSV'); ?></button></a>

                    </div>
                    <br>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                
                                <th><?php echo app('translator')->get('Name'); ?></th>
                                <th><?php echo app('translator')->get('Type'); ?></th>
                                <th><?php echo app('translator')->get('Description'); ?></th>
                                <th class="col-2"><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $j = 0;
                            ?>
                            <?php $__empty_1 = true; $__currentLoopData = $exercises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php
                                    $j++;
                                ?>
                                <tr>
                                    
                                    <td><?php echo e($exercise->name); ?></td>
                                    <?php if($exercise->copy_id): ?>
                                        <td></td>
                                    <?php else: ?>
                                        <td><?php echo e($exercise->exercise_type->name); ?></td>
                                    <?php endif; ?>
                                    <td><?php echo e($exercise->description); ?></td>
                                    <td>
                                        <a href='<?php echo e(route('view.exercise.detail', ['id' => $exercise->id])); ?>'
                                            class="link-primary"> <i class="fa fa-eye"></i></a>
                                        <a href="<?php echo e(route('edit.exercise', ['id' => $exercise->id])); ?>"
                                            style="padding-left:10px;" class="link-success"> <i class="fas fa-edit"></i></a>
                                        <a style="padding-left:10px;" class="link-danger" href='#'><i
                                                class="fas fa-trash-alt"
                                                onclick="delete_exercise(<?php echo e($exercise); ?>)"></i></a>
                                        <a style="padding-left:10px;" class="link-warning"
                                            href='<?php echo e(route('copy.exercise', ['id' => $exercise->id])); ?>'><i
                                                class="far fa-clone"></i></a>
                                        <a style="padding-left:10px;" class="link-info"><i class="fas fa-share"
                                                onclick="shair_exercise(<?php echo e($exercise); ?>)"></i></a>
                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                            <div id="copyexercise"></div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><?php echo app('translator')->get('Delete Exercise'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-danger"><?php echo app('translator')->get('Are you sure you want to delete this Exercise?'); ?></h4>
                </div>
                <form action="<?php echo e(route('delete.exercise')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="delete_id" name="exercise_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo app('translator')->get('Cancel'); ?></button>
                        <button type="submit" class="btn btn-danger"><?php echo app('translator')->get('Delete'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="import_cvs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><?php echo app('translator')->get('Impost CVS File'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('import.exercise')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input type="file" name="file" class="form-control">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo app('translator')->get('Cancel'); ?></button>
                    <button type="submit" class="btn btn-success"><?php echo app('translator')->get('Import'); ?></button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="sahir_exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->get('Shair Physical Assessment'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="shair_form" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <input type="hidden" id="shair_id" name="exercise_id">
                                    <label class="form-label"><?php echo app('translator')->get('Select Admin'); ?></label>
                                    <select class="form-control select2" name="user">
                                        <option>Select</option>
                                        <optgroup label="Admin">
                                            <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <?php endif; ?>
                                        </optgroup>
                                    </select>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('/assets/libs/select2/select2.min.js')); ?>"></script>
    <!-- Required datatable js -->
    <script src="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/pages/datatables.init.js')); ?>"></script>

    <script>
        function delete_exercise(exercise) {
            $('#delete_id').val(exercise.id);
            $('#staticBackdrop').modal('show');
        }

        function copy_exercise(id) {

            $.ajax({
                url: "<?php echo e(url('exercises/copy')); ?>" + "/" + id,
                type: "GET",
                data: {},
                dataType: "json",
                success: function(data) {
                    var html = '';
                    var copy = ''
                    $.each(data, function(key, value) {
                        if (value.copy_id == null) {
                            copy = value.exercises_type_id.name;
                        } else {
                            copy = '';
                        }
                        html += '<tr>';
                        html += '<td>';
                        html += value.name;
                        html += '</td>';
                        html += '<td>';
                        html += copy;
                        html += '</td>';
                        html += '<td>';
                        html += value.description;
                        html += '</td>';
                        html += '<td>';
                        html += '<a href=';
                        html += 'class="link-primary">';
                        html += '<i class="fa fa-eye">';
                        html += '</i>';
                        html += '</a>';
                        html += '<a href=';
                        html += 'class="link-success">';
                        html += '<i class="fas fa-edit">';
                        html += '</i>';
                        html += '</a>';
                        html += '<a href=';
                        html += 'class="link-danger">';
                        html += '<i class="fas fa-trash-alt">';
                        html += '</i>';
                        html += '</a>';
                        html += '<a href=';
                        html += 'class="link-warning">';
                        html += '<i class=""far fa-clone">';
                        html += '</i>';
                        html += '</a>';
                        html += '<a href=';
                        html += 'class="link-info">';
                        html += '<i class=""fas fa-share">';
                        html += '</i>';
                        html += '</a>';
                        html += '</td>';
                        html += '</tr>';
                    });
                    $('tbody').html(html);
                    swal("Saved", "Status SuccessFully Change", "success");
                },
                error: function(response) {
                    alert("Failed");
                }
            });
        }

        function shair_exercise(exercise) {
            $('#shair_id').val(exercise.id);
            $('#sahir_exampleModal').modal('show');
        }

        function impot_cvs() {
            $('#import_cvs').modal('show');
        }
        $('#shair_form').on('submit', function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();

            $.ajax({
                url: "<?php echo e(route('shair.exercise')); ?>",
                method: "POST",
                data: form_data,
                dataType: "json",
                success: function(response) {
                    $("#sahir_exampleModal").modal('hide');
                    swal("Saved", "Status SuccessFully Change", "success");
                },
                error: function(response) {
                    $("#sahir_exampleModal").modal('hide');
                    swal("Not Saved", "Status SuccessFully Change", "error");
                }
            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views/supperadmin/exercises.blade.php ENDPATH**/ ?>