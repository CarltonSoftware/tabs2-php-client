<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;
use tabs\apiclient\Collection;
use tabs\apiclient\managedactivity\Service;

/**
 * Tabs Rest API Managed Activity object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getName() Returns the name
 * @method ManagedActivity setName(string $var) Sets the name
 * 
 * @method string getDescription() Returns the description
 * @method ManagedActivity setDescription(string $var) Sets the description
 * 
 * @method boolean getDonotmodify() Returns the donotmodify
 * @method ManagedActivity setDonotmodify(boolean $var) Sets the donotmodify
 * 
 * @method Collection|Service[] getServices() Get the services collection
 */
class ManagedActivity extends Builder
{
    /**
     * Name
     *
     * @var string
     */
    protected $name;

    /**
     * Description
     *
     * @var string
     */
    protected $description;

    /**
     * Donotmodify
     *
     * @var boolean
     */
    protected $donotmodify;
    
    /**
     * Services
     * 
     * @var Collection|Service[]
     */
    protected $services;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->services = Collection::factory(
            'service',
            new Service,
            $this
        );
        parent::__construct($id);
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'donotmodify' => $this->boolToStr($this->getDonotmodify()),
        );
    }
}