<?php
/**
 * @author  Kadir Emin İslamoğlu <keislamoglu@yandex.com>
 * @date    2015-08-02
 * @url     <https://github.com/keislamoglu>
 */


class TimeStringGenerator {
    private $dateTimeFormat = 'Y-m-d H:i:s';
    private $fromDate;
    private $second;
    private $minute;
    private $hour;
    private $day;
    private $week;
    private $month;
    private $year;

    /**
     * Construction function
     * fromDate is now by default
     * @param null $dateTimeFormat
     */
    public function __construct($dateTimeFormat = null) {
        if (isset($dateTimeFormat))
            $this->dateTimeFormat = $dateTimeFormat;
        $this->fromDate = date($this->dateTimeFormat) . ' ';
    }

    /**
     * This helps to calculate time string from a spesific date
     * @param $dateTimeString
     * @return $this
     */
    public function from($dateTimeString) {
        $this->fromDate = $dateTimeString . ' ';
        return $this;
    }

    /**
     * Add second
     * @param $second
     * @return $this
     */
    public function addSecond($second) {
        $this->second = $second . ' second ';
        $this->suffix_s($second, $this->second);
        return $this;
    }

    /**
     * Subtract second
     * @param $second
     * @return $this
     */
    public function subSecond($second) {
        return $this->addSecond($this->negative($second));
    }

    /**
     * Add minute
     * @param $minute
     * @return $this
     */
    public function addMinute($minute) {
        $this->minute = $minute . ' minute ';
        $this->suffix_s($minute, $this->minute);
        return $this;
    }

    /**
     * Subtract minute
     * @param $minute
     * @return $this
     */
    public function subMinute($minute) {
        return $this->addMinute($this->negative($minute));
    }

    /**
     * Add hour
     * @param $hour
     * @return $this
     */
    public function addHour($hour) {
        $this->hour = $hour . ' hour ';
        $this->suffix_s($hour, $this->hour);
        return $this;
    }

    /**
     * Subtract hour
     * @param $hour
     * @return $this
     */
    public function subHour($hour) {
        return $this->addHour($this->negative($hour));
    }

    /**
     * Add day
     * @param $day
     * @return $this
     */
    public function addDay($day) {
        $this->day = $day . ' day ';
        $this->suffix_s($day, $this->day);
        return $this;
    }

    /**
     * Subtract day
     * @param $day
     * @return $this
     */
    public function subDay($day) {
        return $this->addDay($this->negative($day));
    }

    /**
     * Add week
     * @param $week
     * @return $this
     */
    public function addWeek($week) {
        $this->week = $week . ' week ';
        $this->suffix_s($week, $this->week);
        return $this;
    }

    /**
     * Subtract week
     * @param $week
     * @return $this
     */
    public function subWeek($week) {
        return $this->addWeek($this->negative($week));
    }

    /**
     * Add month
     * @param $month
     * @return $this
     */
    public function addMonth($month) {
        $this->month = $month . ' month ';
        $this->suffix_s($month, $this->month);
        return $this;
    }

    /**
     * Subtract month
     * @param $month
     * @return $this
     */
    public function subMonth($month) {
        return $this->addMonth($this->negative($month));
    }

    /**
     * Set year
     * @param $year
     * @return $this
     */
    public function addYear($year) {
        $this->year = $year . ' year ';
        $this->suffix_s($year, $this->year);
        return $this;
    }

    /**
     * Subtract year
     * @param $year
     * @return $this
     */
    public function subYear($year) {
        return $this->addYear($this->negative($year));
    }

    /**
     * Set datetime format
     * @param $dateTimeFormat
     * @return $this
     */
    public function setDateTimeFormat($dateTimeFormat) {
        $this->dateTimeFormat = $dateTimeFormat;
        return $this;
    }

    /**
     * Return raw string
     * @return string
     */
    public function getString() {
        return trim($this->fromDate . $this->second . $this->minute . $this->hour . $this->day . $this->week . $this->month . $this->year);
    }

    /**
     * Return as timestamp
     * @return int
     */
    public function getTime() {
        return strtotime($this->getString());
    }

    /**
     * Return as date
     * @return bool|string
     */
    public function getDate() {
        return date($this->dateTimeFormat, $this->getTime());
    }

    /**
     * Reset all values and settings
     */
    public function reset() {
        $this->dateTimeFormat = 'Y-m-d H:i:s';
        $this->fromDate = date($this->dateTimeFormat) . ' ';
        $this->second = null;
        $this->minute = null;
        $this->hour = null;
        $this->day = null;
        $this->week = null;
        $this->month = null;
        $this->year = null;
    }

    /**
     * Suffix 's' if time definition is greater than 1
     * @param $time
     * @param $timeString
     */
    private function suffix_s($time, &$timeString) {
        if (abs($time) > 1)
            $timeString = rtrim($timeString) . 's ';
    }

    /**
     * Return negative of given time value
     * @param $value
     * @return int
     */
    private function negative($value) {
        return ($value > 0) ? $value * -1 : $value;
    }
}