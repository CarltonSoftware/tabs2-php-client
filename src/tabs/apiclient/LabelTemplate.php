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
 * @method string getName() Returns the name
 * @method LabelTemplate setName(string $var) Sets the name
 * 
 * @method LabelTemplatePaperSize getPapersize() Returns the papersize
 * 
 * @method integer getHeadersize() Returns the headersize
 * @method LabelTemplate setHeadersize(integer $var) Sets the headersize
 * 
 * @method integer getHorizontalcount() Returns the horizontalcount
 * @method LabelTemplate setHorizontalcount(integer $var) Sets the horizontalcount
 * 
 * @method integer getVerticalcount() Returns the verticalcount
 * @method LabelTemplate setVerticalcount(integer $var) Sets the verticalcount
 * 
 * @method integer getLabelwidth() Returns the labelwidth
 * @method LabelTemplate setLabelwidth(integer $var) Sets the labelwidth
 * 
 * @method integer getLabelheight() Returns the labelheight
 * @method LabelTemplate setLabelheight(integer $var) Sets the labelheight
 * 
 * @method integer getColumnspacing() Returns the columnspacing
 * @method LabelTemplate setColumnspacing(integer $var) Sets the columnspacing
 * 
 * @method integer getRowspacing() Returns the rowspacing
 * @method LabelTemplate setRowspacing(integer $var) Sets the rowspacing
 * 
 * @method integer getLabelpadding() Returns the labelpadding
 * @method LabelTemplate setLabelpadding(integer $var) Sets the labelpadding
 * 
 * @method string getFontfamily() Returns the fontfamily
 * @method LabelTemplate setFontfamily(string $var) Sets the fontfamily
 * 
 * @method integer getFontsize() Returns the fontsize
 * @method LabelTemplate setFontsize(integer $var) Sets the fontsize
 * 
 * @method integer getMargintop() Returns the margintop
 * @method LabelTemplate setMargintop(integer $var) Sets the margintop
 * 
 * @method integer getMarginbottom() Returns the marginbottom
 * @method LabelTemplate setMarginbottom(integer $var) Sets the marginbottom
 * 
 * @method integer getMarginleft() Returns the marginleft
 * @method LabelTemplate setMarginleft(integer $var) Sets the marginleft
 * 
 * @method integer getMarginright() Returns the marginright
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
}