<?php

    namespace Core\Parser\Input;

    /**
     * Interface InputInterface
     * 
     * @package Core\Parser\Input
     */
    interface InputInterface{
        /**
         * Read from input string and create an associative array or object from it
         * 
         * @param string $string
         * 
         * @return array
         */

         public function readFromString($inputString);

         /**
          * Read from a file and create an associative array or object from it
          * 
          * @param $file
          *
          * @return array or bool
          */
          
          public function readFromFile($filename);
    }

?>