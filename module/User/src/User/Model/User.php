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
        $this->_connection = pg_connect("host=localhost dbname=postgres port=5432 user=postgres password=123");

    }


    public function checkUser($data) {

       $result=pg_query($this->_connection,"select * from members where email='".$data['email']."' and password='".$data['password']."'");
       $result = pg_fetch_all($result);

       return $result;

    }


    public function getUser($id){
        $result=pg_query($this->_connection,"select * from members where id='".$id."' ");
        $result = pg_fetch_all($result);
        return $result;
    }

    public function update($post){


        $sql = "UPDATE members SET ";

        $index = 0;
        $post_numbers = count($post);

        foreach ($post as $key => $value) {
            $index++;
            if($value) {

                if($index == $post_numbers) {
                    $sql .= $key."='".$value."'";
                }else{
                    $sql .= $key."='".$value."',";
                }

            }

        }

        $sql .= " where id = ".$_SESSION['id'];
        $result=pg_query($this->_connection,$sql);
        echo $sql;


    }
 

}
