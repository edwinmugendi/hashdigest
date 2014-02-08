<?php

namespace HashDigest;

/**
 * S# Digester() Class
 * @author Edwin Mugendi <edwinmugendi@gmail.com>
 * This class wraps the php hash function and has 2 main functionalities
 * 1. Receive a mixed input (array or string), if the input is array, 
 *    a). Orders the array by keys in ascending order it implodes 
 * 1 >>> and generates the hash
 * 2. Check if a hash is correct
 * */
class Digester {

    /**
     * S# digest() function
     * Return hash of the string with a algorithm
     * @param mixed $dataToHash The data to hash
     * @param string $algo The algorithm to use. Default is sha256
     * @return string The hash
     * */
    public static function digest($dataToHash, $algo = 'sha256', $raw_output = false, $separator = '.') {
        if (is_array($dataToHash)) {//If data is array implode
            //sort by keys in ascending order
            ksort($dataToHash);
            
            //Implodr the string
            $strToHash = implode($dataToHash, $separator);
        }else{
            $strToHash = (string)$dataToHash;
        }//E# if else statement
         
        return hash($algo, $strToHash, $raw_output);
    }

//E# digest() function

    /**
     * S# isHashValid() function
     * Verify hash against it's input
     * @param string $hash The hash
     * @param mixed $input String or array of data to be verified against
     * @return boolean true if hash is valid, false otherwise
     */
    public static function isHashValid($hash, $input) {
        return $hash == static::digest($input);
    }

//E# isHashValid() function
}//E# Digester() class
