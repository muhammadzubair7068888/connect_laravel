/******/ (function() { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************************!*\
  !*** ./resources/assets/chat/js/set_user_status.js ***!
  \*****************************************************/
function loadEmoji() {
  $('#userStatusEmoji').emojioneArea({
    standalone: true,
    autocomplete: false,
    saveEmojisAs: 'shortname',
    pickerPosition: 'right'
  });
}

loadEmoji();
$(document).on('click', '#setUserStatus', function (e) {
  e.preventDefault();
  var emojiShortName = $('#userStatusEmoji').data('emojioneArea').getText().trim();
  var emoji = emojione.shortnameToImage(emojiShortName);
  var data = {
    'emoji': emoji,
    'emoji_short_name': emojiShortName,
    'status': $('#userStatus').val()
  };
  $.ajax({
    type: 'post',
    url: setUserCustomStatusUrl,
    data: data,
    success: function success(data) {
      displayToastr('Success', 'success', data.message);
      $('#setCustomStatusModal').modal('hide');
    },
    error: function error(result) {
      displayToastr('Error', 'error', result.responseJSON.message);
    }
  });
});
$(document).on('click', '#clearUserStatus', function (e) {
  e.preventDefault();
  $.ajax({
    type: 'get',
    url: clearUserCustomStatusUrl,
    success: function success(data) {
      $('#userStatus').val('');
      $('#userStatusEmoji')[0].emojioneArea.setText('');
      displayToastr('Success', 'success', data.message);
      $('#setCustomStatusModal').modal('hide');
    },
    error: function error(result) {
      displayToastr('Error', 'error', result.responseJSON.message);
    }
  });
});

if (loggedInUserStatus != '' && loggedInUserStatus.hasOwnProperty('status')) {
  $('#userStatus').val(loggedInUserStatus.status);
  $('#userStatusEmoji')[0].emojioneArea.setText(loggedInUserStatus.emoji_short_name);
}
/******/ })()
;