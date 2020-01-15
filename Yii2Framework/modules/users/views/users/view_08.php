<?php
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\bootstrap4\Html;
use app\config\widgets\GridView;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\Users */
/* @var $searchModel app\modules\users\models\VML\UsersResumeSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<p>
    <?= Html::a(Yii::t('app', 'Create'), ['/users/users-resume/create', 'user_id' => $model->id], ['class' => 'btn btn-sm btn-success mb-1']) ?>
</p>
<?php
Pjax::begin();
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'columns'      => [
        ['class' => app\config\widgets\SerialColumn::class],
        'company_name',
        [
            'attribute' => 'type_id',
            'pattern' => '{title}'
        ],
        'job',
        'start_date:jdate',
        'end_date:jdate',
        'termination',
        'salary',
        'insurance:bool',
        'phone',
        'address',
        'points',
        [
            'class' => \app\config\widgets\ActionColumn::class,
            'urlCreator' => function ($action, $model) {
                if ($action === 'view') {
                    return Url::to(['/users/users-resume/view', 'id' => $model->id]);
                }
                if ($action === 'update') {
                    return Url::to(['/users/users-resume/update', 'id' => $model->id]);
                }
                if ($action === 'delete') {
                    return Url::to(['/users/users-resume/delete', 'id' => $model->id]);
                }
            },
        ],
    ],
]);
Pjax::end();
