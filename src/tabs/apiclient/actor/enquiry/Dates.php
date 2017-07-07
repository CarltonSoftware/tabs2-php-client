<?php

namespace tabs\apiclient\actor\enquiry;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Dates object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method integer getDaysfrom() Returns the daysfrom integer
 * @method Dates setDaysfrom(integer $var) Sets the daysfrom
 * 
 * @method integer getDaysto() Returns the daysto integer
 * @method Dates setDaysto(integer $var) Sets the daysto
 * 
 * @method \DateTime getFromdate() Returns the fromdate \DateTime
 * @method Dates setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method \DateTime getTodate() Returns the todate \DateTime
 * @method Dates setTodate(\DateTime $var) Sets the todate
 */
class Dates extends Builder
{
    /**
     * Daysfrom
     *
     * @var integer
     */
    protected $daysfrom = 0;

    /**
     * Daysto
     *
     * @var integer
     */
    protected $daysto = 0;

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
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'daysfrom' => $this->getDaysfrom(),
            'daysto' => $this->getDaysto(),
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getTodate()->format('Y-m-d'),
        );
    }
}