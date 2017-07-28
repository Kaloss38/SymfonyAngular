<?php

namespace CC\CreateUserBundle\Controller;

use CC\CreateUserBundle\Services\MessageGenerator;
use DD\AdminBundle\Entity\Project;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


use Symfony\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
    	$project = new Project();

    	$formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $project);

    	//Creation formulaire Label + type
    	$formBuilder
    		->add('titre', TextType::class)
			->add('autor', TextType::class)
			->add('content', TextareaType::class)
			->add('date', DateType::class)
			->add('save', SubmitType::class)
		;

		//Service happy message
		$messageGenerator = $this->container->get('app.message_generator'); //On récupère notre service

		$message = $messageGenerator->getHappyMessage(); //On accède à la méthode getHappyMessage

		/*$this->addFlash('success', $message);*/ //Ajoute un message flash

		//Save data from form
		$form = $formBuilder->getForm(); //On récupère l'objet formBuilder

		$form->handleRequest($request); // On soumet le formulaire

		//save data in database
		if($form->isSubmitted() && $form->isValid()){ //Si le formulaire est soumis et qu'il est valide
			$project = $form->getData(); //On récupère la valeur du formulaire 

			$em = $this->getDoctrine()->getManager(); //On utilise Doctrine 
				  $em->persist($project);	// On persiste l'entité
				  $em->flush();	//On enregistre dans notre base de donnée
		}

        return $this->render('CCCreateUserBundle:Default:index.html.twig', array('form' => $form->createView(),'message'=>$message)); //On renvoi nos données dans la vue
    }
    
    
}
