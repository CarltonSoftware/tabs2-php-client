<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API LabelQueue object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method LabelQueue setSortreference(string $var) Sets the sortreference
 * 
 * @method LabelQueue setReference(string $var) Sets the reference
 * 
 * 
 * @method LabelQueue setPrinted(boolean $var) Sets the printed
 */
class LabelQueue extends Builder
{
    /**
     * Sortreference
     *
     * @var string
     */
    protected $sortreference;

    /**
     * Reference
     *
     * @var string
     */
    protected $reference;

    /**
     * Textjson
     *
     * @var string
     */
    protected $textjson;

    /**
     * Printed
     *
     * @var boolean
     */
    protected $printed;

    // -------------------- Public Functions -------------------- //
    
    /**
     * Set the text json either with a string, array, stdClass or Address object
     * 
     * @param string|\tabs\apiclient\Address $data
     * 
     * @return LabelQueue
     */
    public function setTextjson($data)
    {
        if (is_string($data)) {
            $this->textjson = $data;
        } else if ($data instanceof Address) {
            $this->textjson = json_encode(
                array_filter(
                    array_values(
                        $data->toArray()
                    )
                )
            );
        } else if (is_array ($data) || $data instanceof \stdClass) {
            $this->textjson = json_encode(
                array_filter(
                    array_values(
                        (array) $data
                    )
                )
            );
        }
        
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'sortreference' => $this->getSortreference(),
            'reference' => $this->getReference(),
            'textjson' => $this->getTextjson(),
            'printed' => $this->boolToStr($this->getPrinted())
        );
    }

    /**
     * Returns the sortreference
     *
     * @return string
     */
    public function getSortreference()
    {
        return $this->sortreference;
    }

    /**
     * Returns the reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Returns the textjson
     *
     * @return string
     */
    public function getTextjson()
    {
        return $this->textjson;
    }

    /**
     * Returns the printed
     *
     * @return boolean
     */
    public function getPrinted()
    {
        return $this->printed;
    }
}