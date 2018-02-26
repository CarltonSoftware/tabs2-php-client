<?php

namespace tabs\apiclient\property\branding;

use tabs\apiclient\Base;

/**
 * Tabs Rest API ChangeDayTemplate object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\apiclient\ChangeDayTemplate getChangedaytemplate() Returns the ChangeDayTemplate
 * 
 * @method \DateTime getFromdate() Returns the fromdate
 * @method ChangeDayTemplate setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method \DateTime getTodate() Returns the todate
 * @method ChangeDayTemplate setTodate(\DateTime $var) Sets the todate
 */
class ChangeDayTemplate extends Base
{
    /**
     * ChangeDayTemplate
     *
     * @var \tabs\apiclient\ChangeDayTemplate
     */
    protected $changedaytemplate;    
    
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
     * Set the ChangeDayTemplate
     *
     * @param stdclass|array|\tabs\apiclient\ChangeDayTemplate $changedaytemplate The ChangeDayTemplate
     *
     * @return ChangeDayTemplate
     */
    public function setChangedaytemplate($changedaytemplate)
    {
        $this->changedaytemplate = \tabs\apiclient\ChangeDayTemplate::factory($changedaytemplate);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'changedaytemplateid' => $this->getChangedaytemplate()->getId(),
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getTodate()->format('Y-m-d')
        );
    }
}