/******/ (function() { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************************!*\
  !*** ./resources/assets/chat/js/admin/users/user.js ***!
  \******************************************************/
$(document).ready(function () {
  $('#filter_user').select2({
    minimumResultsForSearch: -1,
    placeholder: "Select Status (ALL)"
  });
  var tbl = $('#users_table').DataTable({
    processing: true,
    serverSide: true,
    'bStateSave': true,
    'order': [[1, 'asc']],
    ajax: {
      url: usersUrl,
      data: function data(_data) {
        _data.filter_user = $('#filter_user').find('option:selected').val();
      }
    },
    columnDefs: [{
      'targets': [0, 5, 6, 7],
      'orderable': false,
      'className': 'text-center',
      'width': '7%'
    }, {
      'targets': [4],
      'className': 'text-center',
      'width': '5%'
    }, {
      'targets': [3],
      'className': 'text-center',
      'width': '10%'
    }],
    columns: [{
      data: function data(row) {
        return ' <img src="' + row.avatar;
        '" class="user-avatar-img" alt="User Image">';
      },
      name: 'id',
      'searchable': false
    }, {
      data: function data(_data2) {
        return htmlSpecialCharsDecode(_data2.name);
      },
      name: 'name'
    }, {
      data: 'email',
      name: 'email'
    }, {
      data: 'phone',
      name: 'phone'
    }, {
      data: function data(_data3) {
        return htmlSpecialCharsDecode(_data3.role_name);
      },
      name: 'role_name',
      'searchable': false
    }, {
      data: function data(_data4) {
        return _data4.privacy ? 'Public' : 'Private';
      },
      name: 'privacy',
      'searchable': false
    }, {
      data: function data(row) {
        var checked = row.is_active === 0 ? '' : 'checked';
        return ' <label class="switch switch-label switch-outline-primary-alt">' + '<input name="is_active" data-id="' + row.id + '" class="switch-input is-active" type="checkbox" value="1" ' + checked + '>' + '<span class="switch-slider" data-checked="&#x2713;" data-unchecked="&#x2715;"></span>' + '</label>';
      },
      name: 'id'
    }, {
      data: function data(row) {
        var template = $.templates('#tmplAddChatUsersList');
        return template.render(row);
      },
      name: 'id'
    }],
    drawCallback: function drawCallback() {
      this.api().state.clear();
    },
    'fnInitComplete': function fnInitComplete() {
      $('#filter_user').change(function () {
        tbl.ajax.reload();
      });
    }
  });
  $('#createUserForm').on('submit', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#createBtnSave');
    loadingButton.button('loading');
    $.ajax({
      url: createUserUrl,
      type: 'post',
      data: new FormData($(this)[0]),
      processData: false,
      contentType: false,
      success: function success(result) {
        if (result.success) {
          displayToastr('Success', 'success', result.message);
          $('#create_user_modal').modal('hide');
          $('#users_table').DataTable().ajax.reload(null, false);
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
  $('#editUserForm').on('submit', function (event) {
    event.preventDefault();
    var loadingButton = jQuery(this).find('#editBtnSave');
    loadingButton.button('loading');
    var id = $('#edit_user_id').val();
    $.ajax({
      url: usersUrl + id + '/update',
      type: 'post',
      data: new FormData($(this)[0]),
      processData: false,
      contentType: false,
      success: function success(result) {
        if (result.success) {
          displayToastr('Success', 'success', result.message);
          $('#edit_user_modal').modal('hide');
          $('#users_table').DataTable().ajax.reload(null, false);
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
  $(document).on('click', '.edit-btn', function () {
    var userId = $(this).data('id');
    renderData(usersUrl + userId + '/edit');
  });

  window.renderData = function (url) {
    $.ajax({
      url: url,
      type: 'GET',
      // cache: false,
      success: function success(result) {
        if (result.success) {
          var user = result.data.user;
          $('#edit_user_id').val(user.id);
          $('#edit_name').val(htmlSpecialCharsDecode(user.name));
          $('#edit_email').val(user.email);
          $('#edit_phone').val(user.phone);
          $('#edit_is_active').val(user.is_active);
          $('#edit_role_id').val(user.role_id);
          $('#edit_upload-photo-img').attr('src', user.avatar);
          $('#edit_about').val(htmlSpecialCharsDecode(user.about));
          $('#edit_user_modal').modal('show');

          if (user.gender == 1) {
            $('#edit_male').prop('checked', true);
          }

          if (user.gender == 2) {
            $('#edit_female').prop('checked', true);
          }

          if (user.privacy == 1) {
            $('#editPrivacyPublic').prop('checked', true);
          } else {
            $('#editPrivacyPrivate').prop('checked', true);
          }
        }
      },
      error: function error(_error) {
        displayToastr('Error', 'error', _error.responseJSON.message);
      }
    });
  };

  var swalDelete = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-danger mr-2 btn-lg',
      cancelButton: 'btn btn-secondary btn-lg'
    },
    buttonsStyling: false
  }); // open delete confirmation model

  $(document).on('click', '.delete-btn', function (event) {
    var userId = $(this).data('id');
    deleteItem(usersUrl + userId, '#users_table', 'User');
  });

  function deleteItem(url, tableId, header) {
    var callFunction = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : null;
    swalDelete.fire({
      title: 'Are you sure?',
      html: 'Are you sure you want to delete this "' + header + '" ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Delete',
      input: 'text',
      inputPlaceholder: 'Write "delete" to delete this user',
      inputValidator: function inputValidator(value) {
        if (value !== "delete") {
          return 'You need to write "delete"';
        }
      }
    }).then(function (result) {
      if (result.value) {
        deleteItemAjax(url, tableId, header, callFunction = null);
      }
    });
  }

  $(document).on('click', '.archive-btn', function () {
    var userId = $(this).data('id');
    archiveItem(usersUrl + userId + '/archive', '#users_table', 'User');
  });

  function archiveItem(url, tableId, header) {
    var callFunction = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : null;
    swalDelete.fire({
      title: 'Are you sure?',
      input: 'text',
      inputPlaceholder: 'Write "archive" to archive this user',
      html: 'want to archive this "' + header + '" ? After archive all its conversations will be archive.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Archive',
      inputValidator: function inputValidator(value) {
        if (value !== "archive") {
          return 'You need to write "archive"';
        }
      }
    }).then(function (result) {
      if (result.value) {
        archiveItemAjax(url, tableId, header, callFunction = null);
      }
    });
  }

  window.archiveItemAjax = function (url, tableId, header) {
    var callFunction = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : null;
    $.ajax({
      url: url,
      type: 'DELETE',
      dataType: 'json',
      success: function success(obj) {
        if (obj.success) {
          $(tableId).DataTable().ajax.reload(null, false);
        }

        displayToastr('Success', 'success', obj.message);
      },
      error: function error(data) {
        displayToastr('Error', 'error', data.responseJSON.message);
      }
    });
  };

  $(document).on('click', '.restore-btn', function (event) {
    var userId = $(this).data('id');
    restoreItem(usersUrl + 'restore', '#users_table', 'User', userId);
  });

  function restoreItem(url, tableId, header, userId) {
    swal.fire({
      title: 'Are you sure?',
      html: 'want to restore this "' + header + '" ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Restore'
    }).then(function (result) {
      if (result.value) {
        restoreItemAjax(url, tableId, header, userId);
      }
    });
  }

  window.restoreItemAjax = function (url, tableId, header, userId) {
    $.ajax({
      url: url,
      type: 'POST',
      data: {
        'id': userId
      },
      dataType: 'json',
      success: function success(obj) {
        if (obj.success) {
          $(tableId).DataTable().ajax.reload(null, false);
        }

        displayToastr('Success', 'success', header + ' has been restored.');
      },
      error: function error(data) {
        displayToastr('Error', 'error', data.responseJSON.message);
      }
    });
  };

  $('#create_user_modal').on('hidden.bs.modal', function () {
    resetModalForm('#createUserForm', '#validationErrorsBox');
    $('#upload-photo-img').attr('src', defaultImageAvatar);
  });
  $('#edit_user_modal').on('hidden.bs.modal', function () {
    resetModalForm('#editUserForm', '#editValidationErrorsBox');
  });

  function resetModalForm(formId, validationBox) {
    $(formId)[0].reset();
    $(validationBox).hide();
  }

  function printErrorMessage(selector, errorMessage) {
    $(selector).show().html('');
    $(selector).append('<div>' + errorMessage + '</div>');
  } // listen user activation deactivation change event


  $(document).on('change', '.is-active', function (event) {
    var userId = $(event.currentTarget).data('id');
    activeDeActiveUser(userId);
  }); // activate de-activate user

  window.activeDeActiveUser = function (id) {
    $.ajax({
      url: usersUrl + id + '/active-de-active',
      method: 'post',
      cache: false,
      success: function success(result) {
        if (result.success) {
          $('#users_table').DataTable().ajax.reload(null, false);
        }
      }
    });
  };

  window.validatePasswordConfirmation = function () {
    var passwordConfirmation = $('#confirm_password').val();

    if (passwordConfirmation === '') {
      displayToastr('Error', 'error', 'The password confirmation field is required.');
      return false;
    }

    return true;
  };

  window.validateMatchPasswords = function () {
    var passwordConfirmation = $('#confirm_password').val();
    var password = $('#password').val();

    if (passwordConfirmation !== password) {
      displayToastr('Error', 'error', 'The password and password confirmation did not match.');
      return false;
    }

    return true;
  };

  window.validatePassword = function () {
    var password = $('#password').val();

    if (password === '') {
      displayToastr('Error', 'error', 'The password field is required.');
      return false;
    }

    return true;
  };
});
/******/ })()
;