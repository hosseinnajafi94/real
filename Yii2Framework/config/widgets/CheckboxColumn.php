<?php
namespace app\config\widgets;
class CheckboxColumn extends \yii\grid\CheckboxColumn {
    protected function renderHeaderCellContent() {
        return '<label>' . parent::renderHeaderCellContent() . ' <span>حذف کلی</span><label>';
    }
}