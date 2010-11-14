<?php
require_once "IDataModel.php";

/**
 * DataModelBase
 * Attribute for any object contact to database
 * @author Sakul
 */
abstract class BaseDataModel implements IDataModel{
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
     * Object identify
     * @var string
     */
    public $PrimaryKey;
}
?>