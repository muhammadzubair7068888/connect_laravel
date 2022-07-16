/******/ (function() { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************************************************!*\
  !*** ./resources/assets/chat/js/admin/reported_users/reported_users.js ***!
  \*************************************************************************/
$(document).ready(function () {
  var tbl = $('#reportedUsersTable').DataTable({
    processing: true,
    serverSide: true,
    'bStateSave': true,
    'order': [[2, 'desc']],
    ajax: {
      url: reportedUsersUrl
    },
    columnDefs: [{
      'targets': [3, 4],
      'orderable': false,
      'className': 'text-center',
      'width': '7%'
    }, {
      'targets': [2],
      'width': '10%'
    }],
    columns: [{
      data: function data(_data) {
        return htmlSpecialCharsDecode(_data.reported_by.name);
      },
      name: 'reported_by.name'
    }, {
      data: function data(_data2) {
        return htmlSpecialCharsDecode(_data2.reported_to.name);
      },
      name: 'reported_to.name'
    }, {
      data: function data(row) {
        return row;
      },
      render: function render(row) {
        return '<span data-toggle="tooltip" title="' + format(row.created_at, 'hh:mm:ss a') + '">' + format(row.created_at) + '</span>';
      },
      name: 'created_at'
    }, {
      data: function data(row) {
        if (row.reported_to.id == loggedInUserId) {
          return row.reported_to.is_active ? 'Active' : 'Deactive';
        }

        row.checked = row.reported_to.is_active === 0 ? '' : 'checked';
        return $.templates('#isActiveSwitch').render(row);
      },
      name: 'id'
    }, {
      data: function data(row) {
        return $.templates('#viewDelIcons').render(row);
      },
      name: 'id'
    }],
    drawCallback: function drawCallback() {
      this.api().state.clear();
      $('[data-toggle="tooltip"]').tooltip();
    }
  });

  window.format = function (dateTime) {
    var format = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'DD-MMM-YYYY';
    return moment(dateTime).format(format);
  };

  var swalDelete = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-danger mr-2 btn-lg',
      cancelButton: 'btn btn-secondary btn-lg'
    },
    buttonsStyling: false
  }); // open delete confirmation model

  $(document).on('click', '.delete-btn', function () {
    var reportedUsersId = $(this).data('id');
    var deleteReportedUsersUrl = reportedUsersUrl + '/' + reportedUsersId;
    deleteItem(deleteReportedUsersUrl, '#reportedUsersTable', 'Reported User');
  });
  $(document).on('click', '.view-btn', function () {
    var reportId = $(this).data('id');
    var viewReportedUsersUrl = reportedUsersUrl + '/' + reportId;
    $.ajax({
      type: 'GET',
      url: viewReportedUsersUrl,
      success: function success(data) {
        $('.reported-user-notes').html(data.notes);
        $('.reported-by').text(data.reported_by.name);
        $('.reported-to').text(data.reported_to.name);
        $('#viewReportNoteModal').modal('show');
      }
    });
  });

  function deleteItem(url, tableId, header) {
    var callFunction = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : null;
    swalDelete.fire({
      title: 'Are you sure?',
      html: 'you want to delete this record ?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Delete'
    }).then(function (result) {
      if (result.value) {
        deleteItemAjax(url, tableId, header, callFunction = null);
      }
    });
  } // listen user activation deactivation change event


  $(document).on('change', '.is-active', function (event) {
    var userId = $(event.currentTarget).data('id');
    activeDeActiveUser(userId);
  }); // activate de-activate user

  window.activeDeActiveUser = function (id) {
    $.ajax({
      url: usersUrl + '/' + id + '/active-de-active',
      method: 'post',
      cache: false,
      success: function success(result) {
        if (result.success) {
          tbl.ajax.reload(null, false);
        }
      },
      error: function error(_error) {
        displayToastr('Error', 'error', _error.responseJSON.message);
      }
    });
  };
});
/******/ })()
;