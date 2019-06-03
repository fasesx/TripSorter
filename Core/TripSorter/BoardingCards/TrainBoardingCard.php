<?php
namespace Core\TripSorter\BoardingCards;
/**
 * Class Train
 *
 * @package Core\TripSorter\BoardingCards
 */
class Train extends AbstractBoardingCard
{
    /**
     * @var string
     */
    protected $number;
    /**
     * @var string
     */
    protected $seat;
    const MESSAGE = 'Take train %s';
    const MESSAGE_FROM_TO = ' from %s to %s. ';
    const MESSAGE_SEAT = 'Sit in seat %s.';
    /**
     * Return a message for train trip.
     *
     * @return string
     */
    public function getMessage()
    {
        // Add Transportation number to the message
        $message = sprintf(static::MESSAGE, $this->number);
        // Add (from => to) to the message
        $message = sprintf(
            $message . static::MESSAGE_FROM_TO,
            $this->departure,
            $this->arrival
        );
        // Add Seat number to the message
        $message = sprintf($message . static::MESSAGE_SEAT, $this->seat);
        return $message;
    }
}