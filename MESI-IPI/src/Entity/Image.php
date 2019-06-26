<?php
/**
 * Created by PhpStorm.
 * User: lhyve
 * Date: 26/06/2019
 * Time: 16:09
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="image")
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\OneToOne(targetEntity="Image::class")
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
     * Image constructor.
     * @param $idImage
     * @param $refImg
     * @param $nomImg
     */
    public function __construct($refImg, $nomImg)
    {
        $this->refImg = $refImg;
        $this->nomImg = $nomImg;
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




}