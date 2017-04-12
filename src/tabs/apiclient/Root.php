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
    
    /**
     * Valid filters
     * 
     * @var StaticCollection|root\Filter[]
     */
    protected $validfilters;
    
    /**
     * Valid fields
     * 
     * @var StaticCollection
     */
    protected $validfields = array();

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
        foreach (get_object_vars($json->validfilters) as $endpoint => $filters) {
            foreach (get_object_vars($filters) as $filter) {
                $f = root\Filter::factory($filter);
                $f->setEndpoint($endpoint);
                $root->validfilters->addElement($f);
            }
        }
        foreach (get_object_vars($json->fields) as $entity => $fields) {
            foreach ($fields as $field) {
                $root->addValidfield($entity, $field);
            }
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
}