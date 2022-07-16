<div class="chat-profile">
    <div class="chat-profile__header">
        <span class="chat-profile__about"><?php echo e(__('messages.about')); ?></span>
        <i class="fa fa-times chat-profile__close-btn"></i>
    </div>
    <div class="chat-profile__person chat-profile__person--active mb-2">
        <div class="chat-profile__avatar">
            <img src="<?php echo e(asset('assets/chat/images/avatar.png')); ?>" alt="" class="img-fluid user-about-image">
        </div>
    </div>

    <div class="chat-profile__person-status my-3 text-capitalize">
        <?php echo e(__('messages.online')); ?>

    </div>
    <div class="chat-profile__person-last-seen">
        <?php echo e(__('messages.last_seen_today')); ?>

    </div>
    <div class="user-profile-data">
        <div class="chat-profile__divider"></div>
        <div class="chat-profile__column">
            <h6 class="chat-profile__column-title"><?php echo e(__('messages.bio')); ?></h6>
            <p class="chat-profile__column-title-detail text-muted mb-0 user-about">
                <?php echo e(__('messages.dummy_about')); ?>

            </p>
        </div>
        <div class="chat-profile__divider"></div>
        <div class="chat-profile__column">
            <h6 class="chat-profile__column-title"><?php echo e(__('messages.phone')); ?></h6>
            <p class="chat-profile__column-title-detail text-muted mb-0 user-phone"><?php echo e(__('messages.dummy_phone_no')); ?></p>
        </div>
        <div class="chat-profile__divider"></div>
        <div class="chat-profile__column">
            <h6 class="chat-profile__column-title"><?php echo e(__('messages.email')); ?></h6>
            <p class="chat-profile__column-title-detail text-muted mb-0 user-email">test@chat.com</p>
        </div>
    </div>
    <div class="group-profile-data">
        <div class="chat-profile__divider"></div>
        <div class="chat-profile__column">
            <h6 class="chat-profile__column-title"><?php echo e(__('messages.discription')); ?></h6>
            <p class="chat-profile__column-title-detail text-muted mb-0 group-desc">
                <?php echo e(__('messages.dummy_about')); ?>

            </p>
        </div>
        <div class="chat-profile__divider"></div>
        <div class="chat-profile__column">
            <h6 class="chat-profile__column-title"><span class="group-users-count"></span>&nbsp;<?php echo e(__('messages.participants')); ?></h6>
            <p class="chat-profile__column-title-detail text-muted mb-0 group-participants">
            <div class="chat__person-box" data-id="3" data-is_group="0" id="user-3">
                <div class="position-relative chat__person-box-status-wrapper">
                    <div class="chat__person-box-status chat__person-box-status--online"></div>
                    <div class="chat__person-box-avtar chat__person-box-avtar--active">
                        <img src=""
                             alt="person image" class="user-avatar-img">
                    </div>
                </div>
                <div class="chat__person-box-detail">
                    <h5 class="mb-1 chat__person-box-name contact-name">Test 111</h5>
                </div>
            </div>
            <div class="chat__person-box" data-id="3" data-is_group="0" id="user-3">
                <div class="position-relative chat__person-box-status-wrapper">
                    <div class="chat__person-box-status chat__person-box-status--online"></div>
                    <div class="chat__person-box-avtar chat__person-box-avtar--active">
                        <img src=""
                             alt="person image" class="user-avatar-img">
                    </div>
                </div>
                <div class="chat__person-box-detail">
                    <h5 class="mb-1 chat__person-box-name contact-name">Test 111</h5>
                </div>
            </div>
            </p>
        </div>
    <input type="hidden" id="senderId">
    <div class="chat-profile__divider"></div>
    <div class="chat-profile__column">
        <h6 class="chat-profile__column-title"><?php echo e(__('messages.email')); ?></h6>
        <p class="chat-profile__column-title-detail text-muted mb-0 user-email">test@chat.com</p>
    </div>
    <!-- profile media and mute block section -->
    <div class="chat-profile__divider"></div>
    <div class="chat-profile__column chat-profile__column--media">
        <h6 class="chat-profile__column-title"><?php echo e(__('messages.media')); ?></h6>
        <div class="chat-profile__media-container">
            <span class="no-photo-found">No media shared yet...</span>

        </div>
    </div>

    <div class="chat-profile__column">

        <div class="switch-checkbox chat-profile__switch-checkbox">
            <input type="checkbox" id="switch" class="block-unblock-user-switch"/><label for="switch" class="mb-0 mr-2">Toggle</label>
            <span class="chat-profile__column-title-detail text-muted mb-0 block-unblock-span"><?php echo e(__('messages.block')); ?></span>
        </div>





    </div>
</div>
</div><?php /**PATH /var/www/connect.pk/resources/views/chat/chat_profile.blade.php ENDPATH**/ ?>
