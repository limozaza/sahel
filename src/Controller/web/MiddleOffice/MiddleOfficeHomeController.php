<?php

namespace App\Controller\web\MiddleOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;


/**
 * Class DefaultController
 * @package App\Controller
 * @Route("/middle_office", name="home_middle_office")
 */
class MiddleOfficeHomeController
{
    public function __invoke(Environment $environment)
    {
        return new Response(
            $environment->render('MiddleOffice\home.html.twig')
        );
    }
}