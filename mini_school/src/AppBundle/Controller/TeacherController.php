<?php
/**
 * Created by PhpStorm.
 * User: sherbieny
 * Date: 6/18/17
 * Time: 7:24 PM
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Teacher;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TeacherController extends Controller
{
    /**
     * @Route("/teacher/new")
     */
    public function newAction(){
        $teacher = new Teacher();
        $teacher->setName('3afaf'.rand(1, 150));
        $teacher->setAge(rand(20, 80));
        $teacher->setIsEmployee(true);

        $em = $this->getDoctrine()->getManager();
        $em->persist($teacher);
        $em->flush();

        return new Response('<html><body><h1>
                                    A new teacher joined!</h1></body></html>');
    }

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

        return $this->render('teacher/show.html.twig', [
            'teacher' => $teacher,
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