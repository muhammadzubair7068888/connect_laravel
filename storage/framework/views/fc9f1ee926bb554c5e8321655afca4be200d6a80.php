<!-- Modal -->
<div class="modal fade" id="fileUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <h5 class="file-upload-heading"><?php echo e(__('messages.upload_files')); ?></h5>
            <button type="button" class="close file-upload-close-btn" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <form action="<?php echo e(route('chat.file-upload')); ?>"
                      class="dropzone conversation-dropzone"
                      id="dropzone"
                      enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                </form>
                <div class="d-flex mt-3 float-right">
                    <button id="submit-all" class="upload-file-btn btn btn-primary mr-2"><?php echo e(__('messages.upload')); ?></button>
                    <button type="reset" id="cancel-upload-file"
                            class="upload-file-btn btn btn-secondary"><?php echo e(__('messages.cancel')); ?></button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/connect.pk/resources/views/chat/partials/file-upload.blade.php ENDPATH**/ ?>