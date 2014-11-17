<?php

/**
 * This plugin implements the Hmac hashing necessary to be used with the
 * tocc api.
 *
 * PHP Version 5.4
 *
 * @category  Client
 * @package   Tabs
 * @author    Alex Wyett <alex@wyett.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */

namespace tabs\apiclient\client;

/**
 * This plugin implements the Hmac hashing necessary to be used with the
 * tocc api.
 * 
 * https://github.com/guzzle/oauth-subscriber/blob/master/src/Oauth1.php
 *
 * @category  Client
 * @package   Tabs
 * @author    Alex Wyett <alex@wyett.co.uk>
 * @copyright 2014 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://www.carltonsoftware.co.uk
 */
class Hmac implements \GuzzleHttp\Event\SubscriberInterface
{
    /**
     * Parameters to encode
     * 
     * @var array 
     */
    protected $params = array();
    
    /**
     * Api Key
     * 
     * @var string
     */
    protected $key;
    
    /**
     * Api Secret
     * 
     * @var string
     */
    protected $secret;
    
    /**
     * Api Url Prefix
     * 
     * @var string
     */
    protected $prefix;
    
    // ----------------------------- Constructor ---------------------------- //
    
    /**
     * Constructor
     * 
     * @param string $key    Api Key
     * @param string $secret Secret
     * 
     * @return void
     */
    public function __construct($key, $secret)
    {
        $this->setKey($key);
        $this->setSecret($secret);
    }

    // -------------------------- Interface Methods ------------------------- //

    /**
     * @inheritDoc
     */
    public function getEvents()
    {
        return array(
            'before' => array(
                'onBefore',
                \GuzzleHttp\Event\RequestEvents::SIGN_REQUEST
            )
        );
    }
    
    /**
     * @inheritDoc
     */
    public function onBefore(\GuzzleHttp\Event\BeforeEvent $event)
    {
        $request = $event->getRequest();
        
        $path = $request->getPath();
        if (substr($path, 0, strlen($this->getPrefix())) == $this->getPrefix()) {
            $path = substr($path, strlen($this->getPrefix()));
        }
        
        $request->setPath($this->prefix . $path);
        if ($this->getKey() && strlen($this->getKey()) > 0) {
            $request->getQuery()->set('hmacHash', $this->getHash($request));
            $request->getQuery()->set('hmacKey', $this->getKey());
        }
    }
    
    // -------------------------- Public Functions -------------------------- //
    
    /**
     * Parameters to encode
     * 
     * @param array $params Array of parameters to encode
     * 
     * @return \tabs\apiclient\client\Hmac
     */
    public function setParams($params)
    {
        $this->params = $params;
        
        return $this;
    }
    
    /**
     * Api Key
     * 
     * @param string $key Api Key
     * 
     * @return \tabs\apiclient\client\Hmac
     */
    public function setKey($key)
    {
        $this->key = $key;
        
        return $this;
    }
    
    /**
     * Url Prefix
     * 
     * @param string $prefix Url Prefix
     * 
     * @return \tabs\apiclient\client\Hmac
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
        
        return $this;
    }
    
    /**
     * Api Secret
     * 
     * @param string $secret Api Secret
     * 
     * @return \tabs\apiclient\client\Hmac
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
        
        return $this;
    }
    
    /**
     * Return the api key
     * 
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }
    
    /**
     * Return the prefix string
     * 
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }
    
    /**
     * Return the secret
     * 
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }
    
    /**
     * Return the parameters
     * 
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }
    
    /**
     * Return the hash required for the api
     * 
     * @param \GuzzleHttp\Message\Request $request Request object
     * 
     * @return string
     */
    public function getHash($request)
    {
        $params = $request->getQuery()->toArray();
        $params['method'] = $request->getMethod();
        $params['route'] = $this->getRoute($request);
        $params['secret'] = $this->getSecret();
        ksort($params);
        
        return hash(
            'SHA256',
            json_encode(
                array_map('strval', $params)
            ),
            false
        );
    }
    
    /**
     * Return the relative route for the url
     * 
     * @param \GuzzleHttp\Message\Request $request Request object
     * 
     * @return string
     */
    public final function getRoute($request)
    {
        $route = explode('?', $request->getUrl());
        
        return $route[0];
    }
}