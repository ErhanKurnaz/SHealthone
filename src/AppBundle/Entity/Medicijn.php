<?php
/**
 * Created by PhpStorm.
 * User: 302567762
 * Date: 14-11-2018
 * Time: 09:12
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="medicijnen")
 */
class Medicijn
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", unique=true)
     * @Assert\NotBlank(message="vul een naam in")
     */
    private $naam;
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="vul een werking in")
     */
    private $werking;
    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="vul een bijwerking in")
     */
    private $bijwerking;

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
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */


    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * @param mixed $naam
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;
    }

    /**
     * @return mixed
     */
    public function getWerking()
    {
        return $this->werking;
    }

    /**
     * @param mixed $werking
     */
    public function setWerking($werking)
    {
        $this->werking = $werking;
    }

    /**
     * @return mixed
     */
    public function getBijwerking()
    {
        return $this->bijwerking;
    }

    /**
     * @param mixed $bijwerking
     */
    public function setBijwerking($bijwerking)
    {
        $this->bijwerking = $bijwerking;
    }

    public function __toString(){
        return $this->naam;
    }


}