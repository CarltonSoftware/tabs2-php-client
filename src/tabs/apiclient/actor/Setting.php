<?php

namespace tabs\apiclient\actor;

use tabs\apiclient\Builder;

/**
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Setting setName(string $name)   Set the setting name
 * @method Setting setValue(string $value) Set the setting value
 */
class Setting extends Builder
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $value;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'name' => $this->name,
            'value' => $this->value
        );
        if (is_array($this->value)) {
            $arr['value'] = json_encode($this->value);
        } else if (is_object($this->value)) {
            $arr['value'] = json_encode((array) $this->value);
        }
        
        return $arr;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}