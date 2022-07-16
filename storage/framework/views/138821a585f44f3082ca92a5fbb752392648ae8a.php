<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"><?php echo app('translator')->get('translation.Menu'); ?></li>
                <li>
                    <a href="<?php echo e(route('chart.velocity')); ?>" class="waves-effect">
                        <i class="bx bx-home-alt"></i>
                        <span key="t-dashboards"><?php echo app('translator')->get('translation.Dashboards'); ?></span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('leaderboard')); ?>" class="waves-effect">
                        <i class="bx bx-building"></i>
                        <span key="t-dashboards"><?php echo app('translator')->get('LeaderBoard'); ?></span>
                    </a>
                </li>

                

                <?php if(auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin'): ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-user"></i>
                            <span key="t-contacts"><?php echo app('translator')->get('Users'); ?></span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?php echo e(route('user.grid.view')); ?>" key="t-user-grid"><?php echo app('translator')->get('translation.User_Grid'); ?></a></li>
                            <li><a href="<?php echo e(route('users')); ?>" key="t-user-list"><?php echo app('translator')->get('translation.User_List'); ?></a></li>

                        </ul>
                    </li>
                <?php endif; ?>

                <li>
                    <a href="<?php echo e(route('file')); ?>" class="waves-effect">
                        <i class="bx bx-file"></i>
                        
                        <span key="t-file-manager"><?php echo app('translator')->get('Files'); ?></span>
                    </a>
                </li>

                <?php if(auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin'): ?>
                    <li>
                        <a href="<?php echo e(route('exercises')); ?>" class="waves-effect">
                            <i class="bx bx-cycling"></i>
                            <span key="t-chat"><?php echo app('translator')->get('Exercises'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <li>
                    <a href="<?php echo e(route('tracks')); ?>" class="waves-effect">
                        <i class="bx bx-trending-up"></i>
                        <span key="t-chat"><?php echo app('translator')->get('Tracks'); ?></span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('velocity')); ?>" class="waves-effect">
                        <i class="bx bx-run"></i>
                        <span key="t-chat"><?php echo app('translator')->get('Velocity'); ?></span>
                    </a>
                </li>

                <?php if(auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin'): ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-hourglass"></i>
                            <span key="t-contacts"><?php echo app('translator')->get('Assessments'); ?></span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?php echo e(route('physical')); ?>" key="t-user-grid"><?php echo app('translator')->get('Physical Assessment'); ?></a></li>
                            <li><a href="<?php echo e(route('mechanical')); ?>" key="t-user-list"><?php echo app('translator')->get('Mechanical Assessment'); ?></a></li>

                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin'): ?>
                    <li>
                        <a href="<?php echo e(route('questionnaire')); ?>" class="waves-effect">
                            <i class="bx bx-question-mark"></i>
                            <span key="t-chat"><?php echo app('translator')->get('Questionnaire'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(auth()->user()->role == 'superadmin'): ?>
                    
                <?php endif; ?>

                <?php if(auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin'): ?>
                    <li>
                        <a href="<?php echo e(route('chat.conversations')); ?>" class="waves-effect">
                            <i class="bx bx-chat"></i>
                            <span key="t-chat"><?php echo app('translator')->get('translation.Chat'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <li>
                    <a href="<?php echo e(route('schedule.exercise')); ?>" class="waves-effect">
                        <i class="bx bxs-calendar-event"></i>
                        <span key="t-dashboards"><?php echo app('translator')->get('Schedule'); ?></span>
                    </a>
                </li>

                <?php if(auth()->user()->role == 'superadmin'): ?>
                    <li>
                        <a href="<?php echo e(route('plugin.cards')); ?>" class="waves-effect">
                            <i class="bx bx-plug"></i>
                            <span key="t-dashboards"><?php echo app('translator')->get('Plugin'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(auth()->user()->role == 'superadmin'): ?>
                    
                <?php endif; ?>

                <?php if(auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin'): ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-brightness"></i>
                            <span key="t-contacts"><?php echo app('translator')->get('Settings'); ?></span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?php echo e(route('site.setting')); ?>" key="t-profile"><?php echo app('translator')->get('Site Setting'); ?></a>
                            </li>
                            <li><a href="<?php echo e(route('show_setting')); ?>" key="t-profile"><?php echo app('translator')->get('Company Setting'); ?></a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(auth()->user()->role == 'superadmin'): ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-brightness"></i>
                            <span key="t-contacts"><?php echo app('translator')->get('General Settings'); ?></span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="#" key="t-profile"><?php echo app('translator')->get('Languages'); ?></a>
                            </li>
                            <li><a href="#" key="Currencies"><?php echo app('translator')->get('Currencies'); ?></a>
                            </li>
                            <li><a href="<?php echo e(route('email', ['template' => 'test-email'])); ?>"
                                    key="t-profile"><?php echo app('translator')->get('Email'); ?></a></li>
                        </ul>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<?php /**PATH /var/www/connect.pk/resources/views/supperadmin/layouts/sidebar.blade.php ENDPATH**/ ?>