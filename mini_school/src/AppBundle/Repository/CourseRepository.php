<?php
/**
 * Created by PhpStorm.
 * User: sherbieny
 * Date: 6/18/17
 * Time: 9:57 PM
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Course;
use AppBundle\Entity\Teacher;
use Doctrine\ORM\EntityRepository;

class CourseRepository extends EntityRepository
{
    /**
     * @return Course[]
     */
    public function findAllMandatoryOrderedByName(){
        return $this->createQueryBuilder('course')
            ->andWhere('course.isMandatory = :isMandatory')
            ->setParameter('isMandatory', 1)
            ->orderBy('course.name', 'DESC')
            ->getQuery()
            ->execute();
    }

    /**
     * @return Course[]
     */
    public function findAllCoursesForTeacher(Teacher $teacher){
        return $this->createQueryBuilder('teacher_courses')
            ->where('teacher_courses.teacher = :teacher')
            ->setParameter('teacher', $teacher)
            ->getQuery()
            ->execute();
    }

}