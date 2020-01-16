<?php
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\bootstrap4\Html;
use app\config\widgets\GridView;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\Users */
/* @var $searchModel app\modules\users\models\VML\UsersDescriptionsSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<p>
    <?= Html::a(Yii::t('app', 'Create'), ['/users/users-descriptions/create', 'type_id' => 1, 'user_id' => $model->id], ['class' => 'btn btn-sm btn-success mb-1']) ?>
</p>
<?php
Pjax::begin();
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'columns'      => [
        ['class' => app\config\widgets\SerialColumn::class],
        'descriptions:raw',
        [
            'class' => \app\config\widgets\ActionColumn::class,
            'urlCreator' => function ($action, $model) {
                if ($action === 'view') {
                    return Url::to(['/users/users-descriptions/view', 'id' => $model->id]);
                }
                if ($action === 'update') {
                    return Url::to(['/users/users-descriptions/update', 'id' => $model->id]);
                }
                if ($action === 'delete') {
                    return Url::to(['/users/users-descriptions/delete', 'id' => $model->id]);
                }
            },
        ],
    ],
]);
Pjax::end();
