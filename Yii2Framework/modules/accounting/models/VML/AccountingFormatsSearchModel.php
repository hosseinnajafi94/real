<?php
namespace app\modules\accounting\models\VML;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\accounting\models\DAL\AccountingFormats;
class AccountingFormatsSearchModel extends AccountingFormats {
    public $type;
    public $title;
    public function __construct(int $type, $config = array()) {
        $this->type = $type;
        switch ($this->type) {
            case 1:
            case 2:
                $this->title = 'نام حساب';
                break;
            case 4:
            case 5:
                $this->title = 'نام مرکز';
                break;
            case 6:
                $this->title = 'نام پروژه';
                break;
            default:
                break;
        }
        parent::__construct($config);
    }
    public function attributeLabels() {
        $labels = parent::attributeLabels();
        $labels['account_name_id'] = $this->title;
        return $labels;
    }
    public function rules() {
        return [
                [['id', 'length', 'format_id', 'order_id', 'account_name_id'], 'integer'],
                [['format_title'], 'safe'],
        ];
    }
    public function scenarios() {
        return Model::scenarios();
    }
    public function search($params) {
        $query = AccountingFormats::find()->where(['type_id' => $this->type]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_ASC]]
        ]);
        $this->load($params);
        if (!$this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id'              => $this->id,
            'length'          => $this->length,
            'format_id'       => $this->format_id,
            'order_id'        => $this->order_id,
            'account_name_id' => $this->account_name_id,
        ]);
        $query->andFilterWhere(['like', 'format_title', $this->format_title]);
        return $dataProvider;
    }
}