<?php

class Info_station
{
    private $country;
    private $city;
    private $number_lines;
    private $intervalbtwn2mesure;

    /**
     * _station constructor.
     * @param $country
     * @param $city
     * @param $number_lines
     * @param $intervalbtwn2mesure
     */
    public function __construct($country, $city, $number_lines, $intervalbtwn2mesure)
    {
        $this->country = $country;
        $this->city = $city;
        $this->number_lines = $number_lines;
        $this->intervalbtwn2mesure = $intervalbtwn2mesure;
    }


    /**
     * @param mixed $number_lines
     */
    public function setNumberLines($number_lines)
    {
        $this->number_lines = $number_lines;
    }

    /**
     * @return mixed
     */
    public function getNumberLines()
    {
        return $this->number_lines;
    }




    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getIntervalbtwn2mesure()
    {
        return $this->intervalbtwn2mesure;
    }

    /**
     * @param mixed $intervalbtwn2mesure
     */
    public function setIntervalbtwn2mesure($intervalbtwn2mesure)
    {
        $this->intervalbtwn2mesure = $intervalbtwn2mesure;
    }

}