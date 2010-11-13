<?php
require_once "DatabaseConnectionBase.php";

/**
 * MySqlConnection
 * For open connection to MySql server
 * @author Sakul
 */
class MySqlConnection extends DatabaseConnectionBase{

    /**
     * Host connection URL
     * @param string
     */
    const Hosting = "localhost";

    /**
     * Initialize database connection
     * @param string $username
     * Account username
     * @param string $password
     * Account password
     * @param string $database
     * Database name
     */
    public function __construct($username,$password,$database){

        // parameter validation
        if( empty ($username) || empty ($password) || empty ($database) ){
            $this->Connection = FALSE;
            $this->ErrorMessage = "<b>[Requires]</b> HostUrl, Username, Password, Database name.";
        }
        else parent::__construct(MySqlConnection::Hosting, $username, $password, $database);
    }

    // close connection
    public function __destruct() {
        if($this->IsConnected) $this->Disconnect();
    }
}
?>