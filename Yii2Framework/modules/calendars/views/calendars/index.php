<?php
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use app\config\widgets\ActiveForm;
use app\config\components\functions;
/* @var $this yii\web\View */
/* @var $model \app\modules\calendars\models\VML\CalendarsVML */
$this->title              = Yii::t('calendars', 'Calendars');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendars-index">
    <div class="card">
        <div class="card-header ">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title"><?= Yii::t('calendars', 'Calendars') ?></h4>
            </div>
            <p><?= Yii::t('app', '') ?></p>
        </div>
        <div class="card-block">
            <div id="calendar"></div>
        </div>
    </div>
</div>
<div>
    <?php ob_start(); ?>
    <?php
    Modal::begin([
        'id'      => 'modalNew',
        'options' => ['class' => ''],
        'title'   => Yii::t('app', 'Create'),
        'footer'  => Html::a(Yii::t('app', 'Save'), null, ['class' => 'btn btn-sm btn-success', 'id' => 'saveNew'])
    ]);
    ?>
    <?php $form                     = ActiveForm::begin(['id' => 'formNew']); ?>
    <?= Html::activeHiddenInput($model, 'id') ?>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'favcolor')->textInput(['type' => 'color']) ?>
        </div>
    </div>
    <?= $form->field($model, 'type_id')->dropDownList($model->list_type) ?>
    <?= $form->field($model, 'status_id')->dropDownList($model->list_status) ?>
    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'start_date')->textInput(['readonly' => true, 'style' => 'direction: ltr;text-align: left;']) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'start_time')->textInput(['style' => 'direction: ltr;text-align: left;']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'end_date')->textInput(['readonly' => true, 'style' => 'direction: ltr;text-align: left;']) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'end_time')->textInput(['style' => 'direction: ltr;text-align: left;']) ?>
        </div>
    </div>
    <?= $form->field($model, 'time_id')->dropDownList($model->list_time) ?>
    <?= $form->field($model, 'period_id')->dropDownList($model->list_period) ?>
    <?= $form->field($model, 'alarm_type_id')->dropDownList($model->list_alarm_type) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'file')->fileInput() ?>
    <?php ActiveForm::end(); ?>
    <?php Modal::end(); ?>
    <?php $this->params['modals'][] = ob_get_clean(); ?>
</div>
<div>
    <?php ob_start() ?>
    <?php
    Modal::begin([
        'id'      => 'modalView',
        'options' => ['class' => ''],
        'title'   => Yii::t('app', 'Details'),
        'footer'  => Html::a(Yii::t('app', 'Update'), null, ['class' => 'btn btn-sm btn-primary update'])
        . ' ' . Html::a(Yii::t('app', 'Delete'), null, ['class' => 'btn btn-sm btn-danger delete'])
    ])
    ?>
    <div>
        <p>
            <?= Html::a(Yii::t('app', 'Update'), null, ['class' => 'btn btn-sm btn-primary update']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), null, ['class' => 'btn btn-sm btn-danger delete']) ?>
        </p>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('title') ?></label>
            <div class="col-8" id="title"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('favcolor') ?></label>
            <div class="col-8"><div id="favcolor" style="height: 30px;"></div></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('type_id') ?></label>
            <div class="col-8" id="type_id"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('status_id') ?></label>
            <div class="col-8" id="status_id"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('location') ?></label>
            <div class="col-8" id="location"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('start_date') ?></label>
            <div class="col-8" id="start_date"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('start_time') ?></label>
            <div class="col-8" id="start_time"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('end_date') ?></label>
            <div class="col-8" id="end_date"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('end_time') ?></label>
            <div class="col-8" id="end_time"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('time_id') ?></label>
            <div class="col-8" id="time_id"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('period_id') ?></label>
            <div class="col-8" id="period_id"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('alarm_type_id') ?></label>
            <div class="col-8" id="alarm_type_id"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('description') ?></label>
            <div class="col-8" id="description"></div>
        </div>
        <div class="row form-group">
            <label class="col-4"><?= $model->getAttributeLabel('file') ?></label>
            <div class="col-8">
                <img id="file" src="" style="max-width: 100%;max-height: 150px;"/>
            </div>
        </div>
    </div>
    <?php Modal::end() ?>
    <?php $this->params['modals'][] = ob_get_clean() ?>
</div>

<?php
$this->registerCssFile('@web/themes/custom/css/fullcalendar.min.css', ['depends' => \app\assets\AdminAsset::class]);
$this->registerCss('
    .fc-unthemed .fc-today {color: black !important;}
    .myselected {
        background-color: #bed7f3 !important;
    }
    .fc-basic-view td {cursor: pointer;}
    .fc-basic-view th {cursor: default;}
');
$this->registerJsFile('@web/themes/custom/js/moment.min.js', ['depends' => \app\assets\AdminAsset::class]);
$this->registerJsFile('@web/themes/custom/js/moment-jalaali.js', ['depends' => \app\assets\AdminAsset::class]);
$this->registerJsFile('@web/themes/custom/js/fullcalendar.min.js', ['depends' => \app\assets\AdminAsset::class]);
$this->registerJsFile('@web/themes/custom/js/locale-all.js', ['depends' => \app\assets\AdminAsset::class]);

$this->registerJs("
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
        $('#modalView').modal('hide');
        $('#modalNew').modal('show');
    });
    $('.delete').on('click', function (e) {
        var row = $(this).data('row');
        var id = row.id;
        if (confirm('" . Yii::t('app', 'Are you sure?') . "')) {
            var formData = new FormData();
            formData.append('id', id);
            ajaxpost('" . \yii\helpers\Url::to(['delete']) . "', formData, function (result) {
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
    $('#formNew').on('submit', function (e) {
        e.preventDefault();
        showloading();
        $('#formNew').yiiActiveForm('validate');
        setTimeout(function () {
            hideloading();
            var errors = $('#formNew').find('.has-error').length;
            if (errors === 0) {
                var url = $('#formNew').attr('action');
                var formData = new FormData($('#formNew').get(0));
                ajaxpost(url, formData, function (result) {
                    if (result.saved === true) {
                        $('#calendar').fullCalendar('removeEvents', result.data.id);
                        $('#calendar').fullCalendar('renderEvent', result.data);
                        $('#modalNew').modal('hide');
                    }
                });
            }
        }, 500);
    });
    $('#saveNew').on('click', function (e) {
        e.preventDefault();
        $('#formNew').submit();
    });
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
    $('#modalNew').on('hidden.bs.modal', function () {
        $('.myselected').removeClass('myselected');
        $('#formNew').get(0).reset();
    });
    
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
            left: 'agendaDay,agendaWeek,month next today prev print',
            //center: 'title',
        },
        eventRender: function (calEvent, element, view) {
            element.css('background-color', calEvent.favcolor);
            element.css('border-color', calEvent.favcolor);
            return true;
        },
        events: " . json_encode($calendars) . ",
        eventClick: function (event, jsEvent, view) {
            var \$modal = $('#modalView');
            \$modal.find('.update').data('row', event);
            \$modal.find('.delete').data('row', event);
            \$modal.find('#title').text(event.title);
            \$modal.find('#favcolor').css('background', event.favcolor);
            \$modal.find('#type_id').text(event.list_type[event.type_id]);
            \$modal.find('#status_id').text(event.list_status[event.status_id]);
            \$modal.find('#location').text(event.location);
            \$modal.find('#start_date').text(event.start_date);
            \$modal.find('#start_time').text(event.start_time);
            \$modal.find('#end_date').text(event.end_date);
            \$modal.find('#end_time').text(event.end_time);
            \$modal.find('#time_id').text(event.list_time[event.time_id]);
            \$modal.find('#period_id').text(event.list_period[event.period_id]);
            \$modal.find('#alarm_type_id').text(event.list_alarm_type[event.alarm_type_id]);
            \$modal.find('#description').text(event.description);
            \$modal.find('#file').attr('src', '" . Yii::getAlias('@web/uploads/calendars') . "/' + event.file);
            \$modal.modal('show');
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
        },
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
    $('.fc-toolbar .fc-left').prepend('<button class=\"btn printBtn\" onclick=\"print();\">پرینت</button>');
    $('<input/>').val('" . functions::getjdate() . "').addClass('form-control form-control-sm')
        .attr('id', 'fulldate')
        .attr('style', 'direction: ltr;text-align: center;max-width: 150px;')
        .MdPersianDateTimePicker({
            targetTextSelector: '#fulldate',
            isGregorian: false,
            yearOffset: 60,
            englishNumber: true,
            //trigger: 
        })
        .on('hide.bs.popover', function () {
            var m = moment(this.value, 'jYYYY/jMM/jDD');
            var date = tr_num(m.format('YYYY-MM-DD'))
            $('#calendar').fullCalendar('gotoDate', date);
        })
        .attr('placeholder', 'تاریخ')
        .appendTo('.fc-left');
    $('<input/>').addClass('form-control form-control-sm')
        .attr('id', 'search')
        .attr('placeholder', 'جستجو')
        .attr('style', 'max-width: 150px;')
        .on('input', function () {
            var title = $(this).val();
            console.log(title);
            ajaxget('".yii\helpers\Url::to(['search'])."?title=' + title, {}, function (result) {
                if (result && result.start) {
                    $('#calendar').fullCalendar('gotoDate', result.start);
                }
            });
        })
        .appendTo('.fc-left');
    
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
");
