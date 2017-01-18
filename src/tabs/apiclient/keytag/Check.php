<?php

namespace tabs\apiclient\keytag;

class Check
{
    /**
     *
     * @var string
     */
    protected $type;
    
    /**
     *
     * @var \DateTime
     */
    protected $checkdatetime;
    
    /**
     *
     * @var string
     */
    protected $notes;
    
    /**
     *
     * @var \tabs\apiclient\KeyCheckReason
     */
    protected $keycheckreason;
    
    /**
     *
     * @var \tabs\apiclient\Tabsuser
     */
    protected $tabsuser;
    
    
    /**
     *
     * @var \DateTime
     */
    protected $expectedbackdatetime;
}