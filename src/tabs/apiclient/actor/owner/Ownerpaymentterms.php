<?php

namespace tabs\apiclient\actor\owner;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API Ownerpaymentterms object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method string getName() Returns the name
 * @method Ownerpaymentterms setName(string $var) Sets the name
 * 
 * @method string getDescription() Returns the description
 * @method Ownerpaymentterms setDescription(string $var) Sets the description
 * 
 * @method boolean getOndeposit() Returns the ondeposit
 * @method Ownerpaymentterms setOndeposit(boolean $var) Sets the ondeposit
 * 
 * @method boolean getOninterim() Returns the oninterim
 * @method Ownerpaymentterms setOninterim(boolean $var) Sets the oninterim
 * 
 * @method boolean getOnbalance() Returns the onbalance
 * @method Ownerpaymentterms setOnbalance(boolean $var) Sets the onbalance
 * 
 * @method float getAmountperperiod() Returns the amountperperiod
 * @method Ownerpaymentterms setAmountperperiod(float $var) Sets the amountperperiod
 * 
 * @method integer getPercentageofbasic() Returns the percentageofbasic
 * @method Ownerpaymentterms setPercentageofbasic(integer $var) Sets the percentageofbasic
 * 
 * @method string getOwnerpaid() Returns the ownerpaid
 * @method Ownerpaymentterms setOwnerpaid(string $var) Sets the ownerpaid
 * 
 * @method \tabs\apiclient\core\Currency getCurrency() Returns the currency
 * @method Collection|Extra[] getExtras() Returns the extras
 */
class Ownerpaymentterms extends Builder
{
    /**
     * Name
     *
     * @var string
     */
    protected $name;

    /**
     * Description
     *
     * @var string
     */
    protected $description;

    /**
     * Ondeposit
     *
     * @var boolean
     */
    protected $ondeposit;

    /**
     * Oninterim
     *
     * @var boolean
     */
    protected $oninterim;

    /**
     * Onbalance
     *
     * @var boolean
     */
    protected $onbalance;

    /**
     * Amountperperiod
     *
     * @var float
     */
    protected $amountperperiod;

    /**
     * Percentageofbasic
     *
     * @var integer
     */
    protected $percentageofbasic;

    /**
     * Ownerpaid
     *
     * @var string
     */
    protected $ownerpaid;

    /**
     * Currency
     *
     * @var \tabs\apiclient\core\Currency
     */
    protected $currency;

    /**
     * Extras
     *
     * @var Collection|Extra[]
     */
    protected $extras;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->extras = Collection::factory('extra', new Extra, $this);
        
        parent::__construct($id);
    }

    /**
     * Set the currency
     *
     * @param stdclass|array|\tabs\apiclient\core\Currency $currency The Currency
     *
     * @return Ownerpaymentterms
     */
    public function setCurrency($currency)
    {
        $this->currency = \tabs\apiclient\core\Currency::factory($currency);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'ondeposit' => $this->getOndeposit(),
            'oninterim' => $this->getOninterim(),
            'onbalance' => $this->getOnbalance(),
            'amountperperiod' => $this->getAmountperperiod(),
            'percentageofbasic' => $this->getPercentageofbasic(),
            'ownerpaid' => $this->getOwnerpaid(),
            'currencyid' => $this->getCurrency()->getId()
        );
    }
}