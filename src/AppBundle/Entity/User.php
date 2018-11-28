<?php
/**
 * Created by PhpStorm.
 * User: 302567762
 * Date: 28-11-2018
 * Time: 14:41
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository");
 * @ORM\Table(name="users")
 */
class User implements UserInterface,\Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $passwords;

    /**
     * @ORM\Column(type="json_array")
     */
    private $roles = array();
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->passwords
        ));
    }

    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->username,
            $this->passwords,
            ) = unserialize($serialized);
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function setRoles(array $roles)
    {
        $this->roles = $roles;
        return $this;
    }

    public function getPassword()
    {
        return $this->passwords;
    }

    public function setPasswords($passwords)
    {
        $this->passwords = $passwords;
    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function eraseCredentials()
    {

    }

}