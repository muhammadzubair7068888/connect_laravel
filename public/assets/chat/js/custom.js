/******/ (function() { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************************!*\
  !*** ./resources/assets/chat/js/custom.js ***!
  \********************************************/
window.displayToastr = function (heading, icon, message) {
  $.toast({
    heading: heading,
    text: message,
    showHideTransition: 'slide',
    icon: icon,
    position: 'top-right'
  });
};

window.htmlSpecialCharsDecode = function (string) {
  return jQuery('<div />').html(string).text();
};

window.setLocalStorageItem = function (variable, data) {
  localStorage.setItem(variable, data);
};

window.getLocalStorageItem = function (variable) {
  return localStorage.getItem(variable);
};

window.removeLocalStorageItem = function (variable) {
  localStorage.removeItem(variable);
};
/** Change Password */


$('#changePasswordForm').on('submit', function (event) {
  event.preventDefault();
  var loadingButton = jQuery(this).find('#btnEditSave');
  loadingButton.button('loading');
  $.ajax({
    url: changePasswordURL,
    type: 'POST',
    data: new FormData($(this)[0]),
    processData: false,
    contentType: false,
    success: function success(result) {
      if (result.success) {
        displayToastr('Success', 'success', result.message);
        setTimeout(function () {
          location.reload();
        }, 2000);
      }
    },
    error: function error(result) {
      displayToastr('Error', 'error', result.responseJSON.message);
    },
    complete: function complete() {
      loadingButton.button('reset');
    }
  });
});

window.avoidSpace = function (event) {
  var k = event ? event.which : window.event.keyCode;

  if (k === 32) {
    event.stopPropagation();
    return false;
  }
};

window.resetModalForm = function (formId, validationBox) {
  $(formId)[0].reset();
  $(validationBox).hide();
};

window.deleteItemAjax = function (url, tableId, header) {
  var callFunction = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : null;
  $.ajax({
    url: url,
    type: 'DELETE',
    dataType: 'json',
    success: function success(obj) {
      if (obj.success) {
        $(tableId).DataTable().ajax.reload(null, false);
      }

      displayToastr('Success', 'success', header + ' has been deleted.');
    },
    error: function error(data) {
      displayToastr('Error', 'error', data.responseJSON.message);
    }
  });
};
/******/ })()
;