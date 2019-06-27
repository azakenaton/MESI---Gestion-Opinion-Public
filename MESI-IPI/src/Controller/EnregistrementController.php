<?php

namespace App\Controller;

use App\Entity\EntityManager;
use App\Entity\Image;
use App\Entity\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\Annotation\Route;

class EnregistrementController extends AbstractController
{
    /**
     * @Route("/enregistrement", name="enregistrement")
     */
    public function index()
    {
        return $this->render('enregistrement/index.html.twig', [
            'controller_name' => 'EnregistrementController',
        ]);
    }

    /**
     * @Route("/enregistrement/utilisateur", name="enregistrement.utilisateur")
     */
    public function ajout_utilisateur(Request $request){
    	$entityManager = EntityManager::getInstance();
    	$errors = [];

    	$pieceIdentite = new Image(
    		'',
		    'identite_' . $request->request->get('nom') . '_' . time() . '.' . $request->files->get('pieceIdentite')->guessExtension()
	    );

    	try {
    		$request->files->get('pieceIdentite')->move(
				$this->getParameter('identites_directory'),
			    $pieceIdentite->getNomImg()
		    );
    		$entityManager->persist($pieceIdentite);
    		$entityManager->flush();
	    } catch(Exception $exception) {
    		$errors[] = $exception;
	    }

    	$avatar = new Image(
    	    '',
		    'avatar_' . $request->request->get('nom') . '_' .time() . '.' . $request->files->get('avatar')->guessExtension()
	    );

    	try {
    		$request->files->get('avatar')->move(
    			$this->getParameter('avatars_directory'),
			    $pieceIdentite->getNomImg()
		    );
    		$entityManager->persist($avatar);
    		$entityManager->flush();
	    } catch(Exception $exception) {
    		$errors[] = $exception;
	    }

    	$utilisateur = new Utilisateur(
    		$request->request->get('nom'),
		    $request->request->get('prenom'),
		    $request->request->get('password'),
		    $pieceIdentite->getIdImage(),
		    $avatar->getIdImage()
	    );

	    if (!$request->request->get('conditionGeneraleCheck') || !$request->request->get('veraciteInformationCheck')) {
		    $errors[] = new BadRequestHttpException();
	    }

	    if (count($errors) === 0) {
		    $response = $this->redirectToRoute('accueil');
		    $entityManager->persist($utilisateur);
		    $entityManager->flush();
	    } else {
		    $response = $this->redirectToRoute(
			    'enregistrement',
			    $request->request->all()
		    );
	    }

    	return $response;
    }
}
