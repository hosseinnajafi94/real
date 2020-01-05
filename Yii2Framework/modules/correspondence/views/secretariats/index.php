<?php
use yii\bootstrap4\Html;
use app\config\widgets\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\correspondence\models\VML\SecretariatsSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('correspondence', 'Secretariats');
?>
<div class="secretariats-index card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= Yii::t('correspondence', 'Secretariats') ?></h4>
        </div>
    </div>
    <div class="card-block">
        <p>
            <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
        </p>
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
                //'section_1',
                //'section_2',
                //'splitter_1',
                //'splitter_2',
                ['class' => app\config\widgets\ActionColumn::class],
            ],
        ]) ?>
        <?php Pjax::end() ?>
    </div>
</div>