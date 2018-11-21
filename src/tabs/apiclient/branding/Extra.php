<?php

namespace tabs\apiclient\branding;

use tabs\apiclient\Base;
use tabs\apiclient\StaticCollection;

/**
 * Tabs Rest API Extra branding object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 */
class Extra extends Base
{
    /**
     * Extra
     *
     * @var \tabs\apiclient\Extra
     */
    protected $extra;

    /**
     * Configurations
     *
     * @var StaticCollection|\tabs\apiclient\extra\branding\Configuration[]
     */
    protected $configurations;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->configurations = StaticCollection::factory(
            '',
            new \tabs\apiclient\extra\branding\Configuration(),
            $this
        );
        
        parent::__construct($id);
    }

    /**
     * Set the extra
     *
     * @param stdclass|array|\tabs\apiclient\Extra $extra The Extra
     *
     * @return Extra
     */
    public function setExtra($extra)
    {
        $this->extra = \tabs\apiclient\Extra::factory($extra);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'extraid' => $this->getExtra()->getId()
        );
    }

    /**
     * Returns the extra
     *
     * @return \tabs\apiclient\Extra
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * Returns the configurations
     *
     * @return StaticCollection|\tabs\apiclient\extra\Configuration[]
     */
    public function getConfigurations()
    {
        return $this->configurations;
    }
}