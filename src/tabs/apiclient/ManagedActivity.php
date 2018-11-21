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
 * @method ManagedActivity setName(string $var) Sets the name
 * 
 * @method ManagedActivity setDescription(string $var) Sets the description
 * 
 * @method ManagedActivity setDonotmodify(boolean $var) Sets the donotmodify
 * 
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

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the donotmodify
     *
     * @return boolean
     */
    public function getDonotmodify()
    {
        return $this->donotmodify;
    }

    /**
     * Get the services collection
     *
     * @return Collection|Service[]
     */
    public function getServices()
    {
        return $this->services;
    }
}