<?php
/**
 * Created by PhpStorm.
 * User: sherbieny
 * Date: 6/17/17
 * Time: 8:35 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


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
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $name;


    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $category;


    /**
     * @Assert\NotBlank()
     * @Assert\Range(min=1, max=40,
     *     maxMessage="Please enter a number between 1 and 40")
     * @ORM\Column(type="integer")
     */
    private $numOfLessons;


    /**
     * @ORM\Column(type="boolean")
     */
    private $isMandatory = true;


    /**
     * @ORM\Column(type="text")
     * @ORM\Column(nullable=true)
     */
    private $description;

    /**
     * @Assert\NotBlank()
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