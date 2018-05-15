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
 * @method float getSaving() Get the saving for the booking special offer
 * 
 * @method \tabs\apiclient\specialoffer\Promotion getPromotion() Get any applicable promotion
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
}