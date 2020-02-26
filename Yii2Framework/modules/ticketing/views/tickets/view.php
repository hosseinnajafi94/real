<?php
use yii\helpers\Url;
use yii\bootstrap4\Html;
use app\config\widgets\ActiveForm;
use app\config\components\functions;
use app\modules\users\models\SRL\UsersSRL;
/* @var $this yii\web\View */
/* @var $model \app\modules\ticketing\models\DAL\Tickets */
/* @var $answer \app\modules\ticketing\models\VML\TicketsVML */
Url::remember();
//$this->params['breadcrumbs'][] = ['label' => Yii::t('ticketing', 'Tickets'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $model->title;
$user     = UsersSRL::findModel(Yii::$app->user->id);
$isAdmin  = $user->group_id == 1;
?>
<div class="tickets-view">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <h4 class="card-title"><span># <?= $model->id ?></span> / <?= $model->title ?></h4>
            </div>
            <p>
                <span><?= Yii::t('ticketing', 'Category ID') ?>: <?= $model->category->title ?></span> /
                <span><?= Yii::t('ticketing', 'Support ID') ?>: <?= $model->support->title ?></span>
            </p>
        </div>
        <div class="card-block">
            <p>
                <?= Html::a(Yii::t('app', 'Return'), ['index'], ['class' => 'btn btn-sm btn-warning']) ?>
                <?= Html::a(Yii::t('ticketing', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
                <?= Html::a(Yii::t('ticketing', 'Answer'), null, ['class' => 'btn btn-sm btn-primary', 'onclick' => "$('#answer').slideToggle();"]) ?>
                <?= $isAdmin && $model->status_id != 4 ? Html::a(Yii::t('ticketing', 'Close'), ['delete', 'id' => $model->id], ['class' => 'btn btn-sm btn-danger', 'data' => ['confirm' => Yii::t('ticketing', 'Are you sure you want to delete this item?'), 'method' => 'post']]) : '' ?>
            </p>
            <div id="answer" style="display: none;margin-bottom: 15px;background: #EEE;padding: 15px;box-shadow: 0px 0px 2px #AAA inset;">
                <?php $form     = ActiveForm::begin(); ?>
                <?= $form->field($answer, 'message')->ckeditor() ?>
                <div id="record-panel" data-href="<?= Url::to(['create']) ?>" data-input="AnswerVML[file2][]">
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
                <?= $form->field($answer, 'file')->fileInput() ?>
                <div>
                    <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-sm btn-success']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <?php
            /* @var $messages app\modules\ticketing\models\DAL\TicketsMessages[] */
            $messages = $model->getTicketsMessages()->orderBy(['id' => SORT_DESC])->all();
            foreach ($messages as $index => $message) {
                $sender = $message->sender;
                ?>
                <div style="background: <?= $sender->id != Yii::$app->user->id ? 'rgba(0, 255, 0, 0.1)' : '#fff' ?>;padding: 15px 15px 0;box-shadow: 0px 0px 4px #AAA;margin-top: 15px;">
                    <div><?= $message->message ?></div>
                    <br/>
                    <?php
                    if (false) {
                        ?>
                        <a class="view" href="<?= Url::to(['/users/users/view', 'id' => $sender->id]) ?>"><?= $sender->fname . ' ' . $sender->lname ?></a>
                        <?php
                    }
                    else {
                        ?>
                        <label><?= UsersSRL::getUserFullname($sender) ?></label>
                        <?php
                    }
                    ?>
                    <label dir="ltr" style="direction: ltr !important;"><?= functions::tojdatetime($message->datetime) ?></label>
                    <div class="myitems">
                        <?php
                        /* @var $attachments app\modules\ticketing\models\DAL\TicketsMessagesAttachments[] */
                        $attachments = $message->getTicketsMessagesAttachments()->orderBy(['id' => SORT_ASC])->all();
                        $i1          = 1;
                        $i2          = 1;
                        foreach ($attachments as $attachment) {
                            $ext = pathinfo($attachment->file, PATHINFO_EXTENSION);
                            if ($ext === 'ogg') {
                                echo "
                                    <div class='btn-group'>
                                        <a class='btn btn-sm btn-dropbox' style='font-size: 12px;' onclick=\"recorderPlay2(this, '" . Yii::getAlias('@web/uploads/tickets/' . $attachment->file) . "')\"><i style='font-size: 12px;' class='fa fa-play'></i></a>
                                        <a class='btn btn-sm btn-dropbox' style='font-size: 12px;cursor: default;'>فایل صوتی $i1</a>
                                        <a class='btn btn-sm btn-dropbox' style='font-size: 12px;' href='" . Yii::getAlias('@web/uploads/tickets/' . $attachment->file) . "' download='$attachment->file'><i style='font-size: 12px;' class='fa fa-download'></i></a>
                                    </div>
                                ";
                                $i1++;
                            }
                            else {
                                echo "
                                    <a class='btn btn-sm btn-social ml-2 mb-2 btn-dropbox' style='font-size: 12px;' href='" . Yii::getAlias('@web/uploads/tickets/' . $attachment->file) . "' download='$attachment->file'>
                                        <i style='font-size: 12px;' class='fa fa-download'></i>
                                        <span>دانلود فایل ضمیمه </span>
                                    </a>
                                ";
                                $i2++;
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<script>
    var player2 = null;
    function recorderPlay2(that, address) {
        recorderPause();
        $('.myitems .fa-pause').removeClass('fa-pause').addClass('fa-play');
        if (player2) {
            player2.pause();
            if (player2.myaddress === address) {
                player2 = null;
                return;
            }
            player2 = null;
        }
        if (that === undefined) {
            return;
        }
        $(that).find('.fa-play').removeClass('fa-play').addClass('fa-pause');
        if (player2) {
            player2.pause();
            player2 = null;
            player2 = new Audio(address);
        } else {
            player2 = new Audio(address);
        }
        player2.onended = function () {
            $('.myitems .fa-pause').removeClass('fa-pause').addClass('fa-play');
            player2.pause();
            player2 = null;
        };
        player2.myaddress = address;
        player2.play();
    }
</script>
<?php
$this->registerCssFile("@web/themes/custom/libs/audio-recorder/style.css", ['depends' => \app\assets\AdminAsset::class]);
$this->registerJsFile("@web/themes/custom/libs/audio-recorder/RecordRTC.js", ['depends' => \app\assets\AdminAsset::class]);
$this->registerJsFile("@web/themes/custom/libs/audio-recorder/main.js", ['depends' => \app\assets\AdminAsset::class]);

