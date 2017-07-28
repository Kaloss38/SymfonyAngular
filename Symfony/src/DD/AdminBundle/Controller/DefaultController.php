<?php

namespace DD\AdminBundle\Controller;

use DD\AdminBundle\Entity\Comment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
	
    
    public function indexAction()
    {
    	// Request doctrine
    	$projects = $this->getDoctrine()
    			         ->getRepository('AdminBundle:Project') // On récupère l'entité
                         ->findAll(); 						   // On récupère toutes les données
     
        return $this->render('AdminBundle:Default:index.html.twig', array('projects'=>$projects));

    }
 	
    public function commentAction($id, Request $request){
        //Formulaire
        $comment = new Comment();
        
        $user = $this->get('security.token_storage')->getToken()->getUser();
        
        $project = $this->getDoctrine()
                        ->getRepository('AdminBundle:Project')
                        ->find($id);

        $formComment = $this->get('form.factory')->createBuilder(FormType::class, $comment);

        $formComment
            ->add('content', TextareaType::class)
            ->add('Envoyer', SubmitType::class)
        ;

        $form = $formComment->getForm(); //On récupère l'objet formBuilder

        $form->handleRequest($request); // On soumet le formulaire

        if($form->isSubmitted() && $form->isValid()){ //Si le formulaire est soumis et qu'il est valide
            $comment = $form->getData(); //On récupère la valeur du formulaire 
            $saveUser = $comment->setUser($user); // On récupère notre setter dans notre objet comment
            $saveProject = $comment->setProject($project); //On récupère notre setter dans notre objet comment
            $em = $this->getDoctrine()->getManager(); //On utilise Doctrine 
                  $em->persist($comment);   // On persiste les entités
                  $em->persist($saveUser);
                  $em->persist($saveProject);
                  $em->flush(); //On enregistre dans notre base de donnée

          return $this->redirect('/admin');        
        }


        return $this->render('AdminBundle:Default:comment.html.twig', array('form'=> $form->createView()));
    }

    public function postAction(){

        return $this->render('AdminBundle:Default:index.html.twig');
    }		
}
