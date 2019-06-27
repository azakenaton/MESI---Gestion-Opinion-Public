<?php
/**
 * Created by PhpStorm.
 * User: lhyve
 * Date: 14/06/2019
 * Time: 14:16
 */

namespace App\Controller;


use App\Entity\Image;
use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;
use App\Repository\ImageRepository;
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
    public function index(){

        $image= new Image('LUC','luccho');
        $req = new UtilisateurRepository();
        $res = $req->getUtilisateurWithId(2);

        var_dump($res->__toString());

        return $this->render('base.html.twig');
    }
}