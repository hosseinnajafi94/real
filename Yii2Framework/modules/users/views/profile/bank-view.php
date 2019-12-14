<?php
use yii\helpers\Html;
use app\config\widgets\DetailView;
use app\modules\users\models\SRL\UsersSRL;
/* @var $this yii\web\View */
/* @var $model \app\modules\users\models\DAL\UsersBanks */
$fullname = UsersSRL::getUserFullname($model->user);
$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Profile'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('users', 'Users Banks');
$this->params['breadcrumbs'][] = $model->bank->title;
?>
<div class="users-profile-banks-view box">
    <div class="box-header"><?= $model->bank->title ?></div>
    <p>
        <?= Html::a(Yii::t('app', 'Create'), ['bank-create'], ['class' => 'btn btn-sm btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Update'), ['bank-update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['bank-delete', 'id' => $model->id], ['class' => 'btn btn-sm btn-danger', 'data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'), 'method' => 'post']]) ?>
    </p>
    <div class="table-responsive">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'bank_id',
                    'pattern'   => '{title}',
                ],
                'card_number',
                'account_number',
                'shaba_number',
                'default:bool',
            ],
        ]) ?>
    </div>
</div>