<?php
/**
 * Created by PhpStorm.
 * User: HYVERNAT
 * Date: 26/06/2019
 * Time: 23:35
 */

namespace App\Repository;


use App\Entity\Post;
use Doctrine\ORM\EntityRepository;
use App\Entity\EntityManager;
use App\Entity\Utilisateur;
use Doctrine\DBAL\Connection;


class PostRepository extends EntityRepository
{
    Private $entityManager;
    Private $userRepo;


    public function __construct()
    {
        $this->entityManager = EntityManager::getInstance();
        $this->userRepo = $this->entityManager->getRepository(Post::class);
    }

    public function addPost(Post $post){

        $this->entityManager->persist($post);
        $this->entityManager->flush();

    }

    public function getPostWithId($id){
        $post = $this->userRepo->find($id);

        return $post;
    }

    public function getAllPost(){
        $allPost = $this->userRepo->findAll();
        return $allPost;
    }


}