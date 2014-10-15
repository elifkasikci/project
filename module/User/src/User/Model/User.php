<?php
/**
 * Created by PhpStorm.
 * User: ilknur
 * Date: 10/9/14
 * Time: 3:10 PM
 */

namespace User\Model;


class User {

    private $_connection;

     public function __construct(){
        $this->_connection = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=1234");
//        $result=pg_query($connection,"select* from members ");
//
//        $members=array();
//
//        session_start();
//        $id=$list["id"];
//
//        $email=$list["email"];
//        $_SESSION['email']=$email;
//
//        $password=$list["password"];
//        $_SESSION['password']=$password;
//
//        $birthday=$list['birthday'];
//
//
//        $members[]=array("id"=>$id ,"email"=>$email,"password"=>$password,'birthday'=>$birthday);
//
//
//        return $result;
    }


    public function checkUser($data) {
       $user= $_SESSION['user'] ;

        $result=pg_query($this->_connection,"select * from members where email='$user' ");
        $result = pg_fetch_all($result);
        return $result;


    }


    public function listAllUsers(){
        $user= $_SESSION['user'] ;
        $result=pg_query($this->_connection,"select * from members where id=1 ");
        $result = pg_fetch_all($result);
        return $result;

    }

}