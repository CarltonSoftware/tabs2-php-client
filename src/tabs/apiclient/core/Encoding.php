<?php

/**
 * Tabs Rest Encoding object.
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
 * Tabs Rest Encoding object. 
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method integer getId()          Returns Notetype Id
 * @method string  getEncoding()    Returns the encoding type
 *
 * @method Encoding setId(integer $id)            Set the id
 * @method Encoding setEncoding(string $encoding) Set the encoding
 */
class Encoding extends Base
{
    /**
     * Id
     *
     * @var integer
     */
    protected $id;

    /**
     * Encoding
     *
     * @var string
     */
    protected $encoding;

    // ------------------ Public Functions --------------------- //

    /**
     * String magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getEncoding();
    }
}