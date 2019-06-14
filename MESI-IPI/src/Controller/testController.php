<?php
/**
 * Created by PhpStorm.
 * User: lhyve
 * Date: 14/06/2019
 * Time: 14:16
 */

namespace App\Controller;


use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
//use Doctrine\DBAL\Driver\Connection;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\Response;

/**
 * Class AdvertController
 * @package App\Controller
 */
class testController extends AbstractController
{
    /**
     * @Route("/test")
     */
    public function index(Connection $connection){

        /*$utilisateurs = $connection->fetchAll('SELECT * FROM utilisateur');

        foreach($utilisateurs as $utilisateur) {
            $utilisateur = new Utilisateur(
                $utilisateur['idUtilisateur'],
                $utilisateur['nom'],
                $utilisateur['prenom'],
                $utilisateur['password'],
                $utilisateur['idPieceIdentite'],
                $utilisateur['idAvatar']
            );
            $req = $connection->prepare('INSERT INTO utilisateur(nom,prenom,password,idPieceIdentite,idAvatar) values (:nom,:prenom,:password,:pieceIdentite,:avatar)');
            $req->bindValue(':nom',$utilisateur->getNom());
            $req->bindValue(':prenom',$utilisateur->getPrenom());
            $req->bindValue(':password',$utilisateur->getPasswrd());
            $req->bindValue(':pieceIdentite',$utilisateur->getPieceIdentite());
            $req->bindValue(':avatar',$utilisateur->getAvatar());
            $req->execute();
        }

        $req = $connection->createQueryBuilder();
        $req
            ->insert('utilisateur')
            ->setValue('nom' ,'?')
            ->setValue('prenom' ,'?')
            ->setValue('password' ,'?')
            ->setValue('idPieceIdentite' ,'?')
            ->setValue('idAvatar' ,'?')
            ->setParameter(0,'pierre')
            ->setParameter(1,'jean')
            ->setParameter(2,'jean-pierre')
            ->setParameter(3,2)
            ->setParameter(4,2);

        $req->execute();*/
        /*$em = null;
        $em instanceof EntityManager;
        $util = new Utilisateur('moncul','jean','zaerzae',2,2);
        $req = new UtilisateurRepository($em,$util);
        $req->addUtilisateur();*/

        return $this->render('base.html.twig');
    }
}