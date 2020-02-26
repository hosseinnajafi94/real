<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersLoans */

$this->title                   = Yii::t('app', 'Update', [
            'name' => $model->id,
        ]);
//$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Users Loans'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('users', 'Update');
?>
<div class="users-loans-update">
<?=
$this->render('_form', [
    'model'      => $model,
    'types'      => $types,
    'positions'  => $positions,
    'users'      => $users,
    'groups'     => $groups,
    'loan_types' => $loan_types,
])
?>

</div>
