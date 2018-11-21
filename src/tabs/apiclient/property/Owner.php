<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Owner object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Owner setOwnerfromdate(\DateTime $var) Sets the fromdate
 * 
 * @method Owner setOwnertodate(\DateTime $var) Sets the todate
 * 
 */
class Owner extends Builder
{
    /**
     * Owner
     *
     * @var \tabs\apiclient\Owner
     */
    protected $owner;

    /**
     * Ownerfromdate
     *
     * @var \DateTime
     */
    protected $ownerfromdate;

    /**
     * Ownertodate
     *
     * @var \DateTime
     */
    protected $ownertodate;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->ownerfromdate = new \DateTime();
        $this->ownertodate = new \DateTime();
        
        parent::__construct($id);
    }

    /**
     * Set the owner
     *
     * @param stdclass|array|\tabs\apiclient\Owner $owner The Owner
     *
     * @return Owner
     */
    public function setOwner($owner)
    {
        $this->owner = \tabs\apiclient\Owner::factory($owner);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'ownerid' => $this->getOwner()->getId(),
            'ownerfromdate' => $this->getOwnerfromdate()->format('Y-m-d'),
            'ownertodate' => $this->getOwnertodate()->format('Y-m-d')
        );
    }

    /**
     * Returns the owner
     *
     * @return \tabs\apiclient\Owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Returns the fromdate
     *
     * @return \DateTime
     */
    public function getOwnerfromdate()
    {
        return $this->ownerfromdate;
    }

    /**
     * Returns the todate
     *
     * @return \DateTime
     */
    public function getOwnertodate()
    {
        return $this->ownertodate;
    }
}