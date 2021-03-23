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
     * @return \tabs\apiclient\Collection
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
            } else if (is_array($elements)) {
                $this->setTotal(count($elements))->setLimit(count($elements));
            }

            // Clear elements array first
            $this->elements = array();

            if (($class instanceof Base && $class->getClass() =='AvailableDay')
                || is_string($class) && $class === 'AvailableDay'
            ) {
                foreach ($elements as $element) {
                    $avd = new property\branding\AvailableDay();
                    $this->elements[] = $avd->quickSet($element);
                }
            } else {
                // Populate with new elements
                foreach ($elements as $element) {
                    // Add new element to collection
                    $this->addElement($element);
                }
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

    /**
     * Set the page to query
     *
     * @param integer $page Page number
     *
     * @return Collection
     */
    public function setPage($page)
    {
        if (is_numeric($page)) {
            $this->getPagination()->setPage($page);
        }

        return $this;
    }

    /**
     * Set the pagination filters
     *
     * @param array $filters Filters array
     *
     * @return Collection
     */
    public function setFilters(array $filters = [])
    {
        $this->getPagination()->setFilters($filters);

        return $this;
    }

    /**
     * Return the filters set on the collection
     *
     * @return array
     */
    public function getFilters()
    {
        return $this->getPagination()->getFilters();
    }

    /**
     * Get the fields string
     *
     * @return array
     */
    public function getFields()
    {
        return $this->getPagination()->getParameter(
            'fields'
        ) ? explode(
            ':',
            $this->getPagination()->getParameter(
                'fields'
            )
        ) : array();
    }

    /**
     * Add a field to the collection request
     *
     * @param string $field Field
     *
     * @return \tabs\apiclient\Collection
     */
    public function addField($field)
    {
        $fields = $this->getFields();
        $fields[] = $field;

        return $this->setFields($fields);
    }

    /**
     * Add a field to the collection request
     *
     * @param string $field Field
     *
     * @return \tabs\apiclient\Collection
     */
    public function removeField($field)
    {
        $fields = array_flip($this->getFields());
        unset($fields[$field]);

        return $this->setFields(array_flip($fields));
    }

    /**
     * Set the fields in bulk
     *
     * @param string|array $fields Fields
     *
     * @return \tabs\apiclient\Collection
     */
    public function setFields($fields)
    {
        if (is_string($fields)) {
            $this->getPagination()->addParameter('fields', $fields);
        } else if (is_array($fields)) {
            $this->getPagination()->addParameter('fields', implode(':', $fields));
        } else {
            $this->getPagination()->removeParameter('fields');
        }

        return $this;
    }

    /**
     * Shortcut function for the Pagination::addFilter method
     *
     * @param string   $key   Filter key
     * @param string   $value Filter value
     * @param integer  $group Filter group (used for OR filtering if greater
     *                        than zero)
     *
     * @return Collection
     */
    public function addFilter($key, $value, $group = 0)
    {
        $this->getPagination()->addFilter($key, $value, $group);

        return $this;
    }

    /**
     * Get the route for the collection based on the url
     *
     * @return string
     */
    public function getRoute()
    {
        if ($this->getElementParent() && $this->getElementParent()->getId() && !$this->isPathOverridden()) {
            return $this->getElementParent()->getUpdateUrl() . '/' . $this->getPath();
        }

        return $this->getPath();
    }
}