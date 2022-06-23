

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Plugin'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('Plugin'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('Plugin'); ?>
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="container-fluid user-card">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card d-flex flex-row py-4 px-4" style="">
                    <div><img class="" style="width: 75px;"
                            src="https://trading.agnimble.com/assets/images/google.png" alt="Card image cap">
                    </div>
                    <div class="card-body p-0 ps-4">
                        <h5 class="fw-bold">Google</h5>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            data-bs-whatever="@mdo">Update</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card d-flex flex-row py-4 px-4" style="">
                    <div>
                        <img class="" style="width: 75px;"
                            src="https://trading.agnimble.com/assets/images/mail.png" alt="Card image cap">
                    </div>
                    <div class="card-body p-0 ps-4">
                        <h5 class="fw-bold">Mail Settings</h5>
                        <a href="supperadmin.plugin.mail_setting"> <button id="google+" class="btn btn-dark"
                                data-bs-toggle="modal">
                                Update</button></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card d-flex flex-row py-4 px-4" style="">
                    <div>
                        <img class=" rounded-circle" style="width: 75px;"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/2021_Facebook_icon.svg/800px-2021_Facebook_icon.svg.png"
                            alt="Card image cap">
                    </div>
                    <div class="card-body p-0 ps-4">
                        <h5 class="fw-bold">Facebook</h5>
                        <button id="google+" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#facebook"
                            style="background-color: #0089ff">
                            Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Google Plugin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="col-12">
                            <label for="recipient-name" class="col-form-label"><?php echo app('translator')->get('Client Id'); ?></label>
                            <input type="text" class="form-control" id="recipient-name"
                                placeholder="sfj34hjdfgdhg$$%W$&*JSFJHF">
                        </div>
                        <div class="col-12">
                            <label for="recipient-name" class="col-form-label"><?php echo app('translator')->get('Client Secret Key'); ?></label>
                            <input type="number" class="form-control" id="recipient-name"
                                placeholder="sfj34hjdfgdhg$$%W$&*JSFJHF">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Save Change</button>
                </div>
            </div>
        </div>
    </div>
    </div> <!-- end preview-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views\supperadmin\plugin\cards.blade.php ENDPATH**/ ?>