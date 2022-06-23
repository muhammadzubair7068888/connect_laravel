<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"><?php echo app('translator')->get('translation.Menu'); ?></li>
                <li>
                    <a href="supperadmin.index" class="waves-effect">
                        <i class="bx bx-home-alt"></i>
                        <span key="t-dashboards"><?php echo app('translator')->get('translation.Dashboards'); ?></span>
                    </a>
                </li>

                

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span key="t-contacts"><?php echo app('translator')->get('translation.Contacts'); ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="supperadmin.contacts-grid" key="t-user-grid"><?php echo app('translator')->get('translation.User_Grid'); ?></a></li>
                        <li><a href="supperadmin.contacts-list" key="t-user-list"><?php echo app('translator')->get('translation.User_List'); ?></a></li>

                    </ul>
                </li>

                <li>
                    <a href="supperadmin.apps-filemanager" class="waves-effect">
                        <i class="bx bx-file"></i>
                        
                        <span key="t-file-manager"><?php echo app('translator')->get('translation.File_Manager'); ?></span>
                    </a>
                </li>

                <li>
                    <a href="supperadmin.Exercises" class="waves-effect">
                        <i class="bx bx-cycling"></i>
                        <span key="t-chat"><?php echo app('translator')->get('Exercises'); ?></span>
                    </a>
                </li>

                <li>
                    <a href="supperadmin.track" class="waves-effect">
                        <i class="bx bx-trending-up"></i>
                        <span key="t-chat"><?php echo app('translator')->get('Tracks'); ?></span>
                    </a>
                </li>

                <li>
                    <a href="supperadmin.velocity" class="waves-effect">
                        <i class="bx bx-run"></i>
                        <span key="t-chat"><?php echo app('translator')->get('Velocity'); ?></span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-hourglass"></i>
                        <span key="t-contacts"><?php echo app('translator')->get('Assessments'); ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="supperadmin.physical_asseessment" key="t-user-grid"><?php echo app('translator')->get('Physical Assessment'); ?></a></li>
                        <li><a href="supperadmin.mechanical_asseessment" key="t-user-list"><?php echo app('translator')->get('Mechanical Assessment'); ?></a></li>

                    </ul>
                </li>

                <li>
                    <a href="supperadmin.question" class="waves-effect">
                        <i class="bx bx-question-mark"></i>
                        <span key="t-chat"><?php echo app('translator')->get('Questionnarie'); ?></span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-mail-send"></i>
                        <span key="t-email"><?php echo app('translator')->get('translation.Email'); ?></span>
                    </a>
                    <ul class="supperadmin.sub-menu" aria-expanded="false">
                        <li><a href="supperadmin.email-inbox" key="t-inbox"><?php echo app('translator')->get('translation.Inbox'); ?></a></li>
                        
                        <li>
                            <a href="javascript: void(0);">
                                <span class="badge rounded-pill badge-soft-success float-end"
                                    key="t-new"><?php echo app('translator')->get('translation.New'); ?></span>
                                <span key="t-email-templates"><?php echo app('translator')->get('translation.Templates'); ?></span>
                            </a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="supperadmin.email-template-basic"
                                        key="supperadmin.t-basic-action"><?php echo app('translator')->get('translation.Basic_Action'); ?></a></li>
                                <li><a href="supperadmin.email-template-alert"
                                        key="t-alert-email"><?php echo app('translator')->get('translation.Alert_Email'); ?></a></li>
                                <li><a href="supperadmin.email-template-billing"
                                        key="t-bill-email"><?php echo app('translator')->get('translation.Billing_Email'); ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>



                <li>
                    <a href="supperadmin.chat" class="waves-effect">
                        <i class="bx bx-chat"></i>
                        <span key="t-chat"><?php echo app('translator')->get('translation.Chat'); ?></span>
                    </a>
                </li>

                <li>
                    <a href="supperadmin.calendar" class="waves-effect">
                        <i class="bx bxs-calendar-event"></i>
                        <span key="t-dashboards"><?php echo app('translator')->get('translation.Calendars'); ?></span>
                    </a>
                </li>

                <li>
                    <a href="supperadmin.plugin.cards" class="waves-effect">
                        <i class="bx bx-plug"></i>
                        <span key="t-dashboards"><?php echo app('translator')->get('Plugin'); ?></span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-certification"></i>
                        <span key="t-contacts"><?php echo app('translator')->get('Template'); ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?php echo e(route('email')); ?>" key="t-profile"><?php echo app('translator')->get('Email'); ?></a></li>
                        <li><a href="#" key="t-profile"><?php echo app('translator')->get('SMS'); ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-brightness"></i>
                        <span key="t-contacts"><?php echo app('translator')->get('Settings'); ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="supperadmin.settings.site_setting" key="t-profile"><?php echo app('translator')->get('Site Setting'); ?></a>
                        </li>
                        <li><a href="<?php echo e(route('show_setting')); ?>" key="t-profile"><?php echo app('translator')->get('Company Setting'); ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-brightness"></i>
                        <span key="t-contacts"><?php echo app('translator')->get('General Settings'); ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="supperadmin.generalsettings.language" key="t-profile"><?php echo app('translator')->get('Languages'); ?></a></li>
                        <li><a href="supperadmin.generalsettings.currencie" key="Currencies"><?php echo app('translator')->get('Currencies'); ?></a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<?php /**PATH G:\laragon\www\Admin\resources\views\supperadmin\layouts\sidebar.blade.php ENDPATH**/ ?>