<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API GuestType object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getGuestype() Returns the guestype
 * @method GuestType setGuestype(string $var) Sets the guestype
 */
class GuestType extends Builder
{
    /**
     * Guestype
     *
     * @var string
     */
    protected $guestype;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'guestype' => $this->getGuestype()
        );
    }
}