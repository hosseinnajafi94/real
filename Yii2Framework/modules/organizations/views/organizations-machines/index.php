<?php
use yii\bootstrap4\Html;
use app\config\widgets\GridView;
use app\config\widgets\SerialColumn;
use app\config\widgets\ActionColumn;
use app\config\widgets\CheckboxColumn;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\organizations\models\VML\OrganizationsMachinesSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('organizations', 'Organizations Machines');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizations-machines-index card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
        <p></p>
    </div>
    <div class="card-block">
        <p>
            <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
        </p>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                    ['class' => SerialColumn::class],
                'id',
                    [
                    'attribute' => 'org_id',
                    'pattern'   => '{title}',
                ],
                    [
                    'attribute' => 'machine_id',
                    'pattern'   => '{title}',
                ],
                'ip',
                    ['class' => CheckboxColumn::class],
                //'port',
                //'calendar_type_id',
                //'timezone_id:datetime',
                //'model_id',
                //'daylight_id',
                //'form_month_id',
                //'form_day_id',
                //'to_month_id',
                //'to_day_id',
                //'enable_cal_login:boolean',
                //'default_type_sync:boolean',
                ['class' => ActionColumn::class],
            ],
        ]);
        ?>


    </div>
</div>
