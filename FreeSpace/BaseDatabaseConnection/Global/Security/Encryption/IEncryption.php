<?php
/**
 * IEncryption
 * Data encryption
 * @author Miolynet
 */
interface IEncryption {
    /**
     * Encryption data source
     * @return string
     * Source data under encoded
     */
    public function Encode($source);
}
?>
