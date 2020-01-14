<?php
use yii\bootstrap4\Html;
use app\config\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\modules\correspondence\models\DAL\Mails */
$this->title = $model->id;
?>
<div class="mails-view card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= Yii::t('correspondence', 'Mails') ?></h4>
        </div>
        <p><?= Yii::t('app', 'Details') ?></p>
    </div>
    <div class="card-block">
        <p class="hidden-print">
            <?= Html::a(Yii::t('app', 'Return'), ['ongoing', 'type_id' => $model->type_id], ['class' => 'btn btn-sm btn-warning']) ?>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], ['class' => 'btn btn-sm btn-danger', 'data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'), 'method' => 'post']]) ?>
            <?= Html::a(Yii::t('app', 'ارجاع'), ['reference', 'id' => $model->id], ['class' => 'btn btn-sm btn-secondary']) ?>
            <?= Html::a(Yii::t('app', 'امضاء'), ['signature', 'id' => $model->id], ['class' => 'btn btn-sm btn-secondary', 'data' => ['confirm' => Yii::t('app', 'Are you sure?'), 'method' => 'post']]) ?>
            <?= Html::a(Yii::t('app', 'Print'), null, ['class' => 'btn btn-sm btn-secondary', 'onclick' => 'print();']) ?>
        </p>
        <?= DetailView::widget([
            'model'      => $model->model,
            'attributes' => [
                //[
                //    'attribute' => 'type_id',
                //    'pattern' => '{title}'
                //],
                //[
                //    'attribute' => 'status_id',
                //    'pattern' => '{title}'
                //],
                [
                    'attribute' => 'secretariat_id',
                    'pattern' => '{name}'
                ],
                [
                    'attribute' => 'pattern_id',
                    'pattern' => '{title}'
                ],
                [
                    'label' => 'امضاء کنندگان',
                    'format' => 'raw',
                    'value' => function ($model) {
                        $rows = [];
                        $all = $model->getMailsSignatories()->all();
                        foreach ($all as $al) {
                            $rows[] = app\modules\users\models\SRL\UsersSRL::getUserFullname($al->user);
                        }
                        return implode('، ', $rows);
                    }
                ],
                [
                    'attribute' => 'receiver_type_id',
                    'value' => function ($model) {
                        return $model->receiverType->title;
                    }
                ],
                [
                    'attribute' => 'receiver1_id',
                    'value' => function ($model) {
                        if ($model->receiverType->id == 1) {
                            return app\modules\users\models\SRL\UsersSRL::getUserFullname($model->receiver1);
                        }
                        else {
                            return null;
                        }
                    }
                ],
                [
                    'label' => 'رونوشت',
                    'value' => function ($model) {
                        $rows = [];
                        $all = $model->getMailsCopies()->where(['type_id' => 1])->all();
                        foreach ($all as $al) {
                            $rows[] = app\modules\users\models\SRL\UsersSRL::getUserFullname($al->user);
                        }
                        return implode('، ', $rows);
                    }
                ],
                [
                    'label' => 'رونوشت مخفی',
                    'value' => function ($model) {
                        $rows = [];
                        $all = $model->getMailsCopies()->where(['type_id' => 2])->all();
                        foreach ($all as $al) {
                            $rows[] = app\modules\users\models\SRL\UsersSRL::getUserFullname($al->user);
                        }
                        return implode('، ', $rows);
                    }
                ],
                [
                    'attribute' => 'text',
                    'format' => 'raw'
                ],
                [
                    'label' => 'ارجاعات',
                    'format' => 'raw',
                    'value' => function ($model) {
                        $rows = [];
                        $all = $model->getMailsRefrences()->all();
                        foreach ($all as $al) {
                            $rows[] = app\modules\users\models\SRL\UsersSRL::getUserFullname($al->user);
                        }
                        return implode('<br/>', $rows);
                    }
                ],
                [
                    'label' => 'امضاء ها',
                    'format' => 'raw',
                    'value' => function ($model) {
                        $rows = [];
                        $all = $model->getMailsSignatures()->all();
                        foreach ($all as $al) {
                            $rows[] = app\modules\users\models\SRL\UsersSRL::getUserFullname($al->user);
                        }
                        return implode('<br/>', $rows);
                    }
                ],
                [
                    'label' => 'شماره نامه',
                    'format' => 'raw',
                    'visible' => $model->model->status_id != 1,
                    'value' => function ($model) {
                        /* @var $model app\modules\correspondence\models\DAL\Mails */
                        $secretariat = $model->secretariat;
                        return $model->section_1 . $secretariat->splitter_1 . $model->section_2 . $secretariat->splitter_2 . $model->section_3;
                    }
                ]
            ]
        ]) ?>
    </div>
</div>