<?php
namespace app\modules\accounting\models\VML;
use Yii;
use yii\base\Model;
use app\config\widgets\ArrayHelper;
use app\modules\organizations\models\SRL\OrganizationsSRL;
use app\modules\organizations\models\DAL\OrganizationsListYears;
class DefaultSettingsVML extends Model {
    public $organization_id;
    public $year_id;
    public $list_organizations = [];
    public $list_years         = [];
    public function __construct($config = []) {
        $session = Yii::$app->session;
        $this->organization_id = $session->get('default_organization_id');
        $this->year_id = $session->get('default_year_id');
        
        parent::__construct($config);
    }
    public function rules() {
        return [
                [['organization_id', 'year_id'], 'required'],
                [['organization_id', 'year_id'], 'integer'],
        ];
    }
    public function attributeLabels() {
        return [
            'organization_id' => Yii::t('accounting', 'Organization ID'),
            'year_id'         => Yii::t('accounting', 'Year ID'),
        ];
    }
    public function loaditems() {
        $this->list_organizations = OrganizationsSRL::getItems();
        $this->list_years = ArrayHelper::map(OrganizationsListYears::find()->where(['organization_id' => $this->organization_id])->orderBy(['id' => SORT_DESC])->all(), 'id', 'title');
    }
    public function save($post) {
        if (!$this->load($post)) {
            return false;
        }
        if (!$this->validate()) {
            return false;
        }
        $session = Yii::$app->session;
        $session->set('default_organization_id', $this->organization_id);
        $session->set('default_year_id', $this->year_id);
        return true;
    }
}