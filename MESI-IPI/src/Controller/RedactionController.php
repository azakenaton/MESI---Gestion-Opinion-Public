<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RedactionController extends AbstractController
{
    /**
     * @Route("/redaction", name="redaction")
     */
    public function index()
    {
        return $this->render('redaction/index.html.twig', [
            'controller_name' => 'RedactionController',
        ]);
    }
}
