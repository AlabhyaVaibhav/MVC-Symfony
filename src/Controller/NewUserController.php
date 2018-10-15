<?php
/**
 * Created by PhpStorm.
 * User: alabhyavaibhav
 * Date: 12/10/18
 * Time: 12:17 PM
 */

namespace App\Controller;


use App\Entity\NewUser;
use http\Env\Request;
use http\Env\Response;
use Symfony\{Bundle\FrameworkBundle\Controller\AbstractController,
    Component\HttpFoundation,
    Component\Routing\Annotation\Route};

class NewUserController extends AbstractController
{


    /**
     * @param $name
     * @param $email
     * @param $team
     * @param $me
     * @return Response
     */
    public function sendDataToDB($name,$email,$team,$me){

        $entityManger = $this->getDoctrine()->getManager();
        $user = new NewUser();
        $user->setName($name);
        $user->setEmail($email);
        $user->setManageremail($me);
        $user->setTeam($team);

        $entityManger->persist($user);
        $entityManger->flush();

        //send mail to user for receiving the request.
        $resultMessage = "In the database";
        return new Response("article/results.html.twig",[
            'result'=>json_encode($resultMessage)
        ]);
    }
}