<?php

namespace tabs\apiclient\property\price;

class Price
{
    /**
     * @var string
     */
    protected $type;
    
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
    protected $band;
    
    /**
     * @var string
     */
    protected $description;
    
    /**
     * @var float
     */
    protected $price;
    
    /**
     * @var Collection|\tabs\apiclient\property\price\PartySizePrice[]
     */
    protected $partysizeprices;
    
    /**
     * @var \tabs\apiclient\Currency
     */
    protected $currency;
    
    /**
     * @var \tabs\apiclient\property\price\PriceTypeBranding
     */
    protected $pricetypebranding;
}