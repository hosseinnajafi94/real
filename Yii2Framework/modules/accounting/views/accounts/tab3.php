<?php
use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $items array */
/* @var $form app\config\widgets\ActiveForm */
/* @var $model \app\modules\accounting\models\DAL\AccountingFloats */
?>
<p>
    <?= Html::a(Yii::t('app', 'شناور جدید'), ['/accounting/accounting-floats/create'], ['class' => 'btn btn-sm btn-success createFloat']) ?>
</p>
<div id="jstreeFloat"></div>
<div>
    <?php ob_start(); ?>
    <?php
    Modal::begin([
        'id'      => 'modalFloat',
        'options' => ['class' => ''],
        'title'   => Yii::t('app', 'Create'),
        'footer'  => ''
        . ' ' . Html::a(Yii::t('app', 'Return'), null, ['class' => 'btn btn-sm btn-warning', 'id' => 'returnFloat'])
        . ' ' . Html::a(Yii::t('app', 'Save'), null, ['class' => 'btn btn-sm btn-success', 'id' => 'saveFloat'])
    ]);
    $form = ActiveForm::begin([
        'id'          => 'formFloat',
        'layout'      => 'horizontal',
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label'   => 'col-4',
                'wrapper' => 'col-8',
            ],
        ],
    ]);
    ?>
    <?= $form->field($model, 'code')->textInput(['maxlength' => true, 'data' => ['class' => 'ltr']]) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
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
    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-8">
            <?= $form->field($model, 'budget_allow', [
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
        //    $('#jstreeFloat').jstree(true).search($(this).val());
        //});
        $(document).on('hide.bs.modal', '#modalFloat', function () {
            $('#formFloat').get(0).reset();
        });
        $(document).on('click', '#returnFloat', function (e) {
            e.preventDefault();
            $('#modalFloat').modal('hide');
        });
        $(document).on('click', '#saveFloat', function (e) {
            e.preventDefault();
            $('#formFloat').trigger('submit');
        });
        $(document).on('submit', '#formFloat', function (e) {
            e.preventDefault();
            var url  = $(this).attr('action');
            var data = new FormData(this);
            ajaxpost(url, data, function (result) {
                var isValid = validResult(result);
                if (isValid) {
                    result.model.text = result.model.title;
                    if (result.action === 'create') {
                        $('#jstreeFloat').jstree().create_node('#', result.model, 'last');
                        //$('#jstreeFloat').jstree('open_all');
                    }
                    else if (result.action === 'update') {
                        var node = $('#jstreeFloat').jstree(true).get_node(result.model.id);
                        node.original = result.model;
                        $('#jstreeFloat').jstree('rename_node', node, result.model.title);
                    }
                    $('#modalFloat').modal('hide');
                }
            }, undefined, undefined, undefined, true);
        });
        $(document).on('click', '.createFloat', function (e) {
            e.preventDefault();
            $('#formFloat').attr('action', $(this).attr('href'));
            $('#modalFloat').modal('show');
        });
        $('#jstreeFloat').jstree({
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
                                $('#formFloat').attr('action', '" . Url::to(['/accounting/accounting-floats/update', 'id' => '000']) . "'.replace('000', original.id));
                                $('#accountingfloats-code').val(original.code);
                                $('#accountingfloats-title').val(original.title);
                                $('#accountingfloats-descriptions').val(original.descriptions);
                                $('#accountingfloats-voucher_allow').prop('checked', original.voucher_allow == 1);
                                $('#accountingfloats-budget_allow').prop('checked', original.budget_allow == 1);
                                $('#accountingfloats-form_id').val(original.form_id);
                                $('#modalFloat').modal('show');
                            }
                        },
                        'delete': {
                            icon: 'fa fa-times text-danger',
                            label : 'حذف',
                            action: function (data) {
                                var inst = $.jstree.reference(data.reference);
                                var obj = inst.get_node(data.reference);
                                if (confirm('" . Yii::t('app', 'Are you sure you want to delete this item?') . "')) {
                                    ajaxget('" . Url::to(['/accounting/accounting-floats/delete', 'id' => '000']) . "'.replace('000', obj.id), {}, function (result) {
                                        var isValid = validResult(result);
                                        if (isValid) {
                                            $('#jstreeFloat').jstree('delete_node', obj.id);
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