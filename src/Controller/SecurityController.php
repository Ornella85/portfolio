<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/connexion",  name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils, UserRepository $userRepository) : Response
    {
        $users = $userRepository->findAll(); 
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'users'    => $users 
        ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(){
        throw new \Exception('This should never be reached!');

    }

}
