<?php
/**
 * Created by PhpStorm.
 * User: alabhyavaibhav
 * Date: 11/10/18
 * Time: 6:26 PM
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;

class AdminController
{
    /**
     * @Route("/admin")
     */
    public function adminlogin(){

        return new Response("Login Admin Page");
    }
}