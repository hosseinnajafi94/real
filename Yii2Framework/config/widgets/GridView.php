<?php
namespace app\config\widgets;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
class GridView extends \yii\grid\GridView {
    public $layout = "{items}\n{summary}\n{pager}";
//    public $summaryOptions = ['class' => 'btn btn-sm btn-default pull-right disabled', 'style' => 'margin-top: 15px;'];
//    public $pager = ['options' => ['class' => 'pagination pagination-sm pull-right']];
    public $dataColumnClass = 'app\config\widgets\DataColumn';
    public $filterPosition  = self::FILTER_POS_HEADER;
    
    public $tableOptions = ['class' => 'table table-striped table-bordered m-0 mb-1'];
    public $summaryOptions = ['class' => 'summary pull-right'];
    public $pager = [
        'options' => [
            'class' => 'pagination pagination-sm pull-left',
            'style' => 'margin: 0;margin-left: 2px;'
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
    ];
    public function init() {
//        if ($this->filterModel) {
//            $searchModel = $this->filterModel;
//            $this->layout = '
//                {items}
//                <div class="pull-right" style="margin-left: 15px;">
//                    <label class="m-0">تعداد نمایش: </label>
//                    ' . Html::activeDropDownList($this->filterModel, 'perpage', [10 => 10, 20 => 20, 50 => 50, 100 => 100], [
//                            'class' => 'form-control form-control-sm',
//                            'style' => 'width: auto;display: inline-block;'
//                    ]) . '
//                </div>
//                {summary}
//                ' . Html::a('حذف', ['delete-all'], ['class' => 'btn btn-sm btn-danger pull-left deleteAll disabled', 'style' => 'margin: 0;margin-right: 5px;', 'data' => ['pjax' => 0]]) . '
//                {pager}
//                <div class="clearfix"></div>
//            ';
//        }
        foreach ($this->columns as &$column) {
            if (is_array($column) && isset($column['attribute']) && strpos($column['attribute'], 'id_') === 0 && !isset($column['value'])) {
                $column['format'] = 'raw';
                $attribute = $column['attribute'];
                $pat = ArrayHelper::remove($column, 'pattern', '');
                $urlAr = ArrayHelper::remove($column, 'url', '');
                $url = str_replace(['%7B', '%7D'], ['{', '}'], Url::to($urlAr));
                $column['value'] = function ($model) use($attribute, $pat, $url, $urlAr) {
                    $col = substr($attribute, 3);
                    $row = $model->$col;
                    preg_match_all('/[*{]+[a-zA-Z0-9.]+[*}]/', $pat, $match);
                    $match = str_replace(['{', '}'], '', $match[0]);
                    foreach ($match as $r) {
                        $value = ArrayHelper::getValue($row, $r, '');
                        $pat = str_replace('{' . $r . '}', $value, $pat);
                    }
                    preg_match_all('/[*{]+[a-zA-Z0-9._]+[*}]/', $url, $match);
                    $match = str_replace(['{', '}'], '', $match[0]);
                    foreach ($match as $r) {
                        $value = ArrayHelper::getValue($row, $r, '');
                        $url = str_replace('{' . $r . '}', $value, $url);
                    }
                    return $urlAr ? Html::a($pat, $url, ['class' => 'view']) : $pat;
                };
            }
            else if (is_array($column) && isset($column['attribute']) && strpos($column['attribute'], '_id') !== false && !isset($column['value'])) {
                $column['format'] = 'raw';
                $attribute = $column['attribute'];
                $pat = ArrayHelper::remove($column, 'pattern', '');
                $urlAr = ArrayHelper::remove($column, 'url', '');
                $url = str_replace(['%7B', '%7D'], ['{', '}'], Url::to($urlAr));
                $column['value'] = function ($model) use($attribute, $pat, $url, $urlAr) {
                    $col = substr($attribute, 0, -3);
                    $row = $model->$col;
                    preg_match_all('/[*{]+[a-zA-Z0-9.]+[*}]/', $pat, $match);
                    $match = str_replace(['{', '}'], '', $match[0]);
                    foreach ($match as $r) {
                        $value = ArrayHelper::getValue($row, $r, '');
                        $pat = str_replace('{' . $r . '}', $value, $pat);
                    }
                    preg_match_all('/[*{]+[a-zA-Z0-9._]+[*}]/', $url, $match);
                    $match = str_replace(['{', '}'], '', $match[0]);
                    foreach ($match as $r) {
                        $value = ArrayHelper::getValue($row, $r, '');
                        $url = str_replace('{' . $r . '}', $value, $url);
                    }
                    return $urlAr ? Html::a($pat, $url, ['class' => 'view']) : $pat;
                };
            }
        }
        $this->formatter = new Formatter();
        parent::init();
    }
}