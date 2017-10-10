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
 * @method \DateTime getInspectiondate() Returns the inspectiondate
 * @method Inspection setInspectiondate(\DateTime $var) Sets the inspectiondate
 * 
 * @method \DateTime getReinspectiondate() Returns the reinspectiondate
 * @method Inspection setReinspectiondate(\DateTime $var) Sets the reinspectiondate
 * 
 * @method integer getGrading() Returns the grading
 * @method Inspection setGrading(integer $var) Sets the grading
 * 
 * @method string getGradingunit() Returns the gradingunit
 * @method Inspection setGradingunit(string $var) Sets the gradingunit
 * 
 * @method string getInspectorname() Returns the inspectorname
 * @method Inspection setInspectorname(string $var) Sets the inspectorname
 * 
 * @method string getNotes() Returns the notes
 * @method Inspection setNotes(string $var) Sets the notes
 * 
 * @method Inspector getInspector() Returns the inspector
 * 
 * @method InspectionType getInspectiontype() Returns the inspectiontype
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
     * @var integer
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
}