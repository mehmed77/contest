<?php

/**
 * Created by PhpStorm.
 * User: Muhammad
 * Date: 18.09.2015
 * Time: 20:39
 */
class Login_Model extends Model
{
   function __construct(){
       parent::__construct();
   }
    public function is_losin_img($login){
        $sth = $this->db->prepare("select photo from user where Login = '".$login."'");
        $sth->execute();
        return $sth->fetchAll();
    }
    public function run(){
        $sth = $this->db->prepare("select * from user where Login=:login and Password=:parol");
        $sth->execute(array(
            ':login' => $_POST['login'],
            ':parol' => md5($_POST['parol'])
        ));

        $count = $sth->rowCount();
        for($i=0; $row = $sth->fetch(); $i++){
            $login=$row['Login'];
            $id=$row['UID'];
            $type=$row['type'];
        }

        if ($count > 0) {
            Session::init();
            Session::set('user_id',$id);
            Session::set('login',$login);
            Session::set('loggedIn', true);
            Session::set('type', $type);
            header("location: ".URL);
        } else {
            header("location: ".URL."login");
        }
    }
}