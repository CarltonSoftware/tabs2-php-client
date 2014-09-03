<?php

/**
 * Tabs Rest API ContactPreference object.
 *
 * PHP Version 5.4
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\actor;

/**
 * Tabs Rest API Actor object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method integer getId()                                  Return the id
 * @method \tabs\apiclient\actor\RoleReason getRolereason() Return the RoleReason    
 *
 * @method \tabs\apiclient\actor\ContactPreference setId(integer $contactid) Set the contact id
 *
 */
abstract class ContactPreference extends \tabs\apiclient\core\Builder
{
    /**
     * Id
     *
     * @var integer
     */
    protected $id;

    
}
