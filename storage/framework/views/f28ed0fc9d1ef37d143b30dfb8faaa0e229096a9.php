

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Exercises'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('Exercises'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('Exercises'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(route('save.exercises')); ?>" method="post" class="needs-validation" novalidate>
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Name'); ?></label>
                            <input type="text" name="name" class="form-control" id="validationTooltip01"
                                placeholder="Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="recipient-name" class="form-label"><?php echo app('translator')->get('Type'); ?></label>
                            <select name="ex_type" id="type" class="form-control" required>
                                <option value=""><?php echo app('translator')->get('Selec Type'); ?></option>
                                <?php $__empty_1 = true; $__currentLoopData = $exercises_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <option value="saab"><?php echo app('translator')->get('Lifting'); ?></option>
                                    <option value="mercedes"><?php echo app('translator')->get('Mobility'); ?></option>
                                    <option value="audi"><?php echo app('translator')->get('Throwing'); ?></option>
                                <?php endif; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label"><?php echo app('translator')->get('Description'); ?></label>
                    <textarea class="form-control" name="description" id="message-text" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Details:'); ?></label>
                    <button id="addRow" type="button" class="btn btn-info">+</button>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Title'); ?></label>
                            <input type="text" name="title[]" class="form-control" id="" placeholder="Title"
                                required>

                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Link'); ?></label>
                            <input type="text" name="link[]" class="form-control" id="validationTooltip01"
                                placeholder="Link" required>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Sets'); ?></label>
                            <input type="text" name="sets[]" class="form-control" id="validationTooltip01"
                                placeholder="Sets" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Reps'); ?></label>
                            <input type="text" name="reps[]" class="form-control" id="validationTooltip01"
                                placeholder="Reps" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label"><?php echo app('translator')->get('Notes'); ?></label>
                        <textarea class="form-control" name="notes[]" id="message-text" required></textarea>
                    </div>
                    <div id="newRow"></div>
                    <div class="mb-3">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/pages/form-validation.init.js')); ?>"></script>

    <script>
        // add row
        $("#addRow").click(function() {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="row">';
            html += '<div class="col-md-6">';
            html += '<div class="mb-3 position-relative">';
            html += '<label for="validationTooltip01" class="form-label">Title</label>';
            html +=
                '<input type="text" name="title[]" class="form-control" id="validationTooltip01" placeholder="Title" required > ';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-md-6">';
            html += '<div class="mb-3 position-relative">';
            html += '<label for="validationTooltip01" class="form-label">Link</label>';
            html +=
                '<input type="text" name="link[]" class="form-control" id="validationTooltip01" placeholder="Link" required > ';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '<div class="row">';
            html += '<div class="col-md-6">';
            html += '<div class="mb-3 position-relative">';
            html += '<label for="validationTooltip01" class="form-label">Sets</label>';
            html +=
                '<input type="text" name="sets[]" class="form-control" id="validationTooltip01" placeholder="Sets" required > ';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-md-6">';
            html += '<div class="mb-3 position-relative">';
            html += '<label for="validationTooltip01" class="form-label">Reps</label>';
            html +=
                '<input type="text" name="reps[]" class="form-control" id="validationTooltip01" placeholder="Reps" required > ';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '<div class="mb-3">';
            html += '<label for="message-text" class="col-form-label"><?php echo app('translator')->get('Notes'); ?></label>';
            html += '<textarea class="form-control" name="notes[]" id="message-text"></textarea>';
            html += '</div>';

            html += '<div class="mb-3">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">-</button>';
            html += '</div>';
            html += '</div>';
            $('#newRow').append(html);
        });
        $(document).on('click', '#removeRow', function() {
            $(this).closest('#inputFormRow').remove();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views/supperadmin/exercises-form.blade.php ENDPATH**/ ?>