<?php

namespace tabs\apiclient\property\price;

class PriceTypeBranding
{
    /**
     * @var \tabs\apiclient\PriceType
     */
    protected $pricetype;
    
    /**
     * @var \tabs\apiclient\SalesChannel
     */
    protected $saleschannel;
    
    /**
     * @var \DateTime
     */
    protected $fromdate;
    
    /**
     * @var \DateTime
     */
    protected $todate;
    
    /**
     * @var string
     */
    protected $type;
    
    /**
     * @var integer
     */
    protected $decimalplaces;
    
    /**
     * @var float
     */
    protected $price;
    
    /**
     * @var integer
     */
    protected $percentage;
    
    /**
     * @var Collection|\tabs\apiclient\property\price\PriceTypeBranding[]
     */
    protected $percentages;
    
    /**
     * @var Collection|\tabs\apiclient\property\price\PartySizePrice[]
     */
    protected $partysizeprices;
}