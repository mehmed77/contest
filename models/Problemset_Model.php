<?php

/**
 * Created by PhpStorm.
 * User: Muhammad
 * Date: 12.09.2015
 * Time: 16:16
 */
class Problemset_Model extends Model {
    function __construct(){
        parent::__construct();
        Session::init();
        if(!Session::get('loggedIn')) {
            header("location: ".URL);
            exit(0);
        }
        $this->user_id = Session::get('user_id');
    }
//  Bunday id li yechim sessiondagi userga tegishlimi;
    public function is_result($result_id)
    {
        $sth = $this->db->prepare("select UID from task where UID = $result_id && User_UID = $this->user_id");
        $sth->execute();
        $count = $sth->rowCount();
        return $count > 0 ? true : false;
    }
//  bitta natijani chop qilish
    public function result_one($result_id)
    {
        $sth = $this->db->prepare("select Source from task where UID = $result_id && User_UID = $this->user_id");
        $sth->execute();
        return $sth->fetchAll();
    }
    public function problem_list(){
        $sql = "SELECT p.ID as id, p.Problem_name as pname, p.Title as title, m.mav_name as mname,
                p.TimeLimit as tlimit , p.MemoryLimit as mlimit, pd.Accepted as accepted
                FROM  problem p
                left join mavzu as m on p.mavzu=m.id
                left join problemdata as pd on p.ID=pd.ProblemID
                ORDER BY  p.`Title` ASC";
        $sth = $this->db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function userdata($arg=false){
        $sth = "select u.SolvedData as solved, u.UnsolvedData as unsolved from `userdata` u where UserUID = $arg";
        $sth = $this->db->prepare($sth);
        $sth->execute();
        return $sth->fetchAll();
    }

    // Userning jami ishlagan va ishlay olmagan  masalalar ro'yxati;
    public function accepted($arg){
        $sql = "select ud.SolvedData as solveddata, ud.UnsolvedData as unsolveddata
                from user u
                inner join userdata as ud on u.UID = ud.UserUID
                where u.Login = '$arg'
                ";
        $sth = $this->db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }
    // Shunday aydili masala bormi tekshiramiz;
    public function is_problem($arg){
        $sth = $this->db->prepare("select ID from problem where ID = '$arg'");
        $sth->execute();
        $count = $sth->rowCount();
        return $count > 0 ? true : false;
    }
    // Bitta masalani ochib berish funksiyasi;
    public function problem_one($arg = false){
        if(!$this->is_problem($arg)){
            return null;
        }
        $sth = $this->db->prepare("select * from problem where ID = '$arg'");
        $sth->execute();
        return $sth->fetchAll();
    }


    // Masalalar ro'yxati agar masala id bilan kelsa shu masalani aks holda masalalar ro'yxatini chop qiladi;
    public function problems_list($arg = false){
        if($this->lang == 2){
            $lang = "_ru";
        }elseif($this->lang == 1){
            $lang = "_en";
        }else{
            $lang = "_uz";
        }
        $first = ($arg - 1) * 20;

        $sql = "select p.ID as p_id, p.Problem_name".$lang." as p_name,
                p.TimeLimit as time, p.MemoryLimit as memory, m.mav_name".$lang." as mav_name,
                pd.Accepted as accepted
                from problem p
                inner join mavzu as m on m.id = p.mavzu
                inner join problemdata as pd on pd.ProblemID = p.ID
                ORDER BY p.ID ASC
                LIMIT ".$first.", 20";
        $sth = $this->db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function status_list($arg = false){
        if($this->lang == 2){
            $lang = "_ru";
        }elseif($this->lang == 1){
            $lang = "_en";
        }else{
            $lang = "_uz";
        }
        $first = ($arg - 1) * 20;
        $sth = $this->db->prepare("SELECT t.UID as uid, t.State as state, t.TestCase as testcase,
                                    t.Send_Time as send_time, u.Login as login, t.Problem_ID as problem_id,
                                    t.Lang_ID as lang_id, p.Problem_name".$lang." as problem_name
                                    FROM  task t
                                    inner join user as u on t.User_UID=u.UID
                                    inner join problem as p on t.Problem_ID=p.ID
                                    ORDER BY  `t`.`Send_Time` DESC
                                    LIMIT $first , 20
                                    ");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function submit($arg=false){
        if($this->lang == 2){
            $lang = "_ru";
        }elseif($this->lang == 1){
            $lang = "_en";
        }else{
            $lang = "_uz";
        }
        $sth = $this->db->prepare("select ID as id, Problem_name".$lang." as problem_name from problem  where ID='".$arg."'");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function standings_list($arg){
        if($this->lang == 2){
            $lang = "_ru";
        }elseif($this->lang == 1){
            $lang = "_en";
        }else{
            $lang = "_uz";
        }
        $first = ($arg - 1) * 20;
        $sth = $this->db->prepare("SELECT ud.Solved as solved, ud.Sent as sent,
                                   ur.Login as login, ur.Name as name, ur.FName as fname, ud.UserUID as uid
                                   FROM  userdata ud
                                   inner join user as ur on ud.UserUID = ur.UID
                                   ORDER BY `Solved` DESC, `Sent`,`Wrong` ASC
                                   LIMIT $first, 20
                                  ");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function solved($arg=false, $page = false){
        if(!$this->is_problem($arg)){
            return null;
        }
        if($page == null || !is_numeric($page)){
            $page = 1;
        }
        if($this->lang == 2){
            $lang = "_ru";
        }elseif($this->lang == 1){
            $lang = "_en";
        }else{
            $lang = "_uz";
        }
        $first = ($page - 1) * 20;
        $sth = "SELECT t.UID as uid, t.State as state, t.TestCase as testcase,
                t.Send_Time as send_time, u.Login as login, t.Problem_ID as problem_id,
                t.Lang_ID as lang_id, p.Problem_name".$lang." as problem_name
                FROM  task t
                inner join user as u on t.User_UID=u.UID
                inner join problem as p on t.Problem_ID=p.ID
                WHERE t.Problem_ID = '".$arg."' and t.State = 1
                ORDER BY  `t`.`Send_Time` DESC
                LIMIT $first , 20";
        $sth = $this->db->prepare($sth);
        $sth->execute();
        return $sth->fetchAll();
    }


    public function task_for_result_in_status($id){
        $user = Session::get('user_id');
        $sth = $this->db->prepare("select * from task where UID = $id and User_UID = $user");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function form_open_code($id){
        if($this->lang == 2){
            $lang = "_ru";
        }elseif($this->lang == 1){
            $lang = "_en";
        }else{
            $lang = "_uz";
        }
        $sth = $this->db->prepare("
                SELECT t.UID as task_id, t.Lang_ID, t.Problem_ID, t.State, t.TestCase,
                p.Problem_name".$lang." as problem_name, t.Send_Time, u.Login FROM `task` t
                left join user u on u.UID = t.User_UID
                left join problem p on p.ID = t.Problem_ID
                WHERE t.UID = $id");
        $sth->execute();
        return $sth->fetchAll();
    }
}