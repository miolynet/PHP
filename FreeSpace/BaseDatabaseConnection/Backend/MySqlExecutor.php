<?php
require_once "../Global/DatabaseFunctions.php";
require_once "MySqlConnection.php";
require_once "DAL/ICommandExecutor.php";

/**
 * ContactExecutor
 * Contact any object model to server
 * Working with DataModelBase
 * @author Sakul
 */
class MySqlExecutor implements ICommandExecutor{

    /**
     * Connection statement
     * @var bool
     */
    public $IsConnected;

    /**
     * Error message from database operation
     * @var string
     */
    public $ErrorMessage;

    // connection to mysql server
    private $_connection;

    /**
     * Initialize mysql connection
     * Login by default account
     * <<Low security and privilege>>
     */
    public function __construct() {
        $this->SecurityConnection("root", "1234", "miolynet");
    }

    // confirm disconnect
    public function __destruct() {
        $this->_connection->Disconnect();
    }

    /**
     * Start connect to database
     * @param string $username
     * Login account name
     * @param string $password
     * Login account password
     * @param string $database
     * Connecto this database name
     */
    public function SecurityConnection($username,$password,$database){
        // initialize connection
        $this->_connection = new MySqlConnection($username, $password, $database);
        $this->checkConnection();
    }

    /**
     * Insertion to database
     * @param DataModelBase $model
     * Database model object for create
     * @param int $primaryKeyLength
     * Primary key length
     * <<Default 40>>
     * @return bool
     * Operation status
     */
    public function Create(DataModelBase $model,$primaryKeyLength = 40) {
        $status = FALSE;
        if($this->IsConnected){

            $dbFunction = new DatabaseFunctions();
            $model->PrimaryKey = $dbFunction->GeneratePrimaryKeyString($primaryKeyLength);

            // initialize command
            $columns = $model->ColumnNames();
            $values = $model->Values();
            $command = "INSERT INTO ";
            $command.= "$model->TableName($columns) ";
            $command.= "VALUES($values)";

            // call query
            $status = mysql_query($command,  $this->_connection->Connection);
            $this->checkDatabaseQueryStatus($status);
        }
        return $status;
    }

    /**
     * Load data
     * <<Using datamodel command for filter record>>
     * @param DataModelBase $model
     * Database model object for create
     * @return DataModel
     * (NULL if not found)
     */
    public function Load(DataModelBase $model) {
        if($this->IsConnected){
            $command = "SELECT * FROM $model->TableName";
            if(!empty ($model->Command)) $command.= " WHERE $model->Command";

            return mysql_query($command,$this->_connection->Connection);
        }
    }
    
    /**
     * Delete record
     * <<Require datamodel command>>
     * @param DataModelBase $model
     * Database model object for create
     * [Example command]
     *  ID = '1'
     */
    public function Remove(DataModelBase $model) {
        if($this->IsConnected){
            $command = "DELETE FROM $model->TableName WHERE $model->Command";
            mysql_query($command, $this->_connection->Connection);
        }
    }

    /**
     * Submit change
     * <<Require datamodel command>>
     * @param DataModelBase $model
     * Database model object for create
     * @param DataModelBase $setOperation
     * Set operation command
     * [Example]
     * SET Age = '36'
     */
    public function Update(DataModelBase $model,$setOperation) {
        if($this->IsConnected){
            $command = "UPDATE $model->TableName SET $setOperation WHERE $model->Command";
            mysql_query($command, $this->_connection->Connection);
        }
    }

    // Check database query operation looking for message error
    private function checkDatabaseQueryStatus($status){
        if(!$status)$this->ErrorMessage = mysql_error();
    }
    
    // check after connection status
    private function checkConnection(){
        // check connection statement
        if($this->_connection->Connection) $this->IsConnected = TRUE;
        else {
            $this->IsConnected = FALSE;
            $this->ErrorMessage = $this->_connection->ErrorMessage;
        }
    }
}
?>