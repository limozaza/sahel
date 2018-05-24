<?php
/**
 * Created by PhpStorm.
 * User: zakaria
 * Date: 23/05/18
 * Time: 23:37
 */

namespace App\Controller\api;


use App\Entity\Movie;
use FOS\RestBundle\Controller\ControllerTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * @Route(path="/api/movies")
 */
class MovieController extends AbstractController
{
    use ControllerTrait;


    /**
     * @Rest\View()
     * @Rest\Get(
     *     path="",
     *     name="movie_list"
     * )
     */
    public function lists()
    {
        $movies = $this->getDoctrine()->getRepository('App\Entity\Movie')->findAll();
        return $movies;
    }

    /**
     * @Rest\View(
     *     statusCode=201
     * )
     * @Rest\Post(
     *     path="",
     *     name="movie_add"
     * )
     * @ParamConverter("movie", converter="fos_rest.request_body")
     */
    public function add(Movie $movie)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($movie);
        $em->flush();
//        return $this->view(
//            $movie, Response::HTTP_CREATED,
//            [
//                'Location' => $this->generateUrl('article_show',['id' => $movie->getId(), UrlGeneratorInterface::ABSOLUTE_URL])
//            ]
//        );
        return $movie;
    }

}