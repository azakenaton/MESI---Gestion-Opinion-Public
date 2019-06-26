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
    Private $userRepo;

    /**
     * UtilisateurRepository constructor.
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
        $this->entityManager = EntityManager::getInstance();
        $this->userRepo = $this->entityManager->getRepository(Utilisateur::class);
    }

    public function addUtilisateur(Utilisateur $utilisateur){

        $this->entityManager->persist($utilisateur);
        $this->entityManager->flush();

    }

    public function getUtilisateurWithId($id){
        $user = $this->userRepo->find($id);

        return $user;
    }

    public function getAllUser(){
        $allUser = $this->userRepo->findAll();
        return $allUser;
    }

    public function getUserByName($nom){
        $userByName = $this->userRepo->findOneBy(["nom" => $nom]);
        return $userByName;
    }

    public function delUser($id){
        $user = $this->getUtilisateurWithId($id);

        $this->entityManager->remove($user);
        $this->entityManager->flush($user);
    }

    public function modifyUser($id){
        $user = $this->getUtilisateurWithId($id);

        $user->setPrenom("jean");
        $this->entityManager->flush();
    }


}