<?php
/**
 * Created by PhpStorm.
 * User: Akram
 * Date: 08/02/2018
 * Time: 11:57
 */

class Picture
{
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $time;

    /**
     * Picture constructor.
     * @param $id
     * @param $time
     */
    public function __construct($id, $time)
    {
        $this->id = $id;
        $this->time = $time;
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
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

}