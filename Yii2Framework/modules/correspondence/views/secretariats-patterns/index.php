<?php
use yii\widgets\Pjax;
use yii\bootstrap4\Html;
use app\config\widgets\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\correspondence\models\VML\SecretariatsPatternsSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('correspondence', 'Secretariats Patterns');
?>
<div class="correspondence-secretariats-patterns-index card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
    </div>
    <div class="card-block">
        <p>
            <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
        </p>
        <?php Pjax::begin() ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => app\config\widgets\SerialColumn::class],
                'secretariat_id',
                'title',
                'size_id',
                'sign_count',
                ['class' => \app\config\widgets\ActionColumn::class],
            ],
        ]) ?>
        <?php Pjax::end() ?>
    </div>
</div>