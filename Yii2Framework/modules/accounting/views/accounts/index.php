<?php
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use app\assets\AdminAsset;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $models array */
/* @var $items array */
$this->title = Yii::t('accounting', 'Accounting');

$this->registerCssFile('@web/themes/custom/libs/jstree/themes/default/style.min.css', ['depends' => AdminAsset::class]);
$this->registerJsFile('@web/themes/custom/libs/jstree/jstree.min.js', ['depends' => AdminAsset::class]);

$this->registerCss("
    .modal-header {padding: 5px 15px;}
    .modal-footer {padding: 5px 15px;}
");
?>
<div class="accounting-accounts-index card">
    <div class="card-block p-0">
        <ul class="nav nav-tabs m-1 hidden-print">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab1">حساب ها</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab2">اشخاص</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab3">شناور</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab4">مراکز هزینه</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab5">مراکز درآمد</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab6">پروژه ها</a></li>
        </ul>
        <div class="tab-content p-1 pb-2">
            <div class="tab-pane active show" id="tab1">
                <?= $this->render('tab1', [
                    'items' => $items['accounts'],
                    'model' => $models['account'],
                    'rows'  => $rows['account'],
                ]) ?>
            </div>
            <div class="tab-pane" id="tab2">
                <?= $this->render('tab2', [
                    'items' => $items['clients'],
                    'model' => $models['client'],
                    'rows'  => $rows['client'],
                ]) ?>
            </div>
            <div class="tab-pane" id="tab3">
                <?= $this->render('tab3', [
                    'items' => $items['floats'],
                    'model' => $models['float'],
                    'rows'  => $rows['floating'],
                ]) ?>
            </div>
            <div class="tab-pane" id="tab4">
                <?= $this->render('tab4', [
                    'items' => $items['costs1'],
                    'rows'  => $rows['cost'],
                ]) ?>
            </div>
            <div class="tab-pane" id="tab5">
                <?= $this->render('tab5', [
                    'items' => $items['costs2'],
                    'rows'  => $rows['cost'],
                ]) ?>
            </div>
            <div class="tab-pane" id="tab6">
                <?= $this->render('tab6', [
                    'items' => $items['projects'],
                    'model' => $models['project'],
                    'rows'  => $rows['project'],
                ]) ?>
            </div>
        </div>
    </div>
</div>
<div>
    <?php ob_start(); ?>
    <?php
    Modal::begin([
        'id'      => 'modalCost',
        'options' => ['class' => ''],
        'title'   => Yii::t('app', 'Create'),
        'footer'  => ''
        . ' ' . Html::a(Yii::t('app', 'Return'), null, ['class' => 'btn btn-sm btn-warning', 'id' => 'returnCost'])
        . ' ' . Html::a(Yii::t('app', 'Save'), null, ['class' => 'btn btn-sm btn-success', 'id' => 'saveCost'])
    ]);
    $formCost = ActiveForm::begin([
        'id'          => 'formCost',
        'layout'      => 'horizontal',
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label'   => 'col-4',
                'wrapper' => 'col-8',
            ],
        ],
    ]);
    ?>
    <?= Html::activeHiddenInput($models['cost'], 'type_id') ?>
    <?= $formCost->field($models['cost'], 'cost_type_id')->dropDownList($rows['cost']['cost_type_id']) ?>
    <?= $formCost->field($models['cost'], 'title')->textInput(['maxlength' => true]) ?>
    <?= $formCost->field($models['cost'], 'code')->textInput(['maxlength' => true, 'data' => ['class' => 'ltr']]) ?>
    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-8">
            <?=
            $formCost->field($models['cost'], 'is_active', [
                'horizontalCssClasses' => [
                    'wrapper' => 'col-12',
                ],
            ])->checkbox()
            ?>
        </div>
    </div>
    <?= $formCost->field($models['cost'], 'descriptions')->textarea(['rows' => 3]) ?>
    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-8">
            <?=
            $formCost->field($models['cost'], 'voucher_allow', [
                'horizontalCssClasses' => [
                    'wrapper' => 'col-12',
                ],
            ])->checkbox()
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-8">
            <?= $formCost->field($models['cost'], 'budget_allow', [
                'horizontalCssClasses' => [
                    'wrapper' => 'col-12',
                ],
            ])->checkbox()
            ?>
        </div>
    </div>
    <?= $formCost->field($models['cost'], 'form_id')->dropDownList([]) ?>
    <?php ActiveForm::end(); ?>
    <?php Modal::end(); ?>
    <?php $this->params['modals'][] = ob_get_clean(); ?>
    <?php
    $this->registerJs("
        //$('#input').on('input', function(e) {
        //    e.preventDefault();
        //    $('#jstreeCost1').jstree(true).search($(this).val());
        //});
        $(document).on('hide.bs.modal', '#modalCost', function () {
            $('#formCost').get(0).reset();
        });
        $(document).on('click', '#returnCost', function (e) {
            e.preventDefault();
            $('#modalCost').modal('hide');
        });
        $(document).on('click', '#saveCost', function (e) {
            e.preventDefault();
            $('#formCost').trigger('submit');
        });
        $(document).on('click', '.createCost1', function (e) {
            e.preventDefault();
            $('#formCost').attr('action', $(this).attr('href'));
            $('#accountingcosts-type_id').val(1);
            $('.field-accountingcosts-cost_type_id').show();
            $('#modalCost').modal('show');
        });
        $(document).on('click', '.createCost2', function (e) {
            e.preventDefault();
            $('#formCost').attr('action', $(this).attr('href'));
            $('.field-accountingcosts-cost_type_id').hide();
            $('#accountingcosts-type_id').val(2);
            $('#modalCost').modal('show');
        });
        $(document).on('submit', '#formCost', function (e) {
            e.preventDefault();
            var url  = $(this).attr('action');
            var type = $(this).data('type');
            var data = new FormData(this);
            ajaxpost(url, data, function (result) {
                var isValid = validResult(result);
                if (isValid) {
                    result.model.text = result.model.title;
                    if (result.action === 'create') {
                        $('#jstreeCost' + result.model.type_id).jstree().create_node('#', result.model, 'last');
                    }
                    else if (result.action === 'update') {
                        var node = $('#jstreeCost' + result.model.type_id).jstree(true).get_node(result.model.id);
                        node.original = result.model;
                        $('#jstreeCost' + result.model.type_id).jstree('rename_node', node, result.model.title);
                    }
                    $('#modalCost').modal('hide');
                }
            }, undefined, undefined, undefined, true);
        });
    ");
    ?>
</div>