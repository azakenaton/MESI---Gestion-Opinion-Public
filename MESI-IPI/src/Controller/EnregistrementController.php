<?php

namespace App\Controller;

use App\Entity\EntityManager;
use App\Entity\Image;
use App\Entity\Utilisateur;
use App\Repository\ImageRepository;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
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
    	/*$entityManager = EntityManager::getInstance();
    	$errors = [];

    	$pieceIdentite = new Image(
    		'',
		    'identite_' . $request->request->get('nom') . '_' . time()
	    );

    	try {
    		$entityManager->persist($pieceIdentite);
    		$entityManager->flush();
	    } catch(Exception $exception) {
    		$errors[] = $exception;
	    }

    	$avatar = new Image(
    	    '',
		    'avatar_' . $request->request->get('nom') . '_' .time()
	    );

    	try {
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
	    }*/

    	//return $response;

        $errors = [];
        $imageRepo = new ImageRepository();
        $userRepo = new UtilisateurRepository();

        $pieceIdentite = new Image(
            '',
            'identite_' . $request->request->get('nom') . '_' . time()
        );

        $avatar = new Image(
            '',
            'avatar_' . $request->request->get('nom') . '_' .time()
        );

        $imageRepo->addImage($pieceIdentite);
        $imageRepo->addImage($avatar);

        $utilisateur = new Utilisateur(
            $request->request->get('nom'),
            $request->request->get('prenom'),
            $request->request->get('password'),
            $pieceIdentite->getIdImage(),
            $avatar->getIdImage()
        );

        $userRepo->addUtilisateur($utilisateur);

        if (!$request->request->get('conditionGeneraleCheck') || !$request->request->get('veraciteInformationCheck')) {
            $errors[] = new BadRequestHttpException();
        }

        if (count($errors) != 0) {
            $response = $this->redirectToRoute(
                'enregistrement',
                $request->request->all()
            );
            session_destroy();
        }else{
            $response = $this->redirectToRoute('accueil');
            $_SESSION['idUtilisateur'] = $utilisateur->getIdUtilisateur();
        }

        return $response;
    }
}
