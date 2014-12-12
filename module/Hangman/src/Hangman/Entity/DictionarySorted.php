<?php

namespace Hangman\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="dictionarysorted")
 */
class DictionarySorted{

    /**
     * @ORM\Id
     * @ORM\Column (name="id",type="integer")
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dictionarysorted_id_seq", initialValue=1, )
     */
    public $id;

    /**
     * @ORM\Column(type="string")
     */
    public $word;

    /**
     * @ORM\Column(type="integer")
     */
    public $count;

    /**
     * @param mixed $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
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
     * @param mixed $word
     */
    public function setWord($word)
    {
        $this->word = $word;
    }

    /**
     * @return mixed
     */
    public function getWord()
    {
        return $this->word;
    }
}