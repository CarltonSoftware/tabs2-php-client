<?php

namespace tabs\apiclient;

use tabs\apiclient\Builder;
use tabs\apiclient\LabelTemplatePaperSize;

/**
 * Tabs Rest API LabelTemplate object.
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2017 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 *
 * @method LabelTemplate setName(string $var) Sets the name
 * 
 * 
 * @method LabelTemplate setHeadersize(integer $var) Sets the headersize
 * 
 * @method LabelTemplate setHorizontalcount(integer $var) Sets the horizontalcount
 * 
 * @method LabelTemplate setVerticalcount(integer $var) Sets the verticalcount
 * 
 * @method LabelTemplate setLabelwidth(integer $var) Sets the labelwidth
 * 
 * @method LabelTemplate setLabelheight(integer $var) Sets the labelheight
 * 
 * @method LabelTemplate setColumnspacing(integer $var) Sets the columnspacing
 * 
 * @method LabelTemplate setRowspacing(integer $var) Sets the rowspacing
 * 
 * @method LabelTemplate setLabelpadding(integer $var) Sets the labelpadding
 * 
 * @method LabelTemplate setFontfamily(string $var) Sets the fontfamily
 * 
 * @method LabelTemplate setFontsize(integer $var) Sets the fontsize
 * 
 * @method LabelTemplate setMargintop(integer $var) Sets the margintop
 * 
 * @method LabelTemplate setMarginbottom(integer $var) Sets the marginbottom
 * 
 * @method LabelTemplate setMarginleft(integer $var) Sets the marginleft
 * 
 * @method LabelTemplate setMarginright(integer $var) Sets the marginright
 */
class LabelTemplate extends Builder
{
    /**
     * Name
     *
     * @var string
     */
    protected $name;

    /**
     * Papersize
     *
     * @var LabelTemplatePaperSize
     */
    protected $papersize;

    /**
     * Headersize
     *
     * @var integer
     */
    protected $headersize = 0;

    /**
     * Horizontalcount
     *
     * @var integer
     */
    protected $horizontalcount = 0;

    /**
     * Verticalcount
     *
     * @var integer
     */
    protected $verticalcount = 0;

    /**
     * Labelwidth
     *
     * @var integer
     */
    protected $labelwidth = 0;

    /**
     * Labelheight
     *
     * @var integer
     */
    protected $labelheight = 0;

    /**
     * Columnspacing
     *
     * @var integer
     */
    protected $columnspacing = 0;

    /**
     * Rowspacing
     *
     * @var integer
     */
    protected $rowspacing = 0;

    /**
     * Labelpadding
     *
     * @var integer
     */
    protected $labelpadding = 0;

    /**
     * Fontfamily
     *
     * @var string
     */
    protected $fontfamily = '';

    /**
     * Fontsize
     *
     * @var integer
     */
    protected $fontsize = 12;

    /**
     * Margintop
     *
     * @var integer
     */
    protected $margintop = 0;

    /**
     * Marginbottom
     *
     * @var integer
     */
    protected $marginbottom = 0;

    /**
     * Marginleft
     *
     * @var integer
     */
    protected $marginleft = 0;

    /**
     * Marginright
     *
     * @var integer
     */
    protected $marginright = 0;

    // -------------------- Public Functions -------------------- //

    /**
     * Set the papersize
     *
     * @param stdclass|array|LabelTemplatePaperSize $papersize The Papersize
     *
     * @return LabelTemplate
     */
    public function setPapersize($papersize)
    {
        $this->papersize = LabelTemplatePaperSize::factory($papersize);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return array(
            'name' => $this->getName(),
            'papersizeid' => $this->getPapersize()->getId(),
            'headersize' => $this->getHeadersize(),
            'horizontalcount' => $this->getHorizontalcount(),
            'verticalcount' => $this->getVerticalcount(),
            'labelwidth' => $this->getLabelwidth(),
            'labelheight' => $this->getLabelheight(),
            'columnspacing' => $this->getColumnspacing(),
            'rowspacing' => $this->getRowspacing(),
            'labelpadding' => $this->getLabelpadding(),
            'fontfamily' => $this->getFontfamily(),
            'fontsize' => $this->getFontsize(),
            'margintop' => $this->getMargintop(),
            'marginbottom' => $this->getMarginbottom(),
            'marginleft' => $this->getMarginleft(),
            'marginright' => $this->getMarginright(),
        );
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the papersize
     *
     * @return LabelTemplatePaperSize
     */
    public function getPapersize()
    {
        return $this->papersize;
    }

    /**
     * Returns the headersize
     *
     * @return integer
     */
    public function getHeadersize()
    {
        return $this->headersize;
    }

    /**
     * Returns the horizontalcount
     *
     * @return integer
     */
    public function getHorizontalcount()
    {
        return $this->horizontalcount;
    }

    /**
     * Returns the verticalcount
     *
     * @return integer
     */
    public function getVerticalcount()
    {
        return $this->verticalcount;
    }

    /**
     * Returns the labelwidth
     *
     * @return integer
     */
    public function getLabelwidth()
    {
        return $this->labelwidth;
    }

    /**
     * Returns the labelheight
     *
     * @return integer
     */
    public function getLabelheight()
    {
        return $this->labelheight;
    }

    /**
     * Returns the columnspacing
     *
     * @return integer
     */
    public function getColumnspacing()
    {
        return $this->columnspacing;
    }

    /**
     * Returns the rowspacing
     *
     * @return integer
     */
    public function getRowspacing()
    {
        return $this->rowspacing;
    }

    /**
     * Returns the labelpadding
     *
     * @return integer
     */
    public function getLabelpadding()
    {
        return $this->labelpadding;
    }

    /**
     * Returns the fontfamily
     *
     * @return string
     */
    public function getFontfamily()
    {
        return $this->fontfamily;
    }

    /**
     * Returns the fontsize
     *
     * @return integer
     */
    public function getFontsize()
    {
        return $this->fontsize;
    }

    /**
     * Returns the margintop
     *
     * @return integer
     */
    public function getMargintop()
    {
        return $this->margintop;
    }

    /**
     * Returns the marginbottom
     *
     * @return integer
     */
    public function getMarginbottom()
    {
        return $this->marginbottom;
    }

    /**
     * Returns the marginleft
     *
     * @return integer
     */
    public function getMarginleft()
    {
        return $this->marginleft;
    }

    /**
     * Returns the marginright
     *
     * @return integer
     */
    public function getMarginright()
    {
        return $this->marginright;
    }
}