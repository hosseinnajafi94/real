<?php
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\bootstrap4\Html;
use app\config\widgets\GridView;
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\Users */
/* @var $searchModel app\modules\users\models\VML\UsersFamiliesSearchModel */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>
<p>
    <?= Html::a(Yii::t('app', 'Create'), ['/users/users-families/create', 'user_id' => $model->id], ['class' => 'btn btn-sm btn-success mb-1']) ?>
</p>
<?php
Pjax::begin();
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'columns'      => [
        ['class' => app\config\widgets\SerialColumn::class],
        'fname',
        'lname',
        'nationalcode',
        [
            'attribute' => 'gender_id',
            'pattern' => '{title}'
        ],
        'birthday:jdate',
        'birthplace',
        [
            'attribute' => 'ratio_id',
            'pattern' => '{title}'
        ],
        [
            'attribute' => 'degree_id',
            'pattern' => '{title}'
        ],
        'job',
        'phone',
        'address',
        'under_assignment:bool',
        [
            'class' => \app\config\widgets\ActionColumn::class,
            'urlCreator' => function ($action, $model) {
                if ($action === 'view') {
                    return Url::to(['/users/users-families/view', 'id' => $model->id]);
                }
                if ($action === 'update') {
                    return Url::to(['/users/users-families/update', 'id' => $model->id]);
                }
                if ($action === 'delete') {
                    return Url::to(['/users/users-families/delete', 'id' => $model->id]);
                }
            },
        ],
    ],
]);
Pjax::end();
