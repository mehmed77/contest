<?php

/**
 * Created by PhpStorm.
 * User: Muhammad
 * Date: 18.02.2016
 * Time: 19:28
 */
class Status_Model extends Model
{
  function __construct(){
      parent::__construct();
  }
    public function status_list($arg=false) {
        if($arg!="" && is_numeric($arg) && $arg > 0){
            $next = ($arg - 1) * 20;
        }else{
            $next = 0;
        }
        $sth = $this->db->prepare("SELECT t.UID as uid, t.State as state, t.TestCase as testcase,
                                    t.Send_Time as send_time, u.Login as login, t.Problem_ID as problem_id,
                                    t.Lang_ID as lang_id, p.Problem_name as problem_name
                                    FROM  task t
                                    inner join user as u on t.User_UID=u.UID
                                    inner join problem as p on t.Problem_ID=p.ID
                                    ORDER BY  `t`.`UID` DESC
                                    LIMIT $next , 20
                                    ");
        $sth->execute();
        return $sth->fetchAll();
    }
    public function my_status_list($arg=false, $user_id = false) {
        if($arg!="" && is_numeric($arg) && $arg > 0){
            $next = ($arg - 1) * 20;
        }else{
            $next = 0;
        }
        $sth = $this->db->prepare("SELECT t.UID as uid, t.State as state, t.TestCase as testcase,
                                    t.Send_Time as send_time, u.Login as login, t.Problem_ID as problem_id,
                                    t.Lang_ID as lang_id, p.Problem_name as problem_name
                                    FROM  task t
                                    inner join user as u on t.User_UID=u.UID
                                    inner join problem as p on t.Problem_ID=p.ID
                                    WHERE t.User_UID = $user_id
                                    ORDER BY  `t`.`UID` DESC
                                    LIMIT $next , 20
                                    ");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function status_one($arg=false){
        $sth = $this->db->prepare("SELECT * FROM task where UID = $arg");
        $sth->execute();
        return $sth->fetchAll();
    }
}