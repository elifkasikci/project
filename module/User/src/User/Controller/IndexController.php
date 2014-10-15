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


class IndexController extends AbstractActionController
{
    public function indexAction()
    {

        $viewData = Array();

        if($_SERVER['REQUEST_METHOD'] == "GET"){
//            $userModel = new User();
//            $result = $userModel->listAllUsers();
//            $viewData['type'] = "list";
//            $viewData['data'] = $result;
//            return new ViewModel(array('view' => $viewData));
        }else{
        $information = Array();
        $information['user'] = $_POST['email_form'];
        $_SESSION['user']=$information['user'];
        $information['password']= $_POST['password_form'];

            $userModel = new User();
            $result = $userModel->checkUser($information);
            $viewData['type'] = "list";
            $viewData['data'] = $result;
            return new ViewModel(array('view' => $viewData));



        }
   //if condition



    }





}
