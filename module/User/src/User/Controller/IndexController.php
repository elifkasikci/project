<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace User\Controller;

use User\Entity\GameUser;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{


    public function __construct(){
        session_start();
    }

    public function indexAction(){

        if($_SESSION['id'] != null){

            return new ViewModel(array('status'=>true));
        }
        else{

            return new ViewModel(array('status'=>false));
        }

    }

    public function loginAction(){

        if($_SESSION['id'] != null){
            return $this->redirect()->toUrl('http://rdcproject/user/index');
        }

        $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $memberRepository = $entityManager->getRepository('\User\Entity\GameUser');

        $login = $memberRepository->findBy(array('email'=>$_POST['email_form'],'password'=>$_POST['password_form']));

        if(empty($login)){
            return new ViewModel(array('status' => false));

        }
        else{
            $_SESSION['id'] = $login[0]->getId();
            $_SESSION['email'] = $login[0]->getEmail();
            return new ViewModel(array('status' => true));
        }
    }

    public function addAction(){

        if($_POST['username'] && $_POST['email'] && $_POST['password']){

            $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

            $userAdd = new GameUser();
            $userAdd->setUsername($_POST['username']);
            $userAdd->setPassword($_POST['password']);
            $userAdd->setEmail($_POST['email']);

            $entityManager->persist($userAdd);
            $entityManager->flush();

        return new ViewModel(array('status' => true));
        }
        else {
            return new ViewModel(array('status' => false));
        }
    }

    public function logoutAction(){
        session_destroy();
        return $this->redirect()->toUrl('http://rdcproject/user/index');
    }

}