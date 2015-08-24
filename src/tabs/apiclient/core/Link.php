<?php

/**
 * Tabs Api Client Linked object
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
 * Tabs Api Client Linked object
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method Link   setLink(string $link) Set the api link
 * @method string getLink()             Get the api link
 * 
 * @method Link   setObjectClass(string $objectClass) Set the namespace reference to the api object
 * @method string getObjectClass()                    Get the namespace reference to the api object
 */
class Link extends Base
{
    /**
     * Link to api object
     * 
     * @var string
     */
    protected $link = '';
    
    /**
     * Class of linked api object
     * 
     * @var string
     */
    protected $objectClass = '';
}