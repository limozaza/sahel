<?php

namespace App\Controller\web\MiddleOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;


/**
 * Class DefaultController
 * @package App\Controller
 * @Route("/middle_office/article", name="article_middle_office")
 */
class MiddleOfficeArticleController
{

    /**
     * @var Environment
     */
    private $environment;

    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    public function __invoke()
    {
        return new Response(
            $this->environment->render('MiddleOffice\article.html.twig')
        );
    }
}