<?php

namespace tabs\apiclient;

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
    
    /**
     * Caller of link object
     * 
     * @var Base
     */
    protected $callee;

    // -------------------- Public Functions -------------------- //
    
    /**
     * Get the object class
     * 
     * @return string
     */
    public function getObjectClass()
    {
        return $this->objectClass;
    }
    
    /**
     * Set the object Class
     * 
     * @param string $class Object class
     * 
     * @return Link
     */
    public function setObjectClass($class)
    {
        $this->objectClass = $class;
        
        return $this;
    }
    
    /**
     * Set the callee
     * 
     * @param callable $function Callable function
     * 
     * @return Link
     */
    public function setCallee(callable $function)
    {
        $this->callee = $function;
        
        return $this;
    }
    
    /**
     * Get the callable function
     * 
     * @return callable
     */
    public function getCallee()
    {
        return $this->callee;
    }
    
    /**
     * Get the link
     * 
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set the link but check if the route starts with /v2/ first.
     * 
     * @param string $link Link
     * 
     * @return Link
     */
    public function setLink($link)
    {
        // Set the link
        if (substr($link, 0, 4) == '/v2/') {
            $link = substr($link, 4);
        }
        
        // Check for the id and set in the object
        $links = explode('/', $link);
        $id = array_pop($links);
        $this->setId($id);
        
        $this->link = $link;
        
        return $this;
    }
    
    /**
     * Get the base link object
     * 
     * @return Base
     */
    public function get()
    {
        $cls = $this->objectClass;
        if (class_exists($cls)) {
            
            $json = self::getJson(
                \tabs\apiclient\client\Client::getClient()->get(
                    $this->getLink()
                )
            );
            $that = $cls::factory($json);
            $that->setResponsedata($json);
            
            if ($this->getCallee()) {
                call_user_func($this->getCallee(), $that);
            }

            return $that;
        }
        
        throw new \RuntimeException($cls . ' not found');
    }
    
    /**
     * Overridden string function to stop any additional calls.  Link does
     * not have a toArray method either and would generate an error if this
     * is not here.
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->getLink();
    }
    
    /**
     * Only store scalar values to avoid serialising the closure
     * 
     * @return array
     */
    public function __sleep()
    {
        return array(
            'link',
            'objectClass'
        );
    }
}