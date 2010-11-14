<?php
/**
 * IDecryption
 * Data decryption
 * @author Miolynet
 */
interface IDecryption {
    /**
     * Decryption data source
     * @return string
     * Source data under decoded
     */
    public function Decode($encode);
}
?>
