<?php

require_once "MySqlExecutor.php";
require_once "BaseAccount.php";

/**
 * BaseAccountVerify
 * Account verify
 * @author Miolynet
 */
abstract class BaseAccountVerify {
    /**
     * Executor 
     * @var MySqlExecutor
     */
    protected $_executor;

    /**
     * Initialize
     */
    public function __construct() {
        $this->_executor = new MySqlExecutor();
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
        if(!(empty ($username) || empty ($password) || empty ($database) ))
            $this->_executor->SecurityConnection ($username, $password, $database);
    }

    /**
     * Change account informations
     * <<Require SET Operation command>>
     * @param BaseAccount $account
     * Account change
     * @param string $account
     * Account change
     * @param string $setOperation
     * Set operation command
     * @return bool
     * Connection status
     */
    abstract public function ChangeInformation(BaseAccount $account, $setOperation);

    /**
     * Request account information
     * @param BaseAccount $account
     * Account for request account information
     * @return Array
     */
    abstract protected function GetInformation(BaseAccount $account);
}
?>
