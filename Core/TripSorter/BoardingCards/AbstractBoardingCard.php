<?php
    
    namespace Core\TripSorter\BoardingCards;

    /**
     * Class AbstractBoardingCard
     * 
     * Provides an abstract class for all types of transportation boarding cards that will be defined
     * 
     * @package Core\TripSorter\BoardingCards
     */
    abstract class AbstractBoardingCard {

        /**
         * @var string
         */

         protected $departure;

         /**
          * @var string
          */

          protected $arrival;

          /**
           * @param array 
           */
          public function __construct($trips){
              foreach($trips as $key=>$value){
                  $property = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));

                  if(property_exists($this, $property)){
                      $this->{$property} = $value;
                  }
              }
          }

          /**
           * Provides result message for all types of transportation (needs to be implemented)
           * 
           * @return string
           * 
           */
          abstract public function getMessage();

    }