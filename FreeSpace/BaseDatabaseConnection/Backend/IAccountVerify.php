<?php
require_once "BaseAccount.php";

/**
 * IAccountVerify
 * Default account verify
 * @author Miolynet
 */
interface IAccountVerify {
    /**
     * Verify account by username and password
     * @param BaseAccount $model
     * Sign in account verify
     * @return bool
     * Username and Password verify (Accept is TRUE)
     */
    public function SignIn(BaseAccount $model);

    /**
     * Check out account
     * @param BaseAccount $model
     * Sign out account
     */
    public function SignOut(BaseAccount $model);
}
?>
