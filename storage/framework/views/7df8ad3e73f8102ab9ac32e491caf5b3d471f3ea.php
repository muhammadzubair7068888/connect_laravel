
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.Form_Wizard'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Forms
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Form Wizard
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="card">
        <div class="card-body pt-1">
            <form class="form form-vertical mt-2 pt-50" action="http://bulksms.pk/admin/customers/62961f8d0d4f2/permissions"
                method="post">
                <input type="hidden" name="_token" value="TMSDFqjm0WCMauTCYDy4mb2J1jtU82xNuHjUoFQQ">
                <div class="row">
                    <div class="col-12">



                        <div class="divider divider-start divider-info mt-4">
                            <div class="divider-text text-uppercase fw-bold text-primary">Dashboard</div>
                        </div>

                        <div class="d-flex justify-content-start flex-wrap">
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" disabled="" value="access_backend"
                                    name="permissions[]" class="form-check-input" id="access_backend">
                                <label class="form-check-label text-uppercase" for="access_backend"> dashboard </label>


                            </div>
                        </div>

                        <div class="divider divider-start divider-info mt-4">
                            <div class="divider-text text-uppercase fw-bold text-primary">Reports</div>
                        </div>

                        <div class="d-flex justify-content-start flex-wrap">
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="view_reports" name="permissions[]"
                                    class="form-check-input" id="view_reports">
                                <label class="form-check-label text-uppercase" for="view_reports"> View Reports </label>


                            </div>
                        </div>

                        <div class="divider divider-start divider-info mt-4">
                            <div class="divider-text text-uppercase fw-bold text-primary">Sending Servers</div>
                        </div>

                        <div class="d-flex justify-content-start flex-wrap">
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" value="create_sending_servers" name="permissions[]"
                                    class="form-check-input" id="create_sending_servers">
                                <label class="form-check-label text-uppercase" for="create_sending_servers"> Use own sending
                                    servers </label>


                            </div>
                        </div>

                        <div class="divider divider-start divider-info mt-4">
                            <div class="divider-text text-uppercase fw-bold text-primary">Contacts</div>
                        </div>

                        <div class="d-flex justify-content-start flex-wrap">
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="view_contact_group" name="permissions[]"
                                    class="form-check-input" id="view_contact_group">
                                <label class="form-check-label text-uppercase" for="view_contact_group"> View Contact Group
                                </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="create_contact_group" name="permissions[]"
                                    class="form-check-input" id="create_contact_group">
                                <label class="form-check-label text-uppercase" for="create_contact_group"> Create Contact
                                    Group </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="update_contact_group" name="permissions[]"
                                    class="form-check-input" id="update_contact_group">
                                <label class="form-check-label text-uppercase" for="update_contact_group"> Update Contact
                                    Group </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="delete_contact_group" name="permissions[]"
                                    class="form-check-input" id="delete_contact_group">
                                <label class="form-check-label text-uppercase" for="delete_contact_group"> Delete Contact
                                    Group </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="view_contact" name="permissions[]"
                                    class="form-check-input" id="view_contact">
                                <label class="form-check-label text-uppercase" for="view_contact"> View Contact </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="create_contact" name="permissions[]"
                                    class="form-check-input" id="create_contact">
                                <label class="form-check-label text-uppercase" for="create_contact"> Create Contact
                                </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="update_contact" name="permissions[]"
                                    class="form-check-input" id="update_contact">
                                <label class="form-check-label text-uppercase" for="update_contact"> Update Contact
                                </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="delete_contact" name="permissions[]"
                                    class="form-check-input" id="delete_contact">
                                <label class="form-check-label text-uppercase" for="delete_contact"> Delete Contact
                                </label>


                            </div>
                        </div>

                        <div class="divider divider-start divider-info mt-4">
                            <div class="divider-text text-uppercase fw-bold text-primary">Phone Numbers</div>
                        </div>

                        <div class="d-flex justify-content-start flex-wrap">
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="view_numbers" name="permissions[]"
                                    class="form-check-input" id="view_numbers">
                                <label class="form-check-label text-uppercase" for="view_numbers"> View Numbers </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="buy_numbers" name="permissions[]"
                                    class="form-check-input" id="buy_numbers">
                                <label class="form-check-label text-uppercase" for="buy_numbers"> Buy Numbers </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="release_numbers" name="permissions[]"
                                    class="form-check-input" id="release_numbers">
                                <label class="form-check-label text-uppercase" for="release_numbers"> Release Numbers
                                </label>


                            </div>
                        </div>

                        <div class="divider divider-start divider-info mt-4">
                            <div class="divider-text text-uppercase fw-bold text-primary">Keywords</div>
                        </div>

                        <div class="d-flex justify-content-start flex-wrap">
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" value="view_keywords" name="permissions[]"
                                    class="form-check-input" id="view_keywords">
                                <label class="form-check-label text-uppercase" for="view_keywords"> View Keywords </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" value="buy_keywords" name="permissions[]"
                                    class="form-check-input" id="buy_keywords">
                                <label class="form-check-label text-uppercase" for="buy_keywords"> Buy Keywords </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" value="update_keywords" name="permissions[]"
                                    class="form-check-input" id="update_keywords">
                                <label class="form-check-label text-uppercase" for="update_keywords"> Update Keywords
                                </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" value="release_keywords" name="permissions[]"
                                    class="form-check-input" id="release_keywords">
                                <label class="form-check-label text-uppercase" for="release_keywords"> Release Keywords
                                </label>


                            </div>
                        </div>

                        <div class="divider divider-start divider-info mt-4">
                            <div class="divider-text text-uppercase fw-bold text-primary">Sender ID</div>
                        </div>

                        <div class="d-flex justify-content-start flex-wrap">
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="view_sender_id" name="permissions[]"
                                    class="form-check-input" id="view_sender_id">
                                <label class="form-check-label text-uppercase" for="view_sender_id"> View Sender ID
                                </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="create_sender_id" name="permissions[]"
                                    class="form-check-input" id="create_sender_id">
                                <label class="form-check-label text-uppercase" for="create_sender_id"> Request Sender ID
                                </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" value="delete_sender_id" name="permissions[]"
                                    class="form-check-input" id="delete_sender_id">
                                <label class="form-check-label text-uppercase" for="delete_sender_id"> Delete Sender ID
                                </label>


                            </div>
                        </div>

                        <div class="divider divider-start divider-info mt-4">
                            <div class="divider-text text-uppercase fw-bold text-primary">Blacklist</div>
                        </div>

                        <div class="d-flex justify-content-start flex-wrap">
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="view_blacklist" name="permissions[]"
                                    class="form-check-input" id="view_blacklist">
                                <label class="form-check-label text-uppercase" for="view_blacklist"> View Blacklist
                                </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="create_blacklist" name="permissions[]"
                                    class="form-check-input" id="create_blacklist">
                                <label class="form-check-label text-uppercase" for="create_blacklist"> Create Blacklist
                                </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="delete_blacklist" name="permissions[]"
                                    class="form-check-input" id="delete_blacklist">
                                <label class="form-check-label text-uppercase" for="delete_blacklist"> Delete Blacklist
                                </label>


                            </div>
                        </div>

                        <div class="divider divider-start divider-info mt-4">
                            <div class="divider-text text-uppercase fw-bold text-primary">SMS</div>
                        </div>

                        <div class="d-flex justify-content-start flex-wrap">
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="sms_campaign_builder" name="permissions[]"
                                    class="form-check-input" id="sms_campaign_builder">
                                <label class="form-check-label text-uppercase" for="sms_campaign_builder"> SMS Campaign
                                    Builder </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="sms_quick_send" name="permissions[]"
                                    class="form-check-input" id="sms_quick_send">
                                <label class="form-check-label text-uppercase" for="sms_quick_send"> SMS Quick Send
                                </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="sms_bulk_messages" name="permissions[]"
                                    class="form-check-input" id="sms_bulk_messages">
                                <label class="form-check-label text-uppercase" for="sms_bulk_messages"> Send SMS Using
                                    File </label>


                            </div>
                        </div>

                        <div class="divider divider-start divider-info mt-4">
                            <div class="divider-text text-uppercase fw-bold text-primary">Voice</div>
                        </div>

                        <div class="d-flex justify-content-start flex-wrap">
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" value="voice_campaign_builder" name="permissions[]"
                                    class="form-check-input" id="voice_campaign_builder">
                                <label class="form-check-label text-uppercase" for="voice_campaign_builder"> SMS Campaign
                                    Builder </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" value="voice_quick_send" name="permissions[]"
                                    class="form-check-input" id="voice_quick_send">
                                <label class="form-check-label text-uppercase" for="voice_quick_send"> SMS Quick Send
                                </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" value="voice_bulk_messages" name="permissions[]"
                                    class="form-check-input" id="voice_bulk_messages">
                                <label class="form-check-label text-uppercase" for="voice_bulk_messages"> Send SMS Using
                                    File </label>


                            </div>
                        </div>

                        <div class="divider divider-start divider-info mt-4">
                            <div class="divider-text text-uppercase fw-bold text-primary">MMS</div>
                        </div>

                        <div class="d-flex justify-content-start flex-wrap">
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" value="mms_campaign_builder" name="permissions[]"
                                    class="form-check-input" id="mms_campaign_builder">
                                <label class="form-check-label text-uppercase" for="mms_campaign_builder"> SMS Campaign
                                    Builder </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" value="mms_quick_send" name="permissions[]"
                                    class="form-check-input" id="mms_quick_send">
                                <label class="form-check-label text-uppercase" for="mms_quick_send"> SMS Quick Send
                                </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" value="mms_bulk_messages" name="permissions[]"
                                    class="form-check-input" id="mms_bulk_messages">
                                <label class="form-check-label text-uppercase" for="mms_bulk_messages"> Send SMS Using
                                    File </label>


                            </div>
                        </div>

                        <div class="divider divider-start divider-info mt-4">
                            <div class="divider-text text-uppercase fw-bold text-primary">WhatsApp</div>
                        </div>

                        <div class="d-flex justify-content-start flex-wrap">
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" value="whatsapp_campaign_builder" name="permissions[]"
                                    class="form-check-input" id="whatsapp_campaign_builder">
                                <label class="form-check-label text-uppercase" for="whatsapp_campaign_builder"> SMS
                                    Campaign Builder </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" value="whatsapp_quick_send" name="permissions[]"
                                    class="form-check-input" id="whatsapp_quick_send">
                                <label class="form-check-label text-uppercase" for="whatsapp_quick_send"> SMS Quick Send
                                </label>


                            </div>
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" value="whatsapp_bulk_messages" name="permissions[]"
                                    class="form-check-input" id="whatsapp_bulk_messages">
                                <label class="form-check-label text-uppercase" for="whatsapp_bulk_messages"> Send SMS
                                    Using File </label>


                            </div>
                        </div>

                        <div class="divider divider-start divider-info mt-4">
                            <div class="divider-text text-uppercase fw-bold text-primary">SMS Template</div>
                        </div>

                        <div class="d-flex justify-content-start flex-wrap">
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="sms_template" name="permissions[]"
                                    class="form-check-input" id="sms_template">
                                <label class="form-check-label text-uppercase" for="sms_template"> SMS Template </label>


                            </div>
                        </div>

                        <div class="divider divider-start divider-info mt-4">
                            <div class="divider-text text-uppercase fw-bold text-primary">Chat Box</div>
                        </div>

                        <div class="d-flex justify-content-start flex-wrap">
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="chat_box" name="permissions[]"
                                    class="form-check-input" id="chat_box">
                                <label class="form-check-label text-uppercase" for="chat_box"> Chat Box </label>


                            </div>
                        </div>

                        <div class="divider divider-start divider-info mt-4">
                            <div class="divider-text text-uppercase fw-bold text-primary">Developers</div>
                        </div>

                        <div class="d-flex justify-content-start flex-wrap">
                            <div class="form-check me-3 me-lg-5 mt-1">
                                <input type="checkbox" checked="" value="developers" name="permissions[]"
                                    class="form-check-input" id="developers">
                                <label class="form-check-label text-uppercase" for="developers"> Developers </label>


                            </div>
                        </div>
                    </div>

                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-start mt-1">
                        <input type="hidden" value="access_backend" name="permissions[access_backend]">
                        <button type="submit" class="btn btn-primary mt-1 me-1 waves-effect waves-float waves-light"><svg
                                xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-save">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                <polyline points="7 3 7 8 15 8"></polyline>
                            </svg>
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/pages/form-validation.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/libs/jquery-steps/jquery-steps.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/pages/form-wizard.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH G:\laragon\www\Admin\resources\views/supperadmin/add_new_user.blade.php ENDPATH**/ ?>