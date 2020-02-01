<?php
namespace app\modules\accounting\controllers;
use app\config\widgets\Controller;
use app\config\widgets\ArrayHelper;
use app\modules\accounting\models\DAL\AccountingCostsListCostTypes;
use app\modules\accounting\models\DAL\AccountingClientsListTypes;
use app\modules\accounting\models\DAL\AccountingAccounts;
use app\modules\accounting\models\DAL\AccountingProjects;
use app\modules\accounting\models\DAL\AccountingClients;
use app\modules\accounting\models\DAL\AccountingFloats;
use app\modules\accounting\models\DAL\AccountingCosts;
use app\modules\users\models\DAL\Users;
use app\modules\users\models\SRL\UsersSRL;
use app\modules\accounting\models\DAL\AccountingListNotes;
use app\modules\accounting\models\DAL\AccountingListSymbols;
class AccountsController extends Controller {
    public function actionIndex() {

        $models            = [];
        $models['account'] = new AccountingAccounts();
        $models['client']  = new AccountingClients();
        $models['float']   = new AccountingFloats();
        $models['cost']    = new AccountingCosts();
        $models['project'] = new AccountingProjects();

        $items             = [];
        $items['accounts'] = AccountingAccounts::find()->select('*, title as text')->asArray()->orderBy(['id' => SORT_ASC])->all();
        $items['clients']  = AccountingClients::findBySql("SELECT m1.*, concat(m2.fname, ' ', m2.lname) AS text FROM " . AccountingClients::tableName() . " AS m1 INNER JOIN " . Users::tableName() . " AS m2 ON m2.id = m1.user_id ORDER BY m1.id ASC")->asArray()->all();
        $items['floats']   = AccountingFloats::find()->select('*, title as text')->asArray()->orderBy(['id' => SORT_ASC])->all();
        $items['costs1']   = AccountingCosts::find()->select('*, title as text')->where(['type_id' => 1])->asArray()->orderBy(['id' => SORT_ASC])->all();
        $items['costs2']   = AccountingCosts::find()->select('*, title as text')->where(['type_id' => 2])->asArray()->orderBy(['id' => SORT_ASC])->all();
        $items['projects'] = AccountingProjects::find()->select('*, title as text')->asArray()->orderBy(['id' => SORT_ASC])->all();

        $rows = [];

        $rows['account']                   = [];
        $rows['account']['symbol_id']      = ArrayHelper::map(AccountingListSymbols::find()->orderBy(['sort' => SORT_ASC])->all(), 'id', 'title');
        $rows['account']['actype_id']      = ArrayHelper::map([], 'id', 'title');
        $rows['account']['tctype_id']      = ArrayHelper::map([], 'id', 'title');
        $rows['account']['type_id']        = ArrayHelper::map([], 'id', 'title');
        $rows['account']['check_id']       = ArrayHelper::map([], 'id', 'title');
        $rows['account']['budget_id']      = ArrayHelper::map([], 'id', 'title');
        $rows['account']['standard_notes'] = ArrayHelper::map([], 'id', 'title');
        $rows['account']['note_id']        = ArrayHelper::map(AccountingListNotes::find()->orderBy(['id'=>SORT_ASC])->all(), 'id', 'title');
        $rows['client']                    = [];
        $rows['client']['type_id']         = ArrayHelper::map(AccountingClientsListTypes::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $rows['client']['user_id']         = UsersSRL::getItems();
        $rows['floating']                  = [];
        $rows['cost']                      = [];
        $rows['cost']['cost_type_id']      = ArrayHelper::map(AccountingCostsListCostTypes::find()->orderBy(['id' => SORT_ASC])->all(), 'id', 'title');
        $rows['project']                   = [];

        return $this->renderView([
                    'models' => $models,
                    'items'  => $items,
                    'rows'   => $rows,
        ]);
    }
}