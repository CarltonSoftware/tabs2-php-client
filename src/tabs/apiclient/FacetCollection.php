<?php

/**
 * Tabs Rest Facet Collection object.
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

namespace tabs\apiclient;

/**
 * Tabs Rest Facet Collection object. Handles groups of objects output from
 * a fetch command.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
class FacetCollection extends Collection
{
    protected $attributes = array();

    /**
     * Add facet attribute
     * 
     * @param \tabs\apiclient\Attribute $attr Attribute
     * 
     * @return \tabs\apiclient\FacetCollection
     */
    public function addFacetAttribute(Attribute $attr)
    {
        if (!array_key_exists($attr->getId(), $this->attributes)) {
            $this->attributes[$attr->getId()] = $attr->getId();
            $this->getPagination()->addParameter(
                'facetAttributes',
                implode(':', $this->attributes)
            );
        }
        
        return $this;
    }
    
    /**
     * Remove a facet attribute
     * 
     * @param \tabs\apiclient\Attribute $attr Attribute
     * 
     * @return \tabs\apiclient\FacetCollection
     */
    public function removeFacetAttribute(Attribute $attr)
    {
        if (array_key_exists($attr->getId(), $this->attributes)) {
            unset($this->attributes[$attr->getId()]);
            $this->getPagination()->addParameter(
                'facetAttributes',
                implode(':', $this->attributes)
            );
        }
        
        return $this;
    }
    
    /**
     * Override the element
     * 
     * @return \tabs\apiclient\Facet
     */
    public function getElementClass()
    {
        return new Facet();
    }
    
    /**
     * Override the path
     * 
     * @return string
     */
    public function getRoute()
    {
        return '/v2/property/facet';
    }
    
    /**
     * Return the facet number for sleeps
     * 
     * @param integer $amount Amount
     * 
     * @return integer|FacetCollection
     */
    public function getSleeps($amount = null)
    {
        if ($amount === null) {
            return $this->_getFacets('number', 'sleeps');
        } else {
            return $this->_getFacetAmount('number', 'sleeps', $amount);
        }
    }
    
    /**
     * Return the facet number for pets
     * 
     * @param integer $amount Amount
     * 
     * @return integer|FacetCollection
     */
    public function getPets($amount = null)
    {
        if ($amount === null) {
            return $this->_getFacets('number', 'maximumpets');
        } else {
            return $this->_getFacetAmount('number', 'maximumpets', $amount);
        }
    }
    
    /**
     * Return the facet number for bedrooms
     * 
     * @param integer $amount Amount
     * 
     * @return integer|FacetCollection
     */
    public function getBedrooms($amount = null)
    {
        if ($amount === null) {
            return $this->_getFacets('number', 'bedrooms');
        } else {
            return $this->_getFacetAmount('number', 'bedrooms', $amount);
        }
    }
    
    /**
     * Return the attribute facets
     * 
     * @param \tabs\apiclient\Attribute $attr Attribute
     * 
     * @return FacetCollection
     */
    public function getAttributeFacets(Attribute $attr)
    {
        return $this->findBy(
            function($ele) use ($attr) {
                return strtolower($ele->getType()) === 'object'
                    && strtolower($ele->getContext()) === 'attribute'
                    && $ele->getEntity()->getId() == $attr->getId();
            }
        );
    }
    
    /**
     * Get the amount for a the facet from the collection
     * 
     * @param string $type    Type of facet
     * @param string $context Context
     * @param string $value   Value
     * 
     * @return integer
     */
    private function _getFacetAmount($type, $context, $value)
    {
        $facet = $this->_getFacets($type, $context, $value);
        
        if ($facet instanceof Facet) {
            return $facet->getAmount();
        } else {
            return 0;
        }
    }
    
    /**
     * Get a facet from the collection
     * 
     * @param string $type    Type of facet
     * @param string $context Context
     * @param string $value   Value
     * 
     * @return Facet|FacetCollection|boolean
     */
    private function _getFacets($type, $context, $value = null)
    {
        $results = $this->findBy(
            function($ele) use ($type, $context, $value) {
                if ($value === null) {
                    return strtolower($ele->getType()) === strtolower($type)
                        && strtolower($ele->getContext()) === strtolower($context);
                } else {
                    return strtolower($ele->getType()) === strtolower($type)
                        && strtolower($ele->getContext()) === strtolower($context)
                        && $ele->getValue() === $value;
                }
            }
        );
        
        if (count($results) == 1) {
            return $results->first();
        } else if (count($results) > 1) {
            return $results;
        } else {
            return false;
        }
    }
}