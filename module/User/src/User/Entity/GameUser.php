<?php
/**
 * Created by PhpStorm.
 * User: efe
 * Date: 12/5/14
 * Time: 9:54 AM
 */

namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="gameuser")
 */
class GameUser{

    /**
     * @ORM\Id
     * @ORM\Column (name="id",type="integer")
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="gameuser_id_seq", initialValue=1, )
     */
    public $id;

    /**
     * @ORM\Column (name="username",type="string",length=50)
     */

    public $username;

    /**
     * @ORM\Column (name="password",type="string",length=50 ,unique = true, nullable = true)
     */

    public $password;

    /**
     * @ORM\Column (name="email",type="string",length=50 ,unique = true, nullable = true)
     */
    public $email;

    /**
     * @ORM\Column (name="createdon",type="datetime", nullable = false)
     */
    public $createdon;

    /**
     * @ORM\Column (name="lastlogindate",type="datetime", nullable = false)
     */
    public $lastlogindate;

    /**
     * @param mixed $createdon
     */
    public function setCreatedon($createdon)
    {
        $this->createdon = $createdon;
    }

    /**
     * @return mixed
     */
    public function getCreatedon()
    {
        return $this->createdon;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $lastlogindate
     */
    public function setLastlogindate($lastlogindate)
    {
        $this->lastlogindate = $lastlogindate;
    }

    /**
     * @return mixed
     */
    public function getLastlogindate()
    {
        return $this->lastlogindate;
    }


    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

}