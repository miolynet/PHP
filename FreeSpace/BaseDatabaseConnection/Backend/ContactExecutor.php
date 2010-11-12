<?php
require_once "DAL/ICommandExecutor.php";

/**
 * ContactExecutor
 * Contact any object model to server
 * Working with DataModelBase
 * @author Sakul
 */
class ContactExecutor implements ICommandExecutor{

    /**
     * Insertion to database
     * @return bool
     * Operation status
     */
    public function Create(DataModelBase $model) {
        // TODO Create create
        $columns = $model->ColumnNames();
        $values = $model->Values();

        $command = "INSERT INTO ";
        $command.= "$model->TableName('$columns') ";
        $command.= "VALUES ($values) ";
        echo $command;
    }

    /**
     * Load data
     * <<Using datamodel command for filter record>>
     * @return IDataModel
     * (NULL if not found)
     */
    public function Load($condition = NULL) {
        // TODO : Load command
    }
    
    /**
     * Delete record
     * <<Require datamodel command>>
     * @return bool
     * Operation status
     */
    public function Remove(DataModelBase $model) {
        // TODO : Remove command
    }

    /**
     * Submit change
     * <<Require datamodel command>>
     * @return bool
     * Operation status
     */
    public function Update(DataModelBase $model) {
        // TODO : Update command
    }
}

require_once "DataModelBase.php";
class X extends DataModelBase{

    public function __construct() {
        $this->TableName = "MyTable01";
    }
    public function ColumnNames() {
        return "ID,Name,Address";
    }
    public function Values() {
        return "'1','My name','KKU'";
    }
}

$cmd = new ContactExecutor();
$x =new X();
$cmd->Create($x);
?>