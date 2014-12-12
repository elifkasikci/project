<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Hangman\Controller;

use Hangman\Entity\Score;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\View;
use Zend\Session\Container;

class IndexController extends AbstractActionController
{

    public function __construct(){
        session_start();
    }

    public function indexAction(){
        return new ViewModel();
    }


    public function getRandomWordAction(){
        $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $wordRepository = $entityManager->getRepository('Hangman\Entity\DictionarySorted');


        $query = $entityManager->createQuery('SELECT COUNT(u.count) FROM Hangman\Entity\DictionarySorted u WHERE u.count = 7');
        $count = $query->getSingleScalarResult();
        $randomNum = rand(0,$count);

        $data = $wordRepository->findBy(array('count'=>7),null,1,$randomNum);

        $word = $data[0]->getWord();
        $word_sesion = new Container('word');
        $word_sesion->curWord = $word;

        $wordCount = $data[0]->getCount();

        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent($wordCount);

        return $response;
    }

    public function record(){

        $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $wordRepository = $entityManager->getRepository('Hangman\Entity\Score');

        $us = $wordRepository->findOneBy(array('userId'=>$_SESSION['id']));

        if($us){
            $userScore = $us->getScore();
            return $userScore;
        }

//        else{  //oyun oynanmadıysa kayıt açılmaz.
//            $createScore = new Score();
//            $createScore->setUserId($_SESSION['id']);
//            $createScore->setGameId(1);
//            $createScore->setScore(0);
//
//            $entityManager->persist($createScore);
//            $entityManager->flush();
//
//            return 0;
//        }
    }

    public function checkAction(){

        $choosenLetter = $this->getRequest()->getPost('letter');

        $word_sesion = new Container('word');
        $answer = $word_sesion->curWord;

        for($i = 0; $i < strlen($answer);$i++){
            if($answer[$i] == $choosenLetter){

            }
        }

    }

}
