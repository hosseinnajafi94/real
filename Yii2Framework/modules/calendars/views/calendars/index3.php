<?php
use app\config\components\functions;
/* @var $this \yii\web\View */
?>
<div class="row">
    <div class="col">
        <div class="border p-3 bg-light card-header" style="border-radius: 4px;">
            <h4 class="bar-success card-title-wrap mb-3">ساعت جلسه</h4>
            <div class="row">
                <div class="col">
                    <label>از ساعت</label>
                    <input class="form-control form-control-sm" id="session_start_time" dir="ltr" style="direction: ltr;text-align: left;" value="00:00:00"/>
                </div>
                <div class="col">
                    <label>تا ساعت</label>
                    <input class="form-control form-control-sm" id="session_end_time" dir="ltr" style="direction: ltr;text-align: left;" value="00:00:00"/>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="border p-3 bg-light card-header" style="border-radius: 4px;">
            <h4 class="bar-success card-title-wrap mb-3">تاریخ</h4>
            <div class="row">
                <div class="col">
                    <label>از تاریخ</label>
                    <input class="form-control form-control-sm" id="session_start_date" style="direction: ltr;text-align: left;" value="<?= functions::getjdate() ?>"/>
                </div>
                <div class="col">
                    <label>تا تاریخ</label>
                    <input class="form-control form-control-sm" id="session_end_date" style="direction: ltr;text-align: left;" value="<?= functions::getjdate() ?>"/>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
<a class="btn btn-sm btn-success mb-0" id="session_search">جستجو</a>

<?php
$this->registerJs("
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
$(document).on('click', '[select-year-button]', function () {
    setTimeout(function () {
        var val1 = $('.select-year-box').css('height').replace('px', '');
        var val2 = $('.select-year-box table').css('height').replace('px', '');
        var val3 = (parseInt(val2) / 2) - (parseInt(val1) / 2);
        $('.select-year-box').scrollTop(val3);
    }, 200);
});
$('#session_search').click(function () {
    var session_start_time = $('#session_start_time');
    var session_end_time = $('#session_end_time');
    var session_start_date = $('#session_start_date');
    var session_end_date = $('#session_end_date');
    
});
");