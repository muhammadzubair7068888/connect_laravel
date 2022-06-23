<?php $__env->startSection('title'); ?>
    Verify Password
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

    <body>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('content'); ?>
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary"> Verify Password</h5>
                                            <p>Verify Password with Skote.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="<?php echo e(URL::asset('/assets/images/profile-img.png')); ?>" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div>
                                    <a href="index">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="<?php echo e(URL::asset('/assets/images/logo.svg')); ?>" alt="" class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>

                                <?php if(session('resent')): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo e(__('A fresh verification link has been sent to your email address.')); ?>

                                    </div>
                                <?php endif; ?>

                                <?php echo e(__('Before proceeding, please check your email for a verification link.')); ?>

                                <?php echo e(__('If you did not receive the email')); ?>,
                                <div class="p-2">
                                    <form class="form-horizontal" method="POST" action="<?php echo e(route('verification.resend')); ?>">
                                        <?php echo csrf_field(); ?>

                                        <div class="text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit"><?php echo e(__('click here to request another')); ?></button>
                                        </div>
                                        
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p>Remember It ? <a href="<?php echo e(url('login')); ?>" class="fw-medium text-primary"> Sign In here</a> </p>
                            <p>© <script>
                                    document.write(new Date().getFullYear())

                                </script> Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views\auth1\verify.blade.php ENDPATH**/ ?>