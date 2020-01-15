<?php
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\bootstrap4\Html;
use app\config\widgets\GridView;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\Users */
/* @var $searchModel app\modules\users\models\VML\UsersEducationsSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<p>
    <?= Html::a(Yii::t('app', 'Create'), ['/users/users-educations/create', 'user_id' => $model->id], ['class' => 'btn btn-sm btn-success mb-1']) ?>
</p>
<?php
Pjax::begin();
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'columns'      => [
        ['class' => app\config\widgets\SerialColumn::class],
        [
            'attribute' => 'type_id',
            'pattern' => '{title}'
        ],
        [
            'attribute' => 'degree_id',
            'pattern' => '{title}'
        ],
        'field',
        'university',
        'gpa',
        'start_date:jdate',
        'end_date:jdate',
        'evidence:bool',
        'description',
        'points',
        [
            'class' => \app\config\widgets\ActionColumn::class,
            'urlCreator' => function ($action, $model) {
                if ($action === 'view') {
                    return Url::to(['/users/users-educations/view', 'id' => $model->id]);
                }
                if ($action === 'update') {
                    return Url::to(['/users/users-educations/update', 'id' => $model->id]);
                }
                if ($action === 'delete') {
                    return Url::to(['/users/users-educations/delete', 'id' => $model->id]);
                }
            },
        ],
    ],
]);
Pjax::end();
