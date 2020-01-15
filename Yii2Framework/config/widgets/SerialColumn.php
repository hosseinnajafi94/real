<?php
namespace app\config\widgets;
class SerialColumn extends \yii\grid\SerialColumn {
    public $header = 'ردیف';
    public $filter = '';
    protected function renderFilterCellContent() {
        return $this->filter;
    }
}