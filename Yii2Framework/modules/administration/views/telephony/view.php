<?php
use yii\bootstrap4\Html;
use app\config\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\modules\administration\models\DAL\Telephony */
$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Telephonies'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="telephony-view card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
    </div>
    <div class="card-block">
        <p>
            <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning']) ?>
            <?= Html::a(Yii::t('app', 'Update'), ['index'], ['class' => 'btn btn-sm btn-primary']) ?>
            <?=
            Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-sm btn-danger',
                'data'  => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method'  => 'post',
                ],
            ])
            ?>
        </p>
        <?=
        DetailView::widget([
            'model'      => $model,
            'attributes' => [
                'name',
                'address:ntext',
            ],
        ])
        ?>
    </div>
</div>
