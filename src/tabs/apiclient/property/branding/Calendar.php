<?php

namespace tabs\apiclient\property\branding;

use tabs\apiclient\Collection;
use tabs\apiclient\property\branding\AvailableDay;

/**
 * Calendar Widget Generator
 *
 * @category  Tabs_Client
 * @package   Tabs
 * @author    Carlton Software <support@carltonsoftware.co.uk>
 * @copyright 2016 Carlton Software
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1
 * @link      http://www.carltonsoftware.co.uk
 */
class Calendar
{
    /**
     * Timestamp
     *
     * @var \DateTime
     */
    protected $localTime;
    
    /**
     * Local month
     *
     * @var \DateTime
     */
    protected $targetMonth;

    /**
     * Start date string
     *
     * @var string
     */
    protected $start_day = 'monday';

    /**
     * Month type
     *
     * @var string
     */
    protected $month_type = 'long';

    /**
     * Day type
     *
     * @var string
     */
    protected $day_type = 'short';
    
    /**
     * Date format of the id in available cells
     * 
     * @var string
     */
    protected $id_format = 'Y-m-d';

    /**
     * Calendar Table Attributes
     *
     * @var string
     */
    protected $attributes = '';
    
    /**
     * Boolean flag to alway make sure there are seven rows in the 
     * calendar.
     * 
     * @var boolean
     */
    protected $sevenRows = false;
    
    /**
     * Available days collection
     * 
     * @var Collection|AvailableDay[]
     */
    protected $availableDays;
    
    /**
     *
     * @var callable
     */
    protected $processDay;

    // --------------------------------------------------------------------

    /**
     * Constructor
     * Loads the calendar language file and sets the default time reference
     *
     * @param array $config Config settings
     */
    public function __construct($config = array())
    {
        $this->localTime = new \DateTime();
        $this->targetMonth = new \DateTime('first day of this month');
        
        if (count($config) > 0) {
            $this->initialize($config);
        }
    }

    // --------------------------------------------------------------------

    /**
     * Generate the calendar
     *
     * @param \DateTime  $targetMonth The calendar month
     * @param Collection $data        The data to be shown in the calendar cells
     *
     * @return string
     */
    public function generate()
    {
        $adjusted_date = $this->adjustDate(
            $this->targetMonth->format('m'),
            $this->targetMonth->format('Y')
        );

        $month = $adjusted_date['month'];
        $year = $adjusted_date['year'];

        // Determine the total days in the month
        $total_days = $this->getTotalDays($month, $year);

        // Set the starting day of the week
        $start_days = array(
            'sunday' => 0,
            'monday' => 1,
            'tuesday' => 2,
            'wednesday' => 3,
            'thursday' => 4,
            'friday' => 5,
            'saturday' => 6
        );

        // Set start_day integer
        if (!isset($start_days[$this->start_day])) {
            $start_day = 0;
        } else {
            $start_day = $start_days[$this->start_day];
        }

        // Set the starting day number
        $local_date = mktime(12, 0, 0, $month, 1, $year);
        $date = getdate($local_date);
        $day  = $start_day + 1 - $date["wday"];

        while ($day > 1) {
            $day -= 7;
        }

        // Generate the template data array
        $this->parseTemplate();

        // Begin building the calendar output
        $out = $this->temp['table_open'];
        $out .= "\n";

        $out .= "\n";
        $out .= $this->temp['table_heading_start'];
        $out .= "\n";

        $out .= "\n";
        $out .= $this->temp['heading_row_start'];
        $out .= "\n";

        // Heading containing the month/year
        $colspan = 7;
        $this->temp['heading_title_cell'] = str_replace(
            '{colspan}', 
            $colspan, 
            $this->temp['heading_title_cell']
        );
        
        $this->temp['heading_title_cell'] = str_replace(
            '{heading}', 
            $this->getMonthName($month)."&nbsp;".$year, 
            $this->temp['heading_title_cell']
        );
        
        $out .= $this->temp['heading_title_cell'];
        $out .= "\n";

        $out .= "\n";
        $out .= $this->temp['heading_row_end'];
        $out .= "\n";

        // Write the cells containing the days of the week
        $out .= "\n";
        $out .= $this->temp['week_row_start'];
        $out .= "\n";

        $day_names = $this->getDayNames();

        for ($i = 0; $i < 7; $i ++) {
            $out .= str_replace(
                '{week_day}', 
                $day_names[($start_day + $i) %7], 
                $this->temp['week_day_cell']
            );
        }

        $out .= "\n";
        $out .= $this->temp['week_row_end'];
        $out .= "\n";

        $out .= "\n";
        $out .= $this->temp['table_heading_end'];
        $out .= "\n";

        $out .= "\n";
        $out .= $this->temp['table_body_start'];
        $out .= "\n";
        
        $rows = 1;

        // Build the main body of the calendar
        while ($day <= $total_days) {
            $out .= "\n";
            $out .= $this->temp['cal_row_start'];
            $out .= "\n";

            for ($i = 0; $i < 7; $i++) {
                $out .= $this->processDayCell($day);
                $day++;
            }

            $out .= "\n";
            $out .= $this->temp['cal_row_end'];
            $out .= "\n";
            
            $rows++;
        }
        
        // Add additional rows
        if ($rows < 7 && $this->sevenRows) {
            while ($rows < 7) {
                $out .= "\n";
                $out .= $this->temp['cal_row_start'];
                $out .= "\n";

                for ($i = 0; $i < 7; $i++) {
                    // Start formulating cell structure
                    $temp = $this->temp['cal_cell_start'];

                    // Blank cells
                    $temp .= $this->temp['cal_cell_blank'];

                    // End formulating cell structure
                    $temp .= $this->temp['cal_cell_end'];

                    // Replace day variable
                    $temp = str_replace('{day}', $day, $temp);

                    // Remove any outstanding braces from td
                    $temp = preg_replace('/{([^{|}]*)}/', "", $temp);

                    $out .= $temp;
                    $day++;
                }
                $out .= "\n";
                $out .= $this->temp['cal_row_end'];
                $out .= "\n";
                $rows++;
            }
        }

        $out .= "\n";
        $out .= $this->temp['table_body_end'];
        $out .= "\n";

        $out .= "\n";
        $out .= $this->temp['table_close'];

        return $out;
    }
    
    /**
     * Set the available days
     * 
     * @param Collection $col Collection of AvailableDay objects
     * 
     * @return Calendar
     */
    public function setAvailableDays(Collection $col)
    {
        $this->availableDays = $col;
        
        return $this;
    }
    
    /**
     * Set the target month
     * 
     * @param \DateTime $month Month
     * 
     * @return Calendar
     */
    public function setTargetMonth(\DateTime $month)
    {
        $this->targetMonth = $month;
        
        return $this;
    }
    
    /**
     * Return the target month
     * 
     * @return \DateTime
     */
    public function getTargetMonth()
    {
        return $this->targetMonth;
    }
    
    /**
     * 
     * @param \DateTime $date Current Day
     * 
     * @return AvailableDay|null
     */
    public function getAvailableDay($date)
    {
        $fn = function($ele) use ($date) {
            return $ele->getDate()->format('Y-m-d') == $date->format('Y-m-d');
        };
        
        $collection = $this->availableDays->findBy($fn);
        
        if ($collection->getTotal() == 1) {
            return $collection->first();
        } else {
            return;
        }
    }
    
    /**
     * Perform any additional cell processing using the processDay function
     * 
     * @param integer $day Day to process
     * 
     * @return string
     */
    public function processDayCell($day)
    {
        $today = new \DateTime();
        $availableDay = null;
        $attributes = array(
            'id' => '',
            'class' => array()
        );
        $suffix = '';
        
        $currentDate = new \DateTime();
        $currentDate->setTime(0, 0, 0);
        $currentDate->setDate(
            $this->targetMonth->format('Y'),
            $this->targetMonth->format('m'),
            0
        );
        if ($day > 0) {
            $currentDate->add(new \DateInterval('P' . $day . 'D'));
        } else {
            $currentDate->sub(new \DateInterval('P' . abs($day) . 'D'));
        }
            
        if ($currentDate < $today) {
            $attributes['class'][] = 'past';
        }
        
        // Start formulating cell structure
        if ($day > 0 && $day <= $this->targetMonth->format('t')) {
            // This is the current month
            $is_today = ($currentDate->format('Y-m-d') == $today->format('Y-m-d'));
            $suffix = ($is_today) ? '_today' : '';
            
            // Start formulating cell structure
            $cell = $this->temp['cal_cell_start' . $suffix];
            
            if ($is_today) {
                $attributes['class'][] = 'today';
            }
        } else if ($currentDate > $today) {
            if ($day < 0) {
                $attributes['class'][] = 'previous_month';
            } else if ($this) {
                $attributes['class'][] = 'next_month';
            }
            $day = $currentDate->format('d');
            $cell = $this->temp['cal_cell_start' . $suffix];
        } else {
            $attributes['class'][] = 'empty';
            
            // Blank cells
            $cell = $this->temp['cal_cell_start' . $suffix];
            $cell .= $this->temp['cal_cell_blank'];
        }
        
        if (!in_array('empty', $attributes['class'])) {
            $availableDay = $this->getAvailableDay($currentDate);
            if ($availableDay) {
                // Cells with content
                $cell .= $this->temp['cal_cell_content' . $suffix];
            } else {
                // Cells with no content
                $cell .= $this->temp['cal_cell_no_content' . $suffix];
            }

            // End formulating cell structure
            $cell .= $this->temp['cal_cell_end' . $suffix];
        }
        
        // replace content
        // Cells with content
        if ($availableDay) {
            // Do processing on AvailableDay class
            $attributes['id'] = $availableDay->getDate()->format(
                $this->id_format
            );
            
            if ($availableDay->getDaysavailable() > 0) {
                $attributes['class'][] = 'available';
                
                if ($availableDay->getIsfromdate()) {
                    $attributes['class'][] = 'from';
                }

                if ($availableDay->getIstodate()) {
                    $attributes['class'][] = 'to';
                }
                
                $attributes['data-daysavailable'] = $availableDay->getDaysavailable();
            } else {
                $attributes['class'][] = 'unavailable';
            }
        }
        
        $cell = str_replace(
            '{attributes}',
            $this->_buildAttributes($attributes),
            $cell
        );
        
        if ($this->processDay) {
            $cell = call_user_func_array(
                $this->processDay,
                array(
                    $cell,
                    $availableDay
                )
            );
        }

        // Replace day variable
        $cell = str_replace('{content}', $day, $cell);

        // Remove any outstanding braces from td
        $cell = preg_replace('/{([^{|}]*)}/', "", $cell);
        
        return $cell;
    }
    
    /**
     * Set the callable function to processs a day
     * 
     * @param callable $fun Callable function
     * 
     * @return \tabs\apiclient\property\branding\Calendar
     */
    public function setProcessDay(callable $fun)
    {
        $this->processDay = $fun;
        
        return $this;
    }
    
    /**
     * Build attributes
     * 
     * @param array $attributes Attrs
     * 
     * @return string
     */
    private function _buildAttributes($attributes)
    {
        foreach ($attributes as $key => $val) {
            if (is_array($val)) {
                $attributes[$key] = '"' . implode(' ', $val) . '"';
            } else {
                $attributes[$key] = '"' . $val . '"';
            }
        }
        
        return urldecode(http_build_query(
            array_filter($attributes),
            false,
            ' '
        ));
    }

    // --------------------------------------------------------------------

    /**
     * Get Month Name
     *
     * Generates a textual month name based on the numeric
     * month provided.
     *
     * @param integer $month the month
     *
     * @return string
     */
    public function getMonthName($month)
    {
        if ($this->month_type == 'short') {
            $month_names = array(
                '01' => 'cal_jan', 
                '02' => 'cal_feb', 
                '03' => 'cal_mar', 
                '04' => 'cal_apr', 
                '05' => 'cal_may', 
                '06' => 'cal_jun', 
                '07' => 'cal_jul', 
                '08' => 'cal_aug', 
                '09' => 'cal_sep', 
                '10' => 'cal_oct', 
                '11' => 'cal_nov', 
                '12' => 'cal_dec'
            );
        } else {
            $month_names = array(
                '01' => 'cal_january', 
                '02' => 'cal_february', 
                '03' => 'cal_march', 
                '04' => 'cal_april', 
                '05' => 'cal_may', 
                '06' => 'cal_june', 
                '07' => 'cal_july', 
                '08' => 'cal_august', 
                '09' => 'cal_september', 
                '10' => 'cal_october', 
                '11' => 'cal_november', 
                '12' => 'cal_december'
            );
        }
        
        return ucfirst(str_replace('cal_', '', $month_names[$month]));
    }

    // --------------------------------------------------------------------

    /**
     * Get Day Names
     *
     * Returns an array of day names (Sunday, Monday, etc.) based
     * on the type.  Options: long, short, abrev
     *
     * @param string $dayType Day type setting, long or short
     *
     * @return array
     */
    function getDayNames($dayType = '')
    {
        if ($dayType != '') {
            $this->day_type = $dayType;
        }

        if ($this->day_type == 'long') {
            $day_names = array(
                'sunday', 
                'monday', 
                'tuesday', 
                'wednesday', 
                'thursday', 
                'friday', 
                'saturday'
            );
        } else if ($this->day_type == 'short') {
            $day_names = array('sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat');
        } else {
            $day_names = array('s', 'm', 't', 'w', 't', 'f', 's');
        }

        $days = array();
        foreach ($day_names as $val) {
            $days[] = ucfirst($val);
        }

        return $days;
    }

    // --------------------------------------------------------------------

    /**
     * Adjust Date
     *
     * This function makes sure that we have a valid month/year.
     * For example, if you submit 13 as the month, the year will
     * increment and the month will become January.
     *
     * @param integer $month the month
     * @param integer $year  the year
     *
     * @return array
     */
    public function adjustDate($month, $year)
    {
        $date = array();

        $date['month'] = $month;
        $date['year']  = $year;

        while ($date['month'] > 12) {
            $date['month'] -= 12;
            $date['year']++;
        }

        while ($date['month'] <= 0) {
            $date['month'] += 12;
            $date['year']--;
        }

        if (strlen($date['month']) == 1) {
            $date['month'] = '0'.$date['month'];
        }

        return $date;
    }

    // --------------------------------------------------------------------

    /**
     * Total days in a given month
     *
     * @param integer $month the month
     * @param integer $year  the year
     *
     * @return integer
     */
    public function getTotalDays($month, $year)
    {
        $days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

        if ($month < 1 || $month > 12) {
            return 0;
        }

        // Is the year a leap year?
        if ($month == 2) {
            if ($year % 400 == 0 OR ($year % 4 == 0 && $year % 100 != 0)) {
                return 29;
            }
        }

        return $days_in_month[$month - 1];
    }

    // --------------------------------------------------------------------

    /**
     * Set Default Template Data
     *
     * This is used in the event that the user has not created their own template
     *
     * @access    public
     * @return array
     */
    public function defaultTemplate()
    {
        $default = $this->_getDefaultTemplate();
        foreach ($default as $key => $val) {
            if (isset($this->$key)) {
                $default[$key] = $this->$key;
            }
        }
        return $default;
    }


    /**
     * Set Default Template Data
     *
     * This is used in the event that the user has not created their own template
     *
     * @access    public
     * @return array
     */
    private function _getDefaultTemplate()
    {
        return array(
            'table_open'                => '<table ' . $this->_getAttributes() . '>',
            'table_heading_start'       => '<thead>',
            'table_heading_end'         => '</thead>',
            'heading_row_start'         => '<tr class="month">',
            'heading_title_cell'        => '<th colspan="{colspan}">{heading}</th>',
            'heading_row_end'           => '</tr>',
            'table_body_start'          => '<tbody>',
            'table_body_end'            => '</tbody>',
            'week_row_start'            => '<tr class="days">',
            'week_day_cell'             => '<th>{week_day}</th>',
            'week_row_end'              => '</tr>',
            'cal_row_start'             => '<tr>',
            'cal_cell_start'            => '<td {attributes}>',
            'cal_cell_start_today'      => '<td {attributes}>',
            'cal_cell_content'          => '{content}',
            'cal_cell_content_today'    => '<strong>{content}</strong>',
            'cal_cell_no_content'       => '{content}',
            'cal_cell_no_content_today' => '<strong>{content}</strong>',
            'cal_cell_blank'            => '',
            'cal_cell_end'              => '</td>',
            'cal_cell_end_today'        => '</td>',
            'cal_row_end'               => '</tr>',
            'table_close'               => '</table>'
        );
    }
    
    /**
     * Return the attributes with a replacement values
     * 
     * @return string
     */
    private function _getAttributes()
    {
        $replaceMents = array(
            'd-m-Y',
            'Y-m',
        );
        
        $attributes = $this->attributes;
        foreach ($replaceMents as $replacement) {
            $attributes = str_replace(
                "{{$replacement}}",
                $this->targetMonth->format($replacement),
                $attributes
            );
        }
        
        return $attributes;
    }

    // --------------------------------------------------------------------

    /**
     * Initialize the user preferences
     *
     * Accepts an associative array as input, containing display preferences
     *
     * @param array $config Preferences array
     *
     * @return void
     */
    public function initialize($config = array())
    {
        foreach ($config as $key => $val) {
            if (isset($this->$key)) {
                $this->$key = $val;
            } else if (in_array($key, array_keys($this->_getDefaultTemplate()))) {
                $this->$key = $val;
            }
        }
    }

    // --------------------------------------------------------------------

    /**
     * Parse Template
     *
     * Harvests the data within the template {pseudo-variables}
     * used to display the calendar
     *
     * @access    public
     * @return    void
     */
    function parseTemplate()
    {
        $this->temp = $this->defaultTemplate();

        // Look for any overidden content

        $today = array(
            'cal_cell_start_today',
            'cal_cell_content_today',
            'cal_cell_no_content_today',
            'cal_cell_end_today'
        );

        $matches = array(
            'table_open',
            'table_close',
            'heading_start',
            'heading_end',
            'heading_row_start',
            'heading_previous_cell',
            'heading_title_cell',
            'heading_next_cell',
            'heading_row_end',
            'week_row_start',
            'week_day_cell',
            'week_row_end',
            'cal_row_start',
            'cal_cell_start',
            'cal_cell_content',
            'cal_cell_no_content',
            'cal_cell_blank',
            'cal_cell_end',
            'cal_row_end',
            'cal_cell_start_today',
            'cal_cell_content_today',
            'cal_cell_no_content_today',
            'cal_cell_end_today'
        );

        foreach ($matches as $val) {
            if (in_array($val, $today, true)) {
                $this->temp[$val] = $this->temp[str_replace('_today', '', $val)];
            }
        }
    }
    
    /**
     * ToString magic method
     * 
     * @return string
     */
    public function __toString()
    {
        return $this->generate();
    }
}
