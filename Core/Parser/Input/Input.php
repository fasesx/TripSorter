<?php

namespace Core\Parser\Input;

/**
 * Class Input
 * 
 * @package Core\Parser\Input
 */

class Input implements InputInterface
{
    /**
     * Receive a string as input and create an associative array from it
     *
     * @param string $inputString received input string
     *
     * @see ReaderInterface::readFromString()
     *
     * @return array or bool
     * 
     * @throws Exception  
     */

    public function readFromString($inputString)
    {
        if (empty($inputString)) {
            return [];
        }

        try {
            return $this->decode($inputString);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Read provided file and create an associative array from it
     *
     * @see ReaderInterface::fromFile()
     *
     * @param string $filename
     *
     * @return array
     * 
     * @throws Exception
     */
    public function readFromFile($filename)
    {
        if (!is_readable($filename) || !is_file($filename)) {
            throw new Exception('File is not readable');
        }
        try {
            return $this->decode(file_get_contents($filename));
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * Decodes an input json string and returns the json
     * 
     * @param string $jsonString in json format
     * 
     * @param bool $type if true it will return an associative array, if false it will return an object
     * 
     * @return mixed
     * 
     * @throws Exception
     */
    public function decode($jsonString, $type = 1)
    {
        $json = json_decode($jsonString, $type);

        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                break;
            case JSON_ERROR_DEPTH:
                throw new Exception('The maximum stack depth has been exceeded');
            case JSON_ERROR_STATE_MISMATCH:
                throw new Exception('Invalid or malformed JSON');
            case JSON_ERROR_CTRL_CHAR:
                throw new Exception('Control character error, possibly incorrectly encoded');
            case JSON_ERROR_SYNTAX:
                throw new Exception('Syntax error');
            case JSON_ERROR_UTF8:
                throw new Exception('Malformed UTF-8 characters, possibly incorrectly encoded');
            case JSON_ERROR_RECURSION:
                throw new Exception('One or more recursive references in the value to be encoded');
            case JSON_ERROR_INF_OR_NAN:
                throw new Exception('One or more NAN or INF values in the value to be encoded');
            case JSON_ERROR_UNSUPPORTED_TYPE:
                throw new Exception('A value of a type that cannot be encoded was given');
            case JSON_ERROR_INVALID_PROPERTY_NAME:
                throw new Exception('A property name that cannot be encoded was given');
            case JSON_ERROR_UTF16:
                throw new Exception('Malformed UTF-16 characters, possibly incorrectly encoded');
        }

        return $json;
    }
}
