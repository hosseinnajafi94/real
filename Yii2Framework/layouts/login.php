<?php
use yii\bootstrap4\Html;
use app\assets\LoginAsset;
use app\config\widgets\Alert;
/* @var $this \yii\web\View */
/* @var $content string */
LoginAsset::register($this);
$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="icon" type="image/png" href="<?= Yii::getAlias('@web/uploads/settings/favicon/favicon.ico') ?>"/>
        <link rel="shortcut icon" type="image/ico" href="<?= Yii::getAlias('@web/uploads/settings/favicon/favicon.ico') ?>"/>
        <title><?= $this->title ?></title>
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
    </head>
    <body data-col="1-column" class="blank-page blank-page">
        <?php $this->beginBody() ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>