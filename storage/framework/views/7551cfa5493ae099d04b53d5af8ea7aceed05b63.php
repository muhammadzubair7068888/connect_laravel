

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('Files'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <!-- DataTables -->
    <link href="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('/assets/libs/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            <?php echo app('translator')->get('File'); ?>
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            <?php echo app('translator')->get('File'); ?>
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
                    <div class="mb-3">
                        <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target="#exampleModal"><?php echo app('translator')->get('New File'); ?></button>
                    </div>
                    <?php if(auth()->user()->role == 'user'): ?>
                    <?php else: ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label"><?php echo app('translator')->get('Select User'); ?></label>
                                    <select class="form-control select2" onchange="getval(this);">
                                        <option value="<?php echo e(auth()->user()->id); ?>"><?php echo app('translator')->get('Me'); ?></option>
                                        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <option value="AK"></option>
                                            <option value="HI">Hawaii</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <h4 class="card-title"><?php echo app('translator')->get('Files'); ?></h4>
                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('#'); ?></th>
                                <th><?php echo app('translator')->get('Title'); ?></th>
                                <th><?php echo app('translator')->get('FileName'); ?></th>
                                <th class="col-1"><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                        </thead>
                        <?php
                            $j = 0;
                        ?>
                        <?php $__empty_1 = true; $__currentLoopData = $files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php
                                $j++;
                                $pdf = explode('pdf', $file->file);
                            ?>
                            <tr class="first_row">
                                <td><?php echo e($j); ?></td>
                                <td><?php echo e($file->title); ?></td>
                                <td><?php echo e($file->file); ?></td>
                                <td>
                                    <?php if(isset($pdf[1])): ?>
                                    <?php else: ?>
                                        <a class="link-primary view-video"
                                            data-link="<?php echo e(asset('/uploads/' . $file->file)); ?>" data-name="name"
                                            data-target="#myModal" data-toggle="modal"> <i class="fa fa-eye"></i></a>
                                    <?php endif; ?>
                                    <a style="padding-left:10px;" class="link-warning"
                                        href='<?php echo e(route('download.file', ['id' => $file->id])); ?>'><i
                                            class="bx bx-download"></i></a>
                                    <a style="padding-left:10px;" class="link-danger"><i class="fas fa-trash-alt"
                                            onclick="delete_file(<?php echo e($file); ?>)"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle"><?php echo app('translator')->get('Add New File'); ?></h5>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="<?php echo e(route('save.file')); ?>" class="needs-validation"
                            enctype='multipart/form-data'>
                            <?php echo csrf_field(); ?>
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Title'); ?></label>
                                <input type="text" name="title" class="form-control" placeholder="Title">
                            </div>
                            <div class="mb-3 position-relative">
                                <label for="validationTooltip01" class="form-label"><?php echo app('translator')->get('Upload File'); ?></label>
                                <input type="file" name="file" class="form-control" onchange="loadFile(event)"
                                    accept="video/*,.pdf">
                            </div>

                            <div class="mb-3 position-relative">
                                <video id="output" controls="" style="width: 100%;"></video>
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
    </div> <!-- end preview-->
    <div id="exampleModalFullscreen" class="modal fade" tabindex="-1" aria-labelledby="#exampleModalFullscreenLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFullscreenLabel"><?php echo app('translator')->get('vedio'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body"><video id="playvideo" src="" controls=""
                            style="width: 100%;"></video></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div> <!-- end preview-->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><?php echo app('translator')->get('Delete File'); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="text-danger"><?php echo app('translator')->get('Are you sure you want to delete this FIle?'); ?></h4>
                </div>
                <form action="<?php echo e(route('delete.file')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="delete_id" name="file_id">
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
    <script src="<?php echo e(URL::asset('/assets/libs/select2/select2.min.js')); ?>"></script>
    <!-- Required datatable js -->
    <script src="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/pages/datatables.init.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2();
        });
        var loadFile = function(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
        $(document).on('click', '.view-video', function() {
            console.log($(this).attr('data-link'));
            $('#exampleModalFullscreen').modal('show');
            $("#playvideo").attr('src', $(this).attr('data-link'));
        })

        function delete_file(file) {
            $('#delete_id').val(file.id);
            $('#staticBackdrop').modal('show');
        }

        function delete_file_js(file) {
            $('#delete_id').val(file);
            $('#staticBackdrop').modal('show');
        }

        function getval(id) {
            var user_id = id.value;
            $.ajax({
                url: "<?php echo e(url('files/index')); ?>" + "/" + user_id,
                type: "GET",
                data: {},
                dataType: "json",
                success: function(data) {

                    var i = 0;
                    var html = '';
                    var view = '';
                    $.each(data, function(key, value) {
                        i++;
                        var url = "<?php echo e(url('/files/download')); ?>" + "/" + value.id;
                        var viewurl = "<?php echo e(asset('/uploads')); ?>" + "/" + value.file;

                        let text = value.file
                        const arr = text.split("pdf");
                        if (typeof arr[1] !== 'undefined') {

                        } else {
                            view +=
                                '<a class="link-primary view-video"data-link=' + viewurl +
                                'data-name="name" data-target="#myModal"data-toggle="modal" >' +
                                '<i class = "fa fa-eye" >' + '</i>' + '</a>';
                        }
                        html += '<tr>';
                        html += '<td>';
                        html += i;
                        html += '</td>';
                        html += '<td>';
                        html += value.title;
                        html += '</td>';
                        html += '<td>';
                        html += value.file;
                        html += '</td>';
                        html += '<td>';
                        html += view;
                        html += '</td>';
                        html += '</tr>';
                    });
                    $('tbody').html(html);
                },
                error: function(response) {
                    alert("Failed")
                }


            });

        }
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views/supperadmin/files.blade.php ENDPATH**/ ?>