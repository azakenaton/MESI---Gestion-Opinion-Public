<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\Tag;
use App\Entity\TagPost;
use App\Repository\PostRepository;
use App\Repository\TagPostRepository;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;

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

    /**
     * @Route("/redaction/post", name="ajout.post")
     */
    public function ajout_post(Request $request){

        $errors = [];
        $postRepo = new PostRepository();
        $tagRepo = new TagRepository();
        $tagPostRepo = new TagPostRepository();

        $post = new Post(
            $_SESSION['idUtilisateur'],
            $request->request->get('contenu'),
            $request->request->get('titre'),
            date("d.m.y")
        );

        $postRepo->addPost($post);

        $allTag = explode(',',$request->request->get('tag'));

        foreach($allTag as $nomTag){
            $myTag = $tagRepo->getTagByNomTag($nomTag);
            if(count($myTag) == 0){
                $tag = new Tag(
                    $nomTag
                );
                $tagRepo->addTag($tag);
            }else{
                $tag = $myTag[0];
            }
            $tagPost = new TagPost($tag->getIdTag(),$post->getIdPost(),$_SESSION['idUtilisateur']);
            $tagPostRepo->addTagPost($tagPost);
        }

        if (!$request->request->get('conditionGeneraleCheck') || !$request->request->get('veraciteInformationCheck')) {
            $errors[] = new BadRequestHttpException();
        }

        if (count($errors) != 0) {
            $response = $this->redirectToRoute(
                'enregistrement',
                $request->request->all()
            );
        }else{
            $response = $this->redirectToRoute('accueil');
        }

        return $response;
    }
}
