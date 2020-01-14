<?php
use app\assets\AdminAsset;
/* @var $this \yii\web\View */
/* @var $model \app\modules\calendars\models\VML\CalendarsVML */
/* @var $modelType \app\modules\calendars\models\VML\CalendarsListTypeVML */
/* @var $data \yii\data\ActiveDataProvider */
/* @var $search \app\modules\calendars\models\VML\CalendarsSearchVML */
$this->title          = Yii::t('calendars', 'Calendars');
//$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/themes/custom/libs/timepicker/timepicker.css', ['depends' => AdminAsset::class]);
$this->registerJsFile('@web/themes/custom/libs/timepicker/timepicker.js', ['depends' => AdminAsset::class]);
$types                = $modelType->getTypes();
$this->params['menu'] = '
    <li class="nav-item"><a class="addType">تقویم جدید</a></li>
    <li class="nav-item"><a class="listType">مدیریت تقویم ها</a></li>
    <li class="nav-item noclose">
        <a style="padding: 0;">
            <label class="mb-0" style="padding: 7px 14px 7px 10px;display: block;cursor: pointer;">
                <input type="checkbox" class="calendar_type" data-id="all" checked/>
                <span class="menu-title">همه</span>
            </label>
        </a>
    </li>
';
foreach ($types as $type) {
    $this->params['menu'] .= '
        <li class="nav-item noclose">
            <a style="padding: 0;">
                <label class="mb-0" style="padding: 7px 14px 7px 10px;display: block;cursor: pointer;">
                    <input type="checkbox" class="calendar_type" data-id="' . $type['id'] . '" checked/>
                    <span class="menu-title">' . $type['title'] . '</span>
                </label>
            </a>
        </li>
    ';
}
?>
<!--  -->
<div class="calendars-index">
    <div class="card">
        <div class="card-block p-1">
            <ul class="nav nav-tabs hidden-print">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#page1">تقویم</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page2">لیست رویدادها</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page3">مدیریت زمان</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page4">مقدمات برگزاری</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= \yii\helpers\Url::to(['import']) ?>">درون ریزی</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= \yii\helpers\Url::to(['export']) ?>">برون ریزی</a></li>
            </ul>
            <div class="tab-content p-0 pt-1">
                <div class="tab-pane active show" id="page1">
                    <?=
                    $this->render('index1', [
                        'model'      => $model,
                        'modelType'  => $modelType,
                        'modelAlarm' => $modelAlarm,
                        'types'      => $types
                    ])
                    ?>
                </div>
                <div class="tab-pane" id="page2">
                    <?=
                    $this->render('index2', [
                        'data'   => $data,
                        'search' => $search
                    ])
                    ?>
                </div>
                <div class="tab-pane" id="page3">
                    <?= $this->render('index3') ?>
                </div>
                <div class="tab-pane" id="page4">
                    <?=
                    $this->render('index4', [
                        'data'   => $data4,
                        'search' => $search4
                    ])
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>