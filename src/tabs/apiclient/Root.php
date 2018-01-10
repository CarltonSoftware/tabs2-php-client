<?php

namespace tabs\apiclient;

/**
 * Tabs Rest API Root utility object.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
class Root
{
    use FactoryTrait;
    use DataTrait;
    
    /**
     * Valid filters
     * 
     * @var StaticCollection|root\Filter[]
     */
    protected $validfilters;
    
    /**
     * Valid fields
     * 
     * @var array
     */
    protected $validfields = array();
    
    /**
     * Valid scalar fields (useful for exporting data)
     * 
     * @var array
     */
    protected $scalarfields = array();
    
    /**
     * Static objects
     * 
     * @var array
     */
    protected $static = array();

    /**
     * Get the root object
     * 
     * @return Root
     */
    public static function fetch()
    {
        // Get the root json
        $json = self::getJson(
            \tabs\apiclient\client\Client::getClient()->get(
                '/v2/'
            )
        );
        
        $root = new static;
        $root->setResponsedata($json);
        foreach (get_object_vars($json->validfilters) as $endpoint => $filters) {
            foreach (get_object_vars($filters) as $filter => $data) {
                $f = root\Filter::factory($data);
                $f->setEndpoint($endpoint);
                $f->setFilter($filter);
                $root->validfilters->addElement($f);
            }
        }
        foreach (get_object_vars($json->fields) as $entity => $fields) {
            foreach ($fields as $field) {
                $root->addValidfield($entity, $field);
            }
        }
        foreach (get_object_vars($json->scalar_fields) as $entity => $fields) {
            foreach ($fields as $field) {
                $root->addScalarfield($entity, $field);
            }
        }
        foreach (get_object_vars($json->static) as $entity => $elements) {
            $root->addStaticEntity($entity, $elements);
        }
        
        return $root;
    }
    
    // ------------------------- Public Functions ------------------------ //
    
    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->validfilters = new StaticCollection();
        $this->validfilters->setElementClass(new root\Filter);
    }
    
    /**
     * Get the valid fields
     * 
     * @return array
     */
    public function getValidfields()
    {
        return $this->validfields;
    }
    
    /**
     * Get the valid filters
     * 
     * @var StaticCollection|root\Filter[]
     */
    public function getValidfilters()
    {
        return $this->validfilters;
    }
    
    /**
     * Get the scalar fields
     * 
     * @return array
     */
    public function getScalarfields()
    {
        return $this->scalarfields;
    }
    
    /**
     * Return the static entities
     * 
     * @return array
     */
    public function getStaticentities()
    {
        return $this->static;
    }
    
    /**
     * Add a valid field
     * 
     * @param string $entity Entity type
     * @param string $field  Field
     * 
     * @return \tabs\apiclient\Root
     */
    public function addValidfield($entity, $field)
    {
        if (!isset($this->validfields[$entity])) {
            $this->validfields[$entity] = array();
        }
        $this->validfields[$entity][] = $field;
        
        return $this;
    }
    
    /**
     * Add a valid scalar field
     * 
     * @param string $entity Entity type
     * @param string $field  Field
     * 
     * @return \tabs\apiclient\Root
     */
    public function addScalarfield($entity, $field)
    {
        if (!isset($this->scalarfields[$entity])) {
            $this->scalarfields[$entity] = array();
        }
        $this->scalarfields[$entity][] = $field;
        
        return $this;
    }
    
    /**
     * Add a valid scalar field
     * 
     * @param string $entity   Entity type
     * @param array  $elements Elements
     * 
     * @return \tabs\apiclient\Root
     */
    public function addStaticEntity($entity, $elements)
    {
        if ($entity === 'ContactElementSubtype') {
            $entity = 'ContactElementSubType';
        }
        
        $class = '\\tabs\\apiclient\\' . $entity;
        
        if (!class_exists($class)) {
            return $this;
        }
        
        $col = new StaticCollection();
        $col->setElementClass($class);
        $col->setElements($elements);
        
        $this->static[$entity] = $col;
        
        return $this;
    }
}