<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;

/**
 * Tabs Rest API object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method AccountValueType setValuetype(string $var) Sets the valuetype
 * 
 * @method AccountValueType setDescription(string $var) Sets the description
 */
class AccountValueType extends Builder
{
    /**
     * Valuetype
     *
     * @var string
     */
    protected $valuetype;

    /**
     * Description
     *
     * @var string
     */
    protected $description;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'valuetype' => $this->getValuetype(),
            'description' => $this->getDescription()
        );
    }

    /**
     * Returns the valuetype
     *
     * @return string
     */
    public function getValuetype()
    {
        return $this->valuetype;
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
}