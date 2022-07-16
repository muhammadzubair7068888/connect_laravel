/******/ (function() { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************************!*\
  !*** ./resources/assets/chat/js/set-user-on-off.js ***!
  \*****************************************************/
window.setLastSeenOfUser = function (status) {
  $.ajax({
    type: 'post',
    url: setLastSeenURL,
    data: {
      status: status
    },
    success: function success(data) {}
  });
}; //set user status online


setLastSeenOfUser(1);

window.onbeforeunload = function () {
  Echo.leave('user-status');
  setLastSeenOfUser(0); //return undefined; to prevent dialog while window.onbeforeunload

  return undefined;
};

Echo.join("user-status");
/******/ })()
;