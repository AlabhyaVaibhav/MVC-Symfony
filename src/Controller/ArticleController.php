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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Entity;

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
        return $this->render(
            'article/reqform.html.twig'
        );
    }

    /**
     * @Route("/ajax/NewUserRequest")
     */
    public function newUserRequestAjax(Request $request){

        $response = "Recevied request";
      $response = $this->forward('App\Controller\NewUserController::sendDataToDB', array(
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'team' => $request->get('team'),
        'me' => $request->get('me'),
        ));
        return new Response($response);
    }

    /**
     * @Route("test")
     * @param Request $request
     * @return Response
     */
    public function testNetowrk(Request $request){
        $name = json_encode("Default");
//        $name= $request->get('name');
//        echo $name;
        return new Response($name);
    }
}