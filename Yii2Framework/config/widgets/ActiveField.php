<?php
namespace app\config\widgets;
use Yii;
use yii\captcha\Captcha;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\Url;
//use yii\bootstrap4\Html;
use yii\bootstrap4\BaseHtml;
//use app\config\widgets\ArrayHelper;
//use unclead\multipleinput\MultipleInput;
use kartik\select2\Select2;
class ActiveField extends \yii\bootstrap4\ActiveField {
    protected function createLayoutConfig($instanceConfig) {
        $config                          = parent::createLayoutConfig($instanceConfig);
        $config['inputOptions']['class'] = 'form-control form-control-sm';
        return $config;
    }
    public function captcha($options = []) {
        return $this->widget(Captcha::classname(), [
            'options'       => ArrayHelper::merge($options, ['class' => 'form-control']),
            'template'      => '
                <div class="row">
                    <div class="col-lg-6 col-md-6 form-group">{input}</div>
                    <div class="col-lg-6 col-md-6"><a class="refreshcaptcha" href="#">{image}</a></div>
                </div>
            ',
            'captchaAction' => '/users/auth/captcha'
        ]);
    }
    public function ckeditor($options = []) {
        return $this->widget(CKEditor::className(), ArrayHelper::merge($options, [
                    'options'       => ['rows' => 6],
                    'clientOptions' => [
                        'language'      => 'fa',
                        'extraPlugins'  => 'bidi,tableresize',
                        'toolbarGroups' => [
                                ['name' => 'bidi']
                        ]
                    ],
                    //'preset'        => 'basic',
        ]));
    }
    public function dropDownList($items, $options = []) {
        $options['class'] = 'form-control form-control-sm ';//custom-select
        $options['prompt'] = Yii::t('app', 'Please Select');
        if (strpos($this->attribute, 'province_id') !== false) {
            $city_id = str_replace('province_id', 'city_id', $this->attribute);
            if (property_exists($this->model, $city_id)) {
                $cityId              = '#' . BaseHtml::getInputId($this->model, $city_id);
                $content             = Yii::t('app', 'Please Select');
                $url                 = Url::to(['/geo/geo-cities/get-cities']);
                $options['onchange'] = "LoadCities(this, '$cityId', '$content', '$url');";
            }
        }
        return parent::dropDownList($items, $options);
    }
    public function select2($data, $options = [], $pluginOptions = []) {
        return $this->widget(Select2::classname(), [
            'data' => $data,
            'options' => ArrayHelper::merge([
                'placeholder' => Yii::t('app', 'Please Select')
            ], $options),
            'pluginOptions' => ArrayHelper::merge([
                'dir' => 'rtl',
                'allowClear' => true,
                //'containerCssClass' => ':all:',
                //'containerCssClass' => 'form-control form-control-sm',
            ], $pluginOptions),
        ]);
    }
//    public function fileInput($options = []) {
//        if (!isset($this->form->options['enctype'])) {
//            $this->form->options['enctype'] = 'multipart/form-data';
//        }
//        if ($this->form->validationStateOn === ActiveForm::VALIDATION_STATE_ON_INPUT) {
//            $this->addErrorClassIfNeeded($options);
//        }
//        $this->addAriaAttributes($options);
//        $this->adjustLabelFor($options);
//        $this->parts['{input}'] = Html::activeFileInput($this->model, $this->attribute, $options);
//        return $this;
//    }
}