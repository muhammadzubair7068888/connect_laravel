@extends('supperadmin.layouts.master')
@section('title')
    {{ __('messages.conversations') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/chat/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/chat/css/ekko-lightbox.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/chat/css/video-js.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/chat/css/new-conversation.css') }}">
    {{--    <link href="https://www.jsviews.com/samples/samples.css" rel="stylesheet" />--}}
    <link rel="stylesheet" href="{{ mix('assets/chat/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
    <link rel="stylesheet" href="{{ mix('assets/chat/css/coreui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/chat/icheck/skins/all.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/chat/css/jquery.toast.min.css') }}">
    <script src="{{ mix('assets/chat/js/jquery.min.js') }}"></script>

    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>

    <link rel="stylesheet" href="{{ mix('assets/chat/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/emojionearea.min.css') }}">
    @yield('page_css')
    <link rel="stylesheet" href="{{ mix('assets/chat/css/style.css') }}">
@endsection
@section('content')
    <div class="page-container">
        <div class="chat-container chat">
            <div class="chat__inner">
                <!-- left section of chat area (chat person selection area) -->
                <div class="chat__people-wrapper chat__people-wrapper--responsive">
                    <div class="chat__people-wrapper-header">
                        <span class="h3 mb-0">{{ __('messages.conversations') }}</span>
                        <div class="d-flex chat__people-wrapper-btn-group">
                            <i class="nav-icon fa fa-bars align-top chat__people-wrapper-bar"></i>
                            @if($enableGroupSetting == 1)
                            <div class="chat__people-wrapper-button btn-create-group mr-2" data-bs-toggle="modal"
                                 data-bs-target="#createNewGroup">
                                <i class="nav-icon group-icon color-green" data-toggle="tooltip"
                                   data-placement="bottom"
                                   title="{{ __('messages.create_new_group') }}"><img
                                            src="{{asset('assets/chat/icons/group30.png')}}"></i>
                            </div>
                            @endif
                            <div class="chat__people-wrapper-button" data-bs-toggle="modal"
                            data-bs-backdrop="" data-bs-target="#addNewChat">
                                <i class="nav-icon " data-toggle="tooltip" data-placement="bottom"
                                   title="{{ __('messages.new_conversation') }}"><img
                                            src="{{asset('assets/chat/icons/chat30.png')}}"></i>
                            </div>
                        </div>
                    </div>
                    <div class="chat__search-wrapper">
                        <div class="chat__search clearfix chat__search--responsive">
                            <i class="fa fa-search"></i>
                            <input type="search" placeholder="{{ __('messages.search') }}" class="chat__search-input"
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
                                @include('chat.partials.infy-loader')
                            </div>
                            <div class="text-center no-conversation">
                                <div class="chat__no-conversation">
                                    <div class="text-center"><i class="fa fa-2x fa-user" aria-hidden="true"></i></div>
                                    {{ __('messages.no_conversation_found') }}
                                </div>
                            </div>
                        </div>
                        <div class="chat__people-body tab-pane fade in active" id="archivePeopleBody">
                            <div class="text-center no-archive-conversation">
                                <div class="chat__no-archive-conversation">
                                    <div class="text-center"><i class="fa fa-2x fa-user" aria-hidden="true"></i></div>
                                    {{ __('messages.no_conversation_found') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ left section of chat area -->


                <!-- right section of chat area (chat conversation area)-->
                <div class="chat__area-wrapper">
                    @include('chat.no-chat')
                </div>
                <!--/ right section of chat area-->

                <!-- profile section (chat profile section)-->
            @include('chat.chat_profile')
            @include('chat.msg_info')
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
                            <i class="ti-user"></i>New Conversations @if($enableGroupSetting == 1) / Groups @endif</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            &times;
                        </button>
                    </div>
                    <div class="modal-body">
                        <nav class="nav nav-tabs" id="myTab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-my-contacts-tab" data-bs-toggle="tab"
                               href="#nav-my-contacts" role="tab" aria-controls="nav-my-contacts-tab"
                               aria-expanded="true"> <i class="ti-user"></i>{{ __('messages.my_contacts') }}</a> <a
                                    class="nav-item nav-link wrap-text" id="nav-users-tab" data-bs-toggle="tab"
                                    href="#nav-users"
                                    role="tab" aria-controls="nav-users" aria-expanded="true">
                                <i class="ti-user"></i>{{ __('messages.new_conversation') }}
                            </a>
                            @if($enableGroupSetting == 1)
                            <a
                                    class="nav-item nav-link" id="nav-groups-tab" data-bs-toggle="tab" href="#nav-groups"
                                    role="tab" aria-controls="nav-groups">{{ __('messages.group.groups') }}</a>
                            @endif
                                <a
                                    class="nav-item nav-link" id="nav-blocked-users-tab" data-bs-toggle="tab"
                                    href="#nav-blocked-users" role="tab"
                                    aria-controls="nav-blocked-users">{{ __('messages.blocked_users') }}</a>
                        </nav>

                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-my-contacts" role="tabpanel"
                                 aria-labelledby="nav-my-contacts-tab">
                                <form class="mb-2">
                                    <input type="search" class="form-control search-input" id="searchMyContactForChat"
                                           placeholder="{{ __('messages.search') }}...">
                                </form>
                                <div class="form-group">
                                    <div class="col-sm-12 d-flex justify-content-around">
                                        <div class="custom-control custom-checkbox">
                                            <input name="my_contacts_filter" value="1" type="checkbox" class="custom-control-input group-type" id="male">
                                            <label class="custom-control-label" for="male">{{ __('messages.male') }}</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input name="my_contacts_filter" value="2" type="checkbox" class="custom-control-input group-type" id="female">
                                            <label class="custom-control-label" for="female">{{ __('messages.female') }}</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input name="my_contacts_filter" value="3" type="checkbox" class="custom-control-input group-type" id="online">
                                            <label class="custom-control-label" for="online">{{ __('messages.online') }}</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input name="my_contacts_filter" value="4" type="checkbox" class="custom-control-input group-type" id="offline">
                                            <label class="custom-control-label" for="offline">{{ __('messages.offline') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div id="myContactListForAddPeople">
                                    <ul class="list-group user-list-chat-select" id="myContactListForChat"></ul>
                                    <div class="text-center no-my-contact new-conversation__no-my-contact">
                                        <div class="chat__not-selected">
                                            <div class="text-center"><i class="fa fa-2x fa-user" aria-hidden="true"></i>
                                            </div>
                                            {{ __('messages.no_user_found') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-users" role="tabpanel" aria-labelledby="nav-users-tab">
                                <form class="mb-2">
                                    <input type="search" class="form-control search-input" id="searchContactForChat"
                                           placeholder="{{ __('messages.search') }}...">
                                </form>
                                <div class="form-group">
                                    <div class="col-sm-12 d-flex justify-content-around">
                                        <div class="custom-control custom-checkbox">
                                            <input name="new_contact_gender" value="1" type="checkbox" class="custom-control-input group-type" id="newContactMale">
                                            <label class="custom-control-label" for="newContactMale">{{ __('messages.male') }}</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input name="new_contact_gender" value="2" type="checkbox" class="custom-control-input group-type" id="newContactFemale">
                                            <label class="custom-control-label" for="newContactFemale">{{ __('messages.female') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div id="userListForAddPeople">
                                    <ul class="list-group user-list-chat-select" id="userListForChat"></ul>
                                    <div class="text-center no-user new-conversation__no-user">
                                        <div class="chat__not-selected">
                                            <div class="text-center"><i class="fa fa-2x fa-user" aria-hidden="true"></i>
                                            </div>
                                            {{ __('messages.no_user_found') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($enableGroupSetting == 1)
                            <div class="tab-pane fade" id="nav-groups" role="tabpanel" aria-labelledby="nav-groups-tab">
                                <form class="mb-2">
                                    <input type="search" class="form-control search-input" id="searchGroupsForChat"
                                           placeholder="{{ __('messages.search') }}...">
                                </form>
                                <div id="divGroupListForChat">
                                    <ul class="list-group user-list-chat-select" id="groupListForChat"></ul>
                                    <div class="text-center no-group new-conversation__no-group">
                                        <div class="chat__not-selected">
                                            <div class="text-center"><i class="fa fa-2x fa-users"
                                                                        aria-hidden="true"></i>
                                            </div>
                                            {{ __('messages.no_group_found') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="tab-pane fade show" id="nav-blocked-users" role="tabpanel"
                                 aria-labelledby="nav-blocked-users-tab">
                                <form class="mb-2">
                                    <input type="search" class="form-control search-input" id="searchBlockUsers"
                                           placeholder="{{ __('messages.search') }}...">
                                </form>
                                <div id="divOfBlockedUsers">
                                    <ul class="list-group user-list-chat-select" id="blockedUsersList"></ul>
                                    <div class="text-center no-blocked-user new-conversation__no-user">
                                        <div class="chat__not-selected">
                                            <div class="text-center"><i class="fa fa-2x fa-user" aria-hidden="true"></i>
                                            </div>
                                            <span id="noBlockedUsers">{{ __('messages.no_blocked_user_found') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('chat.group_modals')
        @include('chat.report_user_modal')
    </div>
    @include('chat.templates.conversation-template')
    @include('chat.templates.message')
    @include('chat.templates.no-messages-yet')
    @include('chat.templates.no-conversation')
    @include('chat.templates.group_details')
    @include('chat.templates.user_details')
    @include('chat.templates.group_listing')
    @include('chat.templates.group_members')
    @include('chat.templates.single_group_member')
    @include('chat.group_members_modal')
    @include('chat.templates.blocked_users_list')
    @include('chat.templates.add_chat_users_list')
    @include('chat.templates.badge_message_template')
    @include('chat.templates.member_options')
    @include('chat.templates.single_message')
    @include('chat.templates.contact_template')
    @include('chat.templates.conversations_list')
    @include('chat.templates.common_templates')
    @include('chat.templates.my_contacts_listing')
    @include('chat.templates.conversation-request')
    @include('chat.copyImageModal')
    @include('chat.partials.file-upload');
@endsection
@section('page_js')
    <script src="{{ asset('js/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/ekko-lightbox.min.js') }}"></script>
    <script src="{{ mix('assets/chat/js/video.min.js') }}"></script>
@endsection
@section('scripts')
{{-- <script src="{{ mix('assets/chat/js/popper.min.js') }}"></script> --}}
{{-- <script src="{{ mix('assets/chat/js/bootstrap.min.js') }}"></script> --}}
{{-- <script src="{{ mix('assets/chat/js/coreui.min.js') }}"></script> --}}
<script src="{{ mix('assets/chat/js/jquery.toast.min.js') }}"></script>
<script src="{{ mix('assets/chat/js/sweetalert2.all.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<script src="{{ asset('js/moment.min.js') }}"></script>
<script src="{{ asset('js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('assets/chat/icheck/icheck.min.js') }}"></script>
<script src="https://www.jsviews.com/download/jsviews.min.js"></script>
<script src="{{ asset('js/emojionearea.js') }}"></script>
<script src="{{ mix('assets/chat/js/emojione.min.js') }}"></script>
    <!--custom js-->
    <script>
        let userURL = '{{url('chat/users')}}/';
        let userListURL = '{{url('chat/users-list')}}';
        let myContactsURL = '{{route('chat.my-contacts')}}';
        let conversationListURL = '{{url('chat/conversations-list')}}';
        let archiveConversationListURL = '{{url('chat/archive-conversations')}}';
        let chatSelected = false;
        let sendMessageURL = '{{route('chat.conversations.store')}}';
        let fileUploadURL = '{{route('chat.file-upload')}}';
        let imageUploadURL = '{{route('chat.image-upload')}}';
        let csrfToken = '{{csrf_token()}}';
        let authUserName = '{{ Auth::user()->name }}';
        let blockedUsersListURL = '{{url('chat/blocked-users')}}';
        let blockUsersByMeURL = '{{url('chat/users-blocked-by-me')}}';
        let readMessageURL = '{{url('chat/read-message')}}';
        let authImgURL = '{{Auth::user()->avatar}}';
        let deleteConversationUrl = '{{url('chat/conversations')}}/';
        let deleteMessageUrl = '{{url('chat/conversations/message')}}/';
        let createGroupURL = '{{url('chat/groups')}}';
        let getUsers = '{{url('chat/get-users')}}';
        let groupsList = '{{url('chat/groups')}}';
        let appName = '{{ getAppName() }}';
        let conversationId = '{{ $conversationId }}';
        let sendChatReqURL = '{{route('chat.send-chat-request')}}';
        let acceptChatReqURL = '{{route('chat.accept-chat-request')}}';
        let declineChatReqURL = '{{route('chat.decline-chat-request')}}';
        let enableGroupSetting = '{{ isGroupChatEnabled() }}';
        let reportUserURL = '{{route('chat.report-user.store')}}';

        /** Icons URL */
        let pdfURL = '{{ asset('assets/chat/icons/pdf.png') }}';
        let xlsURL = '{{ asset('assets/chat/icons/xls.png') }}';
        let textURL = '{{ asset('assets/chat/icons/text.png') }}';
        let docsURL = '{{ asset('assets/chat/icons/docs.png') }}';
        let videoURL = '{{ asset('assets/chat/icons/video.png') }}';
        let youtubeURL = '{{ asset('assets/chat/icons/youtube.png') }}';
        let audioURL = '{{ asset('assets/chat/icons/audio.png') }}';
        let isUTCTimezone  = '{{(config('app.timezone') == 'UTC') ? 1  :0 }}';
        let timeZone  = '{{config('app.timezone')}}';
    </script>
    <script src="{{ mix('assets/chat/js/chat.js') }}"></script>
@endsection
