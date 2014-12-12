<?php
/**
 * Created by PhpStorm.
 * User: efe
 * Date: 11/28/14
 * Time: 3:36 PM
 */

namespace Hangman\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="score")
 */

class Score{

    /**
     * @ORM\Id
     * @ORM\Column (name="id",type="integer")
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="score_id_seq", initialValue=1,)
     */
    public $id;

    /**
     * @ORM\Column (name="userId",type="integer", unique = true)
     */

    public $userId;

    /**
     * @ORM\Column (name="gameId",type="integer", unique = true)
     */

    public $gameId;

    /**
     * @ORM\Column (name="score",type="integer", nullable = true)
     */

    public $score;

    /**
     * @param mixed $gameId
     */
    public function setGameId($gameId)
    {
        $this->gameId = $gameId;
    }

    /**
     * @return mixed
     */
    public function getGameId()
    {
        return $this->gameId;
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
     * @param mixed $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
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




}