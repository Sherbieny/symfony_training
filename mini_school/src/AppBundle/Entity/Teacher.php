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
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $name;


    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Department")
     * @ORM\JoinColumn(nullable=false)
     */
    private $department;


    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="date")
     */
    private $age;


    /**
     * @ORM\Column(type="boolean")
     */
    private $isEmployee;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Course", mappedBy="teacher")
     * @ORM\Column(type="string")
     */
    private $courses;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
     * @return Department
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param mixed $department
     */
    public function setDepartment(Department $department)
    {
        $this->department = $department;
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
    public function setAge(\DateTime $age)
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

    public function __toString()
    {
        return $this->getName();
    }


}