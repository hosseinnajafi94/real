<?php
use yii\bootstrap4\Html;
use app\config\components\functions;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\Users */
?>
<p>
    <?= Html::a(Yii::t('app', 'Update'), ['user', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
</p>
<div class="row mb-2">
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-5"><?= $model->getAttributeLabel('expiration') ?>:</label>
            <div class="col-md-7"><?= $model->expiration ? functions::tojdate($model->expiration) : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-5"><?= $model->getAttributeLabel('language_id') ?>:</label>
            <div class="col-md-7"><?= $model->language ? $model->language->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-5"><?= $model->getAttributeLabel('calendar_type_id') ?>:</label>
            <div class="col-md-7"><?= $model->calendarType ? $model->calendarType->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-5"><?= $model->getAttributeLabel('date_type_id') ?>:</label>
            <div class="col-md-7"><?= $model->dateType ? $model->dateType->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-5"><?= $model->getAttributeLabel('first_day_in_week_id') ?>:</label>
            <div class="col-md-7"><?= $model->firstDayInWeek ? $model->firstDayInWeek->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-5"><?= $model->getAttributeLabel('number_format_id') ?>:</label>
            <div class="col-md-7"><?= $model->numberFormat ? $model->numberFormat->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-5"><?= $model->getAttributeLabel('daylight_state_id') ?>:</label>
            <div class="col-md-7"><?= $model->daylightState ? $model->daylightState->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-5"><?= $model->getAttributeLabel('timezone_id') ?>:</label>
            <div class="col-md-7"><?= $model->timezone ? $model->timezone->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-5"><?= $model->getAttributeLabel('from_month_id') ?>:</label>
            <div class="col-md-7"><?= $model->fromMonth ? $model->fromMonth->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-5"><?= $model->getAttributeLabel('from_day_id') ?>:</label>
            <div class="col-md-7"><?= $model->fromDay ? $model->fromDay->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-5"><?= $model->getAttributeLabel('to_month_id') ?>:</label>
            <div class="col-md-7"><?= $model->toMonth ? $model->toMonth->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-5"><?= $model->getAttributeLabel('to_day_id') ?>:</label>
            <div class="col-md-7"><?= $model->toDay ? $model->toDay->title : '---' ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <label class="col-md-5"><?= $model->getAttributeLabel('rtl') ?>:</label>
            <div class="col-md-7"><i class="fa fa-<?= $model->rtl ? 'check text-success' : 'times text-danger' ?>"></i></div>
        </div>
    </div>
</div>
<div class="border p-2 mb-1">
    <label><?= $model->getAttributeLabel('use_sip') ?>: <i class="fa fa-<?= $model->use_sip ? 'check text-success' : 'times text-danger' ?>"></i></label>
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <label class="col-md-5"><?= $model->getAttributeLabel('mode_use_sip_id') ?>:</label>
                <div class="col-md-7"><?= $model->modeUseSip ? $model->modeUseSip->title : '---' ?></div>
            </div>
        </div>
    </div>
</div>
<div class="border p-2">
    <label><?= $model->getAttributeLabel('show_lang') ?>: <i class="fa fa-<?= $model->show_lang ? 'check text-success' : 'times text-danger' ?>"></i></label><br/>
    <small class="text-danger">با انتخاب این گزینه کلماتی که قابلیت ترجمه مجدد دارند بصورت مجزا نمایش داده می شوند.</small>
</div>