<?php
namespace app\modules\administration\models\VML;
use app\config\components\jdf;
use app\config\components\functions;
class Administration extends \yii\base\Component {
    public $starttime;
    public $servertime;
    public $serverip;
    public $serverdomain;
    public $disk_total_space;
    public $disk_occupied_space;
    public $disk_free_space;
    public $projectsize;
    public $dbver;
    public function init() {
        //$this->starttime           = getsystemboottime();
        $this->servertime          = jdf::jdate('Y/m/d H:i:s');
        $this->serverip            = gethostbyname(filter_input(INPUT_SERVER, 'SERVER_NAME'));
        $this->serverdomain        = filter_input(INPUT_SERVER, 'SERVER_NAME');
        $this->disk_total_space    = size_format(disk_total_space("."));
        $this->disk_occupied_space = size_format(disk_total_space(".") - disk_free_space("."));
        $this->disk_free_space     = size_format(disk_free_space("."));
        //$this->projectsize         = size_format(getfoldersize('@app/../'));
        $this->dbver               = functions::queryColumn('select version() as ver');
    }
}