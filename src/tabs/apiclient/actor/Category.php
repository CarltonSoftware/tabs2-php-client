<?php

namespace tabs\apiclient\actor;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Category object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method \tabs\apiclient\Category getCategory() Returns the category
 */
class Category extends Builder
{
    /**
     * Category
     *
     * @var \tabs\apiclient\Category
     */
    protected $category;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the category
     *
     * @param stdclass|array|\tabs\apiclient\Category $category The Category
     *
     * @return Category
     */
    public function setCategory($category)
    {
        $this->category = \tabs\apiclient\Category::factory($category);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'categoryid' => $this->getCategory()->getId(),
        );
    }
}