<?php
/**
 * Created by PhpStorm.
 * User: lhyve
 * Date: 14/06/2019
 * Time: 14:37
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Utilisateur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer") @GeneratedValue
     **/
    private $id;
    /** @ORM\Column(type="string") **/
    private $nom;
    /** @ORM\Column(type="string") **/
    private $prenom;
    /** @ORM\Column(type="string") **/
    private $passwrd;
    /** @ORM\Column(type="integer") **/
    private $pieceIdentite;
    /** @ORM\Column(type="integer") **/
    private $avatar;

    public function __construct($nom, $prenom, $passwrd, $pieceIdentite, $avatar)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->passwrd = $passwrd;
        $this->pieceIdentite = $pieceIdentite;
        $this->avatar = $avatar;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getPasswrd()
    {
        return $this->passwrd;
    }

    /**
     * @param mixed $passwrd
     */
    public function setPasswrd($passwrd): void
    {
        $this->passwrd = $passwrd;
    }

    /**
     * @return mixed
     */
    public function getPieceIdentite()
    {
        return $this->pieceIdentite;
    }

    /**
     * @param mixed $pieceIdentite
     */
    public function setPieceIdentite($pieceIdentite): void
    {
        $this->pieceIdentite = $pieceIdentite;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar): void
    {
        $this->avatar = $avatar;
    }



}