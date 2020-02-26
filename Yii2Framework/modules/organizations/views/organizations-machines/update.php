<?php
//use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\modules\organizations\models\DAL\OrganizationsMachines */

$this->title= Yii::t('app', 'Update');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('organizations', 'Organizations Machines'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('organizations', 'Update');
?>
<div class="organizations-machines-update">
<?=
$this->render('_form', [
    'model'         => $model,
    'models'        => $models,
    'timezones'     => $timezones,
    'daylights'     => $daylights,
    'months'        => $months,
    'monthdays'     => $monthdays,
    'organizations' => $organizations,
])
?>

</div>
