<?php
/**
 * Created by PhpStorm.
 * User: lhyve
 * Date: 26/06/2019
 * Time: 16:09
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="Image")
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="idImage")
     **/
    private $idImage;

    /**
     * @ORM\Column(type="string", name="refImg", options={"default":NULL})
     **/
    private $refImg;

    /**
     * @ORM\Column(type="string", name="nomImg")
     **/
    private $nomImg;

	/**
	 * @Assert\Image
	 */
	private $imageFile;

    /**
     * Image constructor.
     * @param $image UploadedFile
     * @param $repertory string
     */
    public function __construct(UploadedFile $image, string $repertory)
    {
        $this->refImg    = '';
        $this->imageFile = $image;
        $this->nomImg    = $repertory . '_' . substr($image->getFilename(), max(strlen($image->getFilename()), 12)) . '_' . time() . '.' . $image->guessExtension();
    }

    /**
     * @return mixed
     */
    public function getIdImage()
    {
        return $this->idImage;
    }

    /**
     * @param mixed $idImage
     */
    public function setIdImage($idImage): void
    {
        $this->idImage = $idImage;
    }

    /**
     * @return mixed
     */
    public function getRefImg()
    {
        return $this->refImg;
    }

    /**
     * @param mixed $refImg
     */
    public function setRefImg($refImg): void
    {
        $this->refImg = $refImg;
    }

    /**
     * @return mixed
     */
    public function getNomImg()
    {
        return $this->nomImg;
    }

    /**
     * @param mixed $nomImg
     */
    public function setNomImg($nomImg): void
    {
        $this->nomImg = $nomImg;
    }

	/**
	 * @return mixed
	 */
	public function getFile() {
		return $this->imageFile;
	}

}