<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Connect</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/logo.png') }}">
    @include('supperadmin.layouts.head-css')
    @yield('page_css')
</head>

@section('body')

    <body data-sidebar="dark">
    @show
    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('supperadmin.layouts.topbar')
        @include('supperadmin.layouts.sidebar')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('supperadmin.layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    @include('supperadmin.layouts.right-sidebar')
    <!-- /Right-bar -->

    <!-- JAVASCRIPT -->
    @include('supperadmin.layouts.vendor-scripts')
    <!-- jQuery 3.1.1 -->
{{-- <script src="{{ mix('assets/chat/js/popper.min.js') }}"></script> --}}
{{-- <script src="{{ mix('assets/chat/js/bootstrap.min.js') }}"></script>1 --}}
{{-- <script src="{{ mix('assets/chat/js/coreui.min.js') }}"></script> --}}
{{-- <script src="{{ mix('assets/chat/js/jquery.toast.min.js') }}"></script> --}}
{{-- <script src="{{ mix('assets/chat/js/sweetalert2.all.min.js') }}"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script> --}}
{{-- <script src="{{ asset('js/moment.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/moment-timezone.min.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/chat/icheck/icheck.min.js') }}"></script> --}}
<script src="https://www.jsviews.com/download/jsviews.min.js"></script>
<script src="{{ asset('js/emojionearea.js') }}"></script>
<script src="{{ mix('assets/chat/js/emojione.min.js') }}"></script>
    @yield('page_js')
    <script>
        let setLastSeenURL = '{{url('chat/update-last-seen')}}';
        let pusherKey = '{{ config('broadcasting.connections.pusher.key') }}';
        let pusherCluster = '{{ config('broadcasting.connections.pusher.options.cluster') }}';
        let messageDeleteTime = '{{ config('configurable.delete_message_time') }}';
        let changePasswordURL = '{{ url('chat/change-password') }}';
        // let baseURL = '{{ url('/storage/users') }}';
        let conversationsURL = '{{ route('chat.conversations') }}';
        let notifications = JSON.parse(JSON.stringify({!! json_encode(getNotifications()) !!}));
        let loggedInUserId = '{{Auth::id()}}';
        let loggedInUserStatus = '{!! Auth::user()->userStatus !!}';
        if (loggedInUserStatus != '') {
            loggedInUserStatus = JSON.parse(JSON.stringify({!! Auth::user()->userStatus !!}));
        }
        let setUserCustomStatusUrl = '{{ route('chat.set-user-status') }}';
        let clearUserCustomStatusUrl = '{{ route('chat.clear-user-status') }}';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
        });
        (function ($) {
            $.fn.button = function (action) {
                if (action === 'loading' && this.data('loading-text')) {
                    this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
                }
                if (action === 'reset' && this.data('original-text')) {
                    this.html(this.data('original-text')).prop('disabled', false);
                }
            };
        }(jQuery));
    </script>
    <script src="{{ mix('assets/chat/js/app.js') }}"></script>
    <script src="{{ mix('assets/chat/js/custom.js') }}"></script>
    <script src="{{ mix('assets/chat/js/notification.js') }}"></script>
    <script src="{{ mix('assets/chat/js/set_user_status.js') }}"></script>
    <script src="{{ mix('assets/chat/js/set-user-on-off.js') }}"></script>
    @yield('scripts')
</body>

</html>
