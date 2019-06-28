<?php

namespace App\Controller;

use App\Entity\EntityManager;
use App\Entity\Image;
use App\Entity\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\ValidatorBuilder;

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
    	$validator = Validation::createValidator();
    	$errors = [];

    	$pieceIdentiteFile = $request->files->get('pieceIdentite');
    	if ($pieceIdentiteFile instanceof UploadedFile) {
		    $pieceIdentite = new Image(
			    $pieceIdentiteFile,
			    'identite'
		    );
		    $violations = $validator->validate($pieceIdentite);
		    if (count($violations) === 0) {
			    try {
				    $pieceIdentite->getFile()->move(
					    $this->getParameter('identites_directory'),
					    $pieceIdentite->getNomImg()
				    );
				    $entityManager->persist($pieceIdentite);
				    $entityManager->flush();
			    } catch(Exception $exception) {
				    $errors[] = $exception->getMessage();
			    }
		    } else {
			    foreach ($violations as $violation) {
				    $errors[] = $violation->getMessage();
			    }
		    }
	    } else {
    		$errors[] = 'Vous devez fournir une pièce d\'identité.';
	    }

		$avatarFile = $request->files->get('avatar');
    	if ($avatarFile instanceof UploadedFile) {
		    $avatar = new Image(
			    $avatarFile,
			    'avatar'
		    );
		    $violations = $validator->validate($avatar);
		    if (count($violations) === 0) {
			    try {
				    $validator->validate($avatar);
				    $avatar->getFile()->move(
					    $this->getParameter('avatars_directory'),
					    $avatar->getNomImg()
				    );
				    $entityManager->persist($avatar);
				    $entityManager->flush();
			    } catch(Exception $exception) {
				    $errors[] = $exception->getMessage();
			    }
		    } else {
			    foreach ($violations as $violation) {
				    $errors[] = $violation->getMessage();
			    }
		    }
	    } else {
    		$errors[] = 'Vous devez enregistrer un avatar.';
	    }

	    if (!$request->request->get('conditionGeneraleCheck')) {
		    $errors[] = 'Vous devez accepter les Conditions Generales d\'Utilisation.';
	    }

	    if (!$request->request->get('veraciteInformationCheck')) {
		    $errors[] = 'Vous devez attester sur l\'honneur de la validité des informations fournies.';
	    }

    	if (count($errors) === 0) {
		    $utilisateur = new Utilisateur(
			    $request->request->get('nom'),
			    $request->request->get('prenom'),
			    $request->request->get('password'),
			    $request->request->get('email'),
			    $pieceIdentite->getIdImage(),
			    $avatar->getIdImage()
		    );
		    $violations = $validator->validate($utilisateur);
		    if (count($violations) > 0) {
			    foreach ($violations as $violation) {
				    $errors[] = $violation->getMessage();
			    }
		    }
	    }

	    if (count($errors) === 0) {
	    	$response = $this->redirectToRoute('accueil');
		    $entityManager->persist($utilisateur);
		    $entityManager->flush();
	    } else {
		    $response = $this->redirectToRoute(
			    'enregistrement',
			    $errors
		    );
	    }

    	return $response;
    }
}
