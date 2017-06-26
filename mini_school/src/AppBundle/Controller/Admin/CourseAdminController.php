<?php
/**
 * Created by PhpStorm.
 * User: sherbieny
 * Date: 6/26/17
 * Time: 8:09 PM
 */

namespace AppBundle\Controller\Admin;


use AppBundle\Entity\Course;
use AppBundle\Form\CourseFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/admin")
 */
class CourseAdminController extends Controller
{
    /**
     * @Route("/course", name="admin_course_list")
     */
    public function indexAction(){
        $courses = $this->getDoctrine()
            ->getRepository('AppBundle:Course')
            ->findAll();

        return $this->render('admin/course/list.html.twig', [
            'courses' => $courses
        ]);
    }

    /**
     * @Route("/course/new", name="admin_course_new")
     */
    public function newAction(Request $request){
        $form = $this->createForm(CourseFormType::class);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $course = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($course);
            $em->flush();

            $this->addFlash('success', 'course gedeed!');

            return $this->redirectToRoute('admin_course_list');
        }

        return $this->render('admin/course/new.html.twig', [
            'courseForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/course/{id}/edit", name="admin_course_edit")
     */
    public function editAction(Request $request, Course $course){
        $form = $this->createForm(CourseFormType::class, $course);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $course = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($course);
            $em->flush();

            $this->addFlash('success', 'course et3adel!');

            return $this->redirectToRoute('admin_course_list');
        }

        return $this->render('admin/course/edit.html.twig', [
            'courseForm' => $form->createView()
        ]);
    }

}