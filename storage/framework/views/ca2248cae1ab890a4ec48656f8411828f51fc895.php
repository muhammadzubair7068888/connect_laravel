

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Templates'); ?>
<?php $__env->stopSection(); ?>

<style>
    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background-color: #24695c;
        padding: 30px 0;
        text-align: center;
    }


    .nav-pills .nav-link {
        padding: 30px 0;
        text-align: center;
        border-bottom: 1px solid #cbc7c7;
        border-radius: 0;
        background-color: #fff;
    }

    .tabScrol {
        height: 550px;
        overflow: auto;
    }
</style>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('Templates'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('Templates'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    
    <div class="col-sm-12 xl-100 ">

        <div class="row">
            <div class="col-sm-3 col-xs-12 tabScrol">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link <?php echo e($template == 'test-email' ? 'active' : ''); ?>" id="v-pills-home-tab"
                        href="<?php echo e(route('email', 'test-email')); ?>" role="tab" aria-controls="v-pills-home"
                        aria-selected="true">Test Email</a>
                    <a class="nav-link <?php echo e($template == 'notification-email' ? 'active' : ''); ?>" id="v-pills-profile-tab"
                        href="<?php echo e(route('email', 'notification-email')); ?>" role="tab" aria-controls="v-pills-profile"
                        aria-selected="false">Notification Email</a>
                    <a class="nav-link <?php echo e($template == 'team-invitation-email' ? 'active' : ''); ?>"
                        id="v-pills-messages-tab" href="<?php echo e(route('email', 'team-invitation-email')); ?>" role="tab"
                        aria-controls="v-pills-messages" aria-selected="false">Team Invitation</a>
                    <a class="nav-link <?php echo e($template == 'forgot-password-email' ? 'active' : ''); ?>"
                        id="v-pills-settings-tab" href="<?php echo e(route('email', 'forgot-password-email')); ?>" role="tab"
                        aria-controls="v-pills-settings" aria-selected="false">Forgot Password</a>

                    <a class="nav-link <?php echo e($template == 'account-update-email' ? 'active' : ''); ?>" id="v-pills-account-tab"
                        href="<?php echo e(route('email', 'account-update-email')); ?>" role="tab" aria-controls="v-pills-account"
                        aria-selected="false">Account update</a>

                    <a class="nav-link <?php echo e($template == 'invitation-email' ? 'active' : ''); ?>" id="v-pills-invitation-tab"
                        href="<?php echo e(route('email', 'invitation-email')); ?>" role="tab" aria-controls="v-pills-invitation"
                        aria-selected="false">Invitation</a>

                    <a class="nav-link <?php echo e($template == 'verify-email' ? 'active' : ''); ?>" id="v-pills-verify-email-tab"
                        href="<?php echo e(route('email', 'verify-email')); ?>" role="tab" aria-controls="v-pills-verify-email"
                        aria-selected="false">Verify Email</a>

                    <a class="nav-link <?php echo e($template == 'order-placed-email' ? 'active' : ''); ?>"
                        id="v-pills-order-placed-tab" href="<?php echo e(route('email', 'order-placed-email')); ?>" role="tab"
                        aria-controls="v-pills-order-placed" aria-selected="false">Order Placed</a>

                    <a class="nav-link <?php echo e($template == 'invoice-send-email' ? 'active' : ''); ?>"
                        id="v-pills-invoice-send-tab" href="<?php echo e(route('email', 'invoice-send-email')); ?>" role="tab"
                        aria-controls="v-pills-invoice-send" aria-selected="false">invoice send</a>

                    <a class="nav-link <?php echo e($template == 'invoice-paid-email' ? 'active' : ''); ?>"
                        id="v-pills-invoice-paid-tab" href="<?php echo e(route('email', 'invoice-paid-email')); ?>" role="tab"
                        aria-controls="v-pills-invoice-paid" aria-selected="false">invoice paid</a>

                    <a class="nav-link <?php echo e($template == 'restock-notification-email' ? 'active' : ''); ?>"
                        id="v-pills-restock-tab" href="<?php echo e(route('email', 'restock-notification-email')); ?>" role="tab"
                        aria-controls="v-pills-restock" aria-selected="false">Restock Notification Email</a>

                    <a class="nav-link <?php echo e($template == 'cron-report-email' ? 'active' : ''); ?>  border-0"
                        id="v-pills-report-mail-tab" href="<?php echo e(route('email', 'cron-report-email')); ?>" role="tab"
                        aria-controls="v-pills-report-mail" aria-selected="false">Cron Report Mail</a>

                </div>
            </div>


            <div class="col-sm-9 col-xs-12 card py-4 px-3">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade <?php echo e($template == 'test-email' ? 'show active' : ''); ?>" id="v-pills-home"
                        role="tabpanel" aria-labelledby="v-pills-home-tab">

                        <form action="<?php echo e(route('save-template', 'test-email')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <textarea id="<?php echo e($template == 'test-email' ? 'editor1' : ''); ?>" name="template"></textarea>
                            <div class="text-end mt-4">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade <?php echo e($template == 'notification-email' ? 'show active' : ''); ?>"
                        id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                        <form action="<?php echo e(route('save-template', 'notification-email')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <textarea id="<?php echo e($template == 'notification-email' ? 'editor1' : ''); ?>" name="template"></textarea>
                            <div class="text-end mt-4">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade <?php echo e($template == 'team-invitation-email' ? 'show active' : ''); ?>"
                        id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                        <form action="<?php echo e(route('save-template', 'team-invitation-email')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <textarea id="<?php echo e($template == 'team-invitation-email' ? 'editor1' : ''); ?>" name="template"></textarea>
                            <div class="text-end mt-4">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade <?php echo e($template == 'forgot-password-email' ? 'show active' : ''); ?>"
                        id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                        <form action="<?php echo e(route('save-template', 'forgot-password-email')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <textarea id="<?php echo e($template == 'forgot-password-email' ? 'editor1' : ''); ?>" name="template"></textarea>
                            <div class="text-end mt-4">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade <?php echo e($template == 'account-update-email' ? 'show active' : ''); ?>"
                        id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                        <form action="<?php echo e(route('save-template', 'account-update-email')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <textarea id="<?php echo e($template == 'account-update-email' ? 'editor1' : ''); ?>" name="template"></textarea>
                            <div class="text-end mt-4">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade <?php echo e($template == 'invitation-email' ? 'show active' : ''); ?>"
                        id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                        <form action="<?php echo e(route('save-template', 'invitation-email')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <textarea id="<?php echo e($template == 'invitation-email' ? 'editor1' : ''); ?>" name="template"></textarea>
                            <div class="text-end mt-4">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade <?php echo e($template == 'verify-email' ? 'show active' : ''); ?>"
                        id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                        <form action="<?php echo e(route('save-template', 'verify-email')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <textarea id="<?php echo e($template == 'verify-email' ? 'editor1' : ''); ?>" name="template"></textarea>
                            <div class="text-end mt-4">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade <?php echo e($template == 'order-placed-email' ? 'show active' : ''); ?>"
                        id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                        <form action="<?php echo e(route('save-template', 'order-placed-email')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <textarea id="<?php echo e($template == 'order-placed-email' ? 'editor1' : ''); ?>" name="template"></textarea>
                            <div class="text-end mt-4">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade <?php echo e($template == 'invoice-send-email' ? 'show active' : ''); ?>"
                        id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                        <form action="<?php echo e(route('save-template', 'invoice-send-email')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <textarea id="<?php echo e($template == 'invoice-send-email' ? 'editor1' : ''); ?>" name="template"></textarea>
                            <div class="text-end mt-4">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade <?php echo e($template == 'invoice-paid-email' ? 'show active' : ''); ?>"
                        id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                        <form action="<?php echo e(route('save-template', 'invoice-paid-email')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <textarea id="<?php echo e($template == 'invoice-paid-email' ? 'editor1' : ''); ?>" name="template"></textarea>
                            <div class="text-end mt-4">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade <?php echo e($template == 'restock-notification-email' ? 'show active' : ''); ?>"
                        id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                        <form action="<?php echo e(route('save-template', 'restock-notification-email')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <textarea id="<?php echo e($template == 'restock-notification-email' ? 'editor1' : ''); ?>" name="template"></textarea>
                            <div class="text-end mt-4">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade <?php echo e($template == 'cron-report-email' ? 'show active' : ''); ?>"
                        id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                        <form action="<?php echo e(route('save-template', 'cron-report-email')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <textarea id="<?php echo e($template == 'cron-report-email' ? 'editor1' : ''); ?>" name="template"></textarea>
                            <div class="text-end mt-4">
                                <input type="submit" class="btn btn-success" value="Update">
                            </div>
                        </form>
                    </div>


                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/editor/ckeditor/ckeditor.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/editor/ckeditor/adapters/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/editor/ckeditor/styles.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/editor/ckeditor/ckeditor.custom.js')); ?>"></script>

    <script src="assets/libs/tinymce/tinymce.min.js"></script>

    <!-- init js -->
    <script src="assets/js/pages/form-editor.init.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views\supperadmin\templates\email_template.blade.php ENDPATH**/ ?>