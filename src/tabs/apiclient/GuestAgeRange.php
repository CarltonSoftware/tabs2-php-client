<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API GuestAgeRange object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method GuestAgeRange setAgefrom(integer $var) Sets the agefrom
 * 
 * @method GuestAgeRange setAgeto(integer $var) Sets the ageto
 * 
 * @method GuestAgeRange setAgerange(string $var) Sets the age range
 */
class GuestAgeRange extends Builder
{
    /**
     * @var integer
     */
    protected $agefrom;

    /**
     * @var integer
     */
    protected $ageto;

    /**
     * @var string
     */
    protected $agerange;

    /**
     * @var integer
     */
    protected $agefrommonths;

    /**
     * @var integer
     */
    protected $agetomonths;

    /**
     * @var integer
     */
    protected $dblagefrom;

    /**
     * @var integer
     */
    protected $dbageto;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        $args = [];
        if ($this->agefrom) {
            $args[] = $this->agefrom;
        }
        if ($this->ageto) {
            $args[] = $this->ageto;
        }
        
        return implode(' - ', $args);
    }

    /**
     * Returns the agefrom
     *
     * @return integer
     */
    public function getAgefrom()
    {
        return $this->agefrom;
    }

    /**
     * Returns the ageto
     *
     * @return integer
     */
    public function getAgeto()
    {
        return $this->ageto;
    }

    /**
     * Returns the age range
     *
     * @return string
     */
    public function getAgerange()
    {
        return $this->agerange;
    }
}