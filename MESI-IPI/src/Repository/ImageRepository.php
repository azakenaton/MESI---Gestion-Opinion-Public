<?php
/**
 * Created by PhpStorm.
 * User: lhyve
 * Date: 26/06/2019
 * Time: 09:41
 */

namespace App\Repository;

use App\Entity\Image;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityRepository;
use App\Entity\EntityManager;

class ImageRepository extends EntityRepository
{
    Private $connection;
    Private $entityManager;
    Private $userRepo;

    /**
     * ImageRepository constructor.
     * @param $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
        $this->entityManager = EntityManager::getInstance();
        $this->userRepo = $this->entityManager->getRepository(Image::class);
    }

    /**
     * @param Utilisateur $utilisateur
     */
    public function addImage(Image $img)
    {
        $this->entityManager->persist($img);
        $this->entityManager->flush();
    }

    public function getImageWithId($id){
        $img = $this->userRepo->find($id);

        return $img;
    }

    public function getImgByRefId($ref){
        $imgByRef = $this->userRepo->findOneBy(["refImg" => $ref]);
        return $imgByRef;
    }




}