<?php
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use yii\grid\ActionColumn;
use app\config\widgets\Pjax;
use app\config\widgets\GridView;
use app\config\widgets\ActiveForm;
/* @var $this \yii\web\View */
/* @var $data \yii\data\ActiveDataProvider */
/* @var $search \app\modules\calendars\models\VML\CalendarsSearchVML */
?>
<p>
    <?= Html::a(Yii::t('app', 'Create'), null, ['class' => 'btn btn-sm mb-1 btn-success', 'onclick' => "$('#modalNewRequirements').modal('show');"]) ?>
</p>
<?php ob_start(); ?>
<?php
Modal::begin([
    'id'      => 'modalNewRequirements',
    'options' => ['class' => ''],
    'title'   => Yii::t('app', 'Create'),
    'footer'  => Html::a(Yii::t('app', 'Save'), null, ['class' => 'btn btn-sm btn-success', 'id' => 'saveNewRequirements'])
]);
?>
<?php $form = ActiveForm::begin(['action' => ['/calendars/requirements/create']]); ?>
<?= $form->field($modelRequirements, 'title')->textInput(['maxlength' => true]) ?>
<?php ActiveForm::end(); ?>
<?php Modal::end(); ?>
<?php $this->params['modals'][] = ob_get_clean(); ?>

<?php
Pjax::begin([
    'id' => 'list4'
]);
echo GridView::widget([
    'layout'         => '
        {items}
        {summary}
        {pager}
    ',
    'summaryOptions' => ['class' => 'summary pull-right'],
    'pager'          => [
        'options'                       => ['class' => 'pagination pagination-sm pull-left', 'style' => 'margin-left: 2px;'],
        'linkContainerOptions'          => ['class' => 'page-item'],
        'linkOptions'                   => ['class' => 'page-link'],
        'disabledListItemSubTagOptions' => ['class' => 'page-link disabled']
    ],
    'dataProvider'   => $data,
    'filterModel'    => $search,
    'columns'        => [
            ['class' => 'yii\grid\SerialColumn', 'header' => 'ردیف'],
        'title',
            ['class' => 'yii\grid\CheckboxColumn'],
            [
            'class'    => ActionColumn::class,
            'template' => '{delete}',
            'buttons'  => [
                'delete' => function ($url, $model) {
                    return Html::a('<i class="fa fa-times"></i>', ['/calendars/requirements/delete', 'id' => $model->id], ['class' => 'ajaxDelete', 'data' => ['pjax' => 0, 'container' => 'list4', 'confirm2' => Yii::t('app', 'Are you sure?')]]);
                },
            ],
        ],
    ],
]);
echo Html::a('حذف', null, ['class' => 'btn btn-sm btn-danger list4DeleteAll pull-left disabled']);
Pjax::end();

$this->registerCss("
    #list4 thead th {padding: 5px 13px !important;}
");
$this->registerJs("
    $(document).on('hidden.bs.modal', '#modalNewRequirements', function () {
        $('#modalNewRequirements form').get(0).reset();
    });
    $(document).on('change', '#list4 [name=\"selection[]\"]', function () {
        $('.list4DeleteAll').removeClass('disabled');
        var items = $('#list4 [name=\"selection[]\"]:checked');
        if (items.length === 0) {
            $('.list4DeleteAll').addClass('disabled');
        }
    });
    $(document).on('click', '.list4DeleteAll', function (e) {
        var ids = $('#list4 .grid-view').yiiGridView('getSelectedRows');
        if (confirm('" . Yii::t('app', 'Are you sure?') . "')) {
            ajaxget('" . yii\helpers\Url::to(['/calendars/requirements/delete-all']) . "', {ids}, function () {
                $.pjax.reload({container: '#list4', async: false});
            });
        }
    });
    $(document).on('submit', '#modalNewRequirements form', function (e) {
        e.preventDefault();
        var \$form = $(this);
        var url = \$form.attr('action');
        var formData = new FormData(\$form.get(0));
        showloading();
        \$form.yiiActiveForm('validate');
        setTimeout(function () {
            hideloading();
            var errors = \$form.find('.is-invalid').length;
            if (errors === 0) {
                ajaxpost(url, formData, function (result) {
                    var isValid = validResult(result);
                    if (isValid) {
                        $.pjax.reload({container: '#list4', async: false});
                        $('#modalNewRequirements').modal('hide');
                    }
                }, undefined, undefined, undefined, true);
            }
        }, 0);
    });
    $(document).on('click', '#saveNewRequirements', function (e) {
        e.preventDefault();
        $('#modalNewRequirements form').submit();
    });
");
