<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        if ($this->get('security.authorization_checker')->isGranted('ROLE_USER'))  {
            return $this->redirect('http://localhost:4200/');
        }
        return $this->redirect('/login');

    }

    public function apiCurrentUserAction() {
        
        $token = $this->container->get('security.token_storage')->getToken();
        if (!$token) {
            return ('anon.');
        } 
        $user = $token->getUser();
        if ($user === "anon.") {

            return new JsonResponse('Ahh je ne suis pas un utilisateur !!!!');           
        }
        $formatted[] = [
               'id'           => $user->getId(),
               'name'         => $user->getUsername(),
               'email'        => $user->getEmail(),
               'project_id'   => $user->getProjectId()->getId(),
         ];
        return new JsonResponse($formatted);
    }
}
