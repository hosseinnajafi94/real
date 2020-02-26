<?php
use yii\bootstrap4\Html;
use app\config\widgets\GridView;
use app\config\widgets\CheckboxColumn;
use app\config\widgets\SerialColumn;
use app\config\widgets\ActionColumn;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\organizations\models\VML\OrganizationsRulesSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('organizations', 'Organizations Rules');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizations-rules-index card">
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

        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                    ['class' => SerialColumn::class],
                    [
                    'attribute' => 'org_id',
                    'pattern'   => '{name}'
                ],
                'title',
                    [
                    'attribute' => 'type_id',
                    'pattern'   => '{title}'
                ],
                    ['class' => CheckboxColumn::class],
                    ['class' => ActionColumn::class],
            ],
        ]);
        ?>


    </div>
</div>
