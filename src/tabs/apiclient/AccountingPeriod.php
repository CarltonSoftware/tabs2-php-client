<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;


/**
 * Tabs Rest API object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getName() Returns the name
 * @method AccountingPeriod setName(string $var) Sets the name
 * 
 * @method \DateTime getStartdate() Returns the startdate
 * @method \DateTime getEnddate() Returns the enddate
 * @method \DateTime getClosed() Returns the closed
 */
class AccountingPeriod extends Builder
{
    /**
     * Name
     *
     * @var string
     */
    protected $name;

    /**
     * Startdate
     *
     * @var \DateTime
     */
    protected $startdate;

    /**
     * Enddate
     *
     * @var \DateTime
     */
    protected $enddate;

    /**
     * Closed
     *
     * @var \DateTime
     */
    protected $closed;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the startdate
     *
     * @param string|\DateTime $startdate The Startdate
     *
     * @return AccountingPeriod
     */
    public function setStartdate($startdate)
    {
        if ($startdate instanceof \DateTime) {
            $this->startdate = $startdate;
        } else {
            $this->startdate = new \DateTime($startdate);
        }

        return $this;
    }

    /**
     * Set the enddate
     *
     * @param string|\DateTime $enddate The Enddate
     *
     * @return AccountingPeriod
     */
    public function setEnddate($enddate)
    {
        if ($enddate instanceof \DateTime) {
            $this->enddate = $enddate;
        } else {
            $this->enddate = new \DateTime($enddate);
        }

        return $this;
    }

    /**
     * Set the closed
     *
     * @param string|\DateTime $closed The Closed
     *
     * @return AccountingPeriod
     */
    public function setClosed($closed)
    {
        if ($closed instanceof \DateTime) {
            $this->closed = $closed;
        } else {
            $this->closed = new \DateTime($closed);
        }

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'startdate' => $this->getStartdate()->format('Y-m-d'),
            'enddate' => $this->getEnddate()->format('Y-m-d'),
            'closed' => $this->getClosed()->format('Y-m-d H:i:s')
        );
    }
}