<?php

/**
 * Created by PhpStorm.
 * User: Muhammad
 * Date: 19.09.2015
 * Time: 22:11
 */
class Registration_Model extends Model
{
    function __construct()
    {
        Session::init();
        if (Session::get('loggedIn')) {
            header("location: " . URL);
            exit(0);
        }
        parent::__construct();
    }

    function createAccount()
    {
        $sth = $this->db->prepare("select * from user where
                    Login=:login");
        $sth->execute(array(
            ':login' => $_POST['login']
        ));
        $count = $sth->rowCount();
        if ($count > 0) {
            header("location: " . URL . "registration");
            exit(0);
        } else {
            $fname = str_replace("'", "`", $_POST['FName']);
            $lname = str_replace("'", "`", $_POST['LName']);
            $login = str_replace("'", "`", $_POST['login']);
            $parol = str_replace("'", "`", $_POST['parol']);

            if($fname == null || $lname || null || $login == null || $parol == null ||
               $fname == "" || $lname == "" || $login == "" || $parol == "") {
                header("location: " . URL . "registration");
                exit(0);
            }

            $month = $_POST['month'];
            $date = $_POST['date'];
            $year = $_POST['year'];
            $gender = $_POST['gender'];
            $parol = MD5($parol);
            date_default_timezone_set('Asia/Tashkent');
            $time = date("Y-m-d");
            $sql = "INSERT INTO `user` (
                `type`,`Login`,`Password`,`Name`,`FName`,
                `BDate`,`pol`,`RegisterData`)
                VALUES ('2','" . $login . "', '" . $parol . "',
                '" . $lname . "','" . $fname . "','" . $year . "-" . $month . "-" . $date . "',
                '" . $gender . "','" . $time . "')";
            $sth = $this->db->prepare($sql);
            $f = $sth->execute();
            if ($f == true) {
                $sth1 = $this->db->prepare("select * from user where
                    Login=:login");
                $sth1->execute(array(
                    ':login' => $_POST['login']
                ));
                for ($i = 0; $row = $sth1->fetch(); $i++) {
                    $id = $row['UID'];
                }
                $sql1 = "INSERT INTO `userdata` (`UID`, `UserUID`) VALUES (NULL, '" . $id . "');";
                $sth2 = $this->db->prepare($sql1);
                $f1 = $sth2->execute();
            }
            if ($f && $f1) {
                header("location: " . URL . "login");
                exit(0);
            } else {
                header("location: " . URL . "registration");
                exit(0);
            }
        }
    }
}