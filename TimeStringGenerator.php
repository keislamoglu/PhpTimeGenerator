<?php
/**
 * @author  Kadir Emin İslamoğlu <keislamoglu@yandex.com>
 * @date    2015-08-02
 * @url     <https://github.com/keislamoglu>
 */


class TimeStringGenerator {
    private $dateTimeFormat = 'Y-m-d H:i:s';
    private $timeAdjustment;
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
     */
    public function __construct() {
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
     * Set second
     * @param $second
     * @return $this
     */
    public function second($second) {
        $this->second = $second . ' second ';
        $this->suffix_s($second, $this->second);
        return $this;
    }

    /**
     * Set minute
     * @param $minute
     * @return $this
     */
    public function minute($minute) {
        $this->minute = $minute . ' minute ';
        $this->suffix_s($minute, $this->minute);
        return $this;
    }

    /**
     * Set hour
     * @param $hour
     * @return $this
     */
    public function hour($hour) {
        $this->hour = $hour . ' hour ';
        $this->suffix_s($hour, $this->hour);
        return $this;
    }

    /**
     * Set day
     * @param $day
     * @return $this
     */
    public function day($day) {
        $this->day = $day . ' day ';
        $this->suffix_s($day, $this->day);
        return $this;
    }

    /**
     * Set week
     * @param $week
     * @return $this
     */
    public function week($week) {
        $this->week = $week . ' week ';
        $this->suffix_s($week, $this->week);
        return $this;
    }

    /**
     * Set month
     * @param $month
     * @return $this
     */
    public function month($month) {
        $this->month = $month . ' month ';
        $this->suffix_s($month, $this->month);
        return $this;
    }

    /**
     * Set year
     * @param $year
     * @return $this
     */
    public function year($year) {
        $this->year = $year . ' year ';
        $this->suffix_s($year, $this->year);
        return $this;
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
     * Calculate for future time
     * @return $this
     */
    public function future() {
        $this->timeAdjustment = '+';
        return $this;
    }

    /**
     * Calculate for past time
     * @return $this
     */
    public function past() {
        $this->timeAdjustment = '-';
        return $this;
    }

    /**
     * Calculate for current time
     * @return $this
     */
    public function current() {
        $this->timeAdjustment = null;
        return $this;
    }

    /**
     * Return raw string
     * @return string
     */
    public function get() {
        return $this->merge();
    }

    /**
     * Return as timestamp
     * @return int
     */
    public function getTime() {
        return strtotime($this->merge());
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
        $this->timeAdjustment = null;
        $this->second = null;
        $this->minute = null;
        $this->hour = null;
        $this->day = null;
        $this->week = null;
        $this->month = null;
        $this->year = null;
    }

    /**
     * Merge definitions
     * @return string
     */
    private function merge() {
        return trim($this->fromDate . $this->timeAdjustment . $this->second . $this->minute . $this->hour . $this->day . $this->week . $this->month . $this->year);
    }

    /**
     * Suffix 's' if time definition is greater than 1
     * @param $time
     * @param $timeString
     */
    private function suffix_s($time, &$timeString) {
        if ($time > 1)
            $timeString = rtrim($timeString) . 's ';
    }
}