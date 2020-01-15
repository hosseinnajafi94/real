<?php
use yii\bootstrap4\Html;
use app\config\widgets\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\users\models\VML\UsersSearchVML */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('users', 'پرونده');
?>
<div class="users-users-index card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
        <p></p>
    </div>
    <div class="card-block">
        <p>
            <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
        </p>
        <div class="table-responsive2">
            <?=
            GridView::widget([
//                'layout' => '
//                    {items}
//                    <div class="pull-right" style="margin-left: 15px;">
//                        <label>تعداد نمایش: </label>
//                        ' . Html::activeDropDownList($searchModel, 'myPageSize', [10 => 10, 20 => 20, 50 => 50, 100 => 100],['id'=>'myPageSize', 'class' => 'form-control form-control-sm', 'style' => 'width: auto;display: inline-block;']).'
//                    </div>
//                    {summary}
//                    {pager}
//                ',
                'filterSelector' => '#myPageSize',
                'summaryOptions' => [
                    'class' => 'summary pull-right'
                ],
                'pager' => [
                    'options' => [
                        'class' => 'pagination pagination-sm pull-left',
                        'style' => 'margin-left: 2px;'
                    ],
                    'linkContainerOptions' => [
                        'class' => 'page-item'
                    ],
                    'linkOptions' => [
                        'class' => 'page-link'
                    ],
                    'disabledListItemSubTagOptions' => [
                        'class' => 'page-link disabled'
                    ]
                ],
                'dataProvider' => $dataProvider,
                'filterModel'  => $searchModel,
                'columns'      => [
                    ['class' => app\config\widgets\SerialColumn::class],
                    [
                        'attribute' => 'organization_id',
                        'value'     => function ($model) {
                            return $model->organization ? $model->organization->name : null;
                        }
                    ],
                    'code',
                    'fname',
                    'lname',
                    'birthday:jdate',
                    'mobile',
                    //'id',
                    //'organization_id',
                    //'group_id',
                    //'status_id',
                    //'username',
                    //'password_hash',
                    //'password_reset_token',
                    //'auth_key',
                    //'code',
                    //'fname',
                    //'lname',
                    //'card_num',
                    //'codemelli',
                    //'birthplace_province_id',
                    //'birthplace_city_id',
                    //'birthday',
                    //'father_name',
                    //'marital_status_id',
                    //'religion',
                    //'military_service_status_id',
                    //'gender_id',
                    //'employment_status_id',
                    //'requested_salary',
                    //'total_work_history',
                    //'account_number',
                    //'account_type_id',
                    //'type_id',
                    //'date_start',
                    //'head_line:ntext',
                    //'force_rollcall:boolean',
                    //'mobile',
                    //'phone',
                    //'province_id',
                    //'city_id',
                    //'email:email',
                    //'facebook',
                    //'telegram',
                    //'instagram',
                    //'address:ntext',
                    //'avatar',
                    //'place_of_issue',
                    //'insurance_no',
                    //'mother_birth_place',
                    //'father_birth_place',
                    //'mother_first_name',
                    //'prev_last_name',
                    //'mother_last_name',
                    //'passport_no',
                    //'info_work_place',
                    //'start_date',
                    //'emergency_phone',
                    //'call_receiver',
                    //'physical_cond_id',
                    //'physical_desc',
                    //'nationality',
                    //'issuance_date',
                    //'personnel_share_id',
                    //'insurance_type_id',
                    //'employment_type_id',
                    //'contract_type_id',
                    //'insurance_start_date',
                    //'has_machin_id',
                    //'is_owner_id',
                    ['class' => app\config\widgets\ActionColumn::class],
                ],
            ]);
            ?>
        </div>
    </div>
</div>
