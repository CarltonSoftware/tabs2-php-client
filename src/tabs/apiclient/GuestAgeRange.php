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
 * @method integer getAgefrom() Returns the agefrom
 * @method GuestAgeRange setAgefrom(integer $var) Sets the agefrom
 * 
 * @method integer getAgeto() Returns the ageto
 * @method GuestAgeRange setAgeto(integer $var) Sets the ageto
 */
class GuestAgeRange extends Builder
{
    /**
     * Agefrom
     *
     * @var integer
     */
    protected $agefrom;

    /**
     * Ageto
     *
     * @var integer
     */
    protected $ageto;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'agefrom' => $this->getAgefrom(),
            'ageto' => $this->getAgeto(),
        );
    }
}