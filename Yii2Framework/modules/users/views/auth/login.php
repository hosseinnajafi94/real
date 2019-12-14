<?php
use yii\helpers\Html;
use app\config\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $form \app\config\widgets\ActiveForm */
/* @var $model \app\modules\users\models\VML\LoginVML */
$this->title = Yii::t('users', 'Login');
?>
<div class="wrapper"><!--Login Page Starts-->
    <section id="login">
        <div class="container-fluid">
            <div class="row full-height-vh">
                <div class="col-12 d-flex align-items-center justify-content-center gradient-aqua-marine">
                    <div class="card px-4 py-2 box-shadow-2 width-400">
                        <div class="card-header text-center">
                            <h4 class="text-uppercase text-bold-400 grey darken-1">ورود</h4>
                        </div>
                        <div class="card-body">
                            <div class="card-block">
                                <?php $form        = ActiveForm::begin() ?>
                                <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>
                                <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                                <?= $form->field($model, 'captcha')->captcha() ?>
                                <label><?= $form->field($model, 'rememberMe')->checkbox() ?></label>
                                <div class="text-center">
                                    <?= Html::submitButton(Yii::t('users', 'Login'), ['class' => 'btn btn-danger px-4 py-2 text-uppercase white font-small-4 box-shadow-2 border-0']) ?>
                                </div>
                                <?php ActiveForm::end() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>