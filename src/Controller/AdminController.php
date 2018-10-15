<?php
/**
 * Created by PhpStorm.
 * User: alabhyavaibhav
 * Date: 15/10/18
 * Time: 12:37 PM
 */

namespace App\Controller;


use App\Entity\NewUser;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends AbstractController
{
    /**
     * @Route("request/Details")
     */
    public function DisplayAllRequests(){



        $repo = $this->getDoctrine()
            ->getRepository(NewUser::class);
        $users = $repo->findAll();
        foreach ($users as $data){
            echo $data->getName();
        }
        //var_dump($users);
        //$json = json_encode($users);
        return new Response('dsdfsf');


    }

}