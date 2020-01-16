/* global urlSearch, today, moment, urlCalendars, events, areYouSure, urlDelete, types, urlDeleteType */

$(function () {

    $(document).on('click', '.nav-item a', function (e) {
        $('.menu2 span.fa').removeClass('active');
        if ($(e.target).is('.menu2')) {
            $(this).find('span.fa').addClass('active');
        }
    });
    $(document).on('click', '.menu2 span.fa-pencil', function () {
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
        $('#modalNewType').modal('show');
    });
    $(document).on('click', '.menu2 span.fa-times', function () {
        var id = $(this).data('id');
        if (confirm(areYouSure)) {
            ajaxget(urlDeleteType, {id}, function (result) {
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
    $('#date6').MdPersianDateTimePicker({inLine: true, englishNumber: true}).on('change-dp', function () {
        var url = $(this).data('url');
        var datetime = $(this).data('dp-val');
        ajaxget(url, {datetime}, function (rows) {
            $('#getList tbody').html('');
            for (var i = 0, max = rows.length; i < max; i++) {
                var html = `
                    <tr>
                        <td>${i + 1}</td>
                        <td>${rows[i].title}</td>
                        <td><a data-url="${rows[i].url}" data-id="${rows[i].id}"><i class="fa fa-eye"></i></a></td>
                    </tr>
                `;
                $('#getList tbody').append(html);
            }
        });
    });
    $(document).on('click', '.ajaxDelete', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var container = $(this).data('container');
        var message = $(this).data('confirm2');
        if (confirm(message)) {
            ajaxget(url, {}, function () {
                $.pjax.reload({container: '#' + container});
            });
        }
    });
    $(document).on('click', '#getList a', function () {
        var url = $(this).data('url');
        var id = $(this).data('id');
        ajaxget(url, {id}, function (result) {
            showEvent(result);
        });
    });
    $('#calendarsvml-has_reception').change(function () {
        var checked = $(this).prop('checked');
        if (checked) {
            $('.field-calendarsvml-catering_id,.field-calendarsvml-requirements').show();
        } else {
            $('.field-calendarsvml-catering_id,.field-calendarsvml-requirements').hide();
        }
    });
    $(document).on('click', '.r li', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var url = $(this).data('url');
        $('.r').remove();
        ajaxget(url, {id}, function (result) {
            if (result) {
                $('#calendarsvml-title').val(result.title);
                $('#calendarsvml-favcolor').val(result.favcolor);
                $('#calendarsvml-type_id').val(result.type_id);
                $('#calendarsvml-status_id').val(result.status_id);
                $('#calendarsvml-location').val(result.location);
                $('#calendarsvml-start_date').val(result.start_date);
                $('#calendarsvml-end_date').val(result.start_date);
                $('#calendarsvml-start_time').val(result.start_time);
                $('#calendarsvml-end_time').val(result.start_time);
                $('#calendarsvml-description').val(result.description);
                $('#calendarsvml-has_reception').prop('checked', parseInt(result.has_reception) === 1).trigger('change');
                $('#calendarsvml-catering_id').val(result.catering_id);
            }
        });
    });
    $('#searchTitle').click(function () {
        var $that = $(this);
        var url = $that.data('url');
        var title = $('#calendarsvml-title').val();
        $('.r').remove();
        if (title) {
            ajaxget(url, {title}, function (result) {
                var items = ``;
                for (var i in result) {
                    var row = result[i];
                    items += `<li data-id="${row.id}" data-url="${row.url}">${row.title}</li>`;
                }
                $that.parent().append(`<ul class="r bg-light border p-0" style="
                    position: absolute;
                    z-index: 1;
                    top: 33px;
                    left: 0;
                    list-style: none;
                    margin: 0;
                    min-width: 700%;
                    border-radius: 4px;
                ">${items}</ul>`);
            });
        }
    });
    $('#calendarsvml-start_time, #calendarsvml-end_time').timeDropper({
        format: 'HH:mm:00'
                //autoswitch: true,
    });
    //--------------------------------------------------------------------------
    $('#calendarsvml-start_date').MdPersianDateTimePicker({
        targetTextSelector: '#calendarsvml-start_date',
        isGregorian: false,
        yearOffset: 60
    }).on('hide.bs.popover', function () {
        var s = tr_num(this.value).split('/');
        var date = {year: parseInt(s[0]), month: parseInt(s[1]), day: parseInt(s[2])};
        $('#calendarsvml-end_date').MdPersianDateTimePicker('setDatePersian', date);
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
            ajaxget(urlDeleteType, {id}, function (result) {
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
                        if ($('.calendar_type[data-id="' + result.data.id + '"]').length === 0) {
                            $('#main-menu-navigation').append(`
                                <li class="nav-item noclose">
                                    <a class="menu-item menu2" style="padding: 0 !important;">
                                        <label class="mb-0" style="padding: 2px 14px 2px 10px !important;display: inline-block;width: calc(70% - 24px);cursor: pointer;">
                                            <input type="checkbox" class="calendar_type" data-id="${result.data.id}" checked>
                                            <span class="menu-title">${result.data.title}</span>
                                        </label>
                                        <span class="fa fa-pencil" data-id="${result.data.id}" style="display: inline-block;width: 15%;text-align: center;padding: 8px 0;"></span>
                                        <span class="fa fa-times" data-id="${result.data.id}" style="display: inline-block;width: 15%;text-align: center;padding: 8px 0;"></span>
                                    </a>
                                </li>
                            `);
                        }
                        if ($('#calendarsvml-type_id option[value="' + result.data.id + '"]').length === 0) {
                            $('#calendarsvml-type_id').append(`<option value="${result.data.id}">${result.data.title}</option>`);
                        }
                        $('#modalNewType').modal('hide');
                        var index = types.findIndex(function (row) {
                            return row.id == result.data.id;
                        });
                        if (index !== -1) {
                            types.splice(index, 1);
                        }
                        types.push(result.data);
                    }
                }, undefined, undefined, undefined, true);
            }
        }, 500);
    });
    //--------------------------------------------------------------------------
    $('#modalNew').on('hidden.bs.modal', function () {
        $('.myselected').removeClass('myselected');
        $('#formNew').get(0).reset();
        $('#calendarsvml-users').trigger('change');
        $('#calendarsvml-for_informations').trigger('change');
        $('#calendarsvml-requirements').trigger('change');
        $('#calendarsvml-has_reception').trigger('change');
        $('#calendarsvml-id').val('');
        var dynamicform = window[$('.dynamicform_wrapper').data('dynamicform')];
        $("#formNew .remove-item").each(function (e) {
            $(".dynamicform_wrapper").yiiDynamicForm("deleteItem", dynamicform, e, $(this));
        });
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
                        } else {
                            $('#calendar').fullCalendar('renderEvent', result.data);
                        }
                        $('#modalNew').modal('hide');
                    }
                }, undefined, undefined, undefined, true);
            }
        }, 500);
    });
    //--------------------------------------------------------------------------
    $('#returnNewAlarm').on('click', function (e) {
        e.preventDefault();
        $('#modalNewAlarm').modal('hide');
        $('#modalView').modal('show');
    });
    $('#saveNewAlarm').on('click', function (e) {
        e.preventDefault();
        $('#formNewAlarm').submit();
    });
    $('#formNewAlarm').on('submit', function (e) {
        e.preventDefault();
        showloading();
        $('#formNewAlarm').yiiActiveForm('validate');
        setTimeout(function () {
            hideloading();
            var errors = $('#formNewAlarm').find('.is-invalid').length;
            if (errors === 0) {
                var url = $('#formNewAlarm').attr('action');
                var formData = new FormData($('#formNewAlarm').get(0));
                ajaxpost(url, formData, function (result) {
                    if (result.saved === true) {
                        var alarms = `
                            <li data-id="${result.data.id}">
                                <table class="table table-bordered table-sm mb-1">
                                    <thead>
                                        <tr class="table-primary">
                                            <th>${result.data.list_time[result.data.time_id]}</th>
                                            <th>${result.data.list_period[result.data.period_id]}</th>
                                            <th>${result.data.list_alarm_type[result.data.alarm_type_id]}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="3">
                                                <a class="btn btn-sm btn-danger mb-0 pull-left delete-alarm" data-url="${result.data.url}" data-id="${result.data.id}"><i class="fa fa-times text-red"></i></a>
                                                <div>
                                                    ${result.data.message}
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                        `;
                        $('#alarms').prepend(alarms);
                        $('#alarms .no').remove();
                        $('#modalNewAlarm').modal('hide');
                        $('#modalView').modal('show');
                    }
                }, undefined, undefined, undefined, true);
            }
        }, 500);
    });
    $(document).on('click', '.delete-alarm', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var url = $(this).data('url');
        if (confirm('آیا مطمئن هستید؟')) {
            ajaxget(url, {id}, function (result) {
                if (result.saved) {
                    $('#alarms li[data-id="' + id + '"]').remove();
                }
            });
        }
    });
    $('.add-alarm').on('click', function (e) {
        e.preventDefault();
        var row = $(this).data('row');
        $('#calendarsalarmsvml-calendar_id').val(row.id);
        $('#modalView').modal('hide');
        $('#modalNewAlarm').modal('show');
    });
    $('#modalNewAlarm').on('hidden.bs.modal', function (e) {
        $('#formNewAlarm').get(0).reset();
    });
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
//        $('#calendarsvml-time_id').val(row.time_id);
//        $('#calendarsvml-period_id').val(row.period_id);
//        $('#calendarsvml-alarm_type_id').val(row.alarm_type_id);
        $('#calendarsvml-users').val(row.users).trigger('change');
        $('#calendarsvml-for_informations').val(row.for_informations).trigger('change');
        $('#calendarsvml-description').val(row.description);

        $('#calendarsvml-has_reception').prop('checked', row.has_reception == 1).trigger('change');
        $('#calendarsvml-catering_id').val(row.catering_id);
        $('#calendarsvml-requirements').val(row.requirements).trigger('change');

        var dynamicform = window[$('.dynamicform_wrapper').data('dynamicform')];
        for (var i = 0, max = row.alarms.length; i < max; i++) {
            $(".dynamicform_wrapper").yiiDynamicForm("addItem", dynamicform, null, $('.dynamicform_wrapper'));
            var alarm = row.alarms[i];
            $('[name="CalendarsAlarmsVML[' + i + '][time_id]"]').val(alarm.time_id);
            $('[name="CalendarsAlarmsVML[' + i + '][alarm_type_id]"]').val(alarm.alarm_type_id);
            $('[name="CalendarsAlarmsVML[' + i + '][period_id]"]').val(alarm.period_id);
            $('[name="CalendarsAlarmsVML[' + i + '][message]"]').val(alarm.message);
        }
        $(".dynamicform_wrapper").yiiDynamicForm("deleteItem", dynamicform, null, $("#formNew .remove-item").last());

        $('#modalView').modal('hide');
        $('#modalNew').modal('show');
    });
    $('.delete').on('click', function (e) {
        var row = $(this).data('row');
        var id = row.id;
        if (confirm(areYouSure)) {
            ajaxget(urlDelete, {id}, function (result) {
                if (result.saved) {
                    $('#calendar').fullCalendar('removeEvents', id);
                    $('#modalView').modal('hide');
                } else {
                    alert('خطا در حذف اطلاعات');
                }
            });
        }
    });
    //--------------------------------------------------------------------------
    $('#calendar').fullCalendar({
        locale: 'fa',
        height: 'parent',
        eventLimit: 2,
//        views: {
//            timeGrid: {
//                eventLimit: 1 // adjust to 6 only for timeGridWeek/timeGridDay
//            }
//        },
        isJalaali: true,
        isrtl: true,
        defaultView: 'month',
        defaultDate: moment().format('YYYY-MM-DD'),
        editable: false,
        timeFormat: 'HH:mm',
        header: {
            left: 'agendaDay,agendaWeek,month next,today,prev print'
                    //center: 'title',
        },
        eventRender: function (calEvent, element, view) {
            element.css('background-color', calEvent.favcolor);
            element.css('border-color', calEvent.favcolor);
            return $('.calendar_type[data-id="' + calEvent.type_id + '"]').prop('checked');
        },
        events: events,
        eventClick: function (event, jsEvent, view) {
            showEvent(event);
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
    $('<input/>').val(today).addClass('form-control form-control-sm mt-2 mb-2').prop('readonly', true).attr('id', 'fulldate').attr('placeholder', 'تاریخ').appendTo('.fc-left').MdPersianDateTimePicker({targetTextSelector: '#fulldate', isGregorian: false, yearOffset: 60, englishNumber: true}).on('hide.bs.popover', function () {
        var m = moment(this.value, 'jYYYY/jMM/jDD');
        var date = tr_num(m.format('YYYY-MM-DD'));
        $('#calendar').fullCalendar('gotoDate', date);
    });
    $('<div/>').attr('id', 'search_event').appendTo('.fc-left');
    $('<input/>').addClass('form-control form-control-sm mt-2 mb-2').attr('id', 'search').attr('placeholder', 'جستجو').appendTo('#search_event').on('input', function () {
        var title = $(this).val();
        searchEvent(title);
    }).focus(function () {
        var title = $(this).val();
        if (title) {
            searchEvent(title);
        }
    });
    $('<ul/>').attr('class', 'bg-light border').attr('id', 'search_event_result').appendTo('#search_event');
    $('.fc-left .btn').addClass('mt-2 mb-2');
    //--------------------------------------------------------------------------
    var interV = null;
    function searchEvent(title) {
        clearTimeout(interV);
        interV = setTimeout(function () {
            ajaxget(urlSearch + '?title=' + title, {}, function (result) {
                var $ul = $('#search_event_result');
                $ul.html('');
                if (result.models.length === 0) {
                    $ul.append(`<li>رویدادی یافت نشد!</li>`);
                } else {
                    result.models.forEach(function (row) {
                        $ul.append(`
                            <li data-date="${row.start}">
                                <span class="title">${row.title}</span>
                                <span class="time">${row.start_title}</span>
                            </li>
                        `);
                    });
                }
                $('#search_event_result').addClass('active');
            });
        }, 500);
    }
    $(document).on('click', '#search_event_result li[data-date]', function () {
        var date = $(this).data('date');
        var date_title = $(this).find('.time').text();
        $('#fulldate').val(date_title);
        $('#calendar').fullCalendar('gotoDate', date);
    });
    $(document).on('click', function () {
        $('#search_event_result').removeClass('active');
    });
    //-------------------------------------------------------------------------- 
    function showEvent(event) {

        console.log(event);

        var list = [];
        for (var i in event.users) {
            list.push(event.list_users[event.users[i]]);
        }
        var users = list.join('، ');

        list = [];
        for (var i in event.for_informations) {
            list.push(event.list_users[event.for_informations[i]]);
        }
        var for_informations = list.join('، ');

        list = [];
        for (var i in event.requirements) {
            list.push(event.list_requirements[event.requirements[i]]);
        }
        var requirements = list.join('، ');


        var $modal = $('#modalView');
        $modal.find('.update').data('row', event);
        $modal.find('.delete').data('row', event);
        $modal.find('.add-alarm').data('row', event);
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
        $modal.find('#for_informations').text(for_informations);
        $modal.find('#description').text(event.description);
        $modal.find('#file').attr('src', urlCalendars + event.file);

        $modal.find('#has_reception').text(event.has_reception == 1 ? 'بله' : 'خیر');
        if (event.has_reception == 1) {
            $modal.find('#catering_id').parent().show();
            $modal.find('#requirements').parent().show();
            $modal.find('#catering_id').text(event.list_users[event.catering_id]);
            $modal.find('#requirements').text(requirements);
        } else {
            $modal.find('#catering_id').parent().hide();
            $modal.find('#requirements').parent().hide();
        }

        var alarms = '';
        event.alarms.forEach(function (alarm) {
            alarms += `
                <li data-id="${alarm.id}">
                    <table class="table table-bordered table-sm mb-1">
                        <thead>
                            <tr class="table-primary">
                                <th>${alarm.list_time[alarm.time_id]}</th>
                                <th>${alarm.list_period[alarm.period_id]}</th>
                                <th>${alarm.list_alarm_type[alarm.alarm_type_id]}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3">
                                    <div>
                                        ${alarm.message}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </li>
            `;
        });
        $modal.find('#alarms').html(alarms ? alarms : '<li class="no">---</li>');
        $modal.modal('show');
    }

//    $("#formNew").on("click", ".add-item", function (e) {
//        e.preventDefault();
//
//        window[$('.dynamicform_wrapper').data('dynamicform')];
//
////        $(".dynamicform_wrapper").triggerHandler("beforeInsert", [$(this)]);
////        $(".dynamicform_wrapper").yiiDynamicForm("addItem", dynamicform_5c73f849, e, $(this));
//    });

//    $("#formNew").on("click", ".remove-item", function(e) {
    //e.preventDefault();

});

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