<?php
/**
 * Created by PhpStorm.
 * User: sherbieny
 * Date: 6/18/17
 * Time: 7:25 PM
 */

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="teacher")
 */
class Teacher
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string")
     */
    private $name;


    /**
     * @ORM\Column(type="integer")
     */
    private $age;


    /**
     * @ORM\Column(type="boolean")
     */
    private $isEmployee;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Course", mappedBy="teacher")
     */
    private $courses;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getisEmployee()
    {
        return $this->isEmployee;
    }

    /**
     * @param mixed $isEmployee
     */
    public function setIsEmployee($isEmployee)
    {
        $this->isEmployee = $isEmployee;
    }

    /**
     * @return ArrayCollection|Course[]
     */
    public function getCourses()
    {
        return $this->courses;
    }



}