<?php

/**
 * Tabs Rest Notetype object.
 *
 * PHP Version 5.4
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\core;

/**
 * Tabs Rest Notetype object. 
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 *
 * @method string getType()        Returns the type
 * @method string getDescription() Returns the description
 *
 * @method Notetype setType(string $type         Set the type
 * @method Notetype setDescription(string $desc) Set the description
 */
class Notetype extends Base
{
    /**
     * Note type
     *
     * @var string
     */
    protected $type;

    /**
     * Note type description
     *
     * @var string
     */
    protected $description;

    // ------------------ Public Functions --------------------- //

    /**
     * String magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getType();
    }
}