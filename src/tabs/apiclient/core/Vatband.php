<?php

/**
 * Tabs Rest API Vatband object.
 *
 * PHP Version 5.4
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\core;
use tabs\apiclient\collection\core\Vatrate as VatrateCollection;

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
 * @method string  getVatband()                Returns the Vatband
 * @method Vatband setVatband(string $vatband) Sets the Vatband
 * 
 * @method VatrateCollection getVatrates() Return the vatrates collection
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
     * @var VatrateCollection
     */
    protected $vatrates;

    /**
     * Constructor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->vatrates = new VatrateCollection();
        $this->vatrates->setElementParent($this);
    }
    
    /**
     * Set vate rates
     * 
     * @param array $vatrates Array of vat rates
     * 
     * @return \tabs\apiclient\core\Vatband
     */
    public function setVatrates($vatrates)
    {
        foreach ($vatrates as $vrate) {
            $vr = Vatrate::factory($vrate);
            $this->addVatrate($vr);
        }
        
        return $this;
    }
    
    /**
     * Add a new vat rate
     * 
     * @param \tabs\apiclient\core\Vatrate $vr Vat rate object
     * 
     * @return \tabs\apiclient\core\Vatband
     */
    public function addVatrate(Vatrate &$vr)
    {
        $this->vatrates->addElement($vr);
        
        return $this;
    }
    
    /**
     * Return the active vat rate
     * 
     * @return \tabs\apiclient\core\Vatrate
     */
    public function getCurrentVatrate()
    {
        $vrates = array_filter($this->getVatrates()->getElements(), function($element) {
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
            'id' => $this->getId(),
            'name' => $this->getName()
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
            $vrate = $vr->getPercentage() * 100 . '%';
        }
        
        return sprintf(
            '%s%s',
            $this->getVatband(),
            (strlen($vrate) > 0) ? ' - ' . $vrate : 'No vat rate set'
        );
    }
}