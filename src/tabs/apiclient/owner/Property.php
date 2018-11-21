<?php

namespace tabs\apiclient\owner;
use tabs\apiclient\Base;

/**
 * Tabs Rest API Owner Property object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Document setCreated(\DateTime $var) Sets the created
 * 
 * @method \tabs\apiclient\owner\Property setProperty($prop) Set the property
 * 
 * @method Property  setOwnerfromdate($var) Set the owner fromdate
 * 
 * @method Property  setOwnertodate($var) Set the owner todate
 */
class Property extends Base
{
    /**
     * @var \tabs\apiclient\Property
     */
    protected $property;

    /**
     * @var \DateTime
     */
    protected $ownerfromdate;

    /**
     * @var \DateTime
     */
    protected $ownertodate;

    // -------------------- Public Functions -------------------- //

    /**
     * {@inheritDoc}
     */
    public function __construct($id = null)
    {
        $this->property = new \tabs\apiclient\Property();
        $this->ownerfromdate = new \DateTime();
        $this->ownertodate = new \DateTime();

        parent::__construct($id);
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
     * Returns the property
     *
     * @return \tabs\apiclient\Property
     */
    public function getProperty()
    {
        return $this->property;
    }

    /**
     * Returns the owner fromdate
     *
     * @return \DateTime
     */
    public function getOwnerfromdate()
    {
        return $this->ownerfromdate;
    }

    /**
     * Returns the owner todate
     *
     * @return \DateTime
     */
    public function getOwnertodate()
    {
        return $this->ownertodate;
    }
}