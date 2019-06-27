<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index()
    {
        return $this->render('accueil/index.html.twig',
            [
                'controller_name' => 'AccueilController',
                'post_list' =>
                [
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
                ]

            ]

        );
    }


}
