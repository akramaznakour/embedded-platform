<?php

require '../model/User.php';

require '../model/Day_result.php';
require '../model/station.php';

require '../model/Picture.php';
require '../model/SecuritySystem.php';


/**
 * Class Database
 */
class Database
{

    /**
     * @var PDO
     */
    private $connection;

    /**
     * @var
     */
    private $isEmpty;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        $this->setIsEmpty(false);
        try {
            $this->connection = new PDO("mysql:host=localhost;dbname=raspberry_system", "root", "root");
            foreach ($this->getConnection()->query("SELECT  * FROM stations where id=1") as $line)
                $number_lines = $line['number_lines'];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        if ($this->getCount_day_results() <= 0) {
            echo $this->getCount_day_results();
            $this->setIsEmpty(true);
        }
    }

    /**
     * @return PDO
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param PDO $connection
     */
    public function setConnection($connection)
    {
        $this->connection = $connection;
    }


    /**************************************************
     *                                                *
     *                      AUTH                      *
     *                                                *
     **************************************************/

    function getUsersData()
    {
        foreach ($this->getConnection()->query("SELECT  * FROM users") as $line)
            $users[] = new User($line['id'], $line['name'], $line['email'], $line['password']);
        return $users;
    }

    /**
     * @param $user
     * @return bool
     */
    function modifyUserData($user)
    {
        if ($this->getConnection()->exec("update users set password = '".$user->getPassword()."' where id=1;"))
            return true;
        return false;
    }


    /**************************************************
     *                                                *
     *                WEATHER STATION                 *
     *                                                *
     **************************************************/

    public function getCount_day_results()
    {
        $count_day_results = 0;
        foreach ($this->getConnection()->query("SELECT  * FROM  day_results ORDER BY day ") as $line)
            $count_day_results++;
        return $count_day_results;
    }

    /**
     * @return mixed
     */
    public function getIsEmpty()
    {
        return $this->isEmpty;
    }

    /**
     * @param mixed $isEmpty
     */
    public function setIsEmpty($isEmpty)
    {
        $this->isEmpty = $isEmpty;
    }


    /*
     * day_result
     */

    /**
     * @return Day_result
     */
    public function getToday_result()
    {
        foreach ($this->getConnection()->query("SELECT  * FROM  day_results where day = (SELECT  max(day) from day_results)") as $line)
            $today_result = new Day_result($line["id"],$line["temperature"], $line["humidity"], $line["day"]);
        return $today_result;
    }

    /**
     * @return array
     */
    public function getDay_results()
    {
        foreach ($this->getConnection()->query("SELECT  * FROM  day_results ORDER BY day Asc") as $line)
            $day_results[] = new Day_result($line["id"],$line["temperature"], $line["humidity"], $line["day"]);
        return $day_results;
    }

    /**
     *
     */
    function deleteAllResults()
    {
        if ($this->getConnection()->exec("DELETE from day_results"))
            return true;
        return false;
    }

    /** _station */

    /**
     * @return _station
     */
    public function getStation()
    {
        foreach ($this->getConnection()->query("SELECT  * FROM stations where id=1") as $line)
            $station = new station($line["id"],$line["country"], $line["city"], $line["number_lines"], $line["intervalbtwn2mesure"]);
        return $station;
    }

    /**
     * @param $country
     * @param $city
     * @param $nomber_lines
     * @param $intervalbtwn2mesure
     */
    function updateStation($country, $city, $nomber_lines, $intervalbtwn2mesure)
    {
        if ($nomber_lines < $this->getCount_day_results()) {
            foreach ($this->getConnection()->query("SELECT  max(id) from day_results") as $line)
                $max = $line["max(id)"];
            $this->getConnection()->exec("DELETE FROM day_results WHERE id <= ('$max' - '$nomber_lines' )");
        }
        $this->getConnection()->exec("update stations set country= '$country'  , city=  '$city', number_lines=  '$nomber_lines', intervalbtwn2mesure=  '$intervalbtwn2mesure'  where id=1");
        header('location:index.php');
    }


    /**
     *  elements of day results for js
     */

    public function getAllDays()
    {
        foreach ($this->getConnection()->query("SELECT  day FROM  day_results ORDER BY day Asc") as $line)
            $day_results[] = substr($line["day"], 0, 10);
        return $day_results;
    }

    /**
     * @return array
     */
    public function getAllTemperatures()
    {
        foreach ($this->getConnection()->query("SELECT  temperature FROM  day_results ORDER BY day Asc") as $line)
            $day_results[] = $line["temperature"];
        return $day_results;
    }

    /**
     * @return array
     */
    public function getAllHumiditys()
    {
        foreach ($this->getConnection()->query("SELECT  humidity FROM  day_results ORDER BY day Asc") as $line)
            $day_results[] = $line["humidity"];
        return $day_results;
    }


    /**************************************************
     *                                                *
     *                SECURITY SYSTEM                 *
     *                                                *
     **************************************************/


    /**
     *  security system
     */

    function getSecuritySystem()
    {
        foreach ($this->getConnection()->query("SELECT  * FROM security_systems") as $line)
            $security_system = new SecuritySystem($line['id'], $line['alarm_status']);
        return $security_system;
    }

    /**
     * @return bool
     */
    function turnOffAlarm()
    {
        if ($this->getConnection()->exec("update security_systems set alarm_status = 'False'"))
            return true;
    }


    /**********************
     *
     *  pictures
     *
     *********************/


    /**
     * @return array
     */
    function getAllPictures()
    {
        foreach ($this->getConnection()->query("SELECT  * FROM pictures order by time desc") as $line)
            $pictures[] = new Picture($line['id'], $line['time']);
        return $pictures;
    }

    /**
     * @return Picture
     */
    function getLastPictures()
    {
        foreach ($this->getConnection()->query("SELECT  * FROM pictures WHERE time = ( select max(time) from pictures )") as $line)
            $pictures = new Picture($line['id'], $line['time']);
        return $pictures;
    }


}

