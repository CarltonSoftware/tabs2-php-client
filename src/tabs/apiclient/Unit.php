<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;
use tabs\apiclient\unit\PerUnit;
use tabs\apiclient\Collection;

/**
 * Tabs Rest API Unit object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method Unit   setName(string $name) Sets the name
 * 
 * @method Unit   setDescription(string $desc) Sets the desc
 * 
 * @method Unit   setDecimalplaces(string $decimal) Sets the decimal places
 * 
 */
class Unit extends Builder
{
    /**
     * Name
     * 
     * @var string
     */
    protected $name = '';
    
    /**
     * Description
     * 
     * @var string
     */
    protected $description = '';
    
    /**
     * Decimal places
     * 
     * @var string
     */
    protected $decimalplaces = 0;
    
    /**
     * Per unit collection
     * 
     * @var Collection|PerUnit[]
     */
    protected $perunits;


    // ------------------ Public Functions --------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->perunits = Collection::factory(
            'perunit',
            new PerUnit(),
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
            'decimalplaces' => $this->getDecimalplaces()
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
     * Returns the desc
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the decimal places
     *
     * @return string
     */
    public function getDecimalplaces()
    {
        return $this->decimalplaces;
    }

    /**
     * Get the PerUnit settings
     *
     * @return Collection|PerUnit[]
     */
    public function getPerunits()
    {
        return $this->perunits;
    }
}