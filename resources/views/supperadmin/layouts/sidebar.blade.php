<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('translation.Menu')</li>
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-alt"></i>{{-- <span class="badge rounded-pill bg-info float-end">04</span> --}}
                        <span key="t-dashboards">@lang('translation.Dashboards')</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('leaderboard') }}" class="waves-effect">
                        <i class="bx bx-building"></i>{{-- <span class="badge rounded-pill bg-info float-end">04</span> --}}
                        <span key="t-dashboards">@lang('LeaderBoard')</span>
                    </a>
                </li>

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts">@lang('translation.Layouts')</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical">@lang('translation.Vertical')</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-light-sidebar" key="t-light-sidebar">@lang('translation.Light_Sidebar')</a></li>
                                <li><a href="layouts-compact-sidebar" key="t-compact-sidebar">@lang('translation.Compact_Sidebar')</a></li>
                                <li><a href="layouts-icon-sidebar" key="t-icon-sidebar">@lang('translation.Icon_Sidebar')</a></li>
                                <li><a href="layouts-boxed" key="t-boxed-width">@lang('translation.Boxed_Width')</a>
                                </li>
                                <li><a href="layouts-preloader" key="t-preloader">@lang('translation.Preloader')</a>
                                </li>
                                <li><a href="layouts-colored-sidebar" key="t-colored-sidebar">@lang('translation.Colored_Sidebar')</a>
                                </li>
                                <li><a href="layouts-scrollable" key="t-scrollable">@lang('translation.Scrollable')</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow"
                                key="t-horizontal">@lang('translation.Horizontal')</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-horizontal" key="t-horizontal">@lang('translation.Horizontal')</a>
                                </li>
                                <li><a href="layouts-hori-topbar-light" key="t-topbar-light">@lang('translation.Topbar_Light')</a></li>
                                <li><a href="layouts-hori-boxed-width" key="t-boxed-width">@lang('translation.Boxed_Width')</a></li>
                                <li><a href="layouts-hori-preloader" key="t-preloader">@lang('translation.Preloader')</a></li>
                                <li><a href="layouts-hori-colored-header" key="t-colored-topbar">@lang('translation.Colored_Header')</a>
                                </li>
                                <li><a href="layouts-hori-scrollable" key="t-scrollable">@lang('translation.Scrollable')</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}

                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-user"></i>
                            <span key="t-contacts">@lang('translation.Contacts')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('user.grid.view') }}" key="t-user-grid">@lang('translation.User_Grid')</a></li>
                            <li><a href="{{ route('users') }}" key="t-user-list">@lang('translation.User_List')</a></li>

                        </ul>
                    </li>
                @endif

                <li>
                    <a href="supperadmin.apps-filemanager" class="waves-effect">
                        <i class="bx bx-file"></i>
                        {{-- <span class="badge rounded-pill bg-success float-end" key="t-new">@lang('translation.New')</span> --}}
                        <span key="t-file-manager">@lang('translation.File_Manager')</span>
                    </a>
                </li>

                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin')
                    <li>
                        <a href="{{ route('exercises') }}" class="waves-effect">
                            <i class="bx bx-cycling"></i>
                            <span key="t-chat">@lang('Exercises')</span>
                        </a>
                    </li>
                @endif

                <li>
                    <a href="{{ route('tracks') }}" class="waves-effect">
                        <i class="bx bx-trending-up"></i>
                        <span key="t-chat">@lang('Tracks')</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('velocity') }}" class="waves-effect">
                        <i class="bx bx-run"></i>
                        <span key="t-chat">@lang('Velocity')</span>
                    </a>
                </li>

                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-hourglass"></i>
                            <span key="t-contacts">@lang('Assessments')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('physical') }}" key="t-user-grid">@lang('Physical Assessment')</a></li>
                            <li><a href="{{ route('mechanical') }}" key="t-user-list">@lang('Mechanical Assessment')</a></li>

                        </ul>
                    </li>
                @endif

                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin')
                    <li>
                        <a href="{{ route('questionnaire') }}" class="waves-effect">
                            <i class="bx bx-question-mark"></i>
                            <span key="t-chat">@lang('Questionnaire')</span>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->role == 'superadmin')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-mail-send"></i>
                            <span key="t-email">@lang('translation.Email')</span>
                        </a>
                        <ul class="supperadmin.sub-menu" aria-expanded="false">
                            <li><a href="supperadmin.email-inbox" key="t-inbox">@lang('translation.Inbox')</a></li>
                            {{-- <li><a href="email-read" key="t-read-email">@lang('translation.Read_Email')</a></li> --}}
                            <li>
                                <a href="javascript: void(0);">
                                    <span class="badge rounded-pill badge-soft-success float-end"
                                        key="t-new">@lang('translation.New')</span>
                                    <span key="t-email-templates">@lang('translation.Templates')</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="true">
                                    <li><a href="supperadmin.email-template-basic"
                                            key="supperadmin.t-basic-action">@lang('translation.Basic_Action')</a></li>
                                    <li><a href="supperadmin.email-template-alert"
                                            key="t-alert-email">@lang('translation.Alert_Email')</a></li>
                                    <li><a href="supperadmin.email-template-billing"
                                            key="t-bill-email">@lang('translation.Billing_Email')</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin')
                    <li>
                        <a href="{{ route('chat') }}" class="waves-effect">
                            <i class="bx bx-chat"></i>
                            <span key="t-chat">@lang('translation.Chat')</span>
                        </a>
                    </li>
                @endif

                <li>
                    <a href="supperadmin.calendar" class="waves-effect">
                        <i class="bx bxs-calendar-event"></i>
                        <span key="t-dashboards">@lang('translation.Calendars')</span>
                    </a>
                </li>

                @if (auth()->user()->role == 'superadmin')
                    <li>
                        <a href="{{ route('plugin.cards') }}" class="waves-effect">
                            <i class="bx bx-plug"></i>
                            <span key="t-dashboards">@lang('Plugin')</span>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->role == 'superadmin')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-certification"></i>
                            <span key="t-contacts">@lang('Template')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('email', ['template' => 'test-email']) }}"
                                    key="t-profile">@lang('Email')</a></li>
                            {{-- <li><a href="#" key="t-profile">@lang('SMS')</a></li> --}}
                        </ul>
                    </li>
                @endif

                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'superadmin')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-brightness"></i>
                            <span key="t-contacts">@lang('Settings')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="supperadmin.settings.site_setting" key="t-profile">@lang('Site Setting')</a>
                            </li>
                            <li><a href="{{ route('show_setting') }}" key="t-profile">@lang('Company Setting')</a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (auth()->user()->role == 'superadmin')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-brightness"></i>
                            <span key="t-contacts">@lang('General Settings')</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="supperadmin.generalsettings.language" key="t-profile">@lang('Languages')</a>
                            </li>
                            <li><a href="supperadmin.generalsettings.currencie"
                                    key="Currencies">@lang('Currencies')</a>
                            </li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
