<?php
namespace Core\TripSorter\BoardingCards;
/**
 * Class Plane
 *
 * @package Core\TripSorter\BoardingCards
 */
class Plane extends AbstractBoardingCard
{
    /**
     * @var string
     */
    protected $number;
    /**
     * @var string
     */
    protected $seat;
    /**
     * @var string
     */
    protected $gate;
    /**
     * @var string
     */
    protected $baggage;


    const MESSAGE = 'From %s take flight %s to %s. Gate %s, seat %s.';
    const MESSAGE_BAGGAGE_TICKET = 'Baggage drop at ticket counter %s.';
    const MESSAGE_NO_BAGGAGE_TICKET = 'Baggage will be automatically transferred from your last leg.';
    /**
     * Return a message for plane trip.
     *
     * @return string
     */
    public function getMessage()
    {
        $message = sprintf(
            static::MESSAGE,
            $this->departure,
            $this->number,
            $this->arrival,
            $this->gate,
            $this->seat
        );
		$message .= static::MESSAGE_NO_BAGGAGE_TICKET;
        
        // Add Baggage message
        if (!empty($this->baggage)){
            $message = sprintf($message . static::MESSAGE_BAGGAGE_TICKET, $this->baggage);
        }
        
        return $message;
    }
}