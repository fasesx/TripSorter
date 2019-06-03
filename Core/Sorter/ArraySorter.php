<?php

namespace Core\Sorter;

/**
 * Class ArraySorter
 * 
 * @package Core\Sorter
 */

 class ArraySorter{

    public function __construct(){
    }

    public static function sort($trips){
        $departures = self::initializeDepartures($trips);
        $arrivals = self::intializeArrivals($trips);
    }

    public static function initializeDepartures($trips){

        foreach($trips as $trip){
            $departures[] = [];
        }

    }

    public static function initializeArrivals($trips){

    }

 }