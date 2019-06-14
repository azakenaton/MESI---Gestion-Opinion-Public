<?php
/**
 * Created by PhpStorm.
 * User: HYVERNAT
 * Date: 15/06/2019
 * Time: 00:02
 */

namespace App\Repository;


use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityRepository;


class UtilisateurRepository extends EntityRepository
{
    public function addUtilisateur(){

        $req = $this->createQueryBuilder();
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

        $req->execute();
    }
}