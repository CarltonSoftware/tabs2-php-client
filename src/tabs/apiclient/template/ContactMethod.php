<?php

namespace tabs\apiclient\template;

use tabs\apiclient\Builder;

/**
 * Tabs Rest API ContactMethod object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method ContactMethod setFromdate(\DateTime $var) Sets the fromdate
 *
 * @method ContactMethod setTodate(\DateTime $var) Sets the todate
 * @method Collection\tabs\apiclient\template\Element[] getElements() Returns the elements object
 */
class ContactMethod extends Builder
{
    /**
     * Fromdate
     *
     * @var \DateTime
     */
    protected $fromdate;

    /**
     * Todate
     *
     * @var \DateTime
     */
    protected $todate;

    /**
     * Language
     *
     * @var \tabs\apiclient\Language
     */
    protected $language;

    /**
     * Contactmethodtype
     *
     * @var \tabs\apiclient\ContactMethodType
     */
    protected $contactmethodtype;

    /**
     * Elements
     *
     * @var \tabs\apiclient\Collection|TextElement[]|TextItemElement[]
     */
    protected $elements;

    // -------------------- Public Functions -------------------- //

    /**
     * @inheritDoc
     */
    public function __construct($id = null)
    {
        $this->fromdate = new \DateTime();
        $this->todate = new \DateTime();
        $this->elements = \tabs\apiclient\Collection::factory(
            'element',
            new \tabs\apiclient\template\TextElement,
            $this
        )->setDiscriminator(
            'type'
        )->setDiscriminatorMap(
            array(
                'TemplateElementTextItem' => new \tabs\apiclient\template\TextItemElement,
                'TemplateElementText' => new \tabs\apiclient\template\TextElement
            )
        );

        parent::__construct($id);
    }

    /**
     * Set the language
     *
     * @param stdclass|array|\tabs\apiclient\Language $language The Language
     *
     * @return ContactMethod
     */
    public function setLanguage($language)
    {
        $this->language = \tabs\apiclient\Language::factory($language);

        return $this;
    }

    /**
     * Set the contactmethodtype
     *
     * @param stdclass|array|\tabs\apiclient\ContactMethodType $contactmethodtype The Contactmethodtype
     *
     * @return ContactMethod
     */
    public function setContactmethodtype($contactmethodtype)
    {
        $this->contactmethodtype = \tabs\apiclient\ContactMethodType::factory($contactmethodtype);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        $arr = $this->__toArray();

        if ($this->getLanguage()) {
            $arr['languageid'] = $this->getLanguage()->getId();
        }

        if ($this->getContactmethodtype()) {
            $arr['contactmethodtypeid'] = $this->getContactmethodtype()->getId();
        }

        return $arr;
    }

    /**
     * Return the pdf blob
     *
     * @param integer $id Booking reference
     *
     * @return string
     */
    public function pdf($id)
    {
        $req = \tabs\apiclient\client\Client::getClient()->get(
            $this->getUpdateUrl() . '/ref/' . $id . '/output'
        );

        return (string) $req->getBody();
    }

    /**
     * Return an array of html elements which are concatenated together to form
     * the email.
     *
     * @param integer $id Booking reference
     *
     * @return array
     */
    public function html($id)
    {
        return self::getJson(
            \tabs\apiclient\client\Client::getClient()->get(
                $this->getUpdateUrl() . '/ref/' . $id . '/email'
            ),
            true
        );
    }

    /**
     * Attempt to send the email to the correct recipients.
     *
     * @param integer $id Booking reference
     * @param boolean $ifAvailable check whether this is available to send
     *
     * @return boolean
     */
    public function email($id, $ifAvailable = false)
    {
        $req = \tabs\apiclient\client\Client::getClient()->put(
            $this->getUpdateUrl() . '/ref/' . $id . '/send' . ($ifAvailable ? 'ifavailable' : '')
        );

        return $req->getStatusCode() === 204;
    }

    /**
     * Save the template as a pdf and return a document.
     *
     * @param integer $id Booking reference
     *
     * @return \tabs\apiclient\booking\Document
     */
    public function save($id)
    {
        $req = \tabs\apiclient\client\Client::getClient()->post(
            $this->getUpdateUrl() . '/ref/' . $id . '/save'
        );

        $segments = array_filter(
            explode('/', $req->getHeader('Content-Location')[0])
        );
        switch ($segments[2]) {
        case 'booking';
            $p = new \tabs\apiclient\Booking($id);
            $d = new \tabs\apiclient\booking\Document($segments[5]);
            $d->setParent($p);
            return $d;
        case 'customer';
            $p = new \tabs\apiclient\Customer($id);
            $d = new \tabs\apiclient\actor\Document($segments[5]);
            $d->setParent($p);
            return $d;
        case 'owner';
            $p = new \tabs\apiclient\Owner($id);
            $d = new \tabs\apiclient\actor\Document($segments[5]);
            $d->setParent($p);
            return $d;
        case 'property';
            $p = new \tabs\apiclient\Property($id);
            $d = new \tabs\apiclient\property\Document($segments[5]);
            $d->setParent($p);
            return $d;
        }
    }

    /**
     * Returns the fromdate \DateTime
     *
     * @return \DateTime
     */
    public function getFromdate()
    {
        return $this->fromdate;
    }

    /**
     * Returns the todate \DateTime
     *
     * @return \DateTime
     */
    public function getTodate()
    {
        return $this->todate;
    }

    /**
     * Returns the language object
     *
     * @return \tabs\apiclient\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Returns the contactmethodtype object
     *
     * @return \tabs\apiclient\ContactMethodType
     */
    public function getContactmethodtype()
    {
        return $this->contactmethodtype;
    }
}