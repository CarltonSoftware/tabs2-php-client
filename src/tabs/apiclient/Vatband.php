<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;
use tabs\apiclient\Collection;

/**
 * Tabs Rest API Vatband object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 * 
 * @method Vatband setVatband(string $vatband) Sets the Vatband
 * 
 * @method Collection getVatrates() Return the vatrates collection
 */
class Vatband extends Builder
{
    /**
     * Name
     * 
     * @var string
     */
    protected $vatband = '';
    
    /**
     * Vat rates
     * 
     * @var Collection
     */
    protected $vatrates;
    
    // ------------------ Public Functions --------------------- //
    
    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->vatrates = \tabs\apiclient\Collection::factory(
            'vatrate',
            new Vatrate()
        );
        
        parent::__construct($id);
    }
    
    /**
     * Add a vatrate to the band
     * 
     * @param \tabs\apiclient\Vatrate $vt VT
     * 
     * @return \tabs\apiclient\Vatband
     */
    public function addVatrate(Vatrate $vt)
    {
        $this->vatrates->addElement($vt);
        
        return $this;
    }
    
    /**
     * Return the active vat rate
     * 
     * @return Vatrate
     */
    public function getCurrentVatrate()
    {
        $vrates = array_filter($this->vatrates->getElements(), function($element) {
            $dt = new \DateTime();
            return ($dt >= $element->getFromdate()) && ($dt <= $element->getTodate());
        });
        
        return array_shift($vrates);
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'band' => $this->getVatband()
        );
    }
    
    /**
     * @inheritDoc
     */
    public function __toString()
    {
        $vrate = '';
        $vr = $this->getCurrentVatrate();
        
        if ($vr) {
            $vrate = $vr->getPercentage() . '%';
        }
        
        return sprintf(
            '%s%s',
            $this->getVatband(),
            (strlen($vrate) > 0) ? ' - ' . $vrate : 'No vat rate set'
        );
    }

    /**
     * Returns the Vatband
     *
     * @return string
     */
    public function getVatband()
    {
        return $this->vatband;
    }
}