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
                    <div><img class="" style="width: 75px;" src="https://trading.agnimble.com/assets/images/google.png"
                            alt="Card image cap">
                    </div>
                    <div class="card-body p-0 ps-4">
                        <h5 class="fw-bold">Google</h5>
                        <button id="google+" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#google">
                            Update</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card d-flex flex-row py-4 px-4" style="">
                    <div>
                        <img class="" style="width: 75px;" src="https://trading.agnimble.com/assets/images/mail.png"
                            alt="Card image cap">
                    </div>
                    <div class="card-body p-0 ps-4">
                        <h5 class="fw-bold">Mail Settings</h5>
                        <a href="#"> <button id="google+" class="btn btn-dark" data-bs-toggle="modal">
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

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.plugins-model','data' => ['action' => ''.e(route('google-credentials')).'','title' => 'Google Plugin','id' => 'google','pluginID' => $google_clientid,'pluginSecret' => $google_clientsecret,'status' => $google]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('plugins-model'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => ''.e(route('google-credentials')).'','title' => 'Google Plugin','id' => 'google','pluginID' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($google_clientid),'pluginSecret' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($google_clientsecret),'status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($google)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.plugins-model','data' => ['action' => ''.e(route('facebook-credentials')).'','title' => 'Facebook Plugin','id' => 'facebook','pluginID' => $facebook_clientid,'pluginSecret' => $facebook_clientsecret,'status' => $facebook]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('plugins-model'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => ''.e(route('facebook-credentials')).'','title' => 'Facebook Plugin','id' => 'facebook','pluginID' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($facebook_clientid),'pluginSecret' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($facebook_clientsecret),'status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($facebook)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/connect.pk/resources/views/supperadmin/plugin/cards.blade.php ENDPATH**/ ?>