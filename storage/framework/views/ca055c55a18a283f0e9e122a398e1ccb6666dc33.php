<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Schedule'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('/assets/css/main.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="<?php echo e(URL::asset('/assets/libs/datepicker/datepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('Schedule'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('Schedule'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <style>
        /* The whole thing */
        .custom-menu {
            display: none;
            z-index: 1000;
            position: absolute;
            overflow: hidden;
            border: 1px solid #CCC;
            white-space: nowrap;
            font-family: sans-serif;
            background: #FFF;
            color: #333;
            border-radius: 5px;
            padding: 0;
        }

        /* Each of the items in the list */
        .custom-menu li {
            padding: 8px 12px;
            cursor: pointer;
            list-style-type: none;
            transition: all .3s ease;
            user-select: none;
        }

        .custom-menu li:hover {
            background-color: #DEF;
        }

        .fc-day:hover {
            background: lightblue;
            cursor: pointer;
        }

        .fade.in {
            opacity: 1 !important;
        }

        .adiv {
            background: #04CB28;
            border-radius: 15px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            font-size: 12px;
            height: 46px
        }
    </style>
    <form autocomplete="off" action="<?php echo e(route('schedule.print')); ?>" method="post" target="_blank" style="width: 100%;">
        <?php echo csrf_field(); ?>
        <div class="row d-flex justify-content-between">
            <div class="col-md-4">
                <div class="form-group">
                    <label>User: </label>
                    <select class="form-control" id="calendar-user" name="user">
                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <option value="<?php echo e($user['id']); ?>"><?php echo e($user['name']); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Schedule Date</label>
                    <input type="text" class="form-control" placeholder="Date" data-date-format="dd M, yyyy"
                        data-provide="datepicker" data-date-autoclose="true" name="date" required>
                    
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary mt-4 btn-print-schedule">Print Schedule</button>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Empty Days</label>
                    <select class="form-control" id="schedule-empty-days">
                        <option value="">Select</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <div style='clear:both'></div>
        </div>
    </div>
    <!-- end row-->
    <!-- schedule model -->
    <div class="modal fade" id="event-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Schedule</h5>
                    <button type="button" class="close btn btn-light" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="event-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Exercise</label>
                                    <select class="form-control exercise-select">
                                        <option value="">Select Exercise</option>
                                        <?php $__empty_1 = true; $__currentLoopData = $exercises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exercise): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <option value="<?php echo e($exercise->id); ?>"><?php echo e($exercise->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Color</label>
                                    <input type="color" class="mt-3" id="color-picker" name="color"
                                        value="#e66465">&nbsp;</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-save-event">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end schedule model -->
    <!-- context-menu -->
    <ul class="custom-menu add-menu" style="display: none;">
        <li data-action="add-schedule">Add Schedule</li>
        <li data-action="copy-week">Copy Week</li>
        <li data-action="copy-day">Copy Day</li>
        <li data-action="copy-month">Copy Month</li>
        <li data-action="paste" style="display: none;">Paste</li>
        <li data-action="delete-week">Delete Week</li>
    </ul>
    <!-- end context-menu -->
    <!-- event-manu -->
    <ul class="custom-menu edit-menu">
        <li data-action="copy-schedule">Copy Schedule</li>
        <li data-action="edit-schedule">Edit Schedule</li>
        <li data-action="delete-schedule">Delete Schedule</li>
    </ul>
    <!-- end event-manu -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('assets/js/main.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/calendar/moment.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/datepicker/datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/calendar/calendar.js')); ?>"></script>
    <script>
        var schedule_view_url = "<?php echo e(route('schedule.view')); ?>";
        var get_schedule_url = "<?php echo e(route('schedule.exercise')); ?>";
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/connect.pk/resources/views/supperadmin/schedule.blade.php ENDPATH**/ ?>