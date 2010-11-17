<?php
require_once "../Backend/MySqlExecutor.php";
require_once "../Backend/BaseDataModel.php";

class Test_Student extends BaseDataModel{
    
    public $ID;
    public $Name;

    public function __construct() {
        $this->TableName = "student";
    }
    public function ColumnNames() {
        return "ID,Name";
    }
    public function Values() {
        return "'$this->PrimaryKey','$this->Name'";
    }
}
?>
