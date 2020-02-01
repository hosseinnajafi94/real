<?php
use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $items array */
/* @var $form app\config\widgets\ActiveForm */
/* @var $model \app\modules\accounting\models\DAL\AccountingAccounts */
?>
<p>
    <?= Html::a(Yii::t('app', 'حساب جدید'), ['/accounting/accounting-accounts/create'], ['class' => 'btn btn-sm btn-success createAccount']) ?>
</p>
<div id="jstreeAccount"></div>
<div>
    <?php ob_start(); ?>
    <?php
    Modal::begin([
        'id'      => 'modalAccount',
        'options' => ['class' => ''],
        'title'   => Yii::t('app', 'Create'),
        'footer'  => ''
        . ' ' . Html::a(Yii::t('app', 'Return'), null, ['class' => 'btn btn-sm btn-warning', 'id' => 'returnAccount'])
        . ' ' . Html::a(Yii::t('app', 'Save'), null, ['class' => 'btn btn-sm btn-success', 'id' => 'saveAccount'])
    ]);
    $form = ActiveForm::begin([
        'id'          => 'formAccount',
        'layout'      => 'horizontal',
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label'   => 'col-5',
                'wrapper' => 'col-7',
            ],
        ],
    ]);
    ?>
    <?= $form->field($model, 'symbol_id')->dropDownList($rows['symbol_id']) ?>
    <?= $form->field($model, 'actype_id')->dropDownList($rows['actype_id']) ?>
    <?= $form->field($model, 'account_number')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'tctype_id')->dropDownList($rows['tctype_id']) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'type_id')->dropDownList($rows['type_id']) ?>
    <?= $form->field($model, 'check_id')->dropDownList($rows['check_id']) ?>
    <?= $form->field($model, 'budget_id')->dropDownList($rows['budget_id']) ?>
    <?= $form->field($model, 'standard_notes')->select2($rows['standard_notes'], ['multiple' => true]) ?>
    <?= $form->field($model, 'note_id')->dropDownList($rows['note_id']) ?>
    <?= $form->field($model, 'descriptions')->textarea(['rows' => 3]) ?>
    <div class="row">
        <div class="col-5">
        </div>
        <div class="col-7">
            <?= $form->field($model, 'is_active', [
                'horizontalCssClasses' => [
                    'offset'  => '',
                    'wrapper' => 'col-12',
                ],
            ])->checkbox() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
        </div>
        <div class="col-7">
            <?= $form->field($model, 'voucher_allow', [
                'horizontalCssClasses' => [
                    'offset'  => '',
                    'wrapper' => 'col-12',
                ],
            ])->checkbox() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
        </div>
        <div class="col-7">
            <?= $form->field($model, 'force_floating', [
                'horizontalCssClasses' => [
                    'offset'  => '',
                    'wrapper' => 'col-12',
                ],
            ])->checkbox() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
        </div>
        <div class="col-7">
            <?= $form->field($model, 'force_client', [
                'horizontalCssClasses' => [
                    'offset'  => '',
                    'wrapper' => 'col-12',
                ],
            ])->checkbox() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
        </div>
        <div class="col-7">
            <?= $form->field($model, 'budget_allow', [
                'horizontalCssClasses' => [
                    'offset'  => '',
                    'wrapper' => 'col-12',
                ],
            ])->checkbox() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
        </div>
        <div class="col-7">
            <?= $form->field($model, 'force_cost_center', [
                'horizontalCssClasses' => [
                    'offset'  => '',
                    'wrapper' => 'col-12',
                ],
            ])->checkbox() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
        </div>
        <div class="col-7">
            <?= $form->field($model, 'force_revenue_center', [
                'horizontalCssClasses' => [
                    'offset'  => '',
                    'wrapper' => 'col-12',
                ],
            ])->checkbox() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
        </div>
        <div class="col-7">
            <?= $form->field($model, 'force_project', [
                'horizontalCssClasses' => [
                    'offset'  => '',
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
        //    $('#jstreeAccount').jstree(true).search($(this).val());
        //});
        $(document).on('hide.bs.modal', '#modalAccount', function () {
            $('#formAccount').get(0).reset();
            $('#accountingaccounts-standard_notes').val('').trigger('change');
            $('.field-accountingaccounts-standard_notes').hide();
            $('.field-accountingaccounts-note_id').hide();
        });
        $(document).on('click', '#returnAccount', function (e) {
            e.preventDefault();
            $('#modalAccount').modal('hide');
        });
        $(document).on('click', '#saveAccount', function (e) {
            e.preventDefault();
            $('#formAccount').trigger('submit');
        });
        $(document).on('submit', '#formAccount', function (e) {
            e.preventDefault();
            var url  = $(this).attr('action');
            var data = new FormData(this);
            ajaxpost(url, data, function (result) {
                var isValid = validResult(result);
                if (isValid) {
                    result.model.text = result.model.title;
                    if (result.action === 'create') {
                        $('#jstreeAccount').jstree().create_node('#', result.model, 'last');
                        //$('#jstreeAccount').jstree('open_all');
                    }
                    else if (result.action === 'update') {
                        var node = $('#jstreeAccount').jstree(true).get_node(result.model.id);
                        node.original = result.model;
                        $('#jstreeAccount').jstree('rename_node', node, result.model.title);
                    }
                    $('#modalAccount').modal('hide');
                }
            }, undefined, undefined, undefined, true);
        });
        $(document).on('change', '#accountingaccounts-voucher_allow', function (e) {
            var checked = $(this).prop('checked');
            if (checked) {
                $('.field-accountingaccounts-standard_notes').show();
                $('.field-accountingaccounts-note_id').show();
            }
            else {
                $('.field-accountingaccounts-standard_notes').hide();
                $('.field-accountingaccounts-note_id').hide();
            }
        });
        $(document).on('click', '.createAccount', function (e) {
            e.preventDefault();
            $('#formAccount').attr('action', $(this).attr('href'));
            $('#accountingaccounts-standard_notes').val('').trigger('change');
            $('.field-accountingaccounts-standard_notes').hide();
            $('.field-accountingaccounts-note_id').hide();
            $('#modalAccount').modal('show');
        });
        $('#jstreeAccount').jstree({
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
                                $('#formAccount').attr('action', '" . Url::to(['/accounting/accounting-accounts/update', 'id' => '000']) . "'.replace('000', original.id));
                                $('#accountingaccounts-code').val(original.code);
                                $('#accountingaccounts-title').val(original.title);
                                $('#accountingaccounts-descriptions').val(original.descriptions);
                                $('#accountingaccounts-voucher_allow').prop('checked', original.voucher_allow == 1);
                                $('#accountingaccounts-budget_allow').prop('checked', original.budget_allow == 1);
                                $('#accountingaccounts-form_id').val(original.form_id);
                                $('#modalAccount').modal('show');
                            }
                        },
                        'delete': {
                            icon: 'fa fa-times text-danger',
                            label : 'حذف',
                            action: function (data) {
                                var inst = $.jstree.reference(data.reference);
                                var obj = inst.get_node(data.reference);
                                if (confirm('" . Yii::t('app', 'Are you sure you want to delete this item?') . "')) {
                                    ajaxget('" . Url::to(['/accounting/accounting-accounts/delete', 'id' => '000']) . "'.replace('000', obj.id), {}, function (result) {
                                        var isValid = validResult(result);
                                        if (isValid) {
                                            $('#jstreeAccount').jstree('delete_node', obj.id);
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