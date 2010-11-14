<?php
/**
 * ICommandExecutor base command execute database
 * @author Sakul
 */
interface ICommandExecutor {

    /**
     * Load data
     * <<Using datamodel command for filter record>>
     * @param DataModelBase $model
     * Database model object for create
     * @return DataModel
     * (NULL if not found)
     */
    public function Load(BaseDataModel $model);

    /**
     * Insertion to database
     * @param DataModelBase $model
     * Database model object for create
     * @param int $primaryKeyLength
     * Primary key length
     * <<Default 40>>
     * @return bool
     * Operation status
     */
    public function Create(BaseDataModel $model);

    /**
     * Submit change
     * <<Require datamodel command>>
     * @param DataModelBase $model
     * Database model object for create
     * @param DataModelBase $setOperation
     * Set operation command
     * [Example]
     * SET Age = '36'
     */
    public function Update(BaseDataModel $model,$setOperation);

     /**
     * Delete record
     * <<Require datamodel command>>
     * @param DataModelBase $model
     * Database model object for create
     * [Example command]
     *  ID = '1'
     */
    public function Remove(BaseDataModel $model);
}
?>
