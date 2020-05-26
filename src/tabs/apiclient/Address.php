<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;

/**
 * Tabs Rest Address object.
 *
 * @category  Core
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method Address setLine1(string $line1)        Set the Address line 1
 * @method Address setLine2(string $line2)        Set the Address line 2
 * @method Address setLine3(string $line3)        Set the Address line 3
 * @method Address setTown(string $town)          Set the Address town
 * @method Address setCounty(string $county)      Set the Address county
 * @method Address setPostcode(string $postcode)  Set the Address postcode
 * @method Address setLongitude(float $longitude) Set the Address longitude
 * @method Address setLatitude(float $latitude)   Set the Address latitude
 */
class Address extends Builder
{
    /**
     * Address line 1
     *
     * @var string
     */
    protected $line1;

    /**
     * Address line 2
     *
     * @var string
     */
    protected $line2;

    /**
     * Address line 3
     *
     * @var string
     */
    protected $line3;

    /**
     * Address town
     *
     * @var string
     */
    protected $town;

    /**
     * Address county
     *
     * @var string
     */
    protected $county;

    /**
     * Address postcode
     *
     * @var string
     */
    protected $postcode;

    /**
     * Address longitude
     *
     * @var string
     */
    protected $longitude = 0;

    /**
     * Address latitude
     *
     * @var string
     */
    protected $latitude = 0;

    /**
     * Address country
     *
     * @var Country
     */
    protected $country;

    /**
     * Geohash
     *
     * @var string
     */
    protected $geohash = '';

    // ------------------ Public Functions --------------------- //

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->country = new Country();
    }

    /**
     * ToString magic method
     *
     * @return string
     */
    public function __toString()
    {
        return implode(
            ', ',
            array_filter(
                $this->toArray(),
                function ($ele) {
                    return (gettype($ele) == 'string' && $ele !== '');
                }
            )
        );
    }

    /**
     * Array representation of the address.  Used for creates/updates.
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'line1' => $this->getLine1(),
            'line2' => $this->getLine2(),
            'line3' => $this->getLine3(),
            'town' => $this->getTown(),
            'county' => $this->getCounty(),
            'postcode' => $this->getPostcode(),
            'countryalpha2code' => $this->getCountry()->getAlpha2(),
            'longitude' => (float) $this->getLongitude(),
            'latitude' => (float) $this->getLatitude()
        );
    }

    /**
     * Return the Address line 1
     *
     * @return string
     */
    public function getLine1()
    {
        return $this->line1;
    }

    /**
     * Return the Address line 2
     *
     * @return string
     */
    public function getLine2()
    {
        return $this->line2;
    }

    /**
     * Return the Address line 3
     *
     * @return string
     */
    public function getLine3()
    {
        return $this->line3;
    }

    /**
     * Return the Address town
     *
     * @return string
     */
    public function getTown()
    {
        return $this->town;
    }

    /**
     * Return the Address county
     *
     * @return string
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * Return the Address postcode
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Return the longitude
     *
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Return the latitude
     *
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Return the geohash
     *
     * @return string
     */
    public function getGeohash()
    {
        return $this->geohash;
    }

    /**
     * Return the Address country
     *
     * @return Country
     */
    public function getCountry()
    {
        return $this->country;
    }
}