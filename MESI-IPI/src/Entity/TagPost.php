<?php
/**
 * Created by PhpStorm.
 * User: HYVERNAT
 * Date: 28/06/2019
 * Time: 00:54
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Tagpost")
 */
class TagPost
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="idTagPost")
     **/
    private $idTagPost;

    /**
     * @ORM\Column(type="integer", name="idTag")
     * @ORM\ManyToOne(targetEntity="Tag::class")
     * @ORM\JoinColumn(name="tag", referencedColumnName="idTag")
     **/
    private $idTag;

    /**
     * @ORM\Column(type="integer", name="idPost")
     * @ORM\ManyToOne(targetEntity="Post::class")
     * @ORM\JoinColumn(name="post", referencedColumnName="idPost")
     **/
    private $idPost;

    /**
     * @ORM\Column(type="integer", name="idUtilisateur")
     * @ORM\ManyToOne(targetEntity="Utilisateur::class")
     * @ORM\JoinColumn(name="utilisateur", referencedColumnName="idUtilisateur")
     **/
    private $idUtilisateur;

    /**
     * @ORM\Column(type="integer", name="valideTag")
     **/
    private $valideTag;

    /**
     * TagPost constructor.
     * @param $idTag
     * @param $idPost
     * @param $idUtilisateur
     * @param $valideTag
     */
    public function __construct($idTag, $idPost, $idUtilisateur)
    {
        $this->idTag = $idTag;
        $this->idPost = $idPost;
        $this->idUtilisateur = $idUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getIdTagPost()
    {
        return $this->idTagPost;
    }

    /**
     * @param mixed $idTagPost
     */
    public function setIdTagPost($idTagPost)
    {
        $this->idTagPost = $idTagPost;
    }

    /**
     * @return mixed
     */
    public function getIdTag()
    {
        return $this->idTag;
    }

    /**
     * @param mixed $idTag
     */
    public function setIdTag($idTag)
    {
        $this->idTag = $idTag;
    }

    /**
     * @return mixed
     */
    public function getIdPost()
    {
        return $this->idPost;
    }

    /**
     * @param mixed $idPost
     */
    public function setIdPost($idPost)
    {
        $this->idPost = $idPost;
    }

    /**
     * @return mixed
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * @param mixed $idUtilisateur
     */
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getValideTag()
    {
        return $this->valideTag;
    }

    /**
     * @param mixed $valideTag
     */
    public function setValideTag($valideTag)
    {
        $this->valideTag = $valideTag;
    }




}