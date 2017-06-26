<?php
/**
 * Created by PhpStorm.
 * User: sherbieny
 * Date: 6/17/17
 * Time: 7:21 PM
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Genus;
use Doctrine\ORM\EntityRepository;

class SubFamilyRepository extends EntityRepository
{
    public function createAlphabeticalQueryBuilder(){
        return $this->createQueryBuilder('sub_family')
            ->orderBy('sub_family.name', 'ASC');
    }
}