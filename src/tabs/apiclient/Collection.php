<?php

/**
 * Tabs Rest Collection object.
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

use tabs\apiclient\Base;
use tabs\apiclient\exception\Exception;

/**
 * Tabs Rest Collection object. Handles groups of objects output from
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
class Collection extends StaticCollection
{
    /**
     * Fetch an array of elements
     *
     * @return Collection
     */
    public function fetch()
    {
        // Get the element index
        $class = $this->getElementClass();
        $response = \tabs\apiclient\client\Client::getClient()->get(
            $this->getRoute(),
            $this->getPagination()->toArray()
        );
        
        $this->setFetched(true);
        
        if ($response
            && $response->getStatusCode() == 200
        ) {
            $json = Base::getJson($response);
            $elements = $json;
            if (is_object($json) && property_exists($json, 'elements')
                && property_exists($json, 'total')
            ) {
                $this->getPagination()->setTotal($json->total);
                $elements = $json->elements;
            } else {
                $this->setTotal(count($elements))->setLimit(count($elements));
            }

            // Clear elements array first
            $this->elements = array();

            // Populate with new elements
            foreach ($elements as $element) {                
                // Add new element to collection
                $this->addElement($element);
            }

            return $this;
        }

        throw new Exception(
            $response,
            'Unable to fetch GET: ' . $class
        );
    }
    
    /**
     * @inheritDoc
     */
    public function findBy(callable $fn)
    {
        if (!$this->isFetched()) {
            $this->fetch();
        }
        
        return parent::findBy($fn);
    }
}