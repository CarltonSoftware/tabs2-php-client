<?php

/**
 * Tabs Rest API Utility class.
 *
 * PHP Version 5.4
 *
 * @category  Utility
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\utility;

/**
 * Tabs Rest API Utility class.
 *
 * PHP Version 5.4
 *
 * @category  Utility
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */
class Utility
{   

    /**
     * Gets an array of roles/reasons
     * 
     * @return string
     */
    public static function getRoleReason()
    {
        $schema = \tabs\apiclient\client\Client::getClient()->get(
            'utility/rolereason'
        );
        
        return $schema->json(array('object' => true));
    }
    
}