<?php
    namespace Core\TripSorter\BoardingCards;

    /**
     * Class Bus
     *
     * @package Core\Library\TripSorter\Transportation
     */
    class Bus extends AbstractBoardingCard
    {
        const MESSAGE = 'Take the airport bus';
        const MESSAGE_FROM_TO = ' from %s to %s. ';
        const MESSAGE_NO_SEAT = 'No seat assignment.';
        /**
         * Return a message for bus trip.
         *
         * @return string
         */
        public function getMessage()
        {
            $message = sprintf(
                static::MESSAGE . static::MESSAGE_FROM_TO,
                $this->departure,
                $this->arrival
            );
            $message .= static::MESSAGE_NO_SEAT;
            return $message;
        }
    }