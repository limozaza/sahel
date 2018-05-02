<?php

namespace App\Controller\web;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class DefaultController
 * @package App\Controller
 * @Route("/middle_office")
 */
class MiddleOfficeController extends AbstractController
{

    /**
     * @Route(path="", name="home_middle_office")
     */
    public function home(){
        return $this->render(
            'MiddleOffice\home.html.twig');
    }

}