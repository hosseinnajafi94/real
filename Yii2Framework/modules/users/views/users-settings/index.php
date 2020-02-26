<?php
use yii\helpers\Html;
use app\config\widgets\GridView;
use app\config\widgets\CheckboxColumn;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\users\models\VML\UsersSettingsSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title                   = Yii::t('users', 'Users Settings');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-settings-index card">
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
                    ['class' => app\config\widgets\SerialColumn::class],
                'section',
                    [
                    'attribute' => 'type_id',
                    'pattern'   => '{title}'
                ],
                    ['class' => CheckboxColumn::class],
                    ['class' => app\config\widgets\ActionColumn::class],
            ],
        ]);
        ?>


    </div>
</div>
