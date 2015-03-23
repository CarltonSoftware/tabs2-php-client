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
 *
 *
 * @method integer getId()    Return the route id
 * @method string  getRoute() Return the route name
 *
 * @method \tabs\apiclient\user\Route setId(integer $id)      Set the user Id
 * @method \tabs\apiclient\user\Route setRoute(string $route) Set the user route
 */
class PotentialDuplicate extends \tabs\apiclient\core\Builder
{
    /**
     * Route Id
     *
     * @var integer
     */
    protected $id;

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
            'id' => $this->getId()
        );
    }


    private function setActor1($field)
    {
        $this->actor1 = Customer::factory($field);
    }


    private function setActor2($field)
    {
        $this->actor2 = Customer::factory($field);
    }


    public function ignore()
    {
        $this->notduplicate = true;
    }

    public function merge()
    {
        $this->notduplicate = false;
        $this->actorkept = 1;
    }


}