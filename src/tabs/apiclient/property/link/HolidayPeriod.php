<?php

namespace tabs\apiclient\property\link;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Property Link Holiday Period object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method HolidayPeriod setFromdate(\DateTime $var) Set the fromdate
 * @method HolidayPeriod setTodate(\DateTime $var) Set the todate
 */
class HolidayPeriod extends Builder
{
    /**
     * @var \DateTime
     */
    protected $fromdate;

    /**
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
     * @return \DateTime
     */
    public function getFromdate()
    {
        return $this->fromdate;
    }

    /**
     * @return \DateTime
     */
    public function getTodate()
    {
        return $this->todate;
    }
}