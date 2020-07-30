<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API CancellationReasonGroup object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method CancellationReasonGroup setGroupname(string $var) Sets the groupname
 */
class CancellationReasonGroup extends Builder
{
    /**
     * Group name
     *
     * @var string
     */
    protected $groupname;


    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->groupname = '';

        parent::__construct($id);
    }

    /**
     * @return string
     */
    public function getGroupname()
    {
        return $this->groupname;
    }
}