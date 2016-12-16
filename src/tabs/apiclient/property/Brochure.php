<?php

namespace tabs\apiclient\property;
use tabs\apiclient\Builder;

/**
 * Tabs Rest API Brochure object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\apiclient\brochure\Brochure getBrochure() Returns the brochure
 * @method integer getPage() Returns the page
 * @method Brochure setPage(integer $var) Sets the page
 * 
 * @method integer getSequence() Returns the sequence
 * @method Brochure setSequence(integer $var) Sets the sequence
 * 
 * @method integer getProminence() Returns the prominence
 * @method Brochure setProminence(integer $var) Sets the prominence
 * 
 */
class Brochure extends Builder
{
    /**
     * Brochure
     *
     * @var \tabs\apiclient\Brochure
     */
    protected $brochure;

    /**
     * Page
     *
     * @var integer
     */
    protected $page = 0;

    /**
     * Sequence
     *
     * @var integer
     */
    protected $sequence = 0;

    /**
     * Prominence
     *
     * @var integer
     */
    protected $prominence = 0;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the brochure
     *
     * @param stdclass|array|\tabs\apiclient\Brochure $brochure The Brochure
     *
     * @return Brochure
     */
    public function setBrochure($brochure)
    {
        $this->brochure = \tabs\apiclient\Brochure::factory($brochure);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'brochureid' => $this->getBrochure()->getId(),
            'page' => $this->getPage(),
            'sequence' => $this->getSequence(),
            'prominence' => $this->getProminence()
        );
    }
}