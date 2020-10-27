<?php
/**
 * Created by PhpStorm.
 * User: Akram
 * Date: 11/01/2018
 * Time: 14:05
 */

class Day_result
{
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $humidity;
    /**
     * @var
     */
    private $temperature;
    /**
     * @var
     */
    private $day;

    /**
     * Day_result constructor.
     * @param $id
     * @param $humidity
     * @param $temperature
     * @param $day
     */

    public function __construct( $id, $temperature,$humidity, $day)
    {
        $this->id = $id;
        $this->humidity = $humidity;
        $this->temperature = $temperature;
        $this->day = $day;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }



    /**
     * @return mixed
     */
    public function getHumidity()
    {
        return $this->humidity;
    }

    /**
     * @return mixed
     */
    public function getTemperature()
    {
        return $this->temperature;
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }


    /**
     * @param mixed $humidity
     */
    public function setHumidity($humidity)
    {
        $this->humidity = $humidity;
    }

    /**
     * @param mixed $temperature
     */
    public function setTemperature($temperature)
    {
        $this->temperature = $temperature;
    }

    /**
     * @param mixed $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }


}