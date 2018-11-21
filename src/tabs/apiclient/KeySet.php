<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API KeySet object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method KeySet setKeyset(string $var) Sets the keyset
 * 
 */
class KeySet extends Builder
{
    /**
     * Keyset
     *
     * @var string
     */
    protected $keyset;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'keyset' => $this->getKeyset()
        );
    }

    /**
     * Returns the keyset
     *
     * @return string
     */
    public function getKeyset()
    {
        return $this->keyset;
    }
}