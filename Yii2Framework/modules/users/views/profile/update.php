<?php
use yii\helpers\Html;
use app\config\widgets\ActiveForm;
/* @var $this \yii\web\View */
/* @var $form \app\config\widgets\ActiveForm */
/* @var $model \app\modules\users\models\VML\ProfileVML */
$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Profile'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="profile-update box">
    <?php $form = ActiveForm::begin() ?>
    <div class="box-header"><?= Yii::t('app', 'Update') ?></div>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <?= $form->field($model, 'fname')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'lname')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['dir' => 'ltr', 'maxlength' => true]) ?>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <?= $form->field($model, 'province_id')->dropDownList($model->provinces) ?>
            <?= $form->field($model, 'city_id')->dropDownList($model->cities) ?>
            <?= $form->field($model, 'codeposti')->textInput(['dir' => 'ltr', 'maxlength' => true]) ?>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <?= $form->field($model, 'cardmelli')->fileInput(['onchange' => "preview(this, 'preview_cardmelli')"]) ?>
            <div id="preview_cardmelli">
                <img style="max-width: 100%;" src="<?= Yii::getAlias('@web/uploads/users/cardmelli/' . $model->cardmelli) ?>"/>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <?= $form->field($model, 'avatar')->fileInput(['onchange' => "preview(this, 'preview_avatar')"]) ?>
            <div id="preview_avatar">
                <img style="max-width: 100%;" src="<?= Yii::getAlias('@web/uploads/users/avatar/' . $model->avatar) ?>"/>
            </div>
        </div>
    </div>
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
    <div class="box-footer">
        <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning']) ?>
        <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-sm btn-success']) ?>
    </div>
    <?php ActiveForm::end() ?>
</div>