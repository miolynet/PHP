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
     * Login
     * @param BaseAccount $account
     * @return BaseAccount
     * Account login status
     */
    public function Login(BaseAccount $account){

        $QuerySuccess = 1;
        if($this->_executor->IsConnected){
            $account->Command = "Username='$account->Username' AND Password='$account->Password'";
            $query = $this->_executor->Load($account);
            if(mysql_num_rows($query) >= $QuerySuccess) $account->IsAuthenticationAccept = TRUE;
        }

        return $account;
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
