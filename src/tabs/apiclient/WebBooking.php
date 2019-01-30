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
 * @method WebBooking setCreated(\DateTime $var) Sets the created
 * 
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
     * @var \tabs\apiclient\TabsUser
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
     * @param stdclass|array|\tabs\apiclient\TabsUser $reviewer The Reviewer
     *
     * @return WebBooking
     */
    public function setReviewer($reviewer)
    {
        $this->reviewer = \tabs\apiclient\TabsUser::factory($reviewer);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'createddatetime' => $this->getCreated()->format('Y-m-d H:i:s')
        );
        
        if ($this->getReviewer()) {
            $arr['reviewingtabsuserid'] = $this->getReviewer()->getId();
        }
        
        return $arr;
    }

    /**
     * Returns the created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Returns the reviewer
     *
     * @return \tabs\apiclient\TabsUser
     */
    public function getReviewer()
    {
        return $this->reviewer;
    }

    /**
     * Returns the proccessed
     *
     * @return \DateTime
     */
    public function getProccessed()
    {
        return $this->proccessed;
    }
}