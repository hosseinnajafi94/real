<?php
namespace app\config\widgets;
class ActionColumn extends \yii\grid\ActionColumn {
    public $header = 'عملیات';
    public function init() {
        if (!isset($this->buttons['up'])) {
            $this->buttons['up'] = function ($url) {
                return '<a href="' . $url . '"><i class="fa fa-arrow-up"></i></a>';
            };
        }
        if (!isset($this->buttons['down'])) {
            $this->buttons['down'] = function ($url) {
                return '<a href="' . $url . '"><i class="fa fa-arrow-down"></i></a>';
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
        if (!isset($this->buttons['ajax-delete'])) {
            $this->buttons['ajax-delete'] = function ($url) {
                return '<a href="' . str_replace('ajax-delete', 'delete', $url) . '" class="delete" title="حذف" data-pjax="0" data-message="آیا اطمینان به حذف این مورد دارید؟"><span class="fa fa-times"></span></a>';
            };
        }
        parent::init();
    }
}