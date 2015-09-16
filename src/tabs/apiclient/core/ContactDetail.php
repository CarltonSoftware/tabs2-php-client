<?php

/**
 * Tabs Rest API Language object.
 *
 * PHP Version 5.4
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\core;

/**
 * Tabs Rest API Language object.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getValue() Return the value
 *
 * @method Language setValue(string $value) Set the value
 */
class ContactDetail extends Base
{
    /**
     * Value
     *
     * @var string
     */
    protected $value;

    // ------------------ Public Functions --------------------- //

    /**
     * ToString magic method
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }
}