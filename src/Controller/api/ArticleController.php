<?php
namespace App\Controller\api;

use App\Entity\Article;
use App\Pagination\Filtering\Article\ArticleFilterDefinitionFactory;
use App\Pagination\PageRequestFactory;
use App\Pagination\Paginate\Article\ArticlePagination;
use App\Representation\ArticleRepresentation;
use FOS\RestBundle\Controller\ControllerTrait;
use FOS\RestBundle\Controller\Annotations as Rest;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


/**
 * Class ArticleController
 * @package App\Controller\api
 * @Route(path="/api/articles")
 */
class ArticleController extends AbstractController
{
    use ControllerTrait;

    /**
     * @var ArticlePagination
     */
    private $articlePagination;

    public function __construct(ArticlePagination $articlePagination)
    {
        $this->articlePagination = $articlePagination;
    }


    /**
     * @Rest\View()
     * @Rest\Get(
     *     path="/{id}",
     *     name="article_show"
     * )
     */
    public function show(Request $request)
    {
        $article = $this->getDoctrine()->getRepository('App\Entity\Article')->find($request->get('id'));
        if(empty($article)){
            return new JsonResponse(['status'=> 'Not found'], Response::HTTP_NOT_FOUND);
        }
        return $article;
    }


    /**
     * @Rest\View(
     *     statusCode=201
     * )
     * @Rest\Post(
     *     path="",
     *     name="article_add"
     * )
     */
    public function add(Request $request)
    {
        $article = new Article();
        $article
            ->setTitle($request->get('title'))
            ->setContent($request->get('content'));

        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();
        return $this->view(
            $article, Response::HTTP_CREATED,
            [
                'Location' => $this->generateUrl('article_show',['id' => $article->getId(), UrlGeneratorInterface::ABSOLUTE_URL])
            ]
        );
    }


    /**
     * @Rest\View()
     * @Rest\Get(
     *     path="",
     *     name="article_list"
     * )
     */
    public function lists(Request $request)
    {

        $pageRequestFactory             = new PageRequestFactory();
        $page                           = $pageRequestFactory->fromRequest($request);

        $articleFilterDefinitionFactory = new ArticleFilterDefinitionFactory();
        $articleFilterDefinition        = $articleFilterDefinitionFactory->factory($request);


        return $this->articlePagination->paginate(
            $page,
            $articleFilterDefinition
        );
    }




}