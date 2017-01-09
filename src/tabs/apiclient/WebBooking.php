<?php

namespace tabs\apiclient;

use tabs\apiclient\Base;

/**
 * Tabs Rest API WebBooking object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \DateTime getCreated() Returns the created
 * @method WebBooking setCreated(\DateTime $var) Sets the created
 * 
 * @method \tabs\apiclient\Tabsuser getReviewer() Returns the reviewer
 * @method \DateTime getProccessed() Returns the proccessed
 * @method WebBooking setProccessed(\DateTime $var) Sets the proccessed
 */
class WebBooking extends Base
{
    /**
     * Created
     *
     * @var \DateTime
     */
    protected $created;

    /**
     * Reviewer
     *
     * @var \tabs\apiclient\Tabsuser
     */
    protected $reviewer;

    /**
     * Proccessed
     *
     * @var \DateTime
     */
    protected $proccessed;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->created = new \DateTime();
        $this->proccessed = new \DateTime();
        parent::__construct($id);
    }

    /**
     * Set the reviewer
     *
     * @param stdclass|array|\tabs\apiclient\Tabsuser $reviewer The Reviewer
     *
     * @return WebBooking
     */
    public function setReviewer($reviewer)
    {
        $this->reviewer = \tabs\apiclient\Tabsuser::factory($reviewer);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array('createddatetime' => $this->getCreated()->format('Y-m-d'));
        
        if ($this->getReviewer()) {
            $arr['reviewingtabsuserid'] = $this->getReviewer()->getId();
        }
        
        return $arr;
    }
}