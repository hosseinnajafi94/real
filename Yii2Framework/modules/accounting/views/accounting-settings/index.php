<?php
use yii\helpers\Url;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use app\config\widgets\ActiveForm;
use app\config\widgets\Pjax;
use app\config\widgets\GridView;
use app\config\widgets\SerialColumn;
use app\config\widgets\ActionColumn;
use app\config\widgets\CheckboxColumn;
/* @var $this yii\web\View */
/* @var $model app\modules\accounting\models\DAL\AccountingSettings */
/* @var $form app\config\widgets\ActiveForm */
$this->title = Yii::t('accounting', 'Accounting Settings');
$items2      = \app\modules\accounting\models\DAL\AccountingListClients::find()->indexBy('id')->all();
$getRaw      = function ($model, $attribute) use ($items2) {
    $item = isset($items2[$model->$attribute]) ? $items2[$model->$attribute]->title : '';
    return '
    <div class="form-group row">
        <label class="col-5 control-label">' . $model->getAttributeLabel($attribute) . '</label>
        <div class="col-7">
            <div class="input-group mb-0">
                <input id="' . Html::getInputId($model, $attribute) . '" class="form-control form-control-sm" type="text" disabled value="' . $item . '"/>
                <div class="input-group-append">
                    <a class="btn btn-sm btn-dark showModal" data-id="' . ((int) substr($attribute, 15, -3)) . '"><i class="tyf tyf-assign-list text-light"></i></a>
                </div>
            </div>
        </div>
    </div>
    ';
};
?>
<div class="accounting-accounting-settings-index card">
    <div class="card-block p-1">
        <ul class="nav nav-tabs hidden-print">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#page1">تنظیمات حسابداری</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page2">انبار</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page3">فروش</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page4">خرید</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page5">اموال</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page6">تنظیمات عمومی</a></li>
        </ul>
        <div class="tab-content p-0 pt-1">
            <div class="tab-pane active show" id="page1">
                <?php
                $form = ActiveForm::begin([
                    'layout'      => 'horizontal',
                    'fieldConfig' => [
                        'horizontalCssClasses' => [
                            'label'   => 'col-5',
                            'wrapper' => 'col-7',
                        ],
                    ],
                ]);
                ?>
                <div id="tab1accordionwrap" class="accordion">
                    <div class="card collapse-icon accordion-icon-rotate m-0">
                        <div id="tab1heading1" class="card-header">
                            <a data-toggle="collapse" href="" data-target="#tab1accordion1" aria-expanded="true" aria-controls="tab1accordion1" class="card-title"> تنظیمات حسابها</a>
                        </div>
                        <div id="tab1accordion1" data-parent="#tab1accordionwrap" aria-labelledby="tab1heading1" class="collapse show">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account01_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account10_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account02_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account11_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account03_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account12_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account04_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account13_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account05_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account14_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account06_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account15_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account07_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account16_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account08_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account17_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account09_id') ?>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab1heading2" class="card-header">
                            <a data-toggle="collapse" href="" data-target="#tab1accordion2" aria-expanded="false" aria-controls="tab1accordion2" class="card-title collapsed"> حداکثر مجموع مبالغ چک ها در ماه</a>
                        </div>
                        <div id="tab1accordion2" data-parent="#tab1accordionwrap" aria-labelledby="tab1heading2" class="collapse">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col">
                                            <?= $form->field($model, 'valint01')->numberInput(); ?>
                                        </div>
                                        <div class="col">
                                            <?= $form->field($model, 'valint02')->numberInput() ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $form->field($model, 'valint03')->numberInput() ?>
                                        </div>
                                        <div class="col">
                                            <?= $form->field($model, 'valint04')->numberInput() ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $form->field($model, 'valint05')->numberInput() ?>
                                        </div>
                                        <div class="col">
                                            <?= $form->field($model, 'valint06')->numberInput() ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $form->field($model, 'valint07')->numberInput() ?>
                                        </div>
                                        <div class="col">
                                            <?= $form->field($model, 'valint08')->numberInput() ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $form->field($model, 'valint09')->numberInput() ?>
                                        </div>
                                        <div class="col">
                                            <?= $form->field($model, 'valint10')->numberInput() ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $form->field($model, 'valint11')->numberInput() ?>
                                        </div>
                                        <div class="col">
                                            <?= $form->field($model, 'valint12')->numberInput() ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab1heading3" class="card-header">
                            <a data-toggle="collapse" href="" data-target="#tab1accordion3" aria-expanded="false" aria-controls="tab1accordion3" class="card-title collapsed">تنظیمات صدور خودکار اسناد</a>
                        </div>
                        <div id="tab1accordion3" data-parent="#tab1accordionwrap" aria-labelledby="tab1heading3" class="collapse">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col">
                                            <?= $form->field($model, 'bit01')->checkbox() ?>
                                        </div>
                                        <div class="col">
                                            <?= $form->field($model, 'bit02')->checkbox() ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $form->field($model, 'bit03')->checkbox() ?>
                                        </div>
                                        <div class="col">
                                            <?= $form->field($model, 'bit04')->checkbox() ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab1heading4" class="card-header">
                            <a data-toggle="collapse" href="" data-target="#tab1accordion4" aria-expanded="false" aria-controls="tab1accordion4" class="card-title collapsed">تنظیمات انتقال سیستمی سود و زیان در اختتامیه و حسابهای اختتامیه و افتتاحیه</a>
                        </div>
                        <div id="tab1accordion4" data-parent="#tab1accordionwrap" aria-labelledby="tab1heading4" class="collapse">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col">
                                            <?= $form->field($model, 'bit05')->checkbox() ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account65_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $form->field($model, 'bit06')->checkbox() ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account66_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account67_id') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab1heading5" class="card-header">
                            <a data-toggle="collapse" href="" data-target="#tab1accordion5" aria-expanded="false" aria-controls="tab1accordion5" class="card-title collapsed">سایر تنظیمات</a>
                        </div>
                        <div id="tab1accordion5" data-parent="#tab1accordionwrap" aria-labelledby="tab1heading5" class="collapse">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col">
                                            <?= $form->field($model, 'id_p01')->select2($items['id_p01']) ?>
                                        </div>
                                        <div class="col">
                                            <?= $form->field($model, 'id_p02')->select2($items['id_p02']) ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $form->field($model, 'id_p03')->select2($items['id_p03']) ?>
                                        </div>
                                        <div class="col">
                                            <?= $form->field($model, 'id_p04')->select2($items['id_p04']) ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $form->field($model, 'id_p05')->select2($items['id_p05']) ?>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0 mt-4 pull-left']) ?>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="tab-pane form-horizontal" id="page2">
                <div id="tab2accordionwrap" class="accordion">
                    <div class="card collapse-icon accordion-icon-rotate m-0">
                        <div id="tab2heading1" class="card-header">
                            <a data-toggle="collapse" href="" data-target="#tab2accordion1" aria-expanded="true" aria-controls="tab2accordion1" class="card-title">تنظیمات حسابها</a>
                        </div>
                        <div id="tab2accordion1" data-parent="#tab2accordionwrap" aria-labelledby="tab2heading1" class="collapse show">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account18_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account19_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account20_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account21_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account22_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account23_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account24_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account25_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account26_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account27_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account28_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account29_id') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane form-horizontal" id="page3">
                <div id="tab3accordionwrap" class="accordion">
                    <div class="card collapse-icon accordion-icon-rotate m-0">
                        <div id="tab3heading1" class="card-header">
                            <a data-toggle="collapse" href="" data-target="#tab3accordion1" aria-expanded="true" aria-controls="tab3accordion1" class="card-title">تنظیمات حسابها</a>
                        </div>
                        <div id="tab3accordion1" data-parent="#tab3accordionwrap" aria-labelledby="tab3heading1" class="collapse show">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account30_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account39_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account31_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account40_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account32_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account41_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account33_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account42_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account34_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account43_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account35_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account44_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account36_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account45_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account37_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account46_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account38_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account47_id') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane form-horizontal" id="page4">
                <div id="tab4accordionwrap" class="accordion">
                    <div class="card collapse-icon accordion-icon-rotate m-0">
                        <div id="tab4heading1" class="card-header">
                            <a data-toggle="collapse" href="" data-target="#tab4accordion1" aria-expanded="true" aria-controls="tab4accordion1" class="card-title">تنظیمات حسابها</a>
                        </div>
                        <div id="tab4accordion1" data-parent="#tab4accordionwrap" aria-labelledby="tab4heading1" class="collapse show">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account48_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account54_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account49_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account55_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account50_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account56_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account51_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account57_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account52_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account58_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account53_id') ?>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab4heading2" class="card-header">
                            <a data-toggle="collapse" href="" data-target="#tab4accordion2" aria-expanded="false" aria-controls="tab4accordion2" class="card-title collapsed">حساب سایر هزینه ها</a>
                        </div>
                        <div id="tab4accordion2" data-parent="#tab4accordionwrap" aria-labelledby="tab4heading2" class="collapse">
                            <div class="card-body">
                                <div class="card-block">
                                    <p>
                                        <?= Html::a(Yii::t('app', 'Create'), ['/accounting/accounting-settings-list-others/create'], ['class' => 'btn btn-sm btn-success create']) ?>
                                    </p>
                                    <?php Pjax::begin(['id' => 'pjax']); ?>
                                    <?= GridView::widget([
                                        'id' => 'grid',
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
                                        'dataProvider' => $dataProvider,
                                        'filterModel'  => $searchModel,
                                        'columns'      => [
                                            ['class' => SerialColumn::class],
                                            'title',
                                            [
                                                'attribute' => 'client_id',
                                                'pattern'   => '{title}',
                                                'filter' => Html::activeDropDownList($searchModel, 'client_id', $model2->list_accounts, ['class' => 'form-control form-control-sm', 'prompt' => ''])
                                            ],
                                            ['class' => CheckboxColumn::class],
                                            [
                                                'class' => ActionColumn::class,
                                                'template' => '{update} {delete}',
                                                'buttons' => [
                                                    'update' => function ($url, $model) {
                                                        return Html::a('<i class="fa fa-pencil"></i>', ['/accounting/accounting-settings-list-others/update', 'id' => $model->id], ['data' => ['pjax' => 0, 'title' => $model->title, 'client_id' => $model->client_id], 'class' => 'update']);
                                                    },
                                                    'delete' => function ($url, $model) {
                                                        return Html::a('<i class="fa fa-times"></i>', ['/accounting/accounting-settings-list-others/delete', 'id' => $model->id], ['data' => ['pjax' => 0, 'message' => Yii::t('app', 'Are you sure?')], 'class' => 'delete']);
                                                    }
                                                ]
                                            ],
                                        ],
                                    ]) ?>
                                    <a class="btn btn-sm btn-danger mb-0 pull-left disabled deleteAll" data-url="<?= Url::to(['/accounting/accounting-settings-list-others/delete-all']) ?>" data-message="<?= Yii::t('app', 'Are you sure?') ?>">حذف</a>
                                    <?php Pjax::end(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane form-horizontal" id="page5">
                <div id="tab5accordionwrap" class="accordion">
                    <div class="card collapse-icon accordion-icon-rotate m-0">
                        <div id="tab5heading1" class="card-header">
                            <a data-toggle="collapse" href="" data-target="#tab5accordion1" aria-expanded="true" aria-controls="tab5accordion1" class="card-title">تنظیمات حسابها</a>
                        </div>
                        <div id="tab5accordion1" data-parent="#tab5accordionwrap" aria-labelledby="tab5heading1" class="collapse show">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account59_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account60_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account61_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account62_id') ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account63_id') ?>
                                        </div>
                                        <div class="col">
                                            <?= $getRaw($model, 'default_account64_id') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="page6">
                <?php
                $form = ActiveForm::begin([
                    'layout'      => 'horizontal',
                    'fieldConfig' => [
                        'horizontalCssClasses' => [
                            'label'   => 'col-5',
                            'wrapper' => 'col-7',
                        ],
                    ],
                ]);
                ?>
                <div id="tab6accordionwrap" class="accordion">
                    <div class="card collapse-icon accordion-icon-rotate m-0">
                        <div id="tab6heading1" class="card-header">
                            <a data-toggle="collapse" href="" data-target="#tab6accordion1" aria-expanded="true" aria-controls="tab6accordion1" class="card-title">تنظیمات پورتال</a>
                        </div>
                        <div id="tab6accordion1" data-parent="#tab6accordionwrap" aria-labelledby="tab6heading1" class="collapse show">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col">
                                            <?= $form->field($model, 'id_p06')->select2($items['id_p06']) ?>
                                        </div>
                                        <div class="col">
                                            <?= $form->field($model, 'id_p07')->select2($items['id_p07']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab6heading2" class="card-header">
                            <a data-toggle="collapse" href="" data-target="#tab6accordion2" aria-expanded="false" aria-controls="tab6accordion2" class="card-title collapsed">تنظیمات نرخ مبنا</a>
                        </div>
                        <div id="tab6accordion2" data-parent="#tab6accordionwrap" aria-labelledby="tab6heading2" class="collapse">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col">
                                            <?= $form->field($model, 'id_p08')->select2($items['id_p08']) ?>
                                        </div>
                                        <div class="col">
                                            <?= $form->field($model, 'id_p09')->select2($items['id_p09']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab6heading3" class="card-header">
                            <a data-toggle="collapse" href="" data-target="#tab6accordion3" aria-expanded="false" aria-controls="tab6accordion3" class="card-title collapsed"> تنظیمات بروزرسانی خودکار نرخ ارزها</a>
                        </div>
                        <div id="tab6accordion3" data-parent="#tab6accordionwrap" aria-labelledby="tab6heading3" class="collapse">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col">
                                            <?= $form->field($model, 'id_p10')->select2($items['id_p10']) ?>
                                        </div>
                                        <div class="col">
                                            <?= $form->field($model, 'valint13')->numberInput() ?>
                                        </div>
                                        <div class="col">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <?= $form->field($model, 'name01')->textInput(['maxlength' => true, 'data-class' => 'ltr']) ?>
                                        </div>
                                        <div class="col">
                                            <?= $form->field($model, 'valint14')->numberInput() ?>
                                        </div>
                                        <div class="col">
                                            <?= $form->field($model, 'name02')->textInput(['maxlength' => true, 'data-class' => 'ltr']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-sm btn-success mb-0 mt-4 pull-left']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<div>
    <?php ob_start(); ?>
    <?php
    Modal::begin([
        'id'      => 'modal',
        'options' => ['class' => ''],
        'title'   => Yii::t('app', 'Update'),
        'footer'  => Html::a(Yii::t('app', 'Save'), null, ['class' => 'btn btn-sm btn-success', 'id' => 'save'])
    ]);
    ?>
    <?php $form2                    = ActiveForm::begin(['id' => 'form']); ?>
    <?= Html::activeHiddenInput($model2, 'type_id') ?>
    <?= $form2->field($model2, 'accounts')->select2($model2->list_accounts, ['multiple' => true]) ?>
    <?= $form2->field($model2, 'default_id')->dropDownList([]) ?>
    <?php ActiveForm::end(); ?>
    <?php Modal::end(); ?>
    <?php $this->params['modals'][] = ob_get_clean(); ?>
</div>
<div>
    <?php ob_start(); ?>
    <?php
    Modal::begin([
        'id'      => 'modalOther',
        'options' => ['class' => ''],
        'title'   => Yii::t('app', 'Update'),
        'footer'  => Html::a(Yii::t('app', 'Save'), null, ['class' => 'btn btn-sm btn-success', 'id' => 'saveOther'])
    ]);
    ?>
    <?php $form3 = ActiveForm::begin(['id' => 'formOther']); ?>
    <?= $form3->field($model3, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form3->field($model3, 'client_id')->select2($model2->list_accounts) ?>
    <?php ActiveForm::end(); ?>
    <?php Modal::end(); ?>
    <?php $this->params['modals'][] = ob_get_clean(); ?>
</div>
<?php
$this->registerCss("
    .modal-header {padding: 5px 15px;}
    .modal-footer {padding: 5px 15px;}
    .select2-container--krajee-bs4 .select2-selection--single {height: calc(2rem + 2px);}
    .select2-container--krajee-bs4 .select2-selection--multiple {height: calc(2rem + 2px);}
    .showModal {padding: 7px 8px 0 10px;}
");
$this->registerJs("
    $(document).on('change', '.grid-view tbody input:checkbox', function () {
        $('.deleteAll').removeClass('disabled');
        if ($('.grid-view tbody input:checkbox:checked').length === 0) {
            $('.deleteAll').addClass('disabled');
        }
    });
    $(document).on('click', '.deleteAll', function () {
        var url     = $(this).data('url');
        var message = $(this).data('message');
        var ids     = $('#grid').yiiGridView('getSelectedRows');
        if (ids.length > 0 && confirm(message)) {
            ajaxget(url, {ids}, function () {
                $.pjax.reload({container:'#pjax'});
            });
        }
    });
    $('#modalOther').on('hide.bs.modal', function () {
        $('#formOther').get(0).reset();
    });
    $(document).on('submit', '#formOther', function (e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var data = new FormData(this);
        ajaxpost(url, data, function (result) {
            var isValid = validResult(result);
            if (isValid) {
                $('#modalOther').modal('hide');
                $.pjax.reload({container: '#pjax', async: false});
            }
        }, undefined, undefined, undefined, true);
    });
    $(document).on('click', '#saveOther', function (e) {
        e.preventDefault();
        $('#formOther').trigger('submit');
    });
    $(document).on('click', '.create', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $('#formOther').attr('action', url);
        $('#accountingsettingslistothers-title').val('');
        $('#accountingsettingslistothers-client_id').val('').trigger('change');
        $('#modalOther').modal('show');
    });
    $(document).on('click', '.update', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var title = $(this).data('title');
        var client_id = $(this).data('client_id');
        $('#formOther').attr('action', url);
        $('#accountingsettingslistothers-title').val(title);
        $('#accountingsettingslistothers-client_id').val(client_id).trigger('change');
        $('#modalOther').modal('show');
    });
    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        var message = $(this).data('message');
        if (confirm(message)) {
            ajaxget(url, {}, function () {
                $.pjax.reload({container: '#pjax', async: false});
            });
        }
    });
    $('#modal').on('hide.bs.modal', function () {
        $('#form').get(0).reset();
        $('#accountingsettingsvml-type_id').val('');
        $('#accountingsettingsvml-accounts').val([]).trigger('change');
        $('#accountingsettingsvml-default_id').html('<option value=\"\">" . Yii::t('app', 'Please Select') . "</option>');
    });
    $('#accountingsettings-id_p06').on('change', function () {
        var org_id = $(this).val();
        if (!org_id) {
            $('#accountingsettings-id_p07').html('<option value=\"\">" . Yii::t('app', 'Please Select') . "</option>');
            return;
        }
        ajaxget('" . Url::to(['get2']) . "', {org_id}, function (result) {
            var items = '<option value=\"\">" . Yii::t('app', 'Please Select') . "</option>';
            result.rows.forEach(function (row) {
                items += '<option value=\"' + row.id + '\">' + row.title + '</option>';
            });
            $('#accountingsettings-id_p07').html(items);
        });
    });
    $('#accountingsettingsvml-accounts')
        .on('change', change)
        .on('change.select2', change)
        .on('select2:closing', change)
        .on('select2:close', change)
        .on('select2:opening', change)
        .on('select2:open', change)
        .on('select2:selecting', change)
        .on('select2:select', change)
        .on('select2:unselecting', change)
        .on('select2:unselect', change)
        .on('select2:clearing', change)
        .on('select2:clear', change);
    function change() {
        var options = '<option value=\"\">" . Yii::t('app', 'Please Select') . "</option>';
        $(this).find('option:selected').each(function () {
            var id = $(this).attr('value');
            var text = $(this).text();
            options += '<option value=\"' + id + '\">' + text + '</options>';
        });
        $('#accountingsettingsvml-default_id').html(options);
    }
    $(document).on('click', '#save', function (e) {
        e.preventDefault();
        $('#form').trigger('submit');
    });
    $(document).on('submit', '#form', function (e) {
        e.preventDefault();
        var data = new FormData(this);
        ajaxpost('" . Url::to(['save']) . "', data, function (result) {
            var isValid = validResult(result);
            if (isValid) {
                if ($('#accountingsettingsvml-default_id').val()) {
                    var type = parseInt($('#accountingsettingsvml-type_id').val());
                    var text = $('#accountingsettingsvml-default_id option:selected').text();
                    $('#accountingsettings-default_account' + (type < 10 ? '0' : '') + type + '_id').val(text);
                }
                $('#modal').modal('hide');
            }
        }, undefined, undefined, undefined, true);
    });
    $(document).on('click', '.showModal', function (e) {
        e.preventDefault();
        var type_id = $(this).data('id');
        ajaxget('" . Url::to(['get']) . "', {type_id}, function (result) {
            $('#accountingsettingsvml-type_id').val(result.type_id);
            $('#accountingsettingsvml-accounts').val(result.accounts).trigger('change');
            if (result.default_id) {
                $('#accountingsettingsvml-default_id').val(result.default_id);
            }
            $('#modal').modal('show');
        });
    });
");
