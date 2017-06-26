<?php
/**
 * Created by PhpStorm.
 * User: sherbieny
 * Date: 6/17/17
 * Time: 7:48 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Course;
use AppBundle\Service\MarkDownTransformer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CourseController extends Controller
{
    /**
     * @Route("/course/new")
     */
    public function newAction(){
        $course = new Course();
        $course->setName('Course'.rand(0, 20));
        $course->setCategory('Science');
        $course->setNumOfLessons(rand(1, 100));
        $course->setIsMandatory(true);

        $em = $this->getDoctrine()->getManager();
        $em->persist($course);
        $em->flush();

        return new Response('<html><body>A new Course</body>');
    }

    /**
     * @Route("/course/{courseName}", name="course_show")
     */
    public function showAction($courseName){
        $em = $this->getDoctrine()->getManager();
        $course = $em->getRepository('AppBundle:Course')
            ->findOneBy(['name' => $courseName]);

        if(!$course){
            throw $this->createNotFoundException('mesh 3andena el course da ya3nya');
        }

        $descParser = new MarkDownTransformer();
        $description = $descParser->parse($course->getDescription());



        return $this->render('course/show.html.twig', [
           'course' => $course,
            'description' => $description
        ]);
    }




    /**
     * @Route("/course")
     */
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();

        $courses = $em->getRepository('AppBundle:Course')
            ->findAllMandatoryOrderedByName();

        return $this->render('course/index.html.twig',[
            'courses' => $courses,
        ]);
    }
}