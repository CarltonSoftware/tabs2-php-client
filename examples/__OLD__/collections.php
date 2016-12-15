<?php

// Include the connection
require_once __DIR__ . '/creating-a-new-connection.php';

$class = new tabs\apiclient\core\BookingPeriod();
$ref = new ReflectionClass($class);

echo sprintf(
    "/**
 * Tabs Rest API collection object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright %s Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */

",
    date('Y')
);

echo sprintf(
    "namespace %s;\n\n",
    str_replace('tabs\apiclient', 'tabs\apiclient\collection', $ref->getNamespaceName())
);

echo sprintf(
    "/**
 * Tabs Rest API collection object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright %s Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
",
    date('Y')
);

echo sprintf(
    "class %s extends \\tabs\apiclient\collection\Collection
{
    /**
     * Return an array of %s objects.  This object will need to be
     * instantiated and the method fetch will need to be called before this will
     * return any elements.
     *
     * @return \%s[]
     */
    public function getElements()
    {
        return %sthis->elements;
    }

    /**
     * @inheritDoc
     */
    public function getRoute()
    {
        return '%s';
    }

    /**
     * @inheritDoc
     */
    public function getElementClass()
    {
        return '%s';
    }
}
",
    $ref->getShortName(),
    $ref->getShortName(),
    $ref->getName(),
    '$',
    strtolower($ref->getShortName()),
    $ref->getName()
);