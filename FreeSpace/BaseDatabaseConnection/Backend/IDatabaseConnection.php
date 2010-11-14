<?php
/**
 * Base for connect to database provider
 * @author Sakul
 */
interface IDatabaseConnection {

    /**
     * Openconnection to database
     * @return bool
     * Connection status
     */
    public function Connect();

    /**
     * Disconnect from database
     */
    public function Disconnect();
}
?>
