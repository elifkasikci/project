<?php
/**
 * Created by PhpStorm.
 * User: efe
 * Date: 11/28/14
 * Time: 3:38 PM
 */

namespace Hangman\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="games")
 */

class Games{
    /**
     * @ORM\Id
     * @ORM\Column (name="id",type="integer")
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="games_id_seq", initialValue=1,)
     */
    public $id;

    /**
     * @ORM\Column (name="name",type="string",length=50 , nullable = true)
     */

    public $name;

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
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

}