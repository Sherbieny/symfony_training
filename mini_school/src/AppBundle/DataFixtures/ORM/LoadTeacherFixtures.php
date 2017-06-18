<?php
/**
 * Created by PhpStorm.
 * User: sherbieny
 * Date: 6/18/17
 * Time: 9:32 PM
 */

namespace AppBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

class LoadTeacherFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        Fixtures::load(
            __DIR__.'/teacher_fixtures.yml',
            $manager, [ 'providers' => [$this] ]
        );
    }

}