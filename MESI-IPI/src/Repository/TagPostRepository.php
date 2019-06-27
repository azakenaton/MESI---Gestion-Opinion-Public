<?php
/**
 * Created by PhpStorm.
 * User: HYVERNAT
 * Date: 28/06/2019
 * Time: 01:03
 */

namespace App\Repository;

use App\Entity\Post;
use App\Entity\Tag;
use App\Entity\TagPost;
use Doctrine\ORM\EntityRepository;
use App\Entity\EntityManager;
use App\Entity\Utilisateur;
use Doctrine\DBAL\Connection;

class TagPostRepository extends EntityRepository
{
    Private $entityManager;
    Private $userRepo;

    public function __construct()
    {
        $this->entityManager = EntityManager::getInstance();
        $this->userRepo = $this->entityManager->getRepository(TagPost::class);
    }

    public function addTagPost(TagPost $tagPost){

        $this->entityManager->persist($tagPost);
        $this->entityManager->flush();

    }

    public function getTagPostByIdpost($idPost){
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder->select('u')
            ->from(TagPost::class, 'u')
            ->where('u.idPost = :idPost')
            ->setParameter('idPost', $idPost);


        $allTag = $queryBuilder->getQuery();

        return $allTag->getResult();
    }
}