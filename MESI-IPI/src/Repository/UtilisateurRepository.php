<?php
/**
 * Created by PhpStorm.
 * User: HYVERNAT
 * Date: 15/06/2019
 * Time: 00:02
 */

namespace App\Repository;


use App\Entity\EntityManager;
use App\Entity\Utilisateur;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityRepository;




class UtilisateurRepository extends EntityRepository
{
    Private $connection;
    Private $entityManager;

    /**
     * UtilisateurRepository constructor.
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
        $this->entityManager = EntityManager::getInstance();
    }

    public function addUtilisateur(Utilisateur $utilisateur){

        /*$req = $this->connection->createQueryBuilder();
        $req
            ->insert('utilisateur')
            ->setValue('nom' ,'?')
            ->setValue('prenom' ,'?')
            ->setValue('password' ,'?')
            ->setValue('idPieceIdentite' ,'?')
            ->setValue('idAvatar' ,'?')
            ->setParameter(0,$utilisateur->getNom())
            ->setParameter(1,$utilisateur->getPrenom())
            ->setParameter(2,$utilisateur->getPasswrd())
            ->setParameter(3,$utilisateur->getPieceIdentite())
            ->setParameter(4,$utilisateur->getAvatar());

        $req->execute();*/

        $userRepo =$this->entityManager->getRepository(Utilisateur::class);
        echo get_class($userRepo), "\n";


        $this->entityManager->persist($utilisateur);
        $this->entityManager->flush();

    }
}