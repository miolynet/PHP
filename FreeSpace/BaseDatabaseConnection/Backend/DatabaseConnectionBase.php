<?php
require_once "DAL/IDatabaseConnection.php";
/**
 * SQLConnection
 * Base for model connection
 * @author Sakul
 */
abstract class DatabaseConnectionBase implements IDatabaseConnection{

    /**
     * Database connection status
     * @var bool
     */
    public $IsConnected;

    /**
     * Error message from server
     * @var string
     */
    public $ErrorMessage;

     /**
     * Host navigation name
     * @var string
     */
    protected $HostUrl;

    /**
     * Username for login
     * @var string
     */
    protected $Username;

    /**
     * Password for login
     * @var string
     */
    protected $Password;

    /**
     * Name for connect to database
     * @var string
     */
    protected $DatabaseName;

    /**
     * Connection statement
     * @var Connection Connection
     */
    protected $Connection;

    /**
     * Initialize database connection
     * @param string $username
     * Account username
     * @param string $password
     * Account password
     * @param string $database
     * Database name
     * @param bool $isConnected
     * Set auto connection (Default True)
     */
    public function __construct($username,$password,$database,$isConnected = TRUE){
        $this->HostUrl = MySqlConnection::Hosting;
        $this->Username = $username;
        $this->Password = $password;
        $this->DatabaseName = $database;
        
        if ($isConnected) $this->Connect();
    }

    /**
     * Open connection
     * @return bool
     * Connection status
     */
    public function Connect() {
        $this->Connection = mysql_connect($this->HostUrl, $this->Username, $this->Password, $this->DatabaseName);
        if($this->Connection)$this->IsConnected = TRUE;
        else $this->ErrorMessage = mysql_errno();
        return $this->IsConnected;
    }

    /**
     * Close connection
     */
    public function Disconnect() {
        if ($this->IsConnected) {
            mysql_close($this->Connection);
        }
    }
}
?>