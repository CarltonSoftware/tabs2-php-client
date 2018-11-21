<?php

namespace tabs\apiclient\actor\marketingbrand;

use tabs\apiclient\Builder;
use tabs\apiclient\Source;

/**
 * Tabs Rest API CustomerSource object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method CustomerSource setSourcedate(\DateTime $var) Sets the sourcedate
 * 
 */
class CustomerSource extends Builder
{
    /**
     * Source
     *
     * @var Source
     */
    protected $source;

    /**
     * Sourcedate
     *
     * @var \DateTime
     */
    protected $sourcedate;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->sourcedate = new \DateTime();
        parent::__construct($id);
    }

    /**
     * Set the source
     *
     * @param stdclass|array|Source $source The Source
     *
     * @return CustomerSource
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
        return array(
            'sourceid' => $this->getSource()->getId(),
            'sourcedate' => $this->getSourcedate()->format('Y-m-d')
        );
    }

    /**
     * Returns the source
     *
     * @return Source
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Returns the sourcedate
     *
     * @return \DateTime
     */
    public function getSourcedate()
    {
        return $this->sourcedate;
    }
}