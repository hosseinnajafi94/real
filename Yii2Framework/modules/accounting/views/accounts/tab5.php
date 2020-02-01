<?php
use yii\helpers\Url;
use yii\bootstrap4\Html;
/* @var $this yii\web\View */
$this->registerJs("
    $('#jstreeCost2').jstree({
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

                            $('#formCost').attr('action', '" . Url::to(['/accounting/accounting-costs/update', 'id' => '000']) . "'.replace('000', original.id));

                            $('.field-accountingcosts-cost_type_id').hide();
                            $('#accountingcosts-type_id').val(original.type_id);
                            $('#accountingcosts-cost_type_id').val(original.cost_type_id);
                            $('#accountingcosts-title').val(original.title);
                            $('#accountingcosts-code').val(original.code);
                            $('#accountingcosts-is_active').prop('checked', original.is_active == 1);
                            $('#accountingcosts-descriptions').val(original.descriptions);
                            $('#accountingcosts-voucher_allow').prop('checked', original.voucher_allow == 1);
                            $('#accountingcosts-budget_allow').prop('checked', original.budget_allow == 1);
                            $('#accountingcosts-form_id').val(original.form_id);

                            $('#modalCost').modal('show');
                        }
                    },
                    'delete': {
                        icon: 'fa fa-times text-danger',
                        label : 'حذف',
                        action: function (data) {
                            var inst = $.jstree.reference(data.reference);
                            var obj = inst.get_node(data.reference);
                            if (confirm('" . Yii::t('app', 'Are you sure you want to delete this item?') . "')) {
                                ajaxget('" . Url::to(['/accounting/accounting-costs/delete', 'id' => '000']) . "'.replace('000', obj.id), {}, function (result) {
                                    var isValid = validResult(result);
                                    if (isValid) {
                                        $('#jstreeCost2').jstree('delete_node', obj.id);
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
<p>
    <?= Html::a(Yii::t('app', 'مرکز جدید'), ['/accounting/accounting-costs/create'], ['class' => 'btn btn-sm btn-success createCost2']) ?>
</p>
<div id="jstreeCost2"></div>