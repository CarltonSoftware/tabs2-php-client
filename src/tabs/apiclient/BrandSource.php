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
 * @method BrandSource setBrandsource(string $var) Sets the brandsource
 * @method BrandSource setDescription(string $var) Sets the description
 *
 */
class BrandSource extends Builder
{
    /**
     * @var string
     */
    protected $brandsource;

    /**
     * @var string
     */
    protected $description;

    // -------------------- Public Functions -------------------- //

    /**
     * Returns the brandsource
     *
     * @return string
     */
    public function getBrandsource()
    {
        return $this->brandsource;
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