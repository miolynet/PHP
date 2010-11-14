<?php
/**
 * IDataModel for object model
 * @author Sakul
 */
interface IDataModel {

    /**
     * Get model column names
     * @return string
     * [Example]
     * ID,Username,Password
     */
    public function ColumnNames();

    /**
     * Get model values
     * @return string
     * [Example]
     * '1234','username','password'
     */
    public function Values();
}
?>
