<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace User\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use User\Model\User as User;
use Zend\Mvc\Controller\Plugin\Forward;

class IndexController extends AbstractActionController
{
    public function __construct(){

        session_start();

    }
    public function indexAction()
    {
        if($_SESSION['id'] != null){

            return new ViewModel(array('status'=>true));
        }
        else{
            return new ViewModel(array('status'=>false));
        }

    }

    public function loginAction()
    {
        $viewData = Array();

        $information = Array();
        $information['email'] = $_POST['email_form'];
        $information['password'] = $_POST['password_form'];

        $userModel = new User();
        $result = $userModel->checkUser($information);


        if ($result == true) {

            $viewData['login'] = true;
            $viewData['data'] = $result;

            $_SESSION['id'] = $result[0]['id'];
            return new ViewModel(array('view' => $viewData));

        } elseif($result == false) {
            echo"Wrong Username/Password";


            return $this-> forward('page-not-found', 'error');
        }

    }

    public function showAction()
    {
        $userModel = new User();
        $result = $userModel->getUser($_SESSION['id']);
        return new ViewModel(array('user' => $result[0]));


    }


    public function updateAction(){

        $viewModel = new ViewModel();
        $userModel = new User();
        $result = $userModel->update($this->getRequest()->getPost());




        $viewModel->setVariables(array('result' => true))->setTerminal(true);

        return $viewModel;

    }


}