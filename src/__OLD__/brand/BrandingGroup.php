<?php

/**
 * Tabs Rest API BrandingGroup object.
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

namespace tabs\apiclient\brand;

/**
 * Tabs Rest API BrandingGroup object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
class BrandingGroup extends Brand
{
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'brandinggroupcode' => $this->getCode(),
            'brandinggroup' => $this->getName(),
            'agencyid' => $this->getAgency()->getId(),
        );
    }
}