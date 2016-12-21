<?php

namespace tabs\apiclient\property\marketingbrand;

use tabs\apiclient\Builder;
use tabs\apiclient\DescriptionType;

/**
 * Tabs Rest API Description object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getDescription() Returns the description
 * @method Description setDescription(string $var) Sets the description
 * 
 * @method DescriptionType getDescriptiontype() Returns the descriptiontype
 */
class Description extends Builder
{
    /**
     * Description
     *
     * @var string
     */
    protected $description;

    /**
     * Descriptiontype
     *
     * @var DescriptionType
     */
    protected $descriptiontype;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the descriptiontype
     *
     * @param stdclass|array|DescriptionType $descriptiontype The Descriptiontype
     *
     * @return Description
     */
    public function setDescriptiontype($descriptiontype)
    {
        $this->descriptiontype = DescriptionType::factory($descriptiontype);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'description' => $this->getDescription(),
            'descriptiontype' => $this->getDescriptiontype()->getName()
        );
    }
}