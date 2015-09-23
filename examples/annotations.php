<?php

// Include the connection
require_once __DIR__ . '/creating-a-new-connection.php';

$class = new tabs\apiclient\core\specialoffer\Promotion();
$ref = new ReflectionClass($class);

echo sprintf(
    "/**
 * Tabs Rest API object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright %s Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
",
    date('Y')
);

foreach ($ref->getProperties() as $property) {
    $refProp = new ReflectionProperty($class, $property->getName());
    
    preg_match_all('#@(.*?)\n#s', $refProp->getDocComment(), $annotations);
    
    if (isset($annotations[1]) && isset($annotations[1][0])) {
        $type = substr($annotations[1][0], 4);
        
        echo sprintf(
            " * @method %s get%s() Returns the %s\n",
            $type,
            ucfirst($refProp->getName()),
            $refProp->getName()
        );
        
        echo sprintf(
            " * @method %s set%s(%s %svar) Sets the %s\n * \n",
            get_class($class),
            ucfirst($refProp->getName()),
            $type,
            '$',
            $refProp->getName()
        );
    }
}


echo sprintf(
    " */");