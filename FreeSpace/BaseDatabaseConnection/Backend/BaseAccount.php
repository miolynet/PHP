<?php
require_once "BaseDataModel.php";

/**
 * AccountBase
 * Account authentication
 * @author Miolynet
 */
abstract class BaseAccount extends BaseDataModel{

    /**
     * For register session Username
     */
    const Username = "AUName";
    /**
     * For register session Password
     */
    const Password = "APw";
    /**
     * For register session Authenticate
     */
    const Authenticate = "AAuthen";

    /**
     * Account username
     * @var string
     */
    public $Username;

    /**
     * Account password
     * @var string
     */
    public $Password;

    /**
     * Check account authentication state
     * @var bool
     * if check authentication accept is "TRUE"
     */
    public $IsAuthenticationAccept;
}
?>
