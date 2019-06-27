<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index()
    {
        $postRepo = new PostRepository();
        $utilRepo = new UtilisateurRepository();
        $allPost = $postRepo->getAllPost();

        $tab = array();
        foreach ($allPost as $post){
            $idUtil = $post->getIdUtilisateur();
            $util =  $utilRepo->getUtilisateurWithId($idUtil);
            $newPost = [
                'id' => $post->getIdPost(),
                'text_primary' => substr($post->getContenu(),0,50),
                'op_title' => "montitre",
                'text_secondary' => $post->getContenu(),
                'post_date' => $post->getDateCreation()->format('Y-m-d-H-i-s'),
                'post_author' => $util->getNom().' '.$util->getPrenom(),
                'source_url' => $post->getLienExterne(),
                'tag_list' => ['tag1','tag2','tag3']
            ];
            array_push($tab,$newPost);
        }

        return $this->render('accueil/index.html.twig',
            [
                'controller_name' => 'AccueilController',
                'post_list' => $tab
            ]

        );
    }

/*[
                    [
                        'id' => "1",
                        'op_title' => "op_title1",
                        'text_primary' => "text_primary1",
                        'text_secondary' => "text_secondary",
                        'post_date' => "post_date",
                        'post_author' => "post_author",
                        'source_url' => "source_url",
                        'tag_list' => ['tag1','tag2','tag3']
                    ],
                    [
                        'id' => "2",
                        'op_title' => "op_title2",
                        'text_primary' => "text_primary2",
                        'text_secondary' => "text_secondary",
                        'post_date' => "post_date",
                        'post_author' => "post_author",
                        'source_url' => "source_url",
                        'tag_list' => ['tag1','tag2','tag3']
                    ],
                    [
                        'id' => "3",
                        'op_title' => "op_title3",
                        'text_primary' => "text_primary3",
                        'text_secondary' => "text_secondary",
                        'post_date' => "post_date",
                        'post_author' => "post_author",
                        'source_url' => "source_url",
                        'tag_list' => ['tag1','tag2','tag3']
                    ]
                ]*/
}
