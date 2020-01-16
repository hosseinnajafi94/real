<?php
$this->title = Yii::t('users', 'پرونده');
/* @var $this yii\web\View */
/* @var $model app\modules\users\models\DAL\Users */
//$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('users', 'Users'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//\yii\web\YiiAsset::register($this);
$model       = $model->model;
?>
<div class="users-users-view card">
    <div class="card-header d-none">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
        <p><?= $model->fname . ' ' . $model->lname ?></p>
    </div>
    <div class="card-block p-1">
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#page01">پرونده</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page02">اطلاعات تکمیلی</a></li>
            <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page03">اطلاعات کاربری</a></li>-->
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page05">خانوار</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page06">معرفین</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page07">تحصیلات / مهارت</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page08">سوابق کاری</a></li>
            <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page04">احکام / قراردادها</a></li>-->
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page09">عناوین و افتخارات</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page10">تالیفات</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page11">علایق</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page12">توضیحات اداری</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page13">توضیحات محرمانه</a></li>
            <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page15">دسترسی ها</a></li>-->
            <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page16">دسترسی مرخصی / ماموریت</a></li>-->
            <!--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#page17">مدارک</a></li>-->
        </ul>
        <div class="p-2 mb-2 mt-2 bg-light border d-none">
            
        </div>
        <div class="tab-content p-1">
            <div class="tab-pane active show" id="page01">
                <?= $this->render('view_01', ['model' => $model]) ?>
            </div>
            <div class="tab-pane" id="page02">
                <?= $this->render('view_02', ['model' => $model]) ?>
            </div>
            <div class="tab-pane" id="page03">
                <?= $this->render('view_03', ['model' => $model]) ?>
            </div>
            <div class="tab-pane" id="page04">
                <?= $this->render('view_04', ['model' => $model]) ?>
            </div>
            <div class="tab-pane" id="page05">
                <?=
                $this->render('view_05', [
                    'model' => $model,
                    'searchModel'  => $searchModel5,
                    'dataProvider' => $dataProvider5,
                ])
                ?>
            </div>
            <div class="tab-pane" id="page06">
                <?=
                $this->render('view_06', [
                    'model' => $model,
                    'searchModel'  => $searchModel6,
                    'dataProvider' => $dataProvider6,
                ])
                ?>
            </div>
            <div class="tab-pane" id="page07">
                <?=
                $this->render('view_07', [
                    'model' => $model,
                    'searchModel'  => $searchModel7,
                    'dataProvider' => $dataProvider7,
                ])
                ?>
            </div>
            <div class="tab-pane" id="page08">
                <?=
                $this->render('view_08', [
                    'model' => $model,
                    'searchModel'  => $searchModel8,
                    'dataProvider' => $dataProvider8,
                ])
                ?>
            </div>
            <div class="tab-pane" id="page09">
                <?=
                $this->render('view_09', [
                    'model' => $model,
                    'searchModel'  => $searchModel9,
                    'dataProvider' => $dataProvider9,
                ])
                ?>
            </div>
            <div class="tab-pane" id="page10">
                <?=
                $this->render('view_10', [
                    'model' => $model,
                    'searchModel'  => $searchModel10,
                    'dataProvider' => $dataProvider10,
                ])
                ?>
            </div>
            <div class="tab-pane" id="page11">
                <?=
                $this->render('view_11', [
                    'model' => $model,
                    'searchModel'  => $searchModel11,
                    'dataProvider' => $dataProvider11,
                ])
                ?>
            </div>
            <div class="tab-pane" id="page12">
                <?=
                $this->render('view_12', [
                    'model' => $model,
                    'searchModel'  => $searchModel12,
                    'dataProvider' => $dataProvider12,
                ])
                ?>
            </div>
            <div class="tab-pane" id="page13">
                <?=
                $this->render('view_13', [
                    'model' => $model,
                    'searchModel'  => $searchModel13,
                    'dataProvider' => $dataProvider13,
                    'searchModel_2'  => $searchModel13_2,
                    'dataProvider_2' => $dataProvider13_2,
                ])
                ?>
            </div>
            <div class="tab-pane" id="page14">
                <h3 class="text-center">در دست اقدام</h3>
            </div>
            <div class="tab-pane" id="page15">
                <h3 class="text-center">در دست اقدام</h3>
            </div>
            <div class="tab-pane" id="page16">
                <h3 class="text-center">در دست اقدام</h3>
            </div>
            <div class="tab-pane" id="page17">
                <h3 class="text-center">در دست اقدام</h3>
            </div>
        </div>
    </div>
</div>