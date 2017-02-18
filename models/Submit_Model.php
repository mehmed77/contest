<?php

/**
 * Created by PhpStorm.
 * User: Muhammad
 * Date: 18.02.2016
 * Time: 18:24
 */
class Submit_Model extends Model
{
   function __construct(){
       parent::__construct();
   }
   public function problems_list(){
        $sql = "SELECT p.ID as id, p.Problem_name as pname, p.Title as title FROM problem AS p
                ORDER BY p.Title ASC";
       $sth = $this->db->prepare($sql);
       $sth->execute();
       return $sth->fetchAll();
   }
    public function selected($arg = false){
        $sql = "SELECT * FROM problem WHERE ID = '$arg'";
        $sth = $this->db->prepare($sql);
        $sth->execute();
        return $sth->rowCount() ? $arg : null;
    }

    public function source($id = false){
        $problem_id     = $_POST['problemid'];
        $problem_lang   = $_POST['language'];
        $problem_source = $_POST['source'];

        if(strstr($problem_source, "shutdown") || strstr($problem_source, "-s -t") ||
            strstr($problem_source, "-r -t") || strstr($problem_source, "pause") ||
            strstr($problem_source, "system(")){
            return error_get_last();
        }
        date_default_timezone_set('Asia/Tashkent');
        $time = date("Y-m-d G:i:s");

        $sql="INSERT INTO `task` (`Problem_ID`,
            `Lang_ID`, `Source`, `FileName`,`User_UID`, `State`, `Send_Time`,`IP`)
            VALUES ('" . $problem_id. "','" . $problem_lang . "','" . $problem_source . "',
            'main','" . $id . "','-2','" . $time . "','" . $_SERVER['REMOTE_ADDR'] . "')";
        $sth = $this->db->prepare($sql);
        $sth->execute();

        $sth1 = $this->db->prepare("INSERT INTO `monitor` (`id` ,`user_id`) VALUES (NULL , '$id') WHERE user_id <> $id");
        $sth1->execute();
        header("location: ".URL."status/my");
    }
}