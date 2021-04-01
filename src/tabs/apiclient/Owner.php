<?php

namespace tabs\apiclient;

/**
 * Tabs Rest Owner object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Owner   setAbroad(boolean $var) Sets the abroad boolean
 * @method Owner   setEnquirer(boolean $var) Sets the enquirer boolean
 * @method Owner   setEnquirydate(\DateTime $date) Sets the enquiry date
 */
class Owner extends Actor
{
    /**
     * @var \tabs\apiclient\Branding
     */
    protected $branding;

    /**
     * @var \tabs\apiclient\Source
     */
    protected $source;

    /**
     * @var \DateTime
     */
    protected $enquirydate;

    /**
     * @var boolean
     */
    protected $abroad = false;

    /**
     * @var boolean
     */
    protected $enquirer = false;

    /**
     * @var \tabs\apiclient\Collection|owner\Property[]
     */
    protected $properties;

    /**
     * @var \tabs\apiclient\Collection|owner\PaymentItem[]
     */
    protected $paymentitems;

    // ------------------ Public Functions --------------------- //

    /**
     * {@inheritDoc}
     */
    public function __construct($id = null)
    {
        $this->setAbroad(false);
        $this->properties = StaticCollection::factory(
            'property',
            new owner\Property(),
            $this
        );
        $this->paymentitems = Collection::factory(
            'paymentitem',
            new owner\PaymentItem(),
            $this
        );
        parent::__construct($id);
    }

    /**
     * Get the currently owned properties
     *
     * @return \tabs\apiclient\Collection|\tabs\apiclient\owner\Property[]
     */
    public function getCurrentProperties()
    {
        return $this->properties->filter(function($prop) {
            $now = new \DateTime();

            return $prop->getOwnerfromdate() <= $now && $now <= $prop->getOwnertodate();
        });
    }

    /**
     * Set the branding
     *
     * @param array|\stdClass|\tabs\apiclient\Branding $branding Branding
     *
     * @return \tabs\apiclient\Owner
     */
    public function setBranding($branding)
    {
        $this->branding = Branding::factory($branding);

        return $this;
    }

    /**
     * Set the source
     *
     * @param array|\stdClass|\tabs\apiclient\Source $source Source
     *
     * @return \tabs\apiclient\Owner
     */
    public function setSource($source)
    {
        $this->source = Source::factory($source);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = parent::toArray();

        if ($this->getBranding() && $this->getBranding()->getId()) {
            $arr['brandingid'] = $this->getBranding()->getId();
        }

        if ($this->getSource() && $this->getSource()->getId()) {
            $arr['sourceid'] = $this->getSource()->getId();
        }

        if ($this->getEnquirer()) {
            $arr['enquirer'] = $this->getEnquirer();
        }

        return $arr;
    }

    /**
     * Returns the abroad boolean
     *
     * @return boolean
     */
    public function getAbroad()
    {
        return $this->abroad;
    }

    /**
     * Returns the enquirer boolean
     *
     * @return boolean
     */
    public function getEnquirer()
    {
        return $this->enquirer;
    }

    /**
     * Returns the owner branding
     *
     * @return \tabs\apiclient\Branding
     */
    public function getBranding()
    {
        return $this->branding;
    }

    /**
     * Returns the source
     *
     * @return \tabs\apiclient\Source
     */
    public function getSource()
    {
        return $this->source;
    }
}