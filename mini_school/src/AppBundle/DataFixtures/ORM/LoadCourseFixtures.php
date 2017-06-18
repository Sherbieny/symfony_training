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

class LoadCourseFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        Fixtures::load(
            __DIR__.'/course_fixtures.yml',
            $manager, [ 'providers' => [$this] ]
        );
    }


    public function course(){
        $coursat = [
            'Math 1',
            'Math 2',
            'Math 3',
            'Science 1',
            'Science 2',
            'Geography',
            'History 1',
            'History 2',
            'Language 1',
            'Language 2',
            'Agriculture',
            'P.E.'
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
}