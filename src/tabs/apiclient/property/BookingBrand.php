<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;
use tabs\apiclient\property\bookingbrand\Instruction;
use tabs\apiclient\Collection;

/**
 * Tabs Rest API Property Booking Brand object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Collection|Instruction[] getInstructions() Get the instructions
 * @method \tabs\apiclient\BookingBrand getBookingbrand() Returns the bookingbrand
 * @method boolean getPrimarybookingbrand() Returns the primarybookingbrand
 * @method BookingBrand setPrimarybookingbrand(boolean $var) Sets the primarybookingbrand
 */
class BookingBrand extends Builder
{
    /**
     * Bookingbrand
     *
     * @var \tabs\apiclient\BookingBrand
     */
    protected $bookingbrand;

    /**
     * Primarybookingbrand
     *
     * @var boolean
     */
    protected $primarybookingbrand;
    
    /**
     * Booking brand instruction types
     * 
     * @var Collection|Instruction[]
     */
    protected $instructions;

    // -------------------- Public Functions -------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->instructions = Collection::factory(
            'instruction',
            new Instruction,
            $this
        );
        
        parent::__construct($id);
    }

    /**
     * Set the bookingbrand
     *
     * @param stdclass|array|\tabs\apiclient\BookingBrand $bookingbrand The Bookingbrand
     *
     * @return PropertyBookingBrand
     */
    public function setBookingbrand($bookingbrand)
    {
        $this->bookingbrand = \tabs\apiclient\BookingBrand::factory($bookingbrand);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'bookingbrandid' => $this->getBookingbrand()->getId(),
            'primarybookingbrand' => $this->boolToStr($this->getPrimarybookingbrand())
        );
    }
    
    /**
     * For serialisation
     * 
     * @return array
     */
    public function __sleep()
    {
        return array(
            'id',
            'bookingbrand',
            'instuctions'
        );
    }
}