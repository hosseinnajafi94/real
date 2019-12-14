<?php
use yii\helpers\Url;
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $form \app\config\widgets\ActiveForm */
/* @var $model \app\modules\ticketing\models\VML\TicketsVML */

//$this->params['breadcrumbs'][] = ['label' => Yii::t('ticketing', 'Tickets'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = Yii::t('ticketing', 'Create');
?>
<div class="card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= Yii::t('ticketing', 'Create') ?></h4>
        </div>
    </div>
    <div class="card-block">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <?= $form->field($model, 'category_id')->dropDownList($model->categories) ?>
            </div>
            <div class="col-md-4 col-xs-12">
                <?= $form->field($model, 'support_id')->dropDownList($model->supports) ?>
            </div>
            <?php
            if ($model->user->group->id == 1) {
                ?>
                <div class="col-md-4 col-xs-12">
                    <?= $form->field($model, 'receiver_id')->dropDownList($model->receivers) ?>
                </div>
                <?php
            }
            ?>
        </div>
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'message')->ckeditor() ?>
        <div id="record-panel" data-href="<?= Url::to(['create']) ?>" data-input="TicketsVML[file2][]">
            <label>ضبط صدا</label>
            <div id="controls">
                <div id="audioTag"></div>
                <a class="btn btn-danger" id="btn-start-recording">
                    <i class="fa fa-microphone"></i>
                </a>
                <a class="btn btn-warning hidden" id="btn-stop-recording">
                    <i class="fa fa-pause"></i>
                </a>
                <div id="recoring-panel">
                    <i class="fa fa-circle"></i>
                    <span id="recordTime">00:00</span>
                </div>
                <span id="upload-loading" class="hidden">
                    در حال ذخیره
                    <img src="<?= Yii::getAlias('@web/themes/custom/images/loading.gif') ?>"/>
                </span>
            </div>
            <div id="items"></div>
        </div>
        <?= $form->field($model, 'file')->fileInput() ?>
        <div class="box-footer">
            <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning']) ?>
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-sm btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php
$this->registerCssFile("@web/themes/custom/libs/audio-recorder/style.css", ['depends' => \app\assets\AdminAsset::class]);
$this->registerJsFile("@web/themes/custom/libs/audio-recorder/RecordRTC.js", ['depends' => \app\assets\AdminAsset::class]);
$this->registerJsFile("@web/themes/custom/libs/audio-recorder/main.js", ['depends' => \app\assets\AdminAsset::class]);
