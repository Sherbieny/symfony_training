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

class GenusNoteRepository extends EntityRepository
{
    public function findAllRecentNotesForGenus(Genus $genus){
        return $this->createQueryBuilder('genus_note')
            ->andWhere('genus_note.genus = :genus')
            ->setParameter('genus', $genus)
            ->andWhere('genus_note.createdAt > :recentDate')
            ->setParameter('recentDate', new \DateTime('-3 months'))
            ->getQuery()
            ->execute();
    }
}