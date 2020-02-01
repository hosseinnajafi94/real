<?php
use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $items array */
/* @var $form app\config\widgets\ActiveForm */
/* @var $model \app\modules\accounting\models\DAL\AccountingProjects */
?>
<p>
    <?= Html::a(Yii::t('app', 'پروژه جدید'), ['/accounting/accounting-projects/create'], ['class' => 'btn btn-sm btn-success createProject']) ?>
</p>
<div id="jstreeProject"></div>
<div>
    <?php ob_start(); ?>
    <?php
    Modal::begin([
        'id'      => 'modalProject',
        'options' => ['class' => ''],
        'title'   => Yii::t('app', 'Create'),
        'footer'  => ''
        . ' ' . Html::a(Yii::t('app', 'Return'), null, ['class' => 'btn btn-sm btn-warning', 'id' => 'returnProject'])
        . ' ' . Html::a(Yii::t('app', 'Save'), null, ['class' => 'btn btn-sm btn-success', 'id' => 'saveProject'])
    ]);
    $form = ActiveForm::begin([
        'id'          => 'formProject',
        'layout'      => 'horizontal',
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label'   => 'col-4',
                'wrapper' => 'col-8',
            ],
        ],
    ]);
    ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'code')->textInput(['maxlength' => true, 'data' => ['class' => 'ltr']]) ?>
    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-8">
            <?= $form->field($model, 'is_active', [
                 'horizontalCssClasses' => [
                    'wrapper' => 'col-12',
                ],
            ])->checkbox() ?>
        </div>
    </div>
    <?= $form->field($model, 'descriptions')->textarea(['rows' => 3]) ?>
    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-8">
            <?= $form->field($model, 'voucher_allow', [
                 'horizontalCssClasses' => [
                    'wrapper' => 'col-12',
                ],
            ])->checkbox() ?>
        </div>
    </div>
    <?= $form->field($model, 'form_id')->dropDownList([]) ?>
    <?php ActiveForm::end(); ?>
    <?php Modal::end(); ?>
    <?php $this->params['modals'][] = ob_get_clean(); ?>
</div>
<div>
    <?php
    $this->registerJs("
        //$('#input').on('input', function(e) {
        //    e.preventDefault();
        //    $('#jstreeProject').jstree(true).search($(this).val());
        //});
        $(document).on('hide.bs.modal', '#modalProject', function () {
            $('#formProject').get(0).reset();
        });
        $(document).on('click', '#returnProject', function (e) {
            e.preventDefault();
            $('#modalProject').modal('hide');
        });
        $(document).on('click', '#saveProject', function (e) {
            e.preventDefault();
            $('#formProject').trigger('submit');
        });
        $(document).on('submit', '#formProject', function (e) {
            e.preventDefault();
            var url  = $(this).attr('action');
            var data = new FormData(this);
            ajaxpost(url, data, function (result) {
                var isValid = validResult(result);
                if (isValid) {
                    result.model.text = result.model.title;
                    if (result.action === 'create') {
                        $('#jstreeProject').jstree().create_node('#', result.model, 'last');
                        //$('#jstreeProject').jstree('open_all');
                    }
                    else if (result.action === 'update') {
                        var node = $('#jstreeProject').jstree(true).get_node(result.model.id);
                        node.original = result.model;
                        $('#jstreeProject').jstree('rename_node', node, result.model.title);
                    }
                    $('#modalProject').modal('hide');
                }
            }, undefined, undefined, undefined, true);
        });
        $(document).on('click', '.createProject', function (e) {
            e.preventDefault();
            $('#formProject').attr('action', $(this).attr('href'));
            $('#modalProject').modal('show');
        });
        $('#jstreeProject').jstree({
            'plugins' : ['search', 'types', 'contextmenu'], // , 'sort'
            'types' : {
                'default' : {
                    'icon' : 'fa fa-folder text-orange'
                }
            },
            contextmenu: {
                items: function () {
                    return {
                        'info': {
                            icon: 'fa fa-info text-success',
                            label : 'دفتر حساب',
                            action: function (data) {
                                var inst = $.jstree.reference(data.reference);
                                var obj = inst.get_node(data.reference);
                                //window.location = ''.replace('000', obj.id);
                            }
                        },
                        'update': {
                            icon: 'fa fa-pencil text-primary',
                            label : 'ویرایش',
                            action: function (data) {
                                var inst = $.jstree.reference(data.reference);
                                var obj = inst.get_node(data.reference);
                                var original = obj.original;
                                $('#formProject').attr('action', '" . Url::to(['/accounting/accounting-projects/update', 'id' => '000']) . "'.replace('000', original.id));
                                $('#accountingprojects-title').val(original.title);
                                $('#accountingprojects-code').val(original.code);
                                $('#accountingprojects-is_active').prop('checked', original.is_active == 1);
                                $('#accountingprojects-descriptions').val(original.descriptions);
                                $('#accountingprojects-voucher_allow').prop('checked', original.voucher_allow == 1);
                                $('#accountingprojects-form_id').val(original.form_id);
                                $('#modalProject').modal('show');
                            }
                        },
                        'delete': {
                            icon: 'fa fa-times text-danger',
                            label : 'حذف',
                            action: function (data) {
                                var inst = $.jstree.reference(data.reference);
                                var obj = inst.get_node(data.reference);
                                if (confirm('" . Yii::t('app', 'Are you sure you want to delete this item?') . "')) {
                                    ajaxget('" . Url::to(['/accounting/accounting-projects/delete', 'id' => '000']) . "'.replace('000', obj.id), {}, function (result) {
                                        var isValid = validResult(result);
                                        if (isValid) {
                                            $('#jstreeProject').jstree('delete_node', obj.id);
                                        }
                                    });
                                }
                            }
                        }
                    };
                }
            },
            core : {
                data : " . json_encode($items) . ",
                check_callback: true,
            }
        }).on('loaded.jstree', function() {
            $(this).jstree('open_all');
        });
    ");
    ?>
</div>