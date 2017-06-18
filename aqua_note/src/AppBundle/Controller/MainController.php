<?php
/**
 * Created by PhpStorm.
 * User: sherbieny
 * Date: 6/15/17
 * Time: 7:46 PM
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function homepageAction(){
        return $this->render('main/homepage.html.twig');
    }

}