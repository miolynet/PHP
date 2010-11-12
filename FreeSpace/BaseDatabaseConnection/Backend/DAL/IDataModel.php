<?php
/**
 * IDataModel for object model
 * @author Sakul
 */
interface IDataModel {

    /**
     * Get model column names
     * @return string
     */
    public function ColumnNames();

    /**
     * Get model values
     * @return string
     */
    public function Values();
}
?>
