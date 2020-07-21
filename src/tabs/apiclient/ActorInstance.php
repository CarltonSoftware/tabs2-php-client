<?php

namespace tabs\apiclient;

/**
 * Tabs Rest ActorInstance object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2020 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
class ActorInstance extends Base
{
    /**
     * @inheritDoc
     */
    public static function factory($element, $parent = null)
    {
        $actor = parent::factory($element, $parent);

        if ($actor instanceof Link) {
            list ($type, $id) = explode('/', $actor->getLink());

            switch (strtolower($type)) {
            case 'tabsuser':
                $actor->setObjectClass(get_class(new TabsUser()));
                break;
            case 'customer':
                $actor->setObjectClass(get_class(new Customer()));
                break;
            case 'owner':
                $actor->setObjectClass(get_class(new Owner()));
                break;
            case 'supplier':
                $actor->setObjectClass(get_class(new Supplier()));
                break;
            case 'agency':
                $actor->setObjectClass(get_class(new Agency()));
                break;
            case 'office':
                $actor->setObjectClass(get_class(new Office()));
                break;
            }
        }

        return $actor;
    }
}