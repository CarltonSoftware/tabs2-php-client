<?php

namespace tabs\apiclient\property\price;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API PartySizePricing object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method PartySizePricing setDescription(string $var) Sets the description
 * 
 * @method PartySizePricing setPartysizefrom(integer $var) Sets the partysizefrom
 * 
 * @method PartySizePricing setPartysizeto(integer $var) Sets the partysizeto
 */
class PartySizePricing extends Builder
{
    /**
     * Description
     *
     * @var string
     */
    protected $description;

    /**
     * Partysizefrom
     *
     * @var integer
     */
    protected $partysizefrom;

    /**
     * Partysizeto
     *
     * @var integer
     */
    protected $partysizeto;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'description' => $this->getDescription(),
            'partysizefrom' => $this->getPartysizefrom(),
            'partysizeto' => $this->getPartysizeto()
        );
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
     * Returns the partysizefrom
     *
     * @return integer
     */
    public function getPartysizefrom()
    {
        return $this->partysizefrom;
    }

    /**
     * Returns the partysizeto
     *
     * @return integer
     */
    public function getPartysizeto()
    {
        return $this->partysizeto;
    }
}