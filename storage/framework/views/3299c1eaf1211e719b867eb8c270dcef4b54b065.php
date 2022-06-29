

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Profile'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>" rel="stylesheet"
        type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Contacts
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Profile
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php if($user->role == 'admin' || $user->role == 'superadmin'): ?>
        <div class="row">
            <div class="col-xl-4">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p>It will seem like simplified</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="<?php echo e(URL::asset('/assets/images/profile-img.png')); ?>" alt=""
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <img src="<?php echo e(isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/assets/images/users/avatar-1.jpg')); ?>"
                                        alt="" class="img-thumbnail rounded-circle">
                                    
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <div class="pt-4">
                                    <br>
                                    <br>
                                    <div class="mt-4">
                                        <button type="button" class="btn btn-success waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"><?php echo app('translator')->get('Edit Profile'); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>

            <div class="col-xl-8">
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
                        <h4 class="card-title mb-4">Personal Information</h4>
                        <div class="table-responsive">
                            <table class="table table-nowrap mb-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Name :</th>
                                        <td><?php echo e($user->name); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">E-mail :</th>
                                        <td><?php echo e($user->email); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Age :</th>
                                        <td><?php echo e($user->age); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Height :</th>
                                        <td><?php echo e($user->height); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Starting Weight :</th>
                                        <td><?php echo e($user->starting_weight); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Handedness :</th>
                                        <td><?php echo e($user->handedness); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">School :</th>
                                        <td><?php echo e($user->school); ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Level :</th>
                                        <td><?php echo e($user->level); ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if($user->role == 'user'): ?>
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
                <h2 class="card-title"><b><?php echo app('translator')->get('User Profile'); ?></b></h2>
                <div class="row">
                    <div class="col-md-12">
                        <div class="avatar">
                            <img alt="" src="<?php echo e(asset($user->avatar)); ?>"
                                class="users-avatar-shadow rounded-circle" height="150" width="150"
                                style="object-fit: cover; object-position: 0% 0%;">
                        </div>

                        <hr>
                        <div class="md-3" style="">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="userDetail"><strong><?php echo app('translator')->get('Name: '); ?> </strong> <?php echo e($user->name); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="userDetail"><strong><?php echo app('translator')->get('Email: '); ?></strong><?php echo e($user->email); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="userDetail"><strong><?php echo app('translator')->get('Height: '); ?></strong><?php echo e($user->height); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="userDetail"><strong><?php echo app('translator')->get('Starting Weight: '); ?></strong><?php echo e($user->starting_weight); ?>

                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="userDetail"><strong><?php echo app('translator')->get('Starting Weight: '); ?></strong><?php echo e($user->handedness); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="userDetail"><strong><?php echo app('translator')->get('Age: '); ?></strong><?php echo e($user->age); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="userDetail"><strong><?php echo app('translator')->get('School: '); ?></strong><?php echo e($user->school); ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="userDetail"><strong
                                            for="batch"><?php echo app('translator')->get('Level: '); ?></strong><?php echo e($user->level); ?>

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="bottom">
                            <div class="row">
                                <div class="col-md-2 p-md-0">
                                    <button type="button" class="btn btn-block btn-success btn-flat btn-edit-profile"
                                        data-id="353" style="width:100%; margin-top:5px;" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"><?php echo app('translator')->get('Edit Profile'); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h2 class="card-title"><b><?php echo app('translator')->get('Assessments'); ?></b></h2>
                <div class="row">
                    <div class="col-md-6">
                        <h6><?php echo app('translator')->get('Physical Assessment'); ?></h6>
                        <table class="table table-responsive table-bordered table-hover" data-type="physical">
                            <thead class="thead-dark">
                                <tr>
                                    <th><?php echo app('translator')->get('Assessment'); ?></th>
                                    <th><?php echo app('translator')->get('Acceptable'); ?></th>
                                    <th><?php echo app('translator')->get('Caution'); ?></th>
                                    <th><?php echo app('translator')->get('Opportunity'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $user->physical_assessment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $physical): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr data-id="1">
                                        <td><?php echo e($physical->name); ?></td>
                                        <td><input type="radio" class="form-radio" name="<?php echo e($physical->id); ?>"
                                                id="" <?php echo e($physical->status == 1 ? 'checked' : ''); ?>

                                                onclick="phy_status_change(<?php echo e($physical->id); ?>,<?php echo e(1); ?>)" />
                                        </td>
                                        <td><input type="radio" class="form-radio" name="<?php echo e($physical->id); ?>"
                                                id="" <?php echo e($physical->status == 2 ? 'checked' : ''); ?>

                                                onclick="phy_status_change(<?php echo e($physical->id); ?>,<?php echo e(2); ?>)" />
                                        </td>
                                        <td><input type="radio" class="form-radio" name="<?php echo e($physical->id); ?>"
                                                id="" <?php echo e($physical->status == 3 ? 'checked' : ''); ?>

                                                onclick="phy_status_change(<?php echo e($physical->id); ?>,<?php echo e(3); ?>)" />
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr data-id="1">
                                        <td>Gross Posture Anomalies</td>
                                        <td><input type="radio" name="phy_1" class="form-radio" value="0"></td>
                                        <td><input type="radio" name="phy_1" class="form-radio" value="1"></td>
                                        <td><input type="radio" name="phy_1" class="form-radio" value="2"></td>
                                    </tr>
                                    <tr data-id="2">
                                        <td>Shrugging</td>
                                        <td><input type="radio" name="phy_2" class="form-radio" value="0"></td>
                                        <td><input type="radio" name="phy_2" class="form-radio" value="1"></td>
                                        <td><input type="radio" name="phy_2" class="form-radio" value="2"></td>
                                    </tr>
                                    <tr data-id="3">
                                        <td>Asymmetrical Upward Rotation</td>
                                        <td><input type="radio" name="phy_3" class="form-radio" value="0"></td>
                                        <td><input type="radio" name="phy_3" class="form-radio" value="1"></td>
                                        <td><input type="radio" name="phy_3" class="form-radio" value="2"></td>
                                    </tr>
                                <?php endif; ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6><?php echo app('translator')->get('Mechanical Assessment'); ?></h6>
                        <table class="table table-responsive table-bordered table-hover" data-type="mechanical">
                            <thead class="thead-dark">
                                <tr>
                                    <th><?php echo app('translator')->get('Assessment'); ?></th>
                                    <th><?php echo app('translator')->get('Acceptable'); ?></th>
                                    <th><?php echo app('translator')->get('Caution'); ?></th>
                                    <th><?php echo app('translator')->get('Opportunity'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $user->mechanical_assessment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mechanical): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr data-id="1">
                                        <td><?php echo e($mechanical->name); ?></td>
                                        <td><input type="radio" class="form-radio" name="<?php echo e($mechanical->id); ?>"
                                                id="" <?php echo e($mechanical->status == 1 ? 'checked' : ''); ?>

                                                onclick="mach_status_change(<?php echo e($mechanical->id); ?>,<?php echo e(1); ?>)" />
                                        </td>
                                        <td><input type="radio" class="form-radio" name="<?php echo e($mechanical->id); ?>"
                                                id="" <?php echo e($mechanical->status == 2 ? 'checked' : ''); ?>

                                                onclick="mach_status_change(<?php echo e($mechanical->id); ?>,<?php echo e(2); ?>)" />
                                        </td>
                                        <td><input type="radio" class="form-radio" name="<?php echo e($mechanical->id); ?>"
                                                id="" <?php echo e($mechanical->status == 3 ? 'checked' : ''); ?>

                                                onclick="mach_status_change(<?php echo e($mechanical->id); ?>,<?php echo e(3); ?>)" />
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr data-id="1">
                                        <td>Back leg co-contraction</td>
                                        <td><input type="radio" name="mech_1" class="form-radio" value="0"></td>
                                        <td><input type="radio" name="mech_1" class="form-radio" value="1"></td>
                                        <td><input type="radio" name="mech_1" class="form-radio" value="2"></td>
                                    </tr>
                                    <tr data-id="2">
                                        <td>Does Not Counter Rotate</td>
                                        <td><input type="radio" name="mech_2" class="form-radio" value="0"></td>
                                        <td><input type="radio" name="mech_2" class="form-radio" value="1"></td>
                                        <td><input type="radio" name="mech_2" class="form-radio" value="2"></td>
                                    </tr>
                                    <tr data-id="3">
                                        <td>Shifts to Ball of Foot on Time</td>
                                        <td><input type="radio" name="mech_3" class="form-radio" value="0"></td>
                                        <td><input type="radio" name="mech_3" class="form-radio" value="1"></td>
                                        <td><input type="radio" name="mech_3" class="form-radio" value="2"></td>
                                    </tr>
                                <?php endif; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"><?php echo app('translator')->get('Add New User'); ?></h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo e(route('update.profile', ['id' => $user->id])); ?>"
                            class="needs-validation" enctype='multipart/form-data' novalidate>
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <div class="text-start mt-2">
                                    <img src="<?php echo e(asset(Auth::user()->avatar)); ?>" alt=""
                                        class="rounded-circle avatar-lg">
                                </div>
                                <div class="text-danger" role="alert" id="avatarError" data-ajax-feedback="avatar">
                                </div>
                            </div>
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Profile Image'); ?></label>
                                <input type="file" name="file" class="form-control" id="validationTooltip01"
                                    placeholder="Name" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Name'); ?></label>
                                        <input type="text" name="name" value="<?php echo e($user->name); ?>"
                                            class="form-control" id="validationTooltip01" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Email'); ?></label>
                                        <input type="email" name="email" value="<?php echo e($user->email); ?>"
                                            class="form-control" id="validationTooltip01" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Height'); ?></label>
                                        <input type="text" name="height" value="<?php echo e($user->height); ?>"
                                            class="form-control" id="validationTooltip01" placeholder="Height" required>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Starting Weight'); ?></label>
                                        <input type="text" name="starting_weight"
                                            value="<?php echo e($user->starting_weight); ?>" class="form-control"
                                            id="validationTooltip01" placeholder="Starting Weight" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Handedness'); ?></label>
                                        <select name="hand_type" id="hand_type" value="<?php echo e($user->handedness); ?>"
                                            class="form-select" required>
                                            <?php if($user->handedness == 'left'): ?>
                                                <option value="Left" selected><?php echo app('translator')->get('Left'); ?></option>
                                                <option value="Right"><?php echo app('translator')->get('Right'); ?></option>
                                            <?php else: ?>
                                                <option value="Left"><?php echo app('translator')->get('Left'); ?></option>
                                                <option value="Right" selected><?php echo app('translator')->get('Right'); ?></option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Age'); ?></label>
                                        <input type="number" name="age" value="<?php echo e($user->age); ?>"
                                            class="form-control" id="validationTooltip01" placeholder="Age" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('School'); ?></label>
                                        <input type="text" name="school" value="<?php echo e($user->school); ?>"
                                            class="form-control" id="validationTooltip01" placeholder="School" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('level'); ?></label>
                                        <input type="text" name="level" value="<?php echo e($user->level); ?>"
                                            class="form-control" id="validationTooltip01" placeholder="Level" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Password'); ?></label>
                                        <input type="Password" name="password" class="form-control"
                                            id="validationTooltip01" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 position-relative">
                                        <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Confirm Password'); ?></label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            id="validationTooltip01" placeholder="Password" required>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- apexcharts -->
    <script src="<?php echo e(URL::asset('/assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>

    <!-- profile init -->
    <script src="<?php echo e(URL::asset('/assets/js/pages/profile.init.js')); ?>"></script>

    <script>
        $('#update-profile').on('submit', function(event) {
            event.preventDefault();
            var Id = $('#data_id').val();
            let formData = new FormData(this);
            $('#emailError').text('');
            $('#nameError').text('');
            $('#dobError').text('');
            $('#avatarError').text('');
            $.ajax({
                url: "<?php echo e(url('update-profile')); ?>" + "/" + Id,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#emailError').text('');
                    $('#nameError').text('');
                    $('#dobError').text('');
                    $('#avatarError').text('');
                    if (response.isSuccess == false) {
                        alert(response.Message);
                    } else if (response.isSuccess == true) {
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                },
                error: function(response) {
                    $('#emailError').text(response.responseJSON.errors.email);
                    $('#nameError').text(response.responseJSON.errors.name);
                    $('#dobError').text(response.responseJSON.errors.dob);
                    $('#avatarError').text(response.responseJSON.errors.avatar);
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views/supperadmin/contacts-profile.blade.php ENDPATH**/ ?>