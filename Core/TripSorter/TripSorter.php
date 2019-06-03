<?php

namespace Core\TripSorter;

/**
 * Class TripSorter
 * 
 * @package Core\TripSorter
 */
class TripSorter {

    /**
     * Trips
     * 
     * @var array
     */
    private $trips = [];

    /**
     * Bus transport
     * 
     * @var BusBoardingCard
     */
    private $_Bus = new Core\TripSorter\BusBoardingCard;

    /**
     * Train transport
     * 
     * @var TrainBoardingCard
     */
    private $_Train = new Core\TripSorter\TrainBoardingCard;

    /**
     * Plane transport
     * 
     * @var PlaneBoardingCard
     */
    private $_Plane = new Core\TripSorter\PlaneBoardingCard;

    public function __construct($trips){
        $this->trips = $trips;
    }
}