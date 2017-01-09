<?php

namespace tabs\apiclient\marketingbrand;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API EmailList object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getListname() Returns the listname
 * @method EmailList setListname(string $var) Sets the listname
 * 
 * @method \DateTime getFromdate() Returns the fromdate
 * @method EmailList setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method \DateTime getTodate() Returns the todate
 * @method EmailList setTodate(\DateTime $var) Sets the todate
 */
class EmailList extends Builder
{
    /**
     * Listname
     *
     * @var string
     */
    protected $listname;

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
            'listname' => $this->getListname(),
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getTodate()->format('Y-m-d')
        );
    }
}