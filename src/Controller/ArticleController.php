<?php
/**
 * Created by PhpStorm.
 * User: alabhyavaibhav
 * Date: 11/10/18
 * Time: 6:05 PM
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;

class ArticleController
{
    public function homepage(){
        return new Response("Home page");
    }
}