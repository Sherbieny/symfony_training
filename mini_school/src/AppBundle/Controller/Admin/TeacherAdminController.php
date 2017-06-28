<?php
/**
 * Created by PhpStorm.
 * User: sherbieny
 * Date: 6/26/17
 * Time: 2:51 AM
 */

namespace AppBundle\Controller\Admin;


use AppBundle\Entity\Teacher;
use AppBundle\Form\TeacherFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/admin")
 * @Security("is_granted('ROLE_SUPER_ADMIN')")
 */
class TeacherAdminController extends Controller
{

    /**
     * @Route("/teacher", name="admin_teacher_list")
     */
    public function indexAction(){
        $teachers = $this->getDoctrine()
            ->getRepository('AppBundle:Teacher')
            ->findAll();

        return $this->render('admin/teacher/list.html.twig', [
           'teachers' => $teachers,
        ]);
    }

    /**
     * @Route("/teacher/new", name="admin_teacher_new")
     */
    public function newAction(Request $request){
        $form = $this->createForm(TeacherFormType::class);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $teacher = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($teacher);
            $em->flush();

            $this->addFlash('success', 'Miss ma3anaa!');

            return $this->redirectToRoute('admin_teacher_list');
        }

        return $this->render('admin/teacher/new.html.twig', [
            'teacherForm' => $form->createView()
        ]);

    }

    /**
     * @Route("/teacher/{id}/edit", name="admin_teacher_edit")
     */
    public function editAction(Request $request, Teacher $teacher){

        $form = $this->createForm(TeacherFormType::class, $teacher);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $teacher = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($teacher);
            $em->flush();

            $this->addFlash('success', 'el miss et3adelet');

            return $this->redirectToRoute('admin_teacher_list');
        }

        return $this->render(':admin/teacher:edit.html.twig', [
            'teacherForm' => $form->createView()
        ]);
    }

}