<?php
/**
 * Created by PhpStorm.
 * User: lhyve
 * Date: 14/06/2019
 * Time: 14:37
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateur")
 * @UniqueEntity("email")
 */
class Utilisateur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="idUtilisateur")
    **/
    private $idUtilisateur;

    /**
     * @ORM\Column(type="string", name="nom")
     * @Assert\NotBlank
     **/
    private $nom;

    /**
     * @ORM\Column(type="string", name="prenom")
     * @Assert\NotBlank
     **/
    private $prenom;


	private $email;

    /**
     * @ORM\Column(type="string", name="password")
     * @Assert\Length(min = 8, max = 32 )
     **/
    private $password;

    /**
     * @ORM\Column(type="string", name="idPieceIdentite")
     * @ORM\OneToOne(targetEntity="Image")
     * @ORM\JoinColumn(name="idPieceIdentite", referencedColumnName="idImage")
     **/
    private $idPieceIdentite;

    /**
     * @ORM\Column(type="integer", name="idAvatar")
     * @ORM\OneToOne(targetEntity="Image")
     * @ORM\JoinColumn(name="idAvatar", referencedColumnName="idImage")
     **/
    private $idAvatar;

    public function __construct($nom, $prenom, $password, $email, $idPieceIdentite, $idAvatar)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->password = $password;
        $this->email = $email;
        $this->idPieceIdentite = $idPieceIdentite;
        $this->idAvatar = $idAvatar;
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
    public function setIdUtilisateur($idUtilisateur): void
    {
        $this->idUtilisateur = $idUtilisateur;
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
    public function getPassword()
    {
        return $this->password;
    }

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail( $email ): void {
		$this->email = $email;
	}


    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getIdPieceIdentite()
    {
        return $this->idPieceIdentite;
    }

    /**
     * @param mixed $idPieceIdentite
     */
    public function setIdPieceIdentite($idPieceIdentite): void
    {
        $this->idPieceIdentite = $idPieceIdentite;
    }

    /**
     * @return mixed
     */
    public function getIdAvatar()
    {
        return $this->idAvatar;
    }

    /**
     * @param mixed $idAvatar
     */
    public function setIdAvatar($idAvatar): void
    {
        $this->idAvatar = $idAvatar;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        $format = "User (id: %s, firstname: %s, lastname: %s, password: %s)\n";
        return sprintf($format, $this->idUtilisateur, $this->nom, $this->prenom, $this->password);
    }


}