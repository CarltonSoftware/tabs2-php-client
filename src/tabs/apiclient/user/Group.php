<?php

/**
 * Tabs Rest API Group object.
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

namespace tabs\apiclient\user;

/**
 * Tabs Rest API Group object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * 
 * @method integer getId()   Return the group Id
 * @method string  getName() Return the group name
 * 
 * @method \tabs\apiclient\user\Group setId(integer $id)     Set the group Id
 * @method \tabs\apiclient\user\Group setName(string $route) Set the group name
 */
class Group extends \tabs\apiclient\core\Builder
{
    /**
     * Id
     * 
     * @var integer
     */
    protected $id;
    
    /**
     * Name
     * 
     * @var string
     */
    protected $name;

    // -------------------------- Static Functions -------------------------- //

    /**
     * Return an array of group objects
     *
     * @return \tabs\apiclient\user\Group[]
     */
    public static function fetch()
    {
        return parent::fetch('/auth/group');
    }

    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Array definition used for creates/updates
     * 
     * @return array
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'name' => $this->getName()
        );
    }
    
    /**
     * Generate a url string for a create url
     * 
     * @return string
     */
    public function getCreateUrl()
    {
        return '/auth/group';
    }
    
    /**
     * Generate a url string for a update url
     * 
     * @return string
     */
    public function getUpdateUrl()
    {
        return '/auth/group/' . $this->getId();
    }
}