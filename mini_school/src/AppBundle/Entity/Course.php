<?php
/**
 * Created by PhpStorm.
 * User: sherbieny
 * Date: 6/17/17
 * Time: 8:35 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CourseRepository")
 * @ORM\Table(name="course")
 */
class Course
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
     * @ORM\Column(type="string")
     */
    private $category;


    /**
     * @ORM\Column(type="integer")
     */
    private $numOfLessons;


    /**
     * @ORM\Column(type="boolean")
     */
    private $isMandatory = true;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Teacher", inversedBy="courses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $teacher;

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
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getNumOfLessons()
    {
        return $this->numOfLessons;
    }

    /**
     * @param mixed $numOfLessons
     */
    public function setNumOfLessons($numOfLessons)
    {
        $this->numOfLessons = $numOfLessons;
    }

    /**
     * @return mixed
     */
    public function getisMandatory()
    {
        return $this->isMandatory;
    }

    /**
     * @param mixed $isMandatory
     */
    public function setIsMandatory($isMandatory)
    {
        $this->isMandatory = $isMandatory;
    }

    /**
     * @return mixed
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * @param mixed $teacher
     */
    public function setTeacher(Teacher $teacher)
    {
        $this->teacher = $teacher;
    }


}