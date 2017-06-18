<?php
/**
 * Created by PhpStorm.
 * User: sherbieny
 * Date: 6/18/17
 * Time: 9:57 PM
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Course;
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

}