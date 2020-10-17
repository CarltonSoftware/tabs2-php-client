<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;

/**
 * Tabs Rest API Mimetype object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 *
 * @method Mimetype setName(string $name)      Sets the mimetype
 * @method Mimetype setShortname(string $name) Sets the short name
 */
class Mimetype extends Builder
{
    /**
     * Name
     *
     * @var string
     */
    protected $name = '';

    /**
     * Shortname
     *
     * @var string
     */
    protected $shortname = '';

    // ------------------ Public Functions --------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'shortname' => $this->getShortname()
        );
    }

    /**
     * Returns the mimetype
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the short name
     *
     * @return string
     */
    public function getShortname()
    {
        return $this->shortname;
    }

    public function quickSet($data)
    {
        $this->name = $data->name;
        $this->shortname = $data->shortname;

        return $this;
    }
}