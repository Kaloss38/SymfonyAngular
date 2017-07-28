<?php

namespace DD\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AdminBundle\Entity\Project;

class ProjectController extends Controller
{
    /**
     * @Route("/allProject", name="projects_list")
     */
    public function allAction()
    {
    	$projects = $this->get('doctrine.orm.entity_manager')
                		 ->getRepository('AdminBundle:Project')
                		 ->findAll();
        /* @var $projects Project[] */
        $formatted = [];
        foreach ($projects as $project) {
            $formatted[] = [
               'id'      => $project->getId(),
               'titre'   => $project->getTitre(),
               'autor'   => $project->getAutor(),
               'content' => $project->getContent(),
               'date'    => $project->getDate(),
            ];
        }

        return new JsonResponse($formatted);
    }

    public function oneProjectAction($id)
    {
    	$repository = $this->get('doctrine.orm.entity_manager')
                		     ->getRepository('AdminBundle:Project');
      $project    = $repository->find($id);


        /* @var $projects Project[] */
              $formatted = [];

        $formatted[] = [
          'project'=>[
               'id'      => $project->getId(),
               'titre'   => $project->getTitre(),
               'autor'   => $project->getAutor(),
               'content' => $project->getContent(),
               'date'    => $project->getDate(),
          ]
        ];
      $project = $this->getDoctrine()
                 ->getRepository('AdminBundle:Project')
                 ->find($id);

      $notes = $project->getNotes();
      foreach ($notes as $note) {
            $formatted[] = [
               'id'        => $note->getId(),
               'id_auteur' => $note->getUser()->getId(),
               'autor'     => $note->getAutor(),
               'content'   => $note->getContent(),
               'date'      => $note->getDate(),
            ];
        }
        

        return new JsonResponse($formatted);
    }

}
