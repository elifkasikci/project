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
 * @ORM\Table(name="userword")
 */
class UserWord{

    /**
     * @ORM\Id
     * @ORM\Column (name="id",type="integer")
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="userword_id_seq", initialValue=1, )
     */
    public $id;

    /**
     * @ORM\Column (name="userId",type="integer")
     */

    public $userId;

    /**
     * @ORM\Column (name="wordId",type="integer")
     */

    public $wordId;

    /**
     * @ORM\Column (name="currentword",type="string",length=50 , nullable = true)
     */

    public $currentword;

    /**
     * @param mixed $currentword
     */
    public function setCurrentword($currentword)
    {
        $this->currentword = $currentword;
    }

    /**
     * @return mixed
     */
    public function getCurrentword()
    {
        return $this->currentword;
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
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $wordId
     */
    public function setWordId($wordId)
    {
        $this->wordId = $wordId;
    }

    /**
     * @return mixed
     */
    public function getWordId()
    {
        return $this->wordId;
    }


}