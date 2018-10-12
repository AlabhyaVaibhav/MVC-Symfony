<?php
/**
 * Created by PhpStorm.
 * User: alabhyavaibhav
 * Date: 12/10/18
 * Time: 12:17 PM
 */

namespace App\Controller;


use App\Entity\NewUser;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewUserController extends AbstractController
{
    public function index(){

        $entityManger = $this->getDoctrine()->getManager();

        $user = new NewUser();
        $user->setName("Alabhya");
        $user->setEmail("alabhya.vaibhav@quikr.com");
        $user->setManageremail("arpan@quikr.com");
        $user->setTeam("Tech");

        $entityManger->persist($user);
        $entityManger->flush();

        //send mail to user for receiving the request.
        $resultMessage = "In the database";
        json_encode($resultMessage);
        return new \Symfony\Component\HttpFoundation\Response(
            "article/results.html.twig",[
                'result'=>$resultMessage
            ]
        );
    }
}