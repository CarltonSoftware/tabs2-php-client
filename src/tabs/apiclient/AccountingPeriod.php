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
 * @method AccountingPeriod setName(string $var) Sets the name
 * @method AccountingPeriod setStartdate(\DateTime $var) Sets the start date
 * @method AccountingPeriod setClosed(\DateTime $var) Sets the closed date
 * @method AccountingPeriod setEnddate(\DateTime $var) Sets the end date
 *
 */
class AccountingPeriod extends Builder
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var \DateTime
     */
    protected $startdate;

    /**
     * @var \DateTime
     */
    protected $enddate;

    /**
     * @var \DateTime
     */
    protected $closed;

    // -------------------- Public Functions -------------------- //


    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->enddate = new \DateTime();
        $this->startdate = new \DateTime();
        $this->closed = new \DateTime();

        parent::__construct($id);
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the startdate
     *
     * @return \DateTime
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Returns the enddate
     *
     * @return \DateTime
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Returns the closed
     *
     * @return \DateTime
     */
    public function getClosed()
    {
        return $this->closed;
    }
}