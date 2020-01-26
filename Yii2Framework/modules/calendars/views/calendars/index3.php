<?php
use yii\helpers\Url;
use app\config\components\functions;
/* @var $this \yii\web\View */
?>
<div class="row">
    <div class="col-lg-6 col-md-6 mb-2">
        <div class="border p-3 bg-light card-header" style="border-radius: 4px;">
            <h4 class="bar-success card-title-wrap mb-3">ساعت جلسه</h4>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="row">
                        <label class="col-4">از ساعت</label>
                        <div class="col-8">
                            <input class="form-control form-control-sm" id="session_start_time" style="direction: ltr;text-align: left;"/>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="row">
                        <label class="col-4">تا ساعت</label>
                        <div class="col-8">
                            <input class="form-control form-control-sm" id="session_end_time" style="direction: ltr;text-align: left;"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 mb-2">
        <div class="border p-3 bg-light card-header" style="border-radius: 4px;">
            <h4 class="bar-success card-title-wrap mb-3">تاریخ</h4>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="row">
                        <label class="col-4">از تاریخ</label>
                        <div class="col-8">
                            <input class="form-control form-control-sm" id="session_start_date" readonly style="direction: ltr;text-align: left;" value="<?= functions::getjdate() ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="row">
                        <label class="col-4">تا تاریخ</label>
                        <div class="col-8">
                            <input class="form-control form-control-sm" id="session_end_date" readonly style="direction: ltr;text-align: left;" value="<?= functions::getjdate() ?>"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a class="btn btn-sm btn-success mb-2" id="session_search">جستجو</a>
<div id="text"></div>
<div class="table-responsive">
    <table class="table table-bordered mb-0" id="session_table">
        <thead>
            <tr>
                <th class="text-center">زمان</th>
                <th class="text-center">تاریخ</th>
                <th class="text-center">ساعت</th>
                <th class="text-center">عنوان جلسه</th>
                <th class="text-center">توضیحات</th>
                <th class="text-center">حاضرین</th>
                <th class="text-center"><label><input type="checkbox"/> حذف کلی</label></th>
                <th class="text-center">عملیات</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center" colspan="9" style="color: #999">--&nbsp;بدون محتوی&nbsp;--</td>
            </tr>
        </tbody>
    </table>
    <a class="btn btn-sm btn-danger mb-0 mt-1 pull-left list3DeleteAll disabled">حذف</a>
</div>
<?php
$this->registerCss("
    #session_table th {vertical-align: middle;}
    #session_table th label {margin: 0;}
");
$this->registerJs("
$(document).on('click', '#session_table th input:checkbox', function (e) {
    $('#session_table tbody input:checkbox').prop('checked', this.checked);
});
$(document).on('click', '.list3DeleteAll', function (e) {
    var ids = [];
    $('#session_table tbody input:checkbox:checked').each(function () {
        ids.push($(this).data('id'));
    });
    if (ids.length > 0 && confirm('" . Yii::t('app', 'Are you sure?') . "')) {
        ajaxget('" . Url::to(['delete-events']) . "', {ids}, function () {
            $('#session_search').trigger('click');
        });
    }
});
$(document).on('change', '#session_table input:checkbox', function (e) {
    $('.list3DeleteAll').removeClass('disabled');
    if ($('#session_table tbody input:checkbox:checked').length === 0) {
        $('.list3DeleteAll').addClass('disabled');
    }
});
$(document).on('click', '#session_table a', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var url = $(this).data('url');
    var type = $(this).data('type');
    var row = $(this).parents('tr').data('row')
    switch (type) {
        case 'select':
            var start_time = row.start_time;
            var end_time = row.end_time;
            var d = row.date.split('/');
            var year = parseInt(d[0]);
            var month = parseInt(d[1]);
            var day = parseInt(d[2]);
            $('#calendarsvml-start_date').MdPersianDateTimePicker('setDatePersian', {year: year, month: month, day: day});
            $('#calendarsvml-end_date').MdPersianDateTimePicker('setDatePersian', {year: year, month: month, day: day});
            $('#calendarsvml-start_time').val(start_time);
            $('#calendarsvml-end_time').val(end_time);
            $('#calendarsvml-id').val('');
            $('#modalNew').modal('show');
            break;
        case 'view':
            ajaxget(url, {id}, function (result) {
                showEvent(result);
            });
            break;
        case 'update':
            ajaxget(url, {id}, function (result) {
                updateEvent(result);
            });
            break;
        case 'delete':
            if (confirm(areYouSure)) {
                ajaxget(url, {id}, function (result) {
                    $('#session_search').trigger('click');
                });
            }
            break;
    }
});
$('#session_start_date').MdPersianDateTimePicker({
    targetTextSelector: '#session_start_date',
    isGregorian: false,
    yearOffset: 60,
    englishNumber: true
}).on('hide.bs.popover', function () {
    var s = tr_num(this.value).split('/');
    var date = {year: parseInt(s[0]), month: parseInt(s[1]), day: parseInt(s[2])};
    $('#session_end_date').MdPersianDateTimePicker('setDatePersian', date);

    var start_time = moment($(this).val(), 'jYYYY/jMM/jDD');
    var sdate = tr_num(start_time.format('YYYY-MM-DD'));
    var gdate = new Date(sdate);
    $('#session_end_date').MdPersianDateTimePicker('setOption', 'disableBeforeDate', gdate);
});
$('#session_end_date').MdPersianDateTimePicker({
    targetTextSelector: '#session_end_date',
    isGregorian: false,
    yearOffset: 60,
    englishNumber: true
}).on('hide.bs.popover', function (e) {
    var start_time = parseInt($('#session_start_date').val().toString().replace(/\//g, ''));
    var end_time = parseInt($('#session_end_date').val().toString().replace(/\//g, ''));
    if (!isNaN(end_time)) {
        if (start_time > end_time) {
            alert(' تاریخ پایان نمی تواند کوچکتر از تاریخ شروع باشد.');
        }
    }
});

var start_time = moment($('#session_start_date').val(), 'jYYYY/jMM/jDD');
var sdate = tr_num(start_time.format('YYYY-MM-DD'));
var gdate = new Date(sdate);
$('#session_end_date').MdPersianDateTimePicker('setOption', 'disableBeforeDate', gdate);

$('#session_start_time, #session_end_time').timeDropper({
    format: 'HH:mm:00',
    //autoswitch: true,
});
$('#session_search').click(function () {

    var session_start_time = $('#session_start_time').val();
    var session_start_date = $('#session_start_date').val();
    var session_end_time = $('#session_end_time').val();
    var session_end_date = $('#session_end_date').val();
    
    var s = parseInt(tr_num(session_start_date.replace(/\//g, '')));
    var e = parseInt(tr_num(session_end_date.replace(/\//g, '')));
    if (s > e) {
        alert('تاریخ معتبر نمی باشد!');
        return;
    }

    var formData = new FormData();
    formData.append('session_start_time', session_start_time);
    formData.append('session_end_time', session_end_time);
    formData.append('session_start_date', session_start_date);
    formData.append('session_end_date', session_end_date);
    ajaxpost('" . Url::to('search-session') . "', formData, function (result) {
        $('#session_table tbody').html('');
        for (var i in result.rows) {
            var row = result.rows[i];
            var tr = `
                <tr class=\"` + (row.rowId === null ? 'table-success' : 'table-danger') + `\">
                    <td class=\"text-center\" style=\"vertical-align: middle;\">\${row.day}</td>
                    <td class=\"text-center\" style=\"vertical-align: middle;direction: ltr;\">\${row.date}</td>
                    <td class=\"text-center\" style=\"vertical-align: middle;direction: ltr;\">\${row.start_time} الی \${row.end_time}</td>
                    <td class=\"text-center\" style=\"vertical-align: middle;direction: rtl;\">\${row.title ? row.title : '---'}</td>
                    <td class=\"text-center\" style=\"vertical-align: middle;direction: rtl;\">\${row.description ? row.description : '---'}</td>
                    <td class=\"text-center\" style=\"vertical-align: middle;direction: rtl;\">\${row.fullname ? row.fullname : '---'}</td>
                    <td>
                        \${(row.rowId === null ? '' : '<input type=\"checkbox\" data-id=\"' + row.rowId + '\"/>')}
                    </td>
                    <td>
            `;
            if (row.rowId === null) {
                tr += `<a class=\"btn btn-sm btn-primary mb-0\" data-type=\"select\">انتخاب</a>`;
            }
            else {
                tr += `<a href=\"#\" data-id=\"\${row.rowId}\" data-url=\"\${row.url}\" data-type=\"view\"><i class=\"fa fa-eye\"></i></a> `;
                tr += `<a href=\"#\" data-id=\"\${row.rowId}\" data-url=\"\${row.url}\" data-type=\"update\"><i class=\"fa fa-pencil\"></i></a> `;
                tr += `<a href=\"#\" data-id=\"\${row.rowId}\" data-url=\"\${row.urlDelete}\" data-type=\"delete\"><i class=\"fa fa-times\"></i></a> `;
            }
            
            tr += `
                    </td>
                </tr>
            `;
            $(tr).data('row', row).appendTo('#session_table tbody');
        }
        $('.list3DeleteAll').addClass('disabled');
        $('#session_table th input:checkbox').prop('checked', false);
    }, undefined, undefined, undefined, true);
});
");
