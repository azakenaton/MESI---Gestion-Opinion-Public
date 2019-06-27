<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\TagPostRepository;
use App\Repository\TagRepository;
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
        $tagPostRepo = new TagPostRepository();
        $tagRepo = new TagRepository();
        $allPost = $postRepo->getAllPost();

        $tab = array();
        foreach ($allPost as $post){
            //construction du tableau avec les entités Post et Tag correspondant

            //Les tags en fonction du idPost
            $tag_list = array();
            $idPost = $post->getIdPost();
            $allTagPost = $tagPostRepo->getTagPostByIdpost($idPost);
            foreach ($allTagPost as $tagPost){
                $tag = $tagRepo->getTagById($tagPost->getIdTag());
                array_push($tag_list,$tag->getNomTag());
            }

            $idUtil = $post->getIdUtilisateur();
            $util =  $utilRepo->getUtilisateurWithId($idUtil);
            $newPost = [
                'id' => $idPost,
                'text_primary' => substr($post->getContenu(),0,50),
                'op_title' => $post->getLienExterne(),
                'text_secondary' => $post->getContenu(),
                'post_date' => $post->getDateCreation()/*->format('Y-m-d-H-i-s')*/,
                'post_author' => $util->getNom().' '.$util->getPrenom(),
                'source_url' => 'Ultérieurement',
                'tag_list' => $tag_list
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
