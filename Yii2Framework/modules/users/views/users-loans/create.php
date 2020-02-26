<?php
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\UsersLoans */
$this->title = Yii::t('app', 'Create');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Users Loans'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-loans-create">
    <?= $this->render('_form', [
        'model' => $model,
        'types' => $types,
        'positions' => $positions,
        'users' => $users,
        'groups' => $groups,
        'loan_types' => $loan_types,
    ]) ?>
</div>
