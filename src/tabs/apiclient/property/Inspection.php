<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;
use tabs\apiclient\Inspector;
use tabs\apiclient\InspectionType;

/**
 * Tabs Rest API Inspection object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Inspection setInspectiondate(\DateTime $var) Sets the inspectiondate
 * 
 * @method Inspection setReinspectiondate(\DateTime $var) Sets the reinspectiondate
 * 
 * @method Inspection setGrading(string $var) Sets the grading
 * 
 * @method Inspection setGradingunit(string $var) Sets the gradingunit
 * 
 * @method Inspection setInspectorname(string $var) Sets the inspectorname
 * 
 * @method Inspection setNotes(string $var) Sets the notes
 * 
 * 
 */
class Inspection extends Builder
{
    /**
     * Inspectiondate
     *
     * @var \DateTime
     */
    protected $inspectiondate;

    /**
     * Reinspectiondate
     *
     * @var \DateTime
     */
    protected $reinspectiondate;

    /**
     * Grading
     *
     * @var string
     */
    protected $grading;

    /**
     * Gradingunit
     *
     * @var string
     */
    protected $gradingunit;

    /**
     * Inspectorname
     *
     * @var string
     */
    protected $inspectorname;

    /**
     * Notes
     *
     * @var string
     */
    protected $notes;

    /**
     * Inspector
     *
     * @var \tabs\apiclient\Inspector
     */
    protected $inspector;
    
    /**
     * Inspectiontype
     *
     * @var \tabs\apiclient\InspectionType
     */
    protected $inspectiontype;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->inspectiondate = new \DateTime();
        $this->reinspectiondate = new \DateTime();
        parent::__construct($id);
    }

    /**
     * Set the inspector
     *
     * @param stdclass|array|Inspector $inspector The Inspector
     *
     * @return Inspection
     */
    public function setInspector($inspector)
    {
        $this->inspector = Inspector::factory($inspector);

        return $this;
    }
    
    /**
     * Set the inspectiontype
     *
     * @param stdclass|array|InspectionType $inspectiontype The inspectiontype
     *
     * @return InspectionType
     */
    public function setInspectiontype($inspectiontype)
    {
        $this->inspectiontype = InspectionType::factory($inspectiontype);

        return $this;
    }    

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = array(
            'inspectiondate' => $this->getInspectiondate()->format('Y-m-d'),
            'grading' => $this->getGrading(),
            'gradingunit' => $this->getGradingunit(),
            'inspectorname' => $this->getInspectorname(),
            'notes' => $this->getNotes(),
            'inspectorid' => $this->getInspector()->getId(),
            'inspectiontypeid' => $this->getInspectiontype()->getId(),
        );
        
        if ($this->getReinspectiondate()) {
            $arr['reinspectiondate'] = $this->getReinspectiondate()->format('Y-m-d');
        }
        
        return $arr;
    }

    /**
     * Returns the inspectiondate
     *
     * @return \DateTime
     */
    public function getInspectiondate()
    {
        return $this->inspectiondate;
    }

    /**
     * Returns the reinspectiondate
     *
     * @return \DateTime
     */
    public function getReinspectiondate()
    {
        return $this->reinspectiondate;
    }

    /**
     * Returns the grading
     *
     * @return string
     */
    public function getGrading()
    {
        return $this->grading;
    }

    /**
     * Returns the gradingunit
     *
     * @return string
     */
    public function getGradingunit()
    {
        return $this->gradingunit;
    }

    /**
     * Returns the inspectorname
     *
     * @return string
     */
    public function getInspectorname()
    {
        return $this->inspectorname;
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

    /**
     * Returns the inspector
     *
     * @return Inspector
     */
    public function getInspector()
    {
        return $this->inspector;
    }

    /**
     * Returns the inspectiontype
     *
     * @return InspectionType
     */
    public function getInspectiontype()
    {
        return $this->inspectiontype;
    }
}