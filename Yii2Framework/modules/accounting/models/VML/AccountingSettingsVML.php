<?php
namespace app\modules\accounting\models\VML;
use Yii;
use yii\base\Model;
use app\config\widgets\ArrayHelper;
use app\modules\accounting\models\DAL\AccountingSettings;
use app\modules\accounting\models\DAL\AccountingListClients;
use app\modules\accounting\models\DAL\AccountingSettingsListAccounts;
class AccountingSettingsVML extends Model {
    public $type_id;
    public $accounts      = [];
    public $default_id;
    public $list_accounts = [];
    public function rules() {
        return [
                [['type_id'], 'required'],
                [['type_id', 'default_id'], 'integer'],
                [['accounts'], 'each', 'rule' => ['integer']],
        ];
    }
    public function attributeLabels() {
        return [
            'type_id'    => Yii::t('accounting', 'Type ID'),
            'default_id' => Yii::t('accounting', 'Default ID'),
            'accounts'   => Yii::t('accounting', 'Accounts'),
        ];
    }
    public function loaditems() {
        $list_accounts       = AccountingListClients::find()->orderBy(['id' => SORT_ASC])->all();
        $this->list_accounts = ArrayHelper::map($list_accounts, 'id', 'title');
    }
    public function save($post) {
        if (!$this->load($post)) {
            return false;
        }
        if (!$this->validate()) {
            return false;
        }
        $type_id         = 'default_account' . ($this->type_id < 10 ? '0' : '') . $this->type_id . '_id';
        $model           = AccountingSettings::findOne(1);
        $model->$type_id = $this->default_id;
        if (!$model->save()) {
            return false;
        }
        AccountingSettingsListAccounts::deleteAll(['type_id' => $this->type_id]);
        if (is_array($this->accounts) && !empty($this->accounts)) {
            foreach ($this->accounts as $clientId) {
                $row             = new AccountingSettingsListAccounts();
                $row->client_id = $clientId;
                $row->type_id    = $this->type_id;
                $row->save();
            }
        }
        return true;
    }
}