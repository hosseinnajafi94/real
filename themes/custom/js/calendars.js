/* global urlSearch, today, moment, urlCalendars, events, areYouSure, urlDelete, types */

$(function () {
    //--------------------------------------------------------------------------
    $('#calendarsvml-start_date').MdPersianDateTimePicker({
        targetTextSelector: '#calendarsvml-start_date',
        isGregorian: false,
        yearOffset: 60
    });
    $('#calendarsvml-end_date').MdPersianDateTimePicker({
        targetTextSelector: '#calendarsvml-end_date',
        isGregorian: false,
        yearOffset: 60
    });
    $(document).on('click', '[select-year-button]', function () {
        setTimeout(function () {
            var val1 = $('.select-year-box').css('height').replace('px', '');
            var val2 = $('.select-year-box table').css('height').replace('px', '');
            var val3 = (parseInt(val2) / 2) - (parseInt(val1) / 2);
            $('.select-year-box').scrollTop(val3);
        }, 200);
    });
    $(document).on('change', '.calendar_type', function (e) {
        e.preventDefault();
        if ($(this).data('id') === 'all') {
            $('.calendar_type:not([data-id="all"])').prop('checked', $(this).prop('checked'));
        }
        $('#calendar').fullCalendar('refetchEvents');
    });
    //--------------------------------------------------------------------------
    $('.listType').on('click', function (e) {
        $('#modalListType').modal('show');
    });
    $(document).on('click', '.editType', function (e) {
        var id = $(this).data('id');
        var row = types.find(function (type) {
            return type.id == id;
        });
        $('#calendarslisttypevml-id').val(row.id);
        $('#calendarslisttypevml-title').val(row.title);
        $('#calendarslisttypevml-description').val(row.description);
        $('#calendarslisttypevml-sections1').val(row.sections1);
        $('#calendarslisttypevml-sections1').trigger('change');
        $('#calendarslisttypevml-sections2').val(row.sections2);
        $('#calendarslisttypevml-sections2').trigger('change');
        $('#calendarslisttypevml-sections3').val(row.sections3);
        $('#calendarslisttypevml-sections3').trigger('change');
        $('#modalListType').modal('hide');
        $('#modalNewType').modal('show');
    });
    $(document).on('click', '.deleteType', function (e) {
        var id = $(this).data('id');
        if (confirm(areYouSure)) {
            var formData = new FormData();
            formData.append('id', id);
            ajaxpost(urlDeleteType, formData, function (result) {
                if (result.saved) {
                    $('.deleteType[data-id="' + id + '"]').parents('tr').remove();
                    $('#calendarsvml-type_id option[value="' + id + '"]').remove();
                    $('.calendar_type[data-id="' + id + '"]').parents('li').remove();
                    var index = types.findIndex(function (row) {
                        return row.id == id;
                    });
                    if (index !== -1) {
                        types.splice(index, 1);
                    }
                }
            });
        }
    });
    $('#modalNewType').on('hidden.bs.modal', function () {
        $('#formNewType').get(0).reset();
        $('#calendarslisttypevml-sections1').trigger('change');
        $('#calendarslisttypevml-sections2').trigger('change');
        $('#calendarslisttypevml-sections3').trigger('change');
        $('#calendarslisttypevml-id').val('');
    });
    $('.addType').on('click', function (e) {
        $('#modalNewType').modal('show');
    });
    $('#saveNewType').on('click', function (e) {
        e.preventDefault();
        $('#formNewType').submit();
    });
    $('#formNewType').on('submit', function (e) {
        e.preventDefault();
        showloading();
        $('#formNewType').yiiActiveForm('validate');
        setTimeout(function () {
            hideloading();
            var errors = $('#formNewType').find('.is-invalid').length;
            if (errors === 0) {
                var url = $('#formNewType').attr('action');
                var formData = new FormData($('#formNewType').get(0));
                ajaxpost(url, formData, function (result) {
                    if (result.saved === true) {
                        $('.deleteType[data-id="' + result.data.id + '"]').parents('tr').remove();
                        $('#calendarsvml-type_id option[value="' + result.data.id + '"]').remove();
                        $('.calendar_type[data-id="' + result.data.id + '"]').parents('li').remove();
                        $('#ulListType').append(`<li><label class="btn btn-sm btn-primary"><input type="checkbox" class="calendar_type" data-id="${result.data.id}"/> <span>${result.data.title}</span></label></li>`);
                        $('#calendarsvml-type_id').append(`<option value="${result.data.id}">${result.data.title}</option>`);
                        $('#modalListType tbody').append(`<tr><td>${result.data.id}</td><td>${result.data.title}</td><td><a class="btn btn-sm btn-primary mb-0 editType" data-id="${result.data.id}" data-title="${result.data.title}" data-description="${result.data.description}"><i class="fa fa-edit"></i></a> <a class="btn btn-sm btn-danger mb-0 deleteType" data-id="${result.data.id}"><i class="fa fa-times"></i></a></td></tr>`);
                        $('#modalNewType').modal('hide');
                        var index = types.findIndex(function (row) {
                            return row.id == result.data.id;
                        });
                        if (index !== -1) {
                            types.splice(index, 1);
                        }
                        types.push(result.data);
                    }
                });
            }
        }, 500);
    });
    //--------------------------------------------------------------------------
    $('#modalNew').on('hidden.bs.modal', function () {
        $('.myselected').removeClass('myselected');
        $('#formNew').get(0).reset();
        $('#calendarsvml-users').trigger('change');
        $('#calendarsvml-id').val('');
    });
    $('#saveNew').on('click', function (e) {
        e.preventDefault();
        $('#formNew').submit();
    });
    $('#formNew').on('submit', function (e) {
        e.preventDefault();
        showloading();
        $('#formNew').yiiActiveForm('validate');
        setTimeout(function () {
            hideloading();
            var errors = $('#formNew').find('.is-invalid').length;
            if (errors === 0) {
                var url = $('#formNew').attr('action');
                var formData = new FormData($('#formNew').get(0));
                ajaxpost(url, formData, function (result) {
                    if (result.saved === true) {
                        if ($('#calendar').fullCalendar('clientEvents', result.data.id).length > 0) {
                            var events = $('#calendar').fullCalendar('clientEvents', result.data.id);
                            $('#calendar').fullCalendar('updateEvent', $.extend(events[0], result.data));
                        }
                        else {
                            $('#calendar').fullCalendar('renderEvent', result.data);
                        }
                        $('#modalNew').modal('hide');
                    }
                });
            }
        }, 500);
    });
    //--------------------------------------------------------------------------
    $('.update').on('click', function (e) {
        var row = $(this).data('row');
        var s = row.start_date.split('/');
        var e = row.end_date.split('/');
        var start_date = {year: parseInt(s[0]), month: parseInt(s[1]), day: parseInt(s[2])};
        var end_date = {year: parseInt(e[0]), month: parseInt(e[1]), day: parseInt(e[2])};
        $('#calendarsvml-id').val(row.id);
        $('#calendarsvml-title').val(row.title);
        $('#calendarsvml-favcolor').val(row.favcolor);
        $('#calendarsvml-type_id').val(row.type_id);
        $('#calendarsvml-status_id').val(row.status_id);
        $('#calendarsvml-location').val(row.location);
        $('#calendarsvml-start_date').MdPersianDateTimePicker('setDatePersian', start_date);
        $('#calendarsvml-start_time').val(row.start_time);
        $('#calendarsvml-end_date').MdPersianDateTimePicker('setDatePersian', end_date);
        $('#calendarsvml-end_time').val(row.end_time);
        $('#calendarsvml-time_id').val(row.time_id);
        $('#calendarsvml-period_id').val(row.period_id);
        $('#calendarsvml-alarm_type_id').val(row.alarm_type_id);
        $('#calendarsvml-description').val(row.description);
        $('#calendarsvml-users').val(row.users);
        $('#calendarsvml-users').trigger('change');
        $('#modalView').modal('hide');
        $('#modalNew').modal('show');
    });
    $('.delete').on('click', function (e) {
        var row = $(this).data('row');
        var id = row.id;
        if (confirm(areYouSure)) {
            var formData = new FormData();
            formData.append('id', id);
            ajaxpost(urlDelete, formData, function (result) {
                if (result.saved) {
                    $('#calendar').fullCalendar('removeEvents', id);
                    $('#modalView').modal('hide');
                }
                else {
                    alert('خطا در حذف اطلاعات');
                }
            });
        }
    });
    //--------------------------------------------------------------------------
    $('#calendar').fullCalendar({
        locale: 'fa',
        isJalaali: true,
        isrtl: true,
        defaultView: 'month',
        defaultDate: moment().format('YYYY-MM-DD'),
        editable: false,
        eventLimit: false,
        timeFormat: 'HH:mm',
        header: {
            left: 'agendaDay,agendaWeek,month next today prev print'
            //center: 'title',
        },
        eventRender: function (calEvent, element, view) {
            element.css('background-color', calEvent.favcolor);
            element.css('border-color', calEvent.favcolor);
            return $('.calendar_type[data-id="' + calEvent.type_id + '"]').prop('checked');
        },
        events: events,
        eventClick: function (event, jsEvent, view) {
            var list = [];
            for (var i in event.users) {
                list.push(event.list_users[event.users[i]]);
            }
            var users = list.join('، ');
            var $modal = $('#modalView');
            $modal.find('.update').data('row', event);
            $modal.find('.delete').data('row', event);
            $modal.find('#title').text(event.title);
            $modal.find('#favcolor').css('background', event.favcolor);
            $modal.find('#type_id').text(event.list_type[event.type_id]);
            $modal.find('#status_id').text(event.list_status[event.status_id]);
            $modal.find('#location').text(event.location);
            $modal.find('#start_date').text(event.start_date);
            $modal.find('#start_time').text(event.start_time);
            $modal.find('#end_date').text(event.end_date);
            $modal.find('#end_time').text(event.end_time);
            $modal.find('#time_id').text(event.list_time[event.time_id]);
            $modal.find('#period_id').text(event.list_period[event.period_id]);
            $modal.find('#alarm_type_id').text(event.list_alarm_type[event.alarm_type_id]);
            $modal.find('#users').text(users);
            $modal.find('#description').text(event.description);
            $modal.find('#file').attr('src', urlCalendars + event.file);
            $modal.modal('show');
        },
        dayClick: function (dateText, jsEvent, view) {
            var self = this;
            var current_date = tr_num($(self).data('date'));
            var hasClass = $(self).hasClass('myselected');
            $('.myselected').removeClass('myselected');
            if (!hasClass) {
                $(self).addClass('myselected');
                var d = current_date.split('/');
                var year = parseInt(d[0]);
                var month = parseInt(d[1]);
                var day = parseInt(d[2]);
                $('#calendarsvml-start_date').MdPersianDateTimePicker('setDatePersian', {year: year, month: month, day: day});
                $('#calendarsvml-end_date').MdPersianDateTimePicker('setDatePersian', {year: year, month: month, day: day});
                $('#calendarsvml-start_time').val('00:00:00');
                $('#calendarsvml-end_time').val('00:00:00');
                $('#calendarsvml-id').val('');
                $('#modalNew').modal('show');
            }
        }
    });
    $('.fc-toolbar').addClass('hidden-print');
    $('.fc-toolbar .fc-prev-button').attr('class', 'btn fc-prev-button pull-right').attr('style', 'line-height: 1;');
    $('.fc-toolbar .fc-next-button').attr('class', 'btn fc-next-button').attr('style', 'line-height: 1;');
    $('.fc-toolbar .fc-today-button').attr('class', 'btn fc-today-button').attr('style', 'line-height: 1;');
    $('.fc-toolbar .fc-month-button').attr('class', 'btn fc-month-button').attr('style', 'line-height: 1;');
    $('.fc-toolbar .fc-agendaWeek-button').attr('class', 'btn fc-agendaWeek-button').attr('style', 'line-height: 1;');
    $('.fc-toolbar .fc-agendaDay-button').attr('class', 'btn fc-agendaDay-button').attr('style', 'line-height: 1;');
    $('.fc-toolbar .fc-prev-button').html('قبل');
    $('.fc-toolbar .fc-next-button').html('بعد');
    $('.fc-toolbar .fc-left').prepend('<button class="btn printBtn" onclick="print();">پرینت</button>');
    $('<input/>').val(today).addClass('form-control form-control-sm').attr('id', 'fulldate').attr('style', 'direction: ltr;text-align: center;max-width: 150px;').attr('placeholder', 'تاریخ').appendTo('.fc-left').MdPersianDateTimePicker({targetTextSelector: '#fulldate', isGregorian: false, yearOffset: 60, englishNumber: true}).on('hide.bs.popover', function () {
        var m = moment(this.value, 'jYYYY/jMM/jDD');
        var date = tr_num(m.format('YYYY-MM-DD'));
        $('#calendar').fullCalendar('gotoDate', date);
    });
    $('<input/>').addClass('form-control form-control-sm').attr('id', 'search').attr('placeholder', 'جستجو').attr('style', 'max-width: 150px;').appendTo('.fc-left').on('input', function () {
        var title = $(this).val();
        ajaxget(urlSearch + '?title=' + title, {}, function (result) {
            if (result && result.start) {
                $('#calendar').fullCalendar('gotoDate', result.start);
            }
        });
    });
    //--------------------------------------------------------------------------
    function tr_num(fa) {
        return fa.toString()
                .replace(/-/g, '/')
                .replace(/۰/g, '0')
                .replace(/۱/g, '1')
                .replace(/۲/g, '2')
                .replace(/۳/g, '3')
                .replace(/۴/g, '4')
                .replace(/۵/g, '5')
                .replace(/۶/g, '6')
                .replace(/۷/g, '7')
                .replace(/۸/g, '8')
                .replace(/۹/g, '9');
    }
    //-------------------------------------------------------------------------- 
});