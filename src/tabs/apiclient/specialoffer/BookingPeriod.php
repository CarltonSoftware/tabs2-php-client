<?php

namespace tabs\apiclient\specialoffer;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API BookingPeriod object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 */
class BookingPeriod extends Builder
{
    /**
     * Fromdate
     *
     * @var \DateTime
     */
    protected $fromdate;

    /**
     * Todate
     *
     * @var \DateTime
     */
    protected $todate;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->setFromdate(new \DateTime());
        $this->setTodate(new \DateTime());
        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return $this->__toArray();
    }

    /**
     * Returns the from date
     *
     * @return /DateTime
     */
    public function getFromdate()
    {
        return $this->fromdate;
    }

    /**
     * Returns the from date
     *
     * @return /DateTime
     */
    public function getTodate()
    {
        return $this->todate;
    }

    /**
     * Set the fromdate
     *
     * @param string|\DateTime $fromdate The Fromdate
     *
     * @return BookingPeriod
     */
    public function setFromdate($fromdate)
    {
        if ($fromdate instanceof \DateTime) {
            $this->fromdate = $fromdate;
        } else {
            $this->fromdate = new \DateTime($fromdate);
        }

        return $this;
    }

    /**
     * Set the todate
     *
     * @param string|\DateTime $todate The Todate
     *
     * @return BookingPeriod
     */
    public function setTodate($todate)
    {
        if ($todate instanceof \DateTime) {
            $this->todate = $todate;
        } else {
            $this->todate = new \DateTime($todate);
        }

        return $this;
    }

 }