<?php

/**
 * Tabs Rest API ContactPreference object.
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
 * @method string getRole()
 * @method string getReason()
 *
 * @method void setRole(string $role)
 * @method void setReason(string $reason)
 *
 */

class ContactPreference extends Base
{

    /**
     * Role
     *
     * @var string
     */
    protected $role;

    /**
     * Reason
     *
     * @var string
     */
    protected $reason;
}