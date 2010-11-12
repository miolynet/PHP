<?php
require_once "DatabaseConnectionBase.php";

/**
 * MySqlConnection
 * For open connection to MySql server
 * @author Sakul
 */
class MySqlConnection extends DatabaseConnectionBase{
    
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
        parent::__construct($username, $password, $database);
    }
}
?>