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
class Digester
{

    /**
     * S# digest() function
     * Return hash of the string with a algorithm
     * @param mixed $dataToHash The data to hash
     * @param string $algo The algorithm to use. Default is sha256
     * @return string The hash
     * */
    public static function digest($dataToHash, $algo = 'sha256', $raw_output = false, $separator = '.', $verbose = '')
    {
        if (is_array($dataToHash)) { //If data is array implode

            $arrayToHash = array();

            foreach ($dataToHash as $key => $value) {
                if (is_array($value) == false) {
                    $arrayToHash[$key] = $value;
                } //E# if statement
            } //E# foreach statement

            
            //sort by keys in ascending order
            ksort($dataToHash);

            //Implodr the string
            $strToHash = implode($dataToHash, $separator);
        } else {
            $strToHash = (string)$dataToHash;
        } //E# if else statement

        if ($verbose) {
            $verboseString = '********************String to hash: ' . $strToHash;
            if ($verbose == 'echo') {
                echo $verboseString;
            } else if ($verbose == 'log') {
                \Log::debug($verboseString);
            } else if ($verbose == 'var_dump') {
                var_dump($verboseString);
            } //E# if else statement

        } //E# if else statement

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
    public static function isHashValid($hash, $input,$algo = 'sha256', $raw_output = false, $separator = '.', $verbose = '')
    {
        return $hash == static::digest($input,$algo, $raw_output, $separator);
    }

    //E# isHashValid() function
}//E# Digester() class
