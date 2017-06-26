<?php
/**
 * Created by PhpStorm.
 * User: sherbieny
 * Date: 6/26/17
 * Time: 6:49 PM
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class DepartmentRepository extends EntityRepository
{
    public function getDepartmentOrderedByNameASC(){
        return $this->createQueryBuilder('department')
            ->orderBy('department.name', 'ASC');
    }

}