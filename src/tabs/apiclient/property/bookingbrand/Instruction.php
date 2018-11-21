<?php

namespace tabs\apiclient\property\bookingbrand;

use tabs\apiclient\Builder;
use tabs\apiclient\InstructionType;

/**
 * Tabs Rest API Instruction object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Instruction setFromdate(\DateTime $var) Sets the fromdate
 * 
 * @method Instruction setTodate(\DateTime $var) Sets the todate
 * 
 * @method Instruction setInstructiontext(string $var) Sets the instructiontext
 * 
 * @method Instruction setHtml(boolean $var) Sets the html
 * 
 */
class Instruction extends Builder
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
     * Instructiontext
     *
     * @var string
     */
    protected $instructiontext;

    /**
     * Html
     *
     * @var boolean
     */
    protected $html;

    /**
     * Instructiontype
     *
     * @var InstructionType
     */
    protected $instructiontype;

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
     * Set the instructiontype
     *
     * @param stdclass|array|InstructionType $instructiontype The Instructiontype
     *
     * @return Instruction
     */
    public function setInstructiontype($instructiontype)
    {
        $this->instructiontype = InstructionType::factory($instructiontype);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'fromdate' => $this->getFromdate()->format('Y-m-d'),
            'todate' => $this->getTodate()->format('Y-m-d'),
            'instructiontext' => $this->getInstructiontext(),
            'html' => $this->boolToStr($this->getHtml()),
            'instructiontypeid' => $this->getInstructiontype()->getId()
        );
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
     * Returns the instructiontext
     *
     * @return string
     */
    public function getInstructiontext()
    {
        return $this->instructiontext;
    }

    /**
     * Returns the html
     *
     * @return boolean
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * Returns the instructiontype
     *
     * @return InstructionType
     */
    public function getInstructiontype()
    {
        return $this->instructiontype;
    }
}