<?php
namespace app\config\widgets;
class ActionColumn extends \yii\grid\ActionColumn {
    public $header = 'عملیات';
    public function init() {
        if (!isset($this->buttons['export'])) {
            $this->buttons['export'] = function ($url) {
                return '<a href="' . $url . '" title="خروجی"><span class="glyphicon glyphicon-export"></span></a>';
            };
        }
        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = function ($url) {
                return '<a href="' . $url . '" class="view" title="جزئیات" data-pjax="0"><span class="fa fa-eye"></span></a>';
            };
        }
        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = function ($url) {
                return '<a href="' . $url . '" title="بروز رسانی" data-pjax="0"><span class="fa fa-pencil"></span></a>';
            };
        }
        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = function ($url) {
                return '<a href="' . $url . '" title="حذف" data-pjax="0" data-method="post" data-confirm="آیا اطمینان به حذف این مورد دارید؟"><span class="fa fa-times"></span></a>';
            };
        }
        parent::init();
    }
}