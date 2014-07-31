<?php

/**
 * Tabs Rest API Customer object.
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
 * Tabs Rest API Customer object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Jon Beverley <jon@csdl.biz>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getTabscode()
 *
 * @method void   setTabscode(string $tabscode)
 *
 */

class Customer extends Actor
{
    /**
     * TabsCode
     *
     * @var string
     */
    protected $tabscode = '';

    /**
     * LegalEntity
     *
     * @var LegalEntity
     */
    protected $legalEntity;
}