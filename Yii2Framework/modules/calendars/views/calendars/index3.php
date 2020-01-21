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
                <th class="text-center">عملیات</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center" colspan="4" style="color: #999">--&nbsp;بدون محتوی&nbsp;--</td>
            </tr>
        </tbody>
    </table>
</div>
<?php
$this->registerJs("
$('#session_table').on('click', 'a', function () {
    
    var row = $(this).parents('tr').data('row')
    if ($(this).hasClass('btn')) {
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
    }
    else {
        ajaxget(row.url, {id: row.rowId}, function (result) {
            showEvent(result);
        });
    }
});
$('#session_start_date').MdPersianDateTimePicker({
    targetTextSelector: '#session_start_date',
    isGregorian: false,
    yearOffset: 60
});
$('#session_end_date').MdPersianDateTimePicker({
    targetTextSelector: '#session_end_date',
    isGregorian: false,
    yearOffset: 60
});
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
            $(`
                <tr class=\"` + (row.rowId === null ? 'table-success' : 'table-danger') + `\">
                    <td class=\"text-center\" style=\"vertical-align: middle;\">\${row.day}</td>
                    <td class=\"text-center\" style=\"vertical-align: middle;direction: ltr;\">\${row.date}</td>
                    <td class=\"text-center\" style=\"vertical-align: middle;direction: ltr;\">\${row.start_time} الی \${row.end_time}</td>
                    <td>\${(row.rowId === null ? '<a class=\"btn btn-sm btn-primary mb-0\">انتخاب</a>' : '<a><i class=\"fa fa-eye\"></i></a>')}</td>
                </tr>
            `).data('row', row).appendTo('#session_table tbody');
        }
        //$('#text').html('<pre style=\"direction: ltr !important;text-align: left;\">'+JSON.stringify(result, null, 4)+'</pre>');
    }, undefined, undefined, undefined, true);
});
");
