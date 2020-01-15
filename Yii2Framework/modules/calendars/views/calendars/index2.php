<?php
use yii\bootstrap4\Html;
use yii\widgets\Pjax;
use app\config\widgets\GridView;
use yii\grid\ActionColumn;
/* @var $this \yii\web\View */
/* @var $data \yii\data\ActiveDataProvider */
/* @var $search \app\modules\calendars\models\VML\CalendarsSearchVML */

$this->registerCss("
    ul.fields {display: none;list-style: none;margin: 0;position: fixed;background: #FFF;z-index: 1;border-radius: 4px;}
    ul.fields.active {display: block;}
    ul.fields li {line-height: 1;}
    ul.fields .fields_header {}
    ul.fields .fields_footer {text-align: center;}
");
$this->registerJs("
    $(document).on('click', 'a.fields', function () {
        $('ul.fields').toggleClass('active');
    });
    $('ul.fields .fields_header :checkbox').on('change', function (e) {
        $('ul.fields li:not(.fields_header) :checkbox').prop('checked', $(this).prop('checked'));
    });
    var selected_fields = [];
    $('ul.fields .btn-success').on('click', function (e) {
        selected_fields = [];
        $('ul.fields').removeClass('active');
        $('[name=\"list2columns[]\"]:checked').each(function () {
            selected_fields.push($(this).val());
        });
        $.pjax.reload({url: '?', container: '#list2', data: {list2columns: selected_fields}});
    });
    $('ul.fields .btn-warning').on('click', function (e) {
        $('ul.fields').removeClass('active');
        $('[name=\"list2columns[]\"]').prop('checked', false);
        selected_fields.forEach(function (name) {
            $('[name=\"list2columns[]\"][value=\"' + name + '\"]').prop('checked', true);
        });
    });
    $(document).on('click', function (e) {
        if (!$(e.target).is('a.fields') && !$(e.target).is('a.fields *') && !$(e.target).is('ul.fields') && !$(e.target).is('ul.fields *')) {
            $('ul.fields').removeClass('active');
        }
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
        'label' => $search->getAttributeLabel('title')
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
    'class'   => ActionColumn::class,
    'buttons' => [
        'delete' => function ($url) {
            return Html::a('<i class="fa fa-times"></i>', $url, ['class' => 'ajaxDelete', 'data' => ['pjax' => 0, 'container' => 'list2', 'confirm2' => Yii::t('app', 'Are you sure?')]]);
        },
        'update'  => function ($url, $model) {
            return '<a href="' . $url . '" title="بروز رسانی" data-pjax="0"><span class="fa fa-pencil"></span></a>';
        },
        'view'     => function ($url) {
            return '<a href="' . $url . '" class="view" title="جزئیات" data-pjax="0"><span class="fa fa-eye"></span></a>';
        },
    ],
];

echo '<ul class="fields border p-1">
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
        <a class="btn btn-sm btn-warning mb-0">لغو</a>
    </li>
</ul>
';

Pjax::begin([
    'id' => 'list2'
]);
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

Pjax::end();
