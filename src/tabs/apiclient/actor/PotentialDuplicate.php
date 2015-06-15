<?php

/**
 * Tabs Rest API Route object.
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

namespace tabs\apiclient\actor;

/**
 * Tabs Rest API Route object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
class PotentialDuplicate extends \tabs\apiclient\core\Builder
{
    /**
     * Actor 1
     *
     * @var \tabs\apiclient\actor\Actor
     */
    protected $actor1;

    /**
     * Actor 2
     *
     * @var \tabs\apiclient\actor\Actor
     */
    protected $actor2;


    /**
     * Not duplicate
     *
     * @var boolean
     */
    protected $notduplicate;


    /**
     * Actor kept (1 or 2)
     *
     * @var integer
     */
    protected $actorkept;


    /**
     * Processed datetime
     *
     * @var \DateTime
     */
    protected $processeddatetime;


    /**
     * Processed by
     *
     * @var string
     */
    protected $processedby;

    // -------------------------- Static Functions -------------------------- //

    /**
     * Get a potential duplicate from a given Id
     *
     * @param string $id PotentialDuplicate reference
     *
     * @return \tabs\apiclient\core\PotentialDuplicate
     */
    public static function get($id)
    {
        // Get the user object
        return parent::_get('/potentialduplicate/' . $id);
    }

    // -------------------------- Public Functions -------------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'notduplicate' => $this->notduplicate,
            'actorkept' => $this->actorkept,
            'processeddatetime' => $this->processeddatetime,
            'processedby' => $this->processedby
        );
    }


    protected function setActor1($field)
    {
        $this->actor1 = Customer::factory($field);
    }


    protected function setActor2($field)
    {
        $this->actor2 = Customer::factory($field);
    }

    protected function setProcessedby($field)
    {
        if (isset($field)) {
            $fieldParts = explode('/', $field);
            $this->processedby = Tabsuser::get($fieldParts[3]);
        }

    }


    public function ignore()
    {
        $this->notduplicate = true;
        $this->actorkept = null;
    }

    public function merge()
    {
        $this->notduplicate = false;
        $this->actorkept = 1;
    }


    function toUpdateArray()
    {
        if (isset($this->actorkept)) {
            return array(
                'actorkept' => $this->actorkept,
                'actor1id' => $this->actor1->id,
                'actor2id' => $this->actor2->id,
                'processedbytabsuserid' => 5
            );
        } else {
            return array(
                'notduplicate' => true,
                'processedbytabsuserid' => 5
            );
        }
    }

}
