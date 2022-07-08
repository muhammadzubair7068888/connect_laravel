var trackTable;
var exerciseTable;
var velocityTable;
var userTable;
var assessmentConfigTable;
var questionConfigTable;
var calendar;
var addMenuEvent = false;
var addMenuEventX = 0;
var addMenuEventY = 0;
var uploaded = false;
var ctrlKey = false;
$(document).ready(function () {
    $('#calendar-user').on('change', function () {
        $.ajax({
            url: get_schedule_url,
            type: 'get',
            data: { flag: 'get-events', id: $(this).val() },
            dataType: 'json',
            success: function (data) {
                initCalendar(data);
            }
        });
    });
    $('#calendar-user').trigger('change');
    $(document).bind("contextmenu", function (event) {
        if ($(event.target).closest('table').hasClass('fc-scrollgrid-sync-table')) {
            event.preventDefault();
            addMenuEvent = true;
            addMenuEventX = event.pageX;
            addMenuEventY = event.pageY;
            if ($(event.target).closest('.fc-event-main').length === 0) {
                var date = $(event.target).closest('.fc-day').data('date');
                if (typeof window.clipboardDates === 'undefined') {
                    $(".custom-menu.add-menu").find('li[data-action="paste"]').hide(50);
                } else {
                    $(".custom-menu.add-menu").find('li[data-action="paste"]').show(50);
                }
                $(".custom-menu.add-menu").data('date', date).finish().toggle(100).css({
                    top: event.pageY + "px",
                    left: event.pageX + "px"
                });
            } else {
                $(event.target).closest('.fc-event-main').trigger('click');
            }
        }
    });

    // If the document is clicked somewhere
    $(document).bind("mousedown", function (e) {
        if (!$(e.target).parents(".custom-menu").length > 0) {
            $(".custom-menu").hide(100);
            addMenuEvent = false;
        }
    });

    // If the menu element is clicked
    $(".custom-menu li").click(function () {
        addMenuEvent = false;
        switch ($(this).attr("data-action")) {
            case 'add-schedule':
                var modal = $('#event-modal');
                modal.find('input, select').val('');
                modal.find('#color-picker').val('#3788d8');
                modal.modal('show');
                $('.btn-save-event').off('click').on('click', function () {
                    var exercise = modal.find('.exercise-select');
                    var colorPicker = modal.find('#color-picker');
                    if (exercise.val() === '') {
                        exercise.focus();
                        return false;
                    }

                    if (colorPicker.val() === '') {
                        colorPicker.focus();
                        return false;
                    }
                    calendar.addEvent({
                        title: exercise.find('option:selected').text(),
                        start: $('.custom-menu.add-menu').data('date'),
                        backgroundColor: colorPicker.val(),
                        borderColor: colorPicker.val(),
                        extendedProps: {
                            exerciseID: exercise.val(),
                            user: ($('#calendar-user').val() !== '' ? $('#calendar-user').val() : $('#my-id').val())
                        }
                    });
                    updateDB(modal);
                });
                break;
            case 'edit-schedule':
                var eModal = $('#event-modal');
                var info = $('.custom-menu.edit-menu').data('info');
                eModal.find('.exercise-select').val(info.event.extendedProps.exerciseID);
                eModal.find('#schedule-users').val(info.event.extendedProps.users);
                eModal.find('#color-picker').val(info.event.backgroundColor);
                // eModal.find('#color-picker').colorpickle('setHex', info.event.backgroundColor);
                eModal.modal('show');
                $('.btn-save-event').off('click').on('click', function () {
                    var exercise = eModal.find('.exercise-select');
                    // var users = eModal.find('#schedule-users');
                    var colorPicker = eModal.find('#color-picker');
                    if (exercise.val().trim() === '') {
                        exercise.focus();
                        return false;
                    }
                    if (colorPicker.val().trim() === '') {
                        colorPicker.focus();
                        return false;
                    }
                    info.event.setProp('title', exercise.find('option:selected').text());
                    info.event.setProp('backgroundColor', colorPicker.val().trim());
                    info.event.setProp('borderColor', colorPicker.val().trim());
                    info.event.setExtendedProp('exerciseID', exercise.val().trim());
                    info.event.setExtendedProp('users', [($('#calendar-user').val() !== '' ? $('#calendar-user').val() : $('#my-id').val())]);
                    updateDB(eModal);
                });
                break;
            case 'delete-schedule':
                if (myConfirm('Are you sure you want to delete this schedule?')) {
                    var info = $('.custom-menu.edit-menu').data('info');
                    info.event.remove();
                    updateDB(eModal);
                }
                break;
            case 'copy-week':
                var date = $('.custom-menu.add-menu').data('date');
                var weekDays = [];
                // var weekDay = $('body').find('.fc-day[data-date="'+date+'"]');
                window.clipboardDates = [];
                weekDays.push(date);
                for (var i = 1; i < 7; i++) {
                    date = moment(date, 'YYYY-MM-DD').add(1, 'days').format('YYYY-MM-DD');
                    weekDays.push(date);
                }
                var events = calendar.getEvents();
                for (var i = 0; i < weekDays.length; i++) {
                    var date = weekDays[i];
                    var day = [];
                    for (var j = 0; j < events.length; j++) {
                        var event = events[j];
                        var eventDate = event.start;
                        if (date === moment(eventDate).format('YYYY-MM-DD')) {
                            day.push(event);
                        }
                    }
                    window.clipboardDates[date] = day;
                }
                break;
            case 'copy-month':
                var date = $('.custom-menu.add-menu').data('date');
                var weekDays = [];
                // var weekDay = $('body').find('.fc-day[data-date="'+date+'"]');
                window.clipboardDates = [];
                weekDays.push(date);
                for (var i = 1; i < 30; i++) {
                    date = moment(date, 'YYYY-MM-DD').add(1, 'days').format('YYYY-MM-DD');
                    weekDays.push(date);
                }
                var events = calendar.getEvents();
                for (var i = 0; i < weekDays.length; i++) {
                    var date = weekDays[i];
                    var day = [];
                    for (var j = 0; j < events.length; j++) {
                        var event = events[j];
                        var eventDate = event.start;
                        if (date === moment(eventDate).format('YYYY-MM-DD')) {
                            day.push(event);
                        }
                    }
                    window.clipboardDates[date] = day;
                }
                break;
            case 'copy-day':
                var date = $('.custom-menu.add-menu').data('date');
                window.clipboardDates = [];
                var events = calendar.getEvents();
                var day = [];
                for (var j = 0; j < events.length; j++) {
                    var event = events[j];
                    var eventDate = event.start;
                    // console.log(moment(eventDate).format('YYYY-MM-DD'));
                    if (date === moment(eventDate).format('YYYY-MM-DD')) {
                        // console.log('=======================');
                        // console.log(date);
                        // console.log(moment(eventDate).format('YYYY-MM-DD'));
                        day.push(event);
                    }
                }
                window.clipboardDates[date] = day;
                break;
            case 'copy-schedule':
                var info = $('.custom-menu.edit-menu').data('info');

                var date = $('.custom-menu.add-menu').data('date');
                window.clipboardDates = [];

                var events = calendar.getEvents();

                var day = [];

                for (var j = 0; j < events.length; j++) {
                    var event = events[j];

                    if (event._instance.instanceId == info.event._instance.instanceId) {
                        day.push(event);
                        // console.log(event);
                    }
                }

                window.clipboardDates[date] = day;

                break;
            case 'paste':
                if (typeof window.clipboardDates !== 'undefined') {
                    var date = $('.custom-menu.add-menu').data('date');
                    //var weekDays = $('body').find('.fc-day[data-date="' + date + '"]').closest('tr').find('td.fc-day');
                    var keys = Object.keys(window.clipboardDates);
                    var weekDays = [];
                    // var weekDay = $('body').find('.fc-day[data-date="'+date+'"]');
                    weekDays.push(date);

                    for (var i = 1; i < keys.length; i++) {
                        date = moment(date, 'YYYY-MM-DD').add(1, 'days').format('YYYY-MM-DD');
                        weekDays.push(date);
                    }

                    for (var i = 0; i < weekDays.length; i++) {
                        var currentDate = keys[i];
                        // var newDate = $(weekDays[i]).data('date');
                        var newDate = weekDays[i];

                        if (window.clipboardDates[currentDate].length > 0) {

                            for (var j = 0; j < window.clipboardDates[currentDate].length; j++) {
                                var event = window.clipboardDates[currentDate][j];

                                calendar.addEvent({
                                    title: event.title,
                                    start: newDate,
                                    backgroundColor: event.backgroundColor,
                                    borderColor: event.borderColor,
                                    extendedProps: {
                                        exerciseID: event.extendedProps.exerciseID,
                                        users: [($('#calendar-user').val() !== '' ? $('#calendar-user').val() : $('#my-id').val())]
                                        // users: event.extendedProps.users
                                    }
                                });
                            }

                        }
                    }
                    updateDB(modal);
                }
                break;
            case 'delete-week':
                if (!confirm('Are you sure? you want to delete the events of whole week?')) {
                    break;
                }

                var date = $('.custom-menu.add-menu').data('date');
                var weekDays = [];
                // var weekDay = $('body').find('.fc-day[data-date="'+date+'"]');
                window.clipboardDates = [];

                weekDays.push(date);

                for (var i = 1; i < 7; i++) {
                    date = moment(date, 'YYYY-MM-DD').add(1, 'days').format('YYYY-MM-DD');
                    weekDays.push(date);
                }
                // console.log(weekDays);

                var events = calendar.getEvents();

                for (var i = 0; i < weekDays.length; i++) {
                    var date = weekDays[i];

                    for (var j = 0; j < events.length; j++) {
                        var event = events[j];
                        var eventDate = event.start;

                        if (date === moment(eventDate).format('YYYY-MM-DD')) {
                            event.remove();
                        }
                    }
                }

                updateDB();
                break;
        }

        // Hide it AFTER the action was triggered
        $(".custom-menu").hide(100);
    });

    $(document).on('click', '.fc-today-button, .fc-prev-button, .fc-next-button', function () {
        updateEmptyDays();
    });

    $('#schedule-empty-days').on('change', function () {
        $(document).find('.fc-day').find('.fc-daygrid-day-bg').find('.fc-daygrid-bg-harness').remove();
        let currentDate = $(this).val();

        if (currentDate === '') {
            return;
        }

        let day = $('body').find('.fc-day[data-date="' + currentDate + '"]');

        if (day.length > 0) {
            day.find('.fc-daygrid-day-bg').html('<div class="fc-daygrid-bg-harness" style="left: 0px; right: 0px;"><div class="fc-highlight"></div></div>');
        }
    });

    updateEmptyDays();
});

function updateEmptyDays() {
    let date = new Date(); //calendar.getDate();
    let month = date.getMonth() + 1;
    let year = date.getFullYear();
    let html = '<option value="">Select</option>';
    // console.log(month);

    if (month < 10) {
        month = '0' + month;
    }

    for (let i = 1; i <= 31; i++) {
        let d = i < 10 ? '0' + i : i;
        let currentDate = year + '-' + month + '-' + d;

        let day = $('body').find('.fc-day[data-date="' + currentDate + '"]');

        if (day.length > 0) {
            if (day.find('.fc-daygrid-day-events').find('.fc-event').length === 0) {
                html += '<option value="' + currentDate + '">' + d + '</option>';
            }
        }
    }
    $('#schedule-empty-days').html(html);
}

function updateDB(modal) {
    var events = calendar.getEvents();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'schedule/update',
        type: 'post',
        data: {flag: 'save-events', events: JSON.stringify(events), id: $('#calendar-user').val() },
        success: function (data) {
            if (typeof modal !== 'undefined') {
                modal.modal('hide');
            }

            if (data.success) {
                updateEmptyDays();
            }
        }
    });
}

function initCalendar(events) {
    var calendarEl = document.getElementById('calendar');

    calendar = new FullCalendar.Calendar(calendarEl, {
        timeZone: 'UTC',
        initialView: 'dayGridMonth',
        events: events,
        editable: true,
        eventDrop: function (event, dayDelta, minuteDelta, allDay, revertFunc) {
            updateDB();
        },
        selectable: true,
        eventClick: function (info) {
            if (addMenuEvent) {
                addMenuEvent = false;

                $(".custom-menu.edit-menu").data('info', info).finish().toggle(100).css({
                    top: addMenuEventY + "px",
                    left: addMenuEventX + "px"
                });
            } else {
                window.location.href = schedule_view_url +'/'+ info.event.extendedProps.exerciseID;
            }
        }
    });
    calendar.render();
    updateEmptyDays();
}

function myConfirm(msg){
    return confirm(msg);
}
