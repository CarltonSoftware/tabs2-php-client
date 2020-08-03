<?php

namespace tabs\apiclient\booking;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Approval object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2020 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Approval setApprovingactor(\tabs\apiclient\Actor $var) Sets the approvingactor
 * @method Approval setApprovingactortype(string $var) Sets the actor type
 * @method Approval setActionedbyactor(\tabs\apiclient\Actor $var) Sets the actionedbyactor
 * @method Approval setCreateddatetime(\DateTime $var) Sets the createddatetime
 * @method Approval setApproved(boolean $var) Sets the approved flag
 * @method Approval setApproveddatetime(\DateTime $var) Sets the approveddatetime
 * @method Approval setActioneddatetime(\DateTime $var) Sets the actioneddatetime
 * @method Approval setComment(string $var) Sets the comment
 */
class Approval extends Builder
{
    /**
     * @var \tabs\apiclient\Actor
     */
    protected $approvingactor;

    /**
     * @var string
     */
    protected $approvingactortype;

    /**
     * @var \tabs\apiclient\Actor
     */
    protected $actionedbyactor;

    /**
     * @var \DateTime
     */
    protected $createddatetime;

    /**
     * @var boolean
     */
    protected $approved;

    /**
     * @var \DateTime
     */
    protected $approveddatetime;

    /**
     * @var \DateTime
     */
    protected $actioneddatetime;

    /**
     * @var string
     */
    protected $comment;


    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->approvingactor = new \tabs\apiclient\TabsUser();
        $this->approvingactortype = '';
        $this->actionedbyactor = new \tabs\apiclient\TabsUser();
        $this->createddatetime = new \DateTime();
        $this->approveddatetime = new \DateTime();
        $this->actioneddatetime = new \DateTime();

        parent::__construct($id);
    }

    /**
     * @return \tabs\apiclient\Actor
     */
    public function getApprovingactor()
    {
        return $this->approvingactor;
    }

    /**
     * @return string
     */
    public function getApprovingactortype()
    {
        return $this->approvingactortype;
    }

    /**
     * @return \tabs\apiclient\Actor
     */
    public function getActionedbyactor()
    {
        return $this->actionedbyactor;
    }

    /**
     * @return \DateTime
     */
    public function getCreateddatetime()
    {
        return $this->createddatetime;
    }

    /**
     * @return boolean
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * @return \DateTime
     */
    public function getApproveddatetime()
    {
        return $this->approveddatetime;
    }

    /**
     * @return \DateTime
     */
    public function getActioneddatetime()
    {
        return $this->actioneddatetime;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }
}
