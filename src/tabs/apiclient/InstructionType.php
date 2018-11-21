<?php

namespace tabs\apiclient;
use tabs\apiclient\Builder;

/**
 * Tabs Rest API Instruction Type object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method InstructionType setInstructiontype(string $var) Sets the instructiontype
 * 
 * @method InstructionType setDescription(string $var) Sets the description
 */
class InstructionType extends Builder
{
    /**
     * Instructiontype
     *
     * @var string
     */
    protected $instructiontype;

    /**
     * Description
     *
     * @var string
     */
    protected $description;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'instructiontype' => $this->getInstructiontype(),
            'description' => $this->getDescription()
        );
    }

    /**
     * Returns the instructiontype
     *
     * @return string
     */
    public function getInstructiontype()
    {
        return $this->instructiontype;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}