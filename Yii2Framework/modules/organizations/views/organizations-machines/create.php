<?php
//use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\DAL\OrganizationsMachines */
$this->title = Yii::t('app', 'Create');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations Machines'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizations-machines-create">
    <?=
    $this->render('_form', [
        'model'         => $model,
        'organizations' => $organizations,
        'models'        => $models,
        'calendarTypes' => $calendarTypes,
        'timezones'     => $timezones,
        'daylights'     => $daylights,
        'months'        => $months,
        'monthdays'     => $monthdays,
    ])
    ?>

</div>
