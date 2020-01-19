<?php
use yii\bootstrap4\Html;
use yii\widgets\Pjax;
use app\config\widgets\GridView;
use yii\grid\ActionColumn;
/* @var $this \yii\web\View */
/* @var $data \yii\data\ActiveDataProvider */
/* @var $search \app\modules\calendars\models\VML\CalendarsSearchVML */

$this->registerCss("
    div.fields {display: none;margin: 0;position: fixed;background: #FFF;z-index: 1;border-radius: 4px;}
    div.fields ul {list-style: none;margin: 0;}
    div.fields.active {display: block;}
    div.fields li {line-height: 1;}
    div.fields .fields_header {background: #EEE;margin: -6px -6px 6px -6px;padding: 6px;border-bottom: 1px solid #ccc;}
    div.fields .fields_header label {margin: 0;}
    div.fields .fields_footer {background: #EEE;margin: 0 -6px -6px -6px;padding: 6px;border-bottom: 1px solid #ccc;text-align: center;}
    #list2 thead th {padding: 5px 13px !important;}
");
$this->registerJs("
    $(document).on('click', '[data-view]', function (e) {
        e.preventDefault();
        var url = $(this).data('view');
        ajaxget(url, {}, function (result) {
            showEvent(result);
        });
    });
    $(document).on('click', '[data-update]', function (e) {
        e.preventDefault();
        var url = $(this).data('update');
        ajaxget(url, {}, function (result) {
            updateEvent(result);
        });
    });
    $(document).on('click', 'a.fields', function () {
        $('div.fields').toggleClass('active');
    });
    $(document).on('change', 'div.fields .fields_header :checkbox', function (e) {
        $('div.fields li:not(.fields_header) :checkbox').prop('checked', $(this).prop('checked'));
    });
    $(document).on('click', function (e) {
        if (!$(e.target).is('a.fields') && !$(e.target).is('a.fields *') && !$(e.target).is('div.fields') && !$(e.target).is('div.fields *')) {
            //$('div.fields .btn-secondary').trigger('click');
        }
    });
    $(document).on('change', '#list2 [name=\"selection[]\"]', function () {
        $('.list2DeleteAll').removeClass('disabled');
        var items = $('#list2 [name=\"selection[]\"]:checked');
        if (items.length === 0) {
            $('.list2DeleteAll').addClass('disabled');
        }
    });
    var selected_fields = [];
    $(document).on('click', '.list2DeleteAll', function (e) {
        var ids = $('#list2 .grid-view').yiiGridView('getSelectedRows');
        if (confirm('" . Yii::t('app', 'Are you sure?') . "')) {
            ajaxget('" . yii\helpers\Url::to(['delete-events']) . "', {ids}, function () {
                $.pjax.reload({url: '?', async: false, container: '#list2', data: {list2columns: selected_fields}});
            });
        }
    });
    $(document).on('click', 'div.fields .btn-success', function (e) {
        selected_fields = [];
        $('div.fields').removeClass('active');
        $('[name=\"list2columns[]\"]:checked').each(function () {
            selected_fields.push($(this).val());
        });
        $.pjax.reload({url: '?', async: false, container: '#list2', data: {list2columns: selected_fields}});
    });
    $(document).on('click', 'div.fields .btn-secondary', function (e) {
        $('div.fields').removeClass('active');
        $('[name=\"list2columns[]\"]').prop('checked', false);
        selected_fields.forEach(function (name) {
            $('[name=\"list2columns[]\"][value=\"' + name + '\"]').prop('checked', true);
        });
    });
");
function set($name) {
    $list2columns = Yii::$app->request->get('list2columns');
    if (is_array($list2columns)) {
        foreach ($list2columns as $name2) {
            if ($name === $name2) {
                return true;
            }
        }
    }
    return false;
}
$fields = [
        [
        'attribute' => 'title',
        'label'     => $search->getAttributeLabel('title')
    ],
        [
        'attribute' => 'type_id',
        'label'     => $search->getAttributeLabel('type_id'),
        'value'     => function ($model) {
            return $model->type->title;
        }
    ],
        [
        'attribute' => 'status_id',
        'label'     => $search->getAttributeLabel('status_id'),
        'value'     => function ($model) {
            return $model->status->title;
        }
    ],
        ['attribute' => 'location', 'label' => $search->getAttributeLabel('location')],
        ['attribute' => 'start_time', 'label' => $search->getAttributeLabel('start_time'), 'format' => 'jdate'],
        ['attribute' => 'end_time', 'label' => $search->getAttributeLabel('end_time'), 'format' => 'jdate'],
        ['attribute' => 'description', 'label' => $search->getAttributeLabel('description')],
        [
        'attribute' => 'has_reception',
        'label'     => $search->getAttributeLabel('has_reception'),
        'format'    => 'bool'
    ],
        [
        'attribute' => 'catering_id',
        'label'     => $search->getAttributeLabel('catering_id'),
        'value'     => function ($model) {
            return app\modules\users\models\SRL\UsersSRL::getUserFullname($model->catering);
        }
    ],
];
$columns = [
        [
        'class'  => app\config\widgets\SerialColumn::class,
        'header' => 'ردیف',
        'filter' => '<a class="fields btn btn-sm btn-secondary mb-0"><i class="fa fa-caret-down"></i></a>'
    ],
    $fields[0]
];
if (Yii::$app->request->get('list2columns')) {
    foreach (Yii::$app->request->get('list2columns') as $name) {
        $ar = array_filter($fields, function ($row) use ($name) {
            return $row['attribute'] === $name;
        });
        if (!empty($ar)) {
            $columns[] = reset($ar);
        }
    }
}
$columns[] = [
    'class' => 'yii\grid\CheckboxColumn',
];
$columns[] = [
    'class'   => ActionColumn::class,
    'buttons' => [
        'delete' => function ($url) {
            return Html::a('<i class="fa fa-times"></i>', $url, ['class' => 'ajaxDelete', 'data' => ['pjax' => 0, 'container' => 'list2', 'confirm2' => Yii::t('app', 'Are you sure?')]]);
        },
        'update'  => function ($url, $model) {
            return '<a href="#" data-update="' . \yii\helpers\Url::to(['details', 'id' => $model->id]) . '" title="بروز رسانی"><span class="fa fa-pencil"></span></a>';
        },
        'view'     => function ($url, $model) {
            return '<a href="#" data-view="' . \yii\helpers\Url::to(['details', 'id' => $model->id]) . '" title="جزئیات" ><span class="fa fa-eye"></span></a>';
        },
    ],
];

Pjax::begin([
    'id' => 'list2'
]);

echo '<div class="fields">
<ul class="border p-1">
    <li class="fields_header"><label><input type="checkbox"/> همه</label></li>
';
foreach ($fields as $index => $field) {
    if ($index === 0) {
        continue;
    }
    echo '<li><label><input type="checkbox" value="' . $field['attribute'] . '"' . (set($field['attribute']) ? ' checked' : '') . ' name="list2columns[]"/> ' . $field['label'] . '</label></li>';
}
echo '<li class="fields_footer">
        <a class="btn btn-sm btn-success mb-0">تایید</a>
        <a class="btn btn-sm btn-secondary mb-0">لغو</a>
    </li>
</ul>
</div>
';

echo '<div class="table-responsive">';
echo GridView::widget([
    'layout'         => '
        {items}
        {summary}
        {pager}
    ',
    'summaryOptions' => ['class' => 'summary pull-right'],
    'pager'          => [
        'options'                       => ['class' => 'pagination pagination-sm pull-left', 'style' => 'margin-left: 2px;'],
        'linkContainerOptions'          => ['class' => 'page-item'],
        'linkOptions'                   => ['class' => 'page-link'],
        'disabledListItemSubTagOptions' => ['class' => 'page-link disabled']
    ],
    'dataProvider'   => $data,
    'filterModel'    => $search,
    'columns'        => $columns,
]);
echo '</div>';
echo Html::a('حذف', null, ['class' => 'btn btn-sm btn-danger list2DeleteAll pull-left disabled']);

Pjax::end();

