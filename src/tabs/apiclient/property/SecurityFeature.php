<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Property Security Feature object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method SecurityFeature setCode(string $var) Sets the code
 * 
 * @method SecurityFeature setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method SecurityFeature setTodate(\DateTime $var) Sets the todate
 * 
 * @method SecurityFeature setNotes(string $var) Sets the notes
 * 
 */
class SecurityFeature extends Builder
{
    /**
     * Securityfeature
     *
     * @var \tabs\apiclient\SecurityFeature
     */
    protected $securityfeature;

    /**
     * Code
     *
     * @var string
     */
    protected $code;

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
     * Notes
     *
     * @var string
     */
    protected $notes;

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
     * Set the securityfeature
     *
     * @param stdclass|array|\tabs\apiclient\SecurityFeature $securityfeature The Securityfeature
     *
     * @return SecurityFeature
     */
    public function setSecurityfeature($securityfeature)
    {
        $this->securityfeature = \tabs\apiclient\SecurityFeature::factory($securityfeature);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'securityfeatureid' => $this->getSecurityfeature()->getId(),
            'code' => $this->getCode(),
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getTodate()->format('Y-m-d'),
            'notes' => $this->getNotes(),
        );
    }

    /**
     * Returns the securityfeature
     *
     * @return \tabs\apiclient\SecurityFeature
     */
    public function getSecurityfeature()
    {
        return $this->securityfeature;
    }

    /**
     * Returns the code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Returns the fromdate
     *
     * @return \DateTime
     */
    public function getFromdate()
    {
        return $this->fromdate;
    }

    /**
     * Returns the todate
     *
     * @return \DateTime
     */
    public function getTodate()
    {
        return $this->todate;
    }

    /**
     * Returns the notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }
}