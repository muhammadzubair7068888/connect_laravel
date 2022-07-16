<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8" />
    <title> <?php echo $__env->yieldContent('title'); ?> | Connect</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(URL::asset('assets/images/logo.png')); ?>">
    <?php echo $__env->make('supperadmin.layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('page_css'); ?>
</head>

<?php $__env->startSection('body'); ?>

    <body data-sidebar="dark">
    <?php echo $__env->yieldSection(); ?>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php echo $__env->make('supperadmin.layouts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('supperadmin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <?php echo $__env->make('supperadmin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <?php echo $__env->make('supperadmin.layouts.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- /Right-bar -->

    <!-- JAVASCRIPT -->
    <?php echo $__env->make('supperadmin.layouts.vendor-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- jQuery 3.1.1 -->









<script src="https://www.jsviews.com/download/jsviews.min.js"></script>
<script src="<?php echo e(asset('js/emojionearea.js')); ?>"></script>
<script src="<?php echo e(mix('assets/chat/js/emojione.min.js')); ?>"></script>
    <?php echo $__env->yieldContent('page_js'); ?>
    <script>
        let setLastSeenURL = '<?php echo e(url('chat/update-last-seen')); ?>';
        let pusherKey = '<?php echo e(config('broadcasting.connections.pusher.key')); ?>';
        let pusherCluster = '<?php echo e(config('broadcasting.connections.pusher.options.cluster')); ?>';
        let messageDeleteTime = '<?php echo e(config('configurable.delete_message_time')); ?>';
        let changePasswordURL = '<?php echo e(url('chat/change-password')); ?>';
        // let baseURL = '<?php echo e(url('/storage/users')); ?>';
        let conversationsURL = '<?php echo e(route('chat.conversations')); ?>';
        let notifications = JSON.parse(JSON.stringify(<?php echo json_encode(getNotifications()); ?>));
        let loggedInUserId = '<?php echo e(Auth::id()); ?>';
        let loggedInUserStatus = '<?php echo Auth::user()->userStatus; ?>';
        if (loggedInUserStatus != '') {
            loggedInUserStatus = JSON.parse(JSON.stringify(<?php echo Auth::user()->userStatus; ?>));
        }
        let setUserCustomStatusUrl = '<?php echo e(route('chat.set-user-status')); ?>';
        let clearUserCustomStatusUrl = '<?php echo e(route('chat.clear-user-status')); ?>';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
        });
        (function ($) {
            $.fn.button = function (action) {
                if (action === 'loading' && this.data('loading-text')) {
                    this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
                }
                if (action === 'reset' && this.data('original-text')) {
                    this.html(this.data('original-text')).prop('disabled', false);
                }
            };
        }(jQuery));
    </script>
    <script src="<?php echo e(mix('assets/chat/js/app.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/chat/js/custom.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/chat/js/notification.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/chat/js/set_user_status.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/chat/js/set-user-on-off.js')); ?>"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH /var/www/connect.pk/resources/views/supperadmin/layouts/master.blade.php ENDPATH**/ ?>