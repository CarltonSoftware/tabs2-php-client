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
 * @method PotentialBooking setCreated(\DateTime $var) Sets the created
 * 
 * @method PotentialBooking setType(string $var) Sets the type
 * 
 * @method PotentialBooking setExpiry(\DateTime $var) Sets the expiry
 * 
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
            $arr['expirydatetime'] = $this->getExpiry()->format('Y-m-d H:i:s');
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
     * Returns the type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the expiry
     *
     * @return \DateTime
     */
    public function getExpiry()
    {
        return $this->expiry;
    }

    /**
     * Returns the expired
     *
     * @return boolean
     */
    public function getExpired()
    {
        return $this->expired;
    }
}