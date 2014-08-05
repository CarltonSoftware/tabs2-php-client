<?php

/**
 * Tabs Rest API Actor object.
 *
 * PHP Version 5.5
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Jon Beverley <jon@csdl.biz>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\core;

/**
 * Tabs Rest API Actor object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Jon Beverley <jon@csdl.biz>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method integer getId()
 * @method string  getTabscode()
 * @method string  getType()
 *
 * @method void    setTabscode(string $tabscode)
 * @method void    setType(string $type)
 *
 */

class Actor extends Base
{
    /**
     * Id
     *
     * @var integer
     */
    protected $id;

    /**
     * Tabscode
     *
     * @var string
     */
    protected $tabscode;

    /**
     * Type
     *
     * @var string
     */
    protected $type;
}