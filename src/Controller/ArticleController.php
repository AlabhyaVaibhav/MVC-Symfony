<?php
/**
 * Created by PhpStorm.
 * User: alabhyavaibhav
 * Date: 11/10/18
 * Time: 6:05 PM
 */

namespace App\Controller;


use App\Entity\NewUser;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    /**
     * @Route("/")
     */

    public function homepage(){
        return new Response("Home page");
    }
    /**
     * @Route("/admin/login")
     */

    public function adminhomepage(){
        $user = new NewUser();
        $user->setName("Alabhya");
        return $this->render('article/show.html.twig',[
            'title' => "Admin Login Page ".(string)($user->getName())
        ]);


    }
    /**
     * @Route("/newuser/request")
     */

    public function requesthomepage(){
        return new Response("");
    }
}