<?php

namespace tabs\apiclient;

/**
 * Tabs Object Navigator
 *
 * Provides a helper method for traversing data in standard php objects
 *
 * @category  API_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2020 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.tabs-software.co.uk
 */
class ObjectNavigator
{
    /**
     * One way recursive function to navigate through the responsedata from
     * a get request
     *
     * @param array     $steps  Steps to nagivate through
     * @param \stdClass $object Object to look at
     *
     * @return null|mixed
     */
    public static function navigate($steps, \stdClass $object)
    {
        if (!is_array($steps)) {
            return;
        }
        
        if (count($steps) > 0) {
            $step = array_shift($steps);
            if ($object instanceof \stdClass
                && property_exists($object, $step)
                && count($steps) == 0
            ) {
                return $object->$step;
            }

            if (is_array($object)
                && isset($object[$step])
                && count($steps) == 0
            ) {
                return $object[$step];
            }

            if ($object instanceof \stdClass
                && property_exists($object, $step)
                && count($steps) > 0
            ) {
                return self::navigate($steps, $object->$step);
            }

            if (is_array($object)
                && isset($object[$step])
                && count($steps) > 0
            ) {
                return self::navigate($steps, $object[$step]);
            }
        }

        return;
    }
}