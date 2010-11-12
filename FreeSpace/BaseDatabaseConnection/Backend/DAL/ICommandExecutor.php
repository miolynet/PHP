<?php
/**
 * ICommandExecutor base command execute database
 * @author Sakul
 */
interface ICommandExecutor {

    /**
     * Load data
     * <<Using datamodel command for filter record>>
     * @return IDataModel 
     * (NULL if not found)
     */
    public function Load($condition = NULL);

    /**
     * Insertion to database
     * @return bool
     * Operation status
     */
    public function Create(DataModelBase $model);

    /**
     * Submit change
     * <<Require datamodel command>>
     * @return bool
     * Operation status
     */
    public function Update(DataModelBase $model);

    /**
     * Delete record
     * <<Require datamodel command>>
     * @return bool
     * Operation status
     */
    public function Remove(DataModelBase $model);
}
?>
