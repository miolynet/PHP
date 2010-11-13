<?php
require_once "DAL/IDataModel.php";

/**
 * DataModelBase
 * Attribute for any object contact to database
 * @author Sakul
 */
abstract class DataModelBase implements IDataModel{
    /**
     * This model from table name
     * @var string
     */
    public $TableName;

    /**
     * Command options for command excuter
     * @var string
     */
    public $Command;

    /**
     * Primary key
     * @var string
     */
    public $PrimaryKey;
}
?>