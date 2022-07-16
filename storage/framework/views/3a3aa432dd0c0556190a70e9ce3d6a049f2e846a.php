<?php $__env->startSection('title'); ?>
    <?php echo e(__('messages.conversations')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/chat/css/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/chat/css/ekko-lightbox.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('assets/chat/css/video-js.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('assets/chat/css/new-conversation.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(mix('assets/chat/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo e(mix('assets/chat/css/coreui.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/chat/icheck/skins/all.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('assets/chat/css/jquery.toast.min.css')); ?>">
    <script src="<?php echo e(mix('assets/chat/js/jquery.min.js')); ?>"></script>

    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>

    <link rel="stylesheet" href="<?php echo e(mix('assets/chat/css/font-awesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/emojionearea.min.css')); ?>">
    <?php echo $__env->yieldContent('page_css'); ?>
    <link rel="stylesheet" href="<?php echo e(mix('assets/chat/css/style.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-container">
        <div class="chat-container chat">
            <div class="chat__inner">
                <!-- left section of chat area (chat person selection area) -->
                <div class="chat__people-wrapper chat__people-wrapper--responsive">
                    <div class="chat__people-wrapper-header">
                        <span class="h3 mb-0"><?php echo e(__('messages.conversations')); ?></span>
                        <div class="d-flex chat__people-wrapper-btn-group">
                            <i class="nav-icon fa fa-bars align-top chat__people-wrapper-bar"></i>
                            <?php if($enableGroupSetting == 1): ?>
                            <div class="chat__people-wrapper-button btn-create-group mr-2" data-bs-toggle="modal"
                                 data-bs-target="#createNewGroup">
                                <i class="nav-icon group-icon color-green" data-toggle="tooltip"
                                   data-placement="bottom"
                                   title="<?php echo e(__('messages.create_new_group')); ?>"><img
                                            src="<?php echo e(asset('assets/chat/icons/group30.png')); ?>"></i>
                            </div>
                            <?php endif; ?>
                            <div class="chat__people-wrapper-button" data-bs-toggle="modal"
                            data-bs-backdrop="" data-bs-target="#addNewChat">
                                <i class="nav-icon " data-toggle="tooltip" data-placement="bottom"
                                   title="<?php echo e(__('messages.new_conversation')); ?>"><img
                                            src="<?php echo e(asset('assets/chat/icons/chat30.png')); ?>"></i>
                            </div>
                        </div>
                    </div>
                    <div class="chat__search-wrapper">
                        <div class="chat__search clearfix chat__search--responsive">
                            <i class="fa fa-search"></i>
                            <input type="search" placeholder="<?php echo e(__('messages.search')); ?>" class="chat__search-input"
                                   id="searchUserInput">
                            <i class="fa fa-search d-lg-none chat__search-responsive-icon"></i>
                        </div>
                    </div>
                    <ul class="nav nav-tabs chat__tab-nav" id="chatTabs">
                        <li class="nav-item">
                            <a data-bs-toggle="tab" id="activeChatTab" class="nav-link active" href="#chatPeopleBody">Active
                                Chat</a>
                        </li>
                        <li class="nav-item">
                            <a data-bs-toggle="tab" id="archiveChatTab" class="nav-link" href="#archivePeopleBody">Archive
                                Chat</a>
                        </li>
                    </ul>
                    <div class="tab-content chat__tab-content">
                        <div class="chat__people-body tab-pane fade in active show" id="chatPeopleBody">
                            <div id="infyLoader" class="infy-loader chat__people-body-loader">
                                <?php echo $__env->make('chat.partials.infy-loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div class="text-center no-conversation">
                                <div class="chat__no-conversation">
                                    <div class="text-center"><i class="fa fa-2x fa-user" aria-hidden="true"></i></div>
                                    <?php echo e(__('messages.no_conversation_found')); ?>

                                </div>
                            </div>
                        </div>
                        <div class="chat__people-body tab-pane fade in active" id="archivePeopleBody">
                            <div class="text-center no-archive-conversation">
                                <div class="chat__no-archive-conversation">
                                    <div class="text-center"><i class="fa fa-2x fa-user" aria-hidden="true"></i></div>
                                    <?php echo e(__('messages.no_conversation_found')); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ left section of chat area -->


                <!-- right section of chat area (chat conversation area)-->
                <div class="chat__area-wrapper">
                    <?php echo $__env->make('chat.no-chat', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <!--/ right section of chat area-->

                <!-- profile section (chat profile section)-->
            <?php echo $__env->make('chat.chat_profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('chat.msg_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!--/ profile section -->
            </div>
        </div>
        <!-- Modal -->
        <div id="addNewChat" class="modal" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title">
                            <i class="ti-user"></i>New Conversations <?php if($enableGroupSetting == 1): ?> / Groups <?php endif; ?></h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <nav class="nav nav-tabs" id="myTab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-my-contacts-tab" data-bs-toggle="tab"
                               href="#nav-my-contacts" role="tab" aria-controls="nav-my-contacts-tab"
                               aria-expanded="true"> <i class="ti-user"></i><?php echo e(__('messages.my_contacts')); ?></a> <a
                                    class="nav-item nav-link wrap-text" id="nav-users-tab" data-bs-toggle="tab"
                                    href="#nav-users"
                                    role="tab" aria-controls="nav-users" aria-expanded="true">
                                <i class="ti-user"></i><?php echo e(__('messages.new_conversation')); ?>

                            </a>
                            <?php if($enableGroupSetting == 1): ?>
                            <a
                                    class="nav-item nav-link" id="nav-groups-tab" data-bs-toggle="tab" href="#nav-groups"
                                    role="tab" aria-controls="nav-groups"><?php echo e(__('messages.group.groups')); ?></a>
                            <?php endif; ?>
                                <a
                                    class="nav-item nav-link" id="nav-blocked-users-tab" data-bs-toggle="tab"
                                    href="#nav-blocked-users" role="tab"
                                    aria-controls="nav-blocked-users"><?php echo e(__('messages.blocked_users')); ?></a>
                        </nav>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-my-contacts" role="tabpanel"
                                 aria-labelledby="nav-my-contacts-tab">
                                <form class="mb-2">
                                    <input type="search" class="form-control search-input" id="searchMyContactForChat"
                                           placeholder="<?php echo e(__('messages.search')); ?>...">
                                </form>
                                <div class="form-group">
                                    <div class="col-sm-12 d-flex justify-content-around">
                                        <div class="custom-control custom-checkbox">
                                            <input name="my_contacts_filter" value="1" type="checkbox" class="custom-control-input group-type" id="male">
                                            <label class="custom-control-label" for="male"><?php echo e(__('messages.male')); ?></label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input name="my_contacts_filter" value="2" type="checkbox" class="custom-control-input group-type" id="female">
                                            <label class="custom-control-label" for="female"><?php echo e(__('messages.female')); ?></label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input name="my_contacts_filter" value="3" type="checkbox" class="custom-control-input group-type" id="online">
                                            <label class="custom-control-label" for="online"><?php echo e(__('messages.online')); ?></label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input name="my_contacts_filter" value="4" type="checkbox" class="custom-control-input group-type" id="offline">
                                            <label class="custom-control-label" for="offline"><?php echo e(__('messages.offline')); ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div id="myContactListForAddPeople">
                                    <ul class="list-group user-list-chat-select" id="myContactListForChat"></ul>
                                    <div class="text-center no-my-contact new-conversation__no-my-contact">
                                        <div class="chat__not-selected">
                                            <div class="text-center"><i class="fa fa-2x fa-user" aria-hidden="true"></i>
                                            </div>
                                            <?php echo e(__('messages.no_user_found')); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab">
                                <form class="mb-2">
                                    <input type="search" class="form-control search-input" id="searchContactForChat"
                                           placeholder="<?php echo e(__('messages.search')); ?>...">
                                </form>
                                <div class="form-group">
                                    <div class="col-sm-12 d-flex justify-content-around">
                                        <div class="custom-control custom-checkbox">
                                            <input name="new_contact_gender" value="1" type="checkbox" class="custom-control-input group-type" id="newContactMale">
                                            <label class="custom-control-label" for="newContactMale"><?php echo e(__('messages.male')); ?></label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input name="new_contact_gender" value="2" type="checkbox" class="custom-control-input group-type" id="newContactFemale">
                                            <label class="custom-control-label" for="newContactFemale"><?php echo e(__('messages.female')); ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div id="userListForAddPeople">
                                    <ul class="list-group user-list-chat-select" id="userListForChat"></ul>
                                    <div class="text-center no-user new-conversation__no-user">
                                        <div class="chat__not-selected">
                                            <div class="text-center"><i class="fa fa-2x fa-user" aria-hidden="true"></i>
                                            </div>
                                            <?php echo e(__('messages.no_user_found')); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if($enableGroupSetting == 1): ?>
                            <div class="tab-pane fade" id="nav-groups" role="tabpanel" aria-labelledby="nav-groups-tab">
                                <form class="mb-2">
                                    <input type="search" class="form-control search-input" id="searchGroupsForChat"
                                           placeholder="<?php echo e(__('messages.search')); ?>...">
                                </form>
                                <div id="divGroupListForChat">
                                    <ul class="list-group user-list-chat-select" id="groupListForChat"></ul>
                                    <div class="text-center no-group new-conversation__no-group">
                                        <div class="chat__not-selected">
                                            <div class="text-center"><i class="fa fa-2x fa-users"
                                                                        aria-hidden="true"></i>
                                            </div>
                                            <?php echo e(__('messages.no_group_found')); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <div class="tab-pane fade show" id="nav-blocked-users" role="tabpanel"
                                 aria-labelledby="nav-blocked-users-tab">
                                <form class="mb-2">
                                    <input type="search" class="form-control search-input" id="searchBlockUsers"
                                           placeholder="<?php echo e(__('messages.search')); ?>...">
                                </form>
                                <div id="divOfBlockedUsers">
                                    <ul class="list-group user-list-chat-select" id="blockedUsersList"></ul>
                                    <div class="text-center no-blocked-user new-conversation__no-user">
                                        <div class="chat__not-selected">
                                            <div class="text-center"><i class="fa fa-2x fa-user" aria-hidden="true"></i>
                                            </div>
                                            <span id="noBlockedUsers"><?php echo e(__('messages.no_blocked_user_found')); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $__env->make('chat.group_modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('chat.report_user_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <?php echo $__env->make('chat.templates.conversation-template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.templates.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.templates.no-messages-yet', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.templates.no-conversation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.templates.group_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.templates.user_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.templates.group_listing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.templates.group_members', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.templates.single_group_member', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.group_members_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.templates.blocked_users_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.templates.add_chat_users_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.templates.badge_message_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.templates.member_options', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.templates.single_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.templates.contact_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.templates.conversations_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.templates.common_templates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.templates.my_contacts_listing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.templates.conversation-request', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.copyImageModal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('chat.partials.file-upload', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_js'); ?>
    <script src="<?php echo e(asset('js/dropzone.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/ekko-lightbox.min.js')); ?>"></script>
    <script src="<?php echo e(mix('assets/chat/js/video.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>



<script src="<?php echo e(mix('assets/chat/js/jquery.toast.min.js')); ?>"></script>
<script src="<?php echo e(mix('assets/chat/js/sweetalert2.all.min.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<script src="<?php echo e(asset('js/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/moment-timezone.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/chat/icheck/icheck.min.js')); ?>"></script>
<script src="https://www.jsviews.com/download/jsviews.min.js"></script>
<script src="<?php echo e(asset('js/emojionearea.js')); ?>"></script>
<script src="<?php echo e(mix('assets/chat/js/emojione.min.js')); ?>"></script>
    <!--custom js-->
    <script>
        let userURL = '<?php echo e(url('chat/users')); ?>/';
        let userListURL = '<?php echo e(url('chat/users-list')); ?>';
        let myContactsURL = '<?php echo e(route('chat.my-contacts')); ?>';
        let conversationListURL = '<?php echo e(url('chat/conversations-list')); ?>';
        let archiveConversationListURL = '<?php echo e(url('chat/archive-conversations')); ?>';
        let chatSelected = false;
        let sendMessageURL = '<?php echo e(route('chat.conversations.store')); ?>';
        let fileUploadURL = '<?php echo e(route('chat.file-upload')); ?>';
        let imageUploadURL = '<?php echo e(route('chat.image-upload')); ?>';
        let csrfToken = '<?php echo e(csrf_token()); ?>';
        let authUserName = '<?php echo e(Auth::user()->name); ?>';
        let blockedUsersListURL = '<?php echo e(url('chat/blocked-users')); ?>';
        let blockUsersByMeURL = '<?php echo e(url('chat/users-blocked-by-me')); ?>';
        let readMessageURL = '<?php echo e(url('chat/read-message')); ?>';
        let authImgURL = '<?php echo e(Auth::user()->avatar); ?>';
        let deleteConversationUrl = '<?php echo e(url('chat/conversations')); ?>/';
        let deleteMessageUrl = '<?php echo e(url('chat/conversations/message')); ?>/';
        let createGroupURL = '<?php echo e(url('chat/groups')); ?>';
        let getUsers = '<?php echo e(url('chat/get-users')); ?>';
        let groupsList = '<?php echo e(url('chat/groups')); ?>';
        let appName = '<?php echo e(getAppName()); ?>';
        let conversationId = '<?php echo e($conversationId); ?>';
        let sendChatReqURL = '<?php echo e(route('chat.send-chat-request')); ?>';
        let acceptChatReqURL = '<?php echo e(route('chat.accept-chat-request')); ?>';
        let declineChatReqURL = '<?php echo e(route('chat.decline-chat-request')); ?>';
        let enableGroupSetting = '<?php echo e(isGroupChatEnabled()); ?>';
        let reportUserURL = '<?php echo e(route('chat.report-user.store')); ?>';

        /** Icons URL */
        let pdfURL = '<?php echo e(asset('assets/chat/icons/pdf.png')); ?>';
        let xlsURL = '<?php echo e(asset('assets/chat/icons/xls.png')); ?>';
        let textURL = '<?php echo e(asset('assets/chat/icons/text.png')); ?>';
        let docsURL = '<?php echo e(asset('assets/chat/icons/docs.png')); ?>';
        let videoURL = '<?php echo e(asset('assets/chat/icons/video.png')); ?>';
        let youtubeURL = '<?php echo e(asset('assets/chat/icons/youtube.png')); ?>';
        let audioURL = '<?php echo e(asset('assets/chat/icons/audio.png')); ?>';
        let isUTCTimezone  = '<?php echo e((config('app.timezone') == 'UTC') ? 1  :0); ?>';
        let timeZone  = '<?php echo e(config('app.timezone')); ?>';
    </script>
    <script src="<?php echo e(mix('assets/chat/js/chat.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('supperadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/connect.pk/resources/views/chat/index.blade.php ENDPATH**/ ?>