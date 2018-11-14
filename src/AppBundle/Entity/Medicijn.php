<?php
/**
 * Created by PhpStorm.
 * User: 302567762
 * Date: 14-11-2018
 * Time: 09:12
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="string")
     */
    private $naam;
    /**
     * @ORM\Column(type="string")
     */
    private $werking;
    /**
     * @ORM\Column(type="string")
     */
    private $bijwerking;
}