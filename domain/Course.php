<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 06.01.2018
 * Time: 15:40
 */


namespace domain;

class Course
{
    /**
     * @AttributeType String
     */
    protected $ID_course;


    /**
     * @AttributeType String
     */
    protected $name;
    /**
     * @AttributeType date
     */
    protected $startdate;
    /**
     * @AttributeType String
     */
    protected $discipline;

    /**
     * @AttributeType String
     */
    protected $description;

    /**
     * @AttributeType String
     */
    protected $degree;

    /**
     * @AttributeType String
     */
    protected $attendance;

    /**
     * @return mixed
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * @param mixed $startdate
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;
    }

    /**
     * @return mixed
     */
    public function getDiscipline()
    {
        return $this->discipline;
    }

    /**
     * @param mixed $discipline
     */
    public function setDiscipline($discipline)
    {
        $this->discipline = $discipline;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * @param mixed $degree
     */
    public function setDegree($degree)
    {
        $this->degree = $degree;
    }

    /**
     * @return mixed
     */
    public function getAttendance()
    {
        return $this->attendance;
    }

    /**
     * @param mixed $attendance
     */
    public function setAttendance($attendance)
    {
        $this->attendance = $attendance;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getFKUniversity()
    {
        return $this->FK_university;
    }

    /**
     * @param mixed $FK_university
     */
    public function setFKUniversity($FK_university)
    {
        $this->FK_university = $FK_university;
    }

    /**
     * @AttributeType String
     */
    protected $duration;
    /**
     * @AssociationType int
     * @AssociationMultiplicity 1
     */
    private $FK_university;

    /**
     * @access public
     * @return int
     * @ReturnType int
     */
    public function getIDcourse()
    {
        return $this->ID_course;
    }

    /**
     * @access public
     * @param int id
     * @return void
     * @ParamType id int
     * @ReturnType void
     */
    public function setIDcourse($ID_course)
    {
        $this->ID_course = $ID_course;
    }

    /**
     * @access public
     * @return String
     * @ReturnType String
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @access public
     * @param String name
     * @return void
     * @ParamType name String
     * @ReturnType void
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
