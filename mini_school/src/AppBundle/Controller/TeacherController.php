<?php
/**
 * Created by PhpStorm.
 * User: sherbieny
 * Date: 6/18/17
 * Time: 7:24 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Course;
use AppBundle\Entity\Teacher;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class TeacherController extends Controller
{
    /**
     * @Route("/teacher/new")
     */
   /* public function newAction(){
        $teacher = new Teacher();
        $teacher->setName('3afaf'.rand(1, 150));
        $teacher->setAge(rand(20, 80));
        $teacher->setIsEmployee(true);

        $course = new Course();
        $course->setName('Course'.rand(0, 20));
        $course->setCategory('Science');
        $course->setNumOfLessons(rand(1, 100));

        $course->setTeacher($teacher);

        $em = $this->getDoctrine()->getManager();
        $em->persist($teacher);
        $em->persist($course);
        $em->flush();

        return new Response('<html><body><h1>
                                    A new teacher joined!</h1></body></html>');
    }*/

    /**
     * @Route("/teacher/{teacherName}", name="teacher_show")
     */
    public function showAction($teacherName){
        $em = $this->getDoctrine()->getManager();
        $teacher = $em->getRepository('AppBundle:Teacher')
            ->findOneBy([ 'name' => $teacherName ]);

        if(!$teacher){
            throw $this->createNotFoundException("El miss de mesh 3andena ya 3naya");
        }

        $courses = $em->getRepository('AppBundle:Course')
            ->findAllCoursesForTeacher($teacher);


        return $this->render('teacher/show.html.twig', [
            'teacher' => $teacher,
            'courses' => $courses,
            'courses_count' => count($courses)
        ]);
    }


    /**
     * @Route("/teacher", name="teacher_index")
     */
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
        $teachers = $em->getRepository('AppBundle:Teacher')
            ->findAll();

        return $this->render('teacher/index.html.twig', [
           'teachers' => $teachers,
        ]);
    }

}