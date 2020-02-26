<?php
use app\config\widgets\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\administration\models\VML\SysModulesSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('administration', 'Sys Modules');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sys-modules-index card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
    </div>
    <div class="card-block">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => \app\config\widgets\SerialColumn::class],
                'name',
                'version',
                'new_version',
                'update_at:jdatetime',
            ],
        ]); ?>
    </div>
</div>