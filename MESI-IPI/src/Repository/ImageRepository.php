<?php
/**
 * Created by PhpStorm.
 * User: lhyve
 * Date: 26/06/2019
 * Time: 09:41
 */

namespace App\Repository;

use App\Entity\Utilisateur;
use Doctrine\DBAL\Connection;

class ImageRepository
{
    Private $connection;

    /**
     * ImageRepository constructor.
     * @param $connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param Utilisateur $utilisateur
     */
    public function addImage(Utilisateur $utilisateur)
    {
        $req = $this->connection->createQueryBuilder();
        $req
            ->insert('image')
            ->setValue('nomImg' ,'?')
            ->setParameter(0,$utilisateur->getNom().$utilisateur->getId());

        $res = $req->execute();
        var_dump($res);


    }


}