const mix = require('laravel-mix');
 /*
  |--------------------------------------------------------------------------
  | Mix Asset Management
  |--------------------------------------------------------------------------
  |
  | Mix provides a clean, fluent API for defining some Webpack build steps
  | for your Laravel application. By default, we are compiling the Sass
  | file for the application as well as bundling up all the JS files.
  |
  */
 mix.copyDirectory('resources/assets/chat/images', 'public/assets/chat/images');
 mix.copyDirectory('resources/assets/chat/fonts', 'public/assets/chat/fonts');
 mix.copyDirectory('resources/assets/chat/icons', 'public/assets/chat/icons');

 mix.copy('node_modules/video.js/dist/video-js.css', 'public/assets/chat/css/video-js.css');
 mix.copy('node_modules/@coreui/coreui/dist/css/coreui.min.css', 'public/assets/chat/css/coreui.min.css');
 mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css', 'public/assets/chat/css/bootstrap.min.css');
 mix.copy('node_modules/simple-line-icons/css/simple-line-icons.css', 'public/assets/chat/css/simple-line-icons.css');
 mix.copy('node_modules/jquery-toast-plugin/dist/jquery.toast.min.css', 'public/assets/chat/css/jquery.toast.min.css');

 mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/assets/chat/js/jquery.min.js');
 mix.copy('node_modules/video.js/dist/video.min.js', 'public/assets/chat/js/video.min.js');
 mix.copy('node_modules/popper.js/dist/umd/popper.min.js', 'public/assets/chat/js/popper.min.js');
 mix.copy('node_modules/@coreui/coreui/dist/js/coreui.min.js', 'public/assets/chat/js/coreui.min.js');
 mix.copy('node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js', 'public/assets/chat/js/perfect-scrollbar.min.js');
 mix.copy('node_modules/bootstrap/dist/js/bootstrap.min.js', 'public/assets/chat/js/bootstrap.min.js');
 mix.copy('node_modules/jquery-toast-plugin/dist/jquery.toast.min.js', 'public/assets/chat/js/jquery.toast.min.js');
 mix.copy('node_modules/emojione/lib/js/emojione.min.js', 'public/assets/chat/js/emojione.min.js');
 mix.copy('node_modules/sweetalert2/dist/sweetalert2.all.min.js', 'public/assets/chat/js/sweetalert2.all.min.js');
 mix.copy('node_modules/icheck/', 'public/assets/chat/icheck/');

 mix.js('resources/assets/chat/js/app.js', 'public/assets/chat/js').
     js('resources/assets/chat/js/chat.js', 'public/assets/chat/js').
     js('resources/assets/chat/js/notification.js', 'public/assets/chat/js').
     js('resources/assets/chat/js/set_user_status.js', 'public/assets/chat/js').
     js('resources/assets/chat/js/profile.js', 'public/assets/chat/js').
     js('resources/assets/chat/js/custom.js', 'public/assets/chat/js').
     js('resources/assets/chat/js/auth-forms.js', 'public/assets/chat/js').
     js('resources/assets/chat/js/set-user-on-off.js', 'public/assets/chat/js').
     js('resources/assets/chat/js/admin/users/user.js',
         'public/assets/chat/js/admin/users').
     js('resources/assets/chat/js/admin/users/edit_user.js',
         'public/assets/chat/js/admin/users').
     js('resources/assets/chat/js/admin/roles/role.js',
         'public/assets/chat/js/admin/roles').
     js('resources/assets/chat/js/admin/reported_users/reported_users.js',
         'public/assets/chat/js/admin/reported_users').
     js('resources/assets/chat/js/custom-datatables.js',
         'public/assets/chat/js/custom-datatables.js');

 mix.sass('resources/assets/chat/sass/style.scss', 'public/assets/chat/css').
     sass('resources/assets/chat/sass/font-awesome.scss', 'public/assets/chat/css').
     sass('resources/assets/chat/sass/admin_panel.scss', 'public/assets/chat/css').
     sass('resources/assets/chat/landing-page-scss/scss/landing-page-style.scss', 'public/assets/chat/css').
     sass('resources/assets/chat/sass/new-conversation.scss', 'public/assets/chat/css');


// old way




// mix.js('resources/pos/js/app.js', 'public/js/pos.js')
//     .js('resources/pos/js/chart-config.js', 'public/js')
//     .sass('resources/pos/sass/app.scss', 'public/css/pos.css')
//     .mergeManifest();

// mix.disableNotifications();

// mix.version();
