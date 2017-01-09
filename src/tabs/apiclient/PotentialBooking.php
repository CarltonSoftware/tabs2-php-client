<?php

namespace tabs\apiclient;

use tabs\apiclient\Base;

/**
 * Tabs Rest API PotentialBooking object.
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
 * @method PotentialBooking setCreated(\DateTime $var) Sets the created
 * 
 * @method string getType() Returns the type
 * @method PotentialBooking setType(string $var) Sets the type
 * 
 * @method \DateTime getExpiry() Returns the expiry
 * @method PotentialBooking setExpiry(\DateTime $var) Sets the expiry
 * 
 * @method boolean getExpired() Returns the expired
 * @method PotentialBooking setExpired(boolean $var) Sets the expired
 */
class PotentialBooking extends Base
{
    /**
     * Created
     *
     * @var \DateTime
     */
    protected $created;

    /**
     * Type
     *
     * @var string
     */
    protected $type = '';

    /**
     * Expiry
     *
     * @var \DateTime
     */
    protected $expiry;

    /**
     * Expired
     *
     * @var boolean
     */
    protected $expired = false;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        parent::__construct($id);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'type' => $this->getType()
        );
        if ($this->getExpiry() && $this->getExpiry() instanceof \DateTime) {
            $arr['expirydatetime'] = $this->getExpired()->fomat('Y-m-d H:i:s');
        }
        
        return $arr;
    }
}