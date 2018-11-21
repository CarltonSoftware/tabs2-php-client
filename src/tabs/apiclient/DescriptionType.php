<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;
use tabs\apiclient\Encoding;

/**
 * Tabs Rest API DescriptionType object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method DescriptionType setCode(string $var) Sets the code
 * 
 * @method DescriptionType setName(string $var) Sets the name
 * 
 * @method DescriptionType setDescription(string $var) Sets the description
 * 
 * @method DescriptionType setMinimumlength(string $var) Sets the minimumlength
 * 
 * @method DescriptionType setMaximumlength(integer $var) Sets the maximumlength
 * 
 * @method DescriptionType setSortorder(integer $var) Sets the sortorder
 */
class DescriptionType extends Builder
{
    /**
     * Code
     *
     * @var string
     */
    protected $code;

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
     * Encoding
     *
     * @var Encoding
     */
    protected $encoding;

    /**
     * Minimumlength
     *
     * @var string
     */
    protected $minimumlength;

    /**
     * Maximumlength
     *
     * @var integer
     */
    protected $maximumlength;

    /**
     * Sortorder
     *
     * @var integer
     */
    protected $sortorder;

    // -------------------- Public Functions -------------------- //
    
    /**
     * Set the encoding
     * 
     * @param array|stdClass|Encoding $encoding Encoding
     * 
     * @return DescriptionType
     */
    public function setEncoding($encoding)
    {
        $this->encoding = Encoding::factory($encoding);
        
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'code' => $this->getCode(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'encoding' => $this->getEncoding()->getEncoding(),
            'minimumlength' => $this->getMinimumlength(),
            'maximumlength' => $this->getMaximumlength(),
            'sortorder' => $this->getSortorder()
        );
    }

    /**
     * Returns the code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
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
     * Returns the encoding
     *
     * @return Encoding
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * Returns the minimumlength
     *
     * @return string
     */
    public function getMinimumlength()
    {
        return $this->minimumlength;
    }

    /**
     * Returns the maximumlength
     *
     * @return integer
     */
    public function getMaximumlength()
    {
        return $this->maximumlength;
    }

    /**
     * Returns the sortorder
     *
     * @return integer
     */
    public function getSortorder()
    {
        return $this->sortorder;
    }
}