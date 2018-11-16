<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;
use tabs\apiclient\MarketingBrand;

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
 * @method Grouping setName(string $var) Sets the name
 *
 * @method string getCode() Returns the code
 * @method GroupingValue setCode(string $var) Sets the code
 *
 * @method string getDescription() Returns the description
 * @method GroupingValue setDescription(string $var) Sets the description
 *
 * @method string getGeohash() Return the geohash
 *
 * @method float getLatitude() Returns the latitude
 * @method GroupingValue setLatitude(float $var) Sets the latitude
 *
 * @method float getLongitude() Returns the longitude
 * @method GroupingValue setLongitude(float $var) Sets the longitude
 *
 * @method GroupingValue setRadiuskm(float $var) Sets the radiuskm
 *
 * @method GroupingValue setNearkm(float $var) Sets the nearkm
 *
 * @method GroupingValue setPromote(boolean $var) Sets the promote
 *
 * @method MarketingBrand getMarketingbrand() Get the gv marketing brand
 */
class GroupingValue extends Builder
{
    /**
     * Name
     *
     * @var string
     */
    protected $name = '';

    /**
     * Code
     *
     * @var string
     */
    protected $code = '';

    /**
     * Description
     *
     * @var string
     */
    protected $description = '';

    /**
     * Geohash
     *
     * @var string
     */
    protected $geohash = '';

    /**
     * Latitude
     *
     * @var float
     */
    protected $latitude = 0;

    /**
     * Longitude
     *
     * @var float
     */
    protected $longitude = 0;

    /**
     * Radiuskm
     *
     * @var float
     */
    protected $radiuskm = 0;

    /**
     * Nearkm
     *
     * @var float
     */
    protected $nearkm = 0;

    /**
     * Promote
     *
     * @var boolean
     */
    protected $promote = false;

    /**
     * Marketing brand
     *
     * @var MarketingBrand
     */
    protected $marketingbrand;

    /**
     * Parent
     *
     * @var GroupingValue
     */
    protected $parentgroupingvalue;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the parent grouping value
     *
     * @param array|stdClass|GroupingValue $grp Parent grouping value
     *
     * @return GroupingValue
     */
    public function setParentgroupingvalue($grp)
    {
        $this->parentgroupingvalue = self::factory($grp);

        return $this;
    }

    /**
     * Set the marketing brand
     *
     * @param array|stdClass|MarketingBrand $mb Marketing Brand
     *
     * @return GroupingValue
     */
    public function setMarketingbrand($mb)
    {
        $this->marketingbrand = MarketingBrand::factory($mb);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'name' => $this->getName(),
            'code' => $this->getCode(),
            'description' => $this->getDescription(),
            'latitude' => $this->getLatitude(),
            'longitude' => $this->getLongitude(),
            'radiuskm' => $this->getRadiuskm(),
            'nearkm' => $this->getNearkm(),
            'promote' => $this->boolToStr($this->getPromote()),
        );

        if ($this->getParentgroupingvalue()) {
            $arr['parentgroupingvalueid'] = $this->getParentgroupingvalue()->getId();
        }

        if ($this->getMarketingbrand()) {
            $arr['marketingbrandid'] = $this->getMarketingbrand()->getId();
        }

        return $arr;
    }

    /**
     * @inheritDoc
     */
    public function getUrlStub()
    {
        return 'value';
    }

    /**
     * Returns the name
     *
     * @return string Returns the name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the name
     *
     * @return boolean Returns the promote
     */
    public function getPromote()
    {
        return $this->promote;
    }

    /**
     * Get the parent grouping value
     *
     * @return GroupingValue Parent grouping value
     */
    public function getParentgroupingvalue()
    {
        return $this->parentgroupingvalue;
    }

    /**
     * Returns the nearkm
     *
     * @return float Returns the nearkm
     */
    public function getNearkm()
    {
        return $this->nearkm;
    }

    /**
     * Returns the radiuskm
     *
     * @return float Returns the radiuskm
     */
    public function getRadiuskm()
    {
        return $this->radiuskm;
    }

}