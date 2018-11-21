<?php

namespace tabs\apiclient\booking;

/**
 * Tabs Rest API Booking Special offer object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * 
 */
class SpecialOffer extends \tabs\apiclient\SpecialOffer
{
    /**
     * @var float
     */
    protected $saving = 0;

    /**
     * @var \tabs\apiclient\specialoffer\Promotion
     */
    protected $promotion;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->promotion = new \tabs\apiclient\specialoffer\Promotion();

        parent::__construct($id);
    }

    /**
     * Get the saving for the booking special offer
     *
     * @return float
     */
    public function getSaving()
    {
        return $this->saving;
    }

    /**
     * Get any applicable promotion
     *
     * @return \tabs\apiclient\specialoffer\Promotion
     */
    public function getPromotion()
    {
        return $this->promotion;
    }
}