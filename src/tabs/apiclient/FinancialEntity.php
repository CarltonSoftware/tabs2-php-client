<?php

namespace tabs\apiclient;

/**
 * Tabs Rest API FinancialEntity object.
 *
 * @category  Tabs_Client
 *
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 *
 * @version   Release: 1
 *
 * @see      http://www.carltonsoftware.co.uk
 *
 * @method FinancialEntity setName(string $var) Sets the name
 * @method FinancialEntity setActivefromdate(\DateTime $var) Sets the active from date
 * @method FinancialEntity setActivetodate(\DateTime $var) Sets the active to date
 *
 */
class FinancialEntity extends Builder
{
    /**
     * Name.
     *
     * @var string
     */
    protected $name;

    /**
     * Active from date.
     *
     * @var DateTime
     */
    protected $activefromdate;

    /**
     * Active to date.
     *
     * @var DateTime
     */
    protected $activetodate;

    // -------------------- Public Functions -------------------- //

    /**
     * {@inheritDoc}
     */
    public function __construct($id = null)
    {
        $this->activefromdate = new \DateTime();
        $this->activetodate = new \DateTime();

        parent::__construct($id);
    }


    /**
     * Returns the name.
     *
     * @return string Returns the name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns active from date
     *
     * @return Grouping
     */
    public function getActivefromdate()
    {
        return $this->activefromdate;
    }

    /**
     * Returns active from date
     *
     * @return Grouping
     */
    public function getActivetodate()
    {
        return $this->activetodate;
    }
}
