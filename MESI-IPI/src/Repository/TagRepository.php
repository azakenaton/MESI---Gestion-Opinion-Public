<?php
/**
 * Created by PhpStorm.
 * User: HYVERNAT
 * Date: 28/06/2019
 * Time: 00:07
 */

namespace App\Repository;

use App\Entity\Tag;
use Doctrine\ORM\EntityRepository;
use App\Entity\EntityManager;

class TagRepository extends EntityRepository
{
    Private $entityManager;
    Private $userRepo;

    public function __construct()
    {
        $this->entityManager = EntityManager::getInstance();
        $this->userRepo = $this->entityManager->getRepository(Tag::class);
    }

    public function addTag(Tag $tag){

        $this->entityManager->persist($tag);
        $this->entityManager->flush();

    }

    public function getTagByNomTag($nomTag){
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder->select('u')
            ->from(Tag::class, 'u')
            ->where('u.nomTag = :nomTag')
            ->setParameter('nomTag', $nomTag);


        $myTag = $queryBuilder->getQuery();

        return $myTag->getResult();
    }

    public function getTagById($id){
        $tag = $this->userRepo->find($id);

        return $tag;
    }

}