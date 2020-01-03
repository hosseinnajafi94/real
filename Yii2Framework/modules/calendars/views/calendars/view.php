<?php
use yii\bootstrap4\Html;
use app\config\widgets\DetailView;
use app\modules\users\models\SRL\UsersSRL;
/* @var $this yii\web\View */
/* @var $model app\modules\calendars\models\VML\CalendarsVML */
//$this->title = $model->title;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('calendars', 'Calendars'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//\yii\web\YiiAsset::register($this);
?>
<div class="calendars-view">
    <div class="card">
        <div class="card-header ">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title"><?= Yii::t('calendars', 'Calendars') ?></h4>
            </div>
            <p><?= $model->title ?></p>
        </div>
        <div class="card-block">
            <p>
                <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning']) ?>
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->model->id], ['class' => 'btn btn-sm btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->model->id], ['class' => 'btn btn-sm btn-danger', 'data' => ['confirm' => Yii::t('app', 'Are you sure you want to delete this item?'), 'method' => 'post']]) ?>
            </p>
            <?=
            DetailView::widget([
                'model'      => $model->model,
                'attributes' => [
                    'title',
                    [
                        'attribute' => 'favcolor',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return '<div style="max-width: 150px;height: 20px;background: '.$model->favcolor.'"></div>';
                        }
                    ],
                    [
                        'attribute' => 'type_id',
                        'pattern' => '{title}'
                    ],
                    [
                        'attribute' => 'status_id',
                        'pattern' => '{title}'
                    ],
                    'location',
                    'start_time:jdatetime',
                    'end_time:jdatetime',
                    [
                        'attribute' => 'time_id',
                        'pattern' => '{title}'
                    ],
                    [
                        'attribute' => 'period_id',
                        'pattern' => '{title}'
                    ],
                    [
                        'label' => $model->getAttributeLabel('alarm_type_id'),
                        'value' => function ($model) {
                            return $model->alarmType ? $model->alarmType->title : null;
                        }
                    ],
                    [
                        'label' => 'دعوت شدگان',
                        'value' => function ($model) {
                            $users = $model->getCalendarsUsers()->orderBy(['id' => SORT_ASC])->all();
                            $items = [];
                            foreach ($users as $user) {
                                if ($user->user) {
                                    $items[] = UsersSRL::getUserFullname($user->user);
                                }
                            }
                            return implode('، ', $items);
                        }
                    ],
                    'description:raw',
                    [
                        'attribute' => 'file',
                        'format' => ['file', 'calendars']
                    ]
                ],
            ])
            ?>
        </div>
    </div>
</div>
