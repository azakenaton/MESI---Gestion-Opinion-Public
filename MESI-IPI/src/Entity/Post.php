<?php
/**
 * Created by PhpStorm.
 * User: HYVERNAT
 * Date: 26/06/2019
 * Time: 23:13
 */

namespace App\Entity;

/**
 * @ORM\Entity
 * @ORM\Table(name="post")
 */
class Post
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     **/
    private $idPost;

    /**
     * @ORM\Column(type="integer")
     * @ORM\ManyToOne(targetEntity="Utilisateur::class")
     * @ORM\JoinColumns(name="utilisateur", referencedColumnName="idUtilisateur")
     **/
    private $idUtilisateur;

    /**
     * @ORM\Column(type="string")
     **/
    private $contenu;

    /**
     * @ORM\Column(type="string")
     **/
    private $lienExterne;

    /**
     * @ORM\Column(type="datetime")
     **/
    private $dateCreation;

    /**
     * Post constructor.
     * @param $idUtilisateur
     * @param $contenu
     * @param $lienExterne
     * @param $dateCreation
     */
    public function __construct($idUtilisateur, $contenu, $lienExterne, $dateCreation)
    {
        $this->idUtilisateur = $idUtilisateur;
        $this->contenu = $contenu;
        $this->lienExterne = $lienExterne;
        $this->dateCreation = $dateCreation;
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
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getLienExterne()
    {
        return $this->lienExterne;
    }

    /**
     * @param mixed $lienExterne
     */
    public function setLienExterne($lienExterne)
    {
        $this->lienExterne = $lienExterne;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param mixed $dateCreation
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }




}