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
 * @method string getCode() Returns the code
 * @method DescriptionType setCode(string $var) Sets the code
 * 
 * @method string getName() Returns the name
 * @method DescriptionType setName(string $var) Sets the name
 * 
 * @method string getDescription() Returns the description
 * @method DescriptionType setDescription(string $var) Sets the description
 * 
 * @method Encoding getEncoding() Returns the encoding
 * @method string getMinimumlength() Returns the minimumlength
 * @method DescriptionType setMinimumlength(string $var) Sets the minimumlength
 * 
 * @method integer getMaximumlength() Returns the maximumlength
 * @method DescriptionType setMaximumlength(integer $var) Sets the maximumlength
 * 
 * @method integer getSortorder() Returns the sortorder
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
}