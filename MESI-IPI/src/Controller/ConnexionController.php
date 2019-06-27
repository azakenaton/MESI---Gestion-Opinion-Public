<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ConnexionController extends AbstractController
{
    /**
     * @Route("", name="connexion")
     */
    public function index()
    {
        return $this->render('connexion/index.html.twig', [
            'controller_name' => 'ConnexionController',
        ]);
    }

    /**
     * @Route("utilisateur/connection", name="user.connection")
     */
    public function userConnection(Request $request){


        $errors = [];
        $userRepo = new UtilisateurRepository();

        $res = $userRepo->getUserForConnection($request->request->get('nom')
            ,$request->request->get('prenom')
            ,$request->request->get('password'));

        if($res != null) {
            $response = $response = $this->redirectToRoute('accueil');
        }else{
            $response = $response = $this->redirectToRoute('enregistrement');
        }

        return $response;
    }
}
