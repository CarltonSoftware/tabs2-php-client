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
 * @method \DateTime getCreated() Returns the created
 * @method Document setCreated(\DateTime $var) Sets the created
 * 
 * @method \tabs\apiclient\Property getProperty() Returns the property
 * @method \tabs\apiclient\owner\Property setProperty($prop) Set the property
 * 
 * @method \DateTime getOwnerfromdate() Returns the owner fromdate
 * @method Property  setOwnerfromdate($var) Set the owner fromdate
 * 
 * @method \DateTime getOwnertodate() Returns the owner todate
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
}