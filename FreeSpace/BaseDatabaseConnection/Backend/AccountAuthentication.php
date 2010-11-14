<?php
require_once "BaseAccountVerify.php";

/**
 * AccountAuthentication
 * Check account security
 * @author Miolynet
 */
class AccountAuthentication extends BaseAccountVerify{

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
    public function ChangeInformation(BaseAccount $account, $setOperation){
        // TODO : ChangeInformation
        // check connection
        if($this->_executor->IsConnected)
            $this->_executor->Update($account, $setOperation);
    }

    /**
     * Request account information
     * @param BaseAccount $account
     * Account for request account information
     * @return Array
     */
    protected function GetInformation(BaseAccount $account){
        // TODO : GetInformation
        // check connection
        if($this->_executor->IsConnected){

        }
    }
}
?>
