<?php
use app\assets\AdminAsset;
/* @var $this \yii\web\View */
/* @var $model \app\modules\calendars\models\VML\CalendarsVML */
/* @var $modelType \app\modules\calendars\models\VML\CalendarsListTypeVML */
/* @var $data \yii\data\ActiveDataProvider */
/* @var $search \app\modules\calendars\models\VML\CalendarsSearchVML */
$this->title = Yii::t('calendars', 'Calendars');
//$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/themes/custom/libs/timepicker/timepicker.css', ['depends' => AdminAsset::class]);
$this->registerJsFile('@web/themes/custom/libs/timepicker/timepicker.js', ['depends' => AdminAsset::class]);
?>
<!--  -->
<div class="calendars-index">
    <div class="card">
        <div class="card-header ">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title"><?= Yii::t('calendars', 'Calendars') ?></h4>
            </div>
            <p><?= Yii::t('app', '') ?></p>
        </div>
        <div class="card-block">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#page1">تقویم</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page2">مدیریت</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page3">جلسه ساز</a></li>
            </ul>
            <div class="tab-content px-1">
                <div class="tab-pane active show" id="page1">
                    <?= $this->render('index1', [
                        'model' => $model,
                        'modelType' => $modelType
                    ]) ?>
                </div>
                <div class="tab-pane" id="page2">
                    <?= $this->render('index2', [
                        'data' => $data,
                        'search' => $search
                    ]) ?>
                </div>
                <div class="tab-pane" id="page3">
                    <?= $this->render('index3', [
                        
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>