<?php
namespace app\config\widgets;
class CheckboxColumn extends \yii\grid\CheckboxColumn {
    public $header = 'حذف دسته جمعی';
    protected function renderHeaderCellContent() {
        return parent::renderHeaderCellContent();
    }
}