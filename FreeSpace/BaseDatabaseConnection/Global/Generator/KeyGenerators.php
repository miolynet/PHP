<?php
/**
 * KeyGenerators
 * Contain methods key generate
 * @author Miolynet
 */
class KeyGenerators {

    /**
     * Key complex
     */
    const Complex = 5;

    /**
     * Generate primary key
     * <<Undecryption>>
     * @param int $length
     * Primary key length
     * @param int $keyComplex
     * Generate comple level
     * <<if high level key is very hard to decode but generate time it increase>>
     * @return string
     * Primary key
     */
    static function PrimaryKey($length, $keyComplex = 30) {
        // initialize characters for random
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $chars.= "abcdefghijklmnopqrstuvwxyz";
        $chars.= "1234567890!@#$%^&*()";

        $primaryKey;    // result
        $charLength = strlen($chars);// characters length
        $count = rand(  $keyComplex - KeyGenerators::Complex,
                        $keyComplex + KeyGenerators::Complex); // random count

        while ($count-->0)$primaryKey.= $chars[rand() % $charLength];
        return substr(md5($primaryKey), 0, $length);
    }
}
?>
