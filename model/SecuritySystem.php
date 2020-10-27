<?php
/**
 * Created by PhpStorm.
 * User: Akram
 * Date: 08/02/2018
 * Time: 12:07
 */

class SecuritySystem
{
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $alarmStatus;

    /**
     * SecuritySystem constructor.
     * @param $id
     * @param $alarmStatus
     */
    public function __construct($id, $alarmStatus)
    {
        $this->id = $id;
        $this->alarmStatus = $alarmStatus;
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
    public function getAlarmStatus()
    {
        return $this->alarmStatus;
    }

    /**
     * @param mixed $alarmStatus
     */
    public function setAlarmStatus($alarmStatus)
    {
        $this->alarmStatus = $alarmStatus;
    }

}