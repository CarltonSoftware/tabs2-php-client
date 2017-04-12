<?php

namespace tabs\apiclient\root;

/**
 * Tabs Rest API Root filter utility object.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method string getDescription() Return the description
 * @method array  getOperators()   Return the operators
 * @method string getType()        Return the type
 * @method string getEndpoint()    Return the applicable endpoint
 * 
 * @method Filter setDescription(string $str) Set the description
 * @method Filter setOperators(array $op)     Set the operators
 * @method Filter setType(string $str)        Set the type
 * @method Filter setEndpoint(string $str)    Set the endpoint
 */
class Filter
{
    use \tabs\apiclient\FactoryTrait;
    
    /**
     * Description
     * 
     * @var string
     */
    protected $description = '';
    
    /**
     * Operators
     * 
     * @var array
     */
    protected $operators = array();
    
    /**
     * Type
     * 
     * @var string
     */
    protected $type = '';
    
    /**
     * Endpoint
     * 
     * @var string
     */
    protected $endpoint = '';
    
    /**
     * Select Option
     * 
     * @var string
     */
    protected $select;
}