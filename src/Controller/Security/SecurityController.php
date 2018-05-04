<?php

namespace App\Controller\Security;

use App\Entity\User;
use App\Form\LoginForm;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="security_login")
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->createForm(LoginForm::class,[
            '_username' => $lastUsername
        ]);
        return $this->render(
            'Security\login.html.twig',
            array(
                // last username entered by the user
                'form' => $form->createView(),
                'error'         => $error,
            )
        );
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout()
    {
        throw new \Exception("On va pas arriver jusqu au la");
    }


    /**
     * @Route("/list_exemple", name="list_exemple", options={"expose"=true})
     * @Method({"GET"})
     * @Security("has_role('ROLE_USER')")
     */
    public function listExempleAction(Request $request)
    {
        $list = [
            ["id"=>1,"nom"=>"Boufares","prenom"=>"Zakaria","age"=>32],
            ["id"=>2,"nom"=>"Boufares","prenom"=>"Kassym","age"=>2],
            ["id"=>3,"nom"=>"Bahri","prenom"=>"Sofia","age"=>31],
            ["id"=>4,"nom"=>"Assa","prenom"=>"Malika","age"=>61],
            ["id"=>5,"nom"=>"Bensaid","prenom"=>"Hamid","age"=>17],
        ];

        return new JsonResponse($list);
    }
}
