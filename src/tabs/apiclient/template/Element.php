<?php

namespace tabs\apiclient\template;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Element object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \DateTime getFromdate() Returns the fromdate \DateTime
 * @method Element setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method \DateTime getTodate() Returns the todate \DateTime
 * @method Element setTodate(\DateTime $var) Sets the todate
 * 
 * @method integer getElementorder() Returns the elementorder integer
 * @method Element setElementorder(integer $var) Sets the elementorder
 * 
 * @method integer getHeightinmm() Returns the heightinmm integer
 * @method Element setHeightinmm(integer $var) Sets the heightinmm
 * 
 * @method \tabs\apiclient\contactmethodtype\Element getContactmethodelement() Returns the contactmethodelement object
 */
abstract class Element extends Builder
{
    /**
     * Fromdate
     *
     * @var \DateTime
     */
    protected $fromdate;

    /**
     * Todate
     *
     * @var \DateTime
     */
    protected $todate;

    /**
     * Elementorder
     *
     * @var integer
     */
    protected $elementorder;

    /**
     * Heightinmm
     *
     * @var integer
     */
    protected $heightinmm;

    /**
     * Contactmethodelement
     *
     * @var \tabs\apiclient\contactmethodtype\Element
     */
    protected $contactmethodelement;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
        parent::__construct($id);
    }

    /**
     * Set the contactmethodelement
     *
     * @param stdclass|array|\tabs\apiclient\contactmethodtype\Element $contactmethodelement The Contactmethodelement
     *
     * @return Element
     */
    public function setContactmethodelement($contactmethodelement)
    {
        $this->contactmethodelement = \tabs\apiclient\contactmethodtype\Element::factory($contactmethodelement);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();

        if ($this->getContactmethodelement()) {
            $arr['contactmethodelementid'] = $this->getContactmethodelement()->getId();
        }

        return $arr;
    }
}