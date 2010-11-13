<?php
require_once "DAL/IDatabaseConnection.php";
/**
 * SQLConnection
 * Base for model connection
 * @author Sakul
 */
abstract class DatabaseConnectionBase implements IDatabaseConnection{

    /**
     * Error message from server
     * @var string
     */
    public $ErrorMessage;

    /**
     * Connection statement
     * @var Connection Connection
     */
    public $Connection;
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
     * Initialize database connection
     * @param string $username
     * Account username
     * @param string $hostUri
     * Host connection URL
     * @param string $password
     * Account password
     * @param string $database
     * Database name
     * @param bool $isConnected
     * Set auto connection (Default True)
     */
    public function __construct($hostUri,$username,$password,$database,$isConnected = TRUE){
        // assign members value
        $this->HostUrl = $hostUri;
        $this->Username = $username;
        $this->Password = $password;
        $this->DatabaseName = $database;
        
        if ($isConnected) $this->Connect();
    }

    /**
     * Confirm disconnec database
     */
    public function __destruct() {
        if($this->Connection) $this->Disconnect();
    }

    /**
     * Open connection
     * @return bool
     * Connection status
     */
    public function Connect() {
        // Open connection
        $this->Connection = mysql_connect($this->HostUrl, $this->Username, $this->Password);

        // Connect to database
        if($this->Connection){
            $dbConnect = mysql_select_db($this->DatabaseName);
            if(!$dbConnect) {
                $this->ErrorMessage = mysql_error();
                $this->Disconnect();
            }
        }
        return $this->Connection;
    }

    /**
     * Close connection
     */
    public function Disconnect() {
        if ($this->Connection) $this->Connection = FALSE;
    }
}
?>