<?php
/**
 * Created by PhpStorm.
 * User: kooler62
 * Date: 24.06.17
 * Time: 12:11
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", unique=true)
     */
    private $email;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $password;
    private $plainPassword;

    /**
     * @ORM\Column(type="json_array")
     */
    private $roles = [];

    public function getUsername()
    {
        return $this->email;

    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getRoles()
    {
        $roles=$this->roles;
            if (!in_array('ROLE_USER',$roles)){
                $roles[] = 'ROLE_USER';
            }
        return $roles;
    }

    public function setRoles($roles)
    {
        $this->roles = $roles;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }


    public function getPlainPassword()
    {
        return $this->plainPassword;
    }


    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
        $this->password=null;
    }

    public function getSalt()
    {
      //  return crypt($this->password);

    }



    public function eraseCredentials()
    {
        $this->plainPassword=null;
    }

}