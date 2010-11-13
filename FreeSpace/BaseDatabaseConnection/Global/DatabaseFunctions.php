<?php
/**
 * DatabaseFunctions
 * Class container database functions
 * @author Miolynet
 */
class DatabaseFunctions {

     /**
     * Generate primary key
     * @param int $length
     * Generate string length
     * @return string
     * Primary key
     */
    public function GeneratePrimaryKeyString($length){

        // initialize characters for random
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $chars.= "abcdefghijklmnopqrstuvwxyz";
        $chars.= "1234567890!@#$%^&*()";

        $primaryKey;    // result
        $charLength = strlen($chars);// characters length
        $count = rand(20, 30); // random count

        while ($count-->0)$primaryKey.= $chars[rand() % $charLength];
        return substr(md5($primaryKey), 0, $length);
    }
}
?>
