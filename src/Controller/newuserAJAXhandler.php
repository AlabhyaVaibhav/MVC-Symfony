<?php /** @noinspection PhpParamsInspection */

/**
 * Created by PhpStorm.
 * User: alabhyavaibhav
 * Date: 12/10/18
 * Time: 3:17 PM
 */

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Flex\Response;

class newuserAJAXhandler extends AbstractController
{

    /**
     * @Route("/ajax/handler")
     * @param Request $request
     * @return \http\Env\Response
     */
    public function handleAJAXCall(Request $request)
    {

        if ($request->isXmlHttpRequest()) {
            $json_data = array();
            //Get data from call


            //send data
            //sendDataToDB();
        } else {
            $json_data = "Nothing";
        }
        $response = new \http\Env\Response();
        $response->setContent(json_encode(array(
            'data' => 123
        )));
        return $response;
    }
}