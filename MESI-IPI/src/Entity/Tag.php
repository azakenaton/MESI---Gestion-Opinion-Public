<?php
/**
 * Created by PhpStorm.
 * User: lhyve
 * Date: 27/06/2019
 * Time: 16:34
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tag")
 */
class Tag
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="idTag")
     **/
    private $idTag;

    /**
     * @ORM\Column(type="string", name="nomTag")
     **/
    private $nomTag;

    /**
     * Tag constructor.
     * @param $nomTag
     */
    public function __construct($nomTag)
    {
        $this->nomTag = $nomTag;
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
    public function setIdTag($idTag): void
    {
        $this->idTag = $idTag;
    }

    /**
     * @return mixed
     */
    public function getNomTag()
    {
        return $this->nomTag;
    }

    /**
     * @param mixed $nomTag
     */
    public function setNomTag($nomTag): void
    {
        $this->nomTag = $nomTag;
    }




}