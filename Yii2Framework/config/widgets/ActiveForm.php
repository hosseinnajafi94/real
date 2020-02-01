<?php
namespace app\config\widgets;
class ActiveForm extends \yii\bootstrap4\ActiveForm {
    public $fieldClass = 'app\config\widgets\ActiveField';
    /**
     * {@inheritdoc}
     * @return ActiveField
     */
    public function field($model, $attribute, $options = [])
    {
        return parent::field($model, $attribute, $options);
    }
}