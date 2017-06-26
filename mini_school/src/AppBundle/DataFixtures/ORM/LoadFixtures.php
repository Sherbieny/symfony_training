<?php
/**
 * Created by PhpStorm.
 * User: sherbieny
 * Date: 6/18/17
 * Time: 8:40 PM
 */

namespace AppBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

class LoadFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        Fixtures::load(
            __DIR__ . '/fixtures.yml',
            $manager, [ 'providers' => [$this] ]
        );
    }


    public function course(){
        $coursat = [
            'Math-'.rand(1, 5).rand(0,1).rand(1, 5),
            'Science-'.rand(1, 5).rand(0,1).rand(1, 5),
            'Geography-'.rand(1, 5).rand(0,1).rand(1, 5),
            'History-'.rand(1, 5).rand(0,1).rand(1, 5),
            'History-'.rand(1, 5).rand(0,1).rand(1, 5),
            'Language-'.rand(1, 5).rand(0,1).rand(1, 5),
            'Language-'.rand(1, 5).rand(0,1).rand(1, 5),
            'Agriculture-'.rand(1, 5).rand(0,1).rand(1, 5),
            'P.E-'.rand(1,10)
        ];

        $key = array_rand($coursat);

        return $coursat[$key];
    }

    public function category(){
        $cat = [
            'Science',
            'Mathematics',
            'Cultural',
            'Languages',
            'Physical',
        ];

        $key = array_rand($cat);

        return $cat[$key];
    }

    public function department(){
        $dep = [
            'Administration',
            'Religion',
            'Mathematics',
            'Languages',
            'History',
            'Biology',
            'Art',
            'Chemistry',
            'Physics',
            'Agriculture',
        ];

        $key = array_rand($dep);

        return $dep[$key];
    }
}