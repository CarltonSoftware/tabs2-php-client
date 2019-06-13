<?php

namespace tabs\apiclient\property;

use tabs\apiclient\Builder;
use tabs\apiclient\Booking;
use tabs\apiclient\property\comment\Metric;

/**
 * Tabs Rest API Comment object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method Comment setComment(string $var) Sets the comment
 * 
 * @method Comment setCommenter(string $var) Sets the commenter
 * 
 * @method Comment setVisibletoowner(boolean $var) Sets the visibletoowner
 * 
 * @method Comment setVisibleonweb(boolean $var) Sets the visibleonweb
 * 
 * @method Comment setCreateddate(\DateTime $var) Sets the createddate
 * 
 * @method Collection|Metric[] getMetric() Returns the metrics
 */
class Comment extends Builder
{
    /**
     * Comment
     *
     * @var string
     */
    protected $comment;
    
    /**
     * Commenter
     *
     * @var string
     */
    protected $commenter;

    /**
     * Visibletoowner
     *
     * @var boolean
     */
    protected $visibletoowner;

    /**
     * Visibleonweb
     *
     * @var boolean
     */
    protected $visibleonweb;
    
    /**
     * Createddate
     *
     * @var \DateTime
     */
    protected $createddate;    
    
    /**
     * Booking
     *
     * @var Booking
     */
    protected $booking;    

    // -------------------- Public Functions -------------------- //

    /**
     * Set the booking on the property
     * 
     * @param Booking|stdClass|Array $bkg Booking object/array
     * 
     * @return \tabs\apiclient\property\Comment
     */
    public function setBooking($bkg)
    {
        $this->booking = Booking::factory($bkg);
        
        return $this;
    }
    
    /**
     * Get the customer name from the associated booking
     * 
     * @return string
     */
    public function getBookingCommenter()
    {
        if ($this->getBooking()
            && $this->getBooking()->getCustomers()->first()
        ) {
            return $this->getBooking()->getCustomers()->first()->getName();
        }
    }
    
    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();
        
        if ($this->getBooking()) {
            $arr['bookingid'] = $this->getBooking()->getId();
        }
        
        return $arr;
    }

    /**
     * Returns the comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Returns the commenter
     *
     * @return string
     */
    public function getCommenter()
    {
        return $this->commenter;
    }

    /**
     * Returns the visibletoowner
     *
     * @return boolean
     */
    public function getVisibletoowner()
    {
        return $this->visibletoowner;
    }

    /**
     * Returns the visibleonweb
     *
     * @return boolean
     */
    public function getVisibleonweb()
    {
        return $this->visibleonweb;
    }

    /**
     * Returns the createddate
     *
     * @return \DateTime
     */
    public function getCreateddate()
    {
        return $this->createddate;
    }

    /**
     * Returns the booking
     *
     * @return \tabs\apiclient\Booking
     */
    public function getBooking()
    {
        return $this->booking;
    }
    
    /**
     * Get a more anonymous name for the commenter
     * 
     * @param string $anon              Anonymous name when method logic fails
     * @param array  $shortenExceptions Exceptions to the rule
     * 
     * @return string
     */
    public function getShortCommenter(
        $anon = 'Previous Customer',
        $shortenExceptions = ['Family', 'Party']
    ) {
        if (!$this->commenter || strlen($this->commenter) === 0) {
            return $anon;
        }
        
        $nameParts = array_filter(explode(' ', $this->commenter));
        if (count($nameParts) <= 1) {
            return $anon;
        }
        
        if (count($nameParts) <= 3) {
            $lastPart = array_pop($nameParts);
            
            if (!in_array(ucfirst(strtolower($lastPart)), $shortenExceptions)) {
                array_push($nameParts, $lastPart[0]);
            } else {
                array_push($nameParts, $lastPart);
            }
            
            return implode(' ', $nameParts);
        }
        
        return $anon;
    }
}