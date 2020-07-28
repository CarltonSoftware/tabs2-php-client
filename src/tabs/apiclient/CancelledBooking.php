<?php

/**
 * Tabs Rest API Cancelled Booking object.
 *
 * PHP Version 5.4
 *
 * @category  Booking
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient;

/**
 * Tabs Rest API Cancelled Booking object.
 *
 * @category  Booking
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 *
 * @method CancelledBooking setReason(string $reason) set the cancellation reason
 * @method CancelledBooking setDatetime(\DateTime $datetime) Set the datetime
 * @method CancelledBooking setFullrefund(boolean $fullrefund) Sets the fullrefund
 * @method CancelledBooking setPriorityrebook(boolean $priorityrebook) Sets the priorityrebook
 * @method CancelledBooking setTemplateoffer(\tabs\apiclient\SpecialOffer $templateoffer) Special offer template to create an offer from
 */
class CancelledBooking extends Base
{
    /**
     * Datetime
     *
     * @var \DateTime
     */
    protected $datetime;

    /**
     * Cancellation reason
     *
     * @var string
     */
    protected $reason = '';

    /**
     * Fullrefund
     *
     * @var boolean
     */
    protected $fullrefund = false;

    /**
     * Priority rebook
     *
     * @var boolean
     */
    protected $priorityrebook = false;

    /**
     * Special Offer Template
     *
     * @var \tabs\apiclient\SpecialOffer
     */
    protected $templateoffer;

    // -------------------------- Public Functions -------------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->datetime = new \DateTime();

        parent::__construct($id);
    }

    /**
     * Array representation of the object
     *
     * @return array
     */
    public function toArray()
    {
        return $this->__toArray();
    }

    /**
     * Return the datetime
     *
     * @return \DateTime
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Return the cancellation reason
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Returns the fullrefund
     *
     * @return boolean
     */
    public function getFullrefund()
    {
        return $this->fullrefund;
    }

    /**
     * Returns the priorityrebook
     *
     * @return boolean
     */
    public function getPriortyrebook()
    {
        return $this->priorityrebook;
    }
}