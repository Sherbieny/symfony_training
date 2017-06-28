<?php
/**
 * Created by PhpStorm.
 * User: sherbieny
 * Date: 6/28/17
 * Time: 10:05 PM
 */

namespace AppBundle\Controller\Admin;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Security("is_granted('ROLE_SUPER_ADMIN')")
 */
class MainAdminController extends Controller
{
    /**
     * @Route("/admin", name="admin_index")
     */
    public function indexAction(){
        return $this->render('admin/index.html.twig');
    }

}