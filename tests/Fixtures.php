<?php

$file = dirname(__FILE__)
    . DIRECTORY_SEPARATOR . '..'
    . DIRECTORY_SEPARATOR . 'autoload.php';
require_once $file;

/**
 * Fixtures for the api client test cases
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
class Fixtures
{
    /**
     * Return a property object
     *
     * @return \tabs\apiclient\Property
     */
    public static function getProperty()
    {
        $property = \tabs\apiclient\Property::factory(
            self::getJsonData('property.json')
        );
        
        $property->getCollection('availablebreaks')->setElements(
            self::getJsonData('availablebreaks.json')
        )->setFetched(true);

        return $property;
    }
    
    /**
     * Get some fixures json data
     * 
     * @param string $filename File name
     * 
     * @return mixed
     */
    public static function getJsonData($filename)
    {
        return json_decode(
            file_get_contents(__DIR__ . '/data/' . $filename)
        );
    }
}