<?php

/**
 * Created by PhpStorm.
 * User: Muhammad
 * Date: 18.02.2016
 * Time: 22:16
 */
class Monitor_Model extends Model implements MonitorIF
{
    function __construct(){
        parent::__construct();
    }
    public $vars     = array();
    public $problem  = array();
    public $unSolved = 0;
    public $Solved   = 0;
    public $TimeLim  = 0;
    public $count    = 0;
    public $PrCount  = 0;

//    public $beginContest = time("2015-11-26 22:58:07PM");

    public function allResult(){
        for($i = 1; $i < $this->count; $i++){
            for($j = $i + 1; $j <= $this->count; $j++){
                if($this->vars[$i]['accept'] < $this->vars[$j]['accept'] ||
                    ($this->vars[$i]['accept'] == $this->vars[$j]['accept'] &&
                    $this->vars[$i]['tLimit'] > $this->vars[$j]['tLimit']) ||
                    ($this->vars[$i]['accept'] == $this->vars[$j]['accept'] &&
                     $this->vars[$i]['tLimit'] == $this->vars[$j]['tLimit']) &&
                     $this->vars[$i]['unSolved'] > $this->vars[$j]['unSolved']
                ){
                    $tmp = $this->vars[$i];
                    $this->vars[$i] = $this->vars[$j];
                    $this->vars[$j] = $tmp;
                }
            }
        }
        return $this->vars;
    }
    public function getRowCount(){
        return $this->count;
    }

    public function setName($id, $name){
        $this->count++;
        $this->vars[$this->count] =
            array(
                "id"       => $id,
                "name"     => $name,
                "accept"   => $this->Solved,
                "tLimit"   => $this->TimeLim,
                "unSolved" => $this->unSolved,
                "ProbList" => $this->problem
            );
        $this->Solved   = 0;
        $this->TimeLim  = 0;
        $this->PrCount  = 0;
        $this->unSolved = 0;
        $this->problem  = array();
    }

    public function setProblems($problemid, $state, $unSolved, $Sent_Time){
        $this->PrCount++;
        $this->problem[$this->PrCount] =
            array(
                "problemId" => $problemid,
                "state"     => $state,
                "unSolved"  => $unSolved,
                "sentTime"  => $Sent_Time
            );
        $this->TimeLim  += $Sent_Time;
        $this->Solved   += $state;
        $this->unSolved += $unSolved;
    }

    public function setDate($date2){
        $date1 = '2016-02-19 03:00:00';   // contest boshlangan vaqtni shu yerga yozsh kerak;
        $ts1 = strtotime($date1);
        $ts2 = strtotime($date2);
        return $seconds_diff = $ts2 - $ts1;
    }


    function problem_header(){
        $sql = "SELECT ID AS id, Title as title, Problem_name as pname FROM problem ORDER BY Title ASC ";
        $sth = $this->db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }
   // Accepted qilmasdan oldin nechta marta uringani;
    function problemUnsolved($where = false){
        $sql = "select * from task WHERE $where";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->rowCount();
    }

    function sartirovka(){
        //Qatnashayotgan Foydalanuvchilar ro'yxati bilan bog'lanish;
        $sql = "select m.*,u.Name,u.FName from monitor m
                INNER JOIN user as u on m.user_id = u.UID";
        $sth = $this->db->prepare($sql);
        $sth->execute();
        for($i = 0; $row = $sth->fetch(); $i++) {
            $user_id = $row['user_id'];
            $userName = $row['Name']." ".$row['FName'];
            // Masalalar ro'yxati bilan bog'lanish;
            $sth1 = $this->db->prepare("select ID from problem ORDER BY Title ASC");
            $sth1->execute();
            for ($j = 0; $row1 = $sth1->fetch(); $j++) {
                $prob_id = $row1['ID'];
                $task = $this->db->prepare("SELECT UID, Send_Time FROM `task`
                                                WHERE (`User_UID` = '".$user_id."' AND `Problem_ID` = '".$prob_id."' AND `State` = '1')
                                                ORDER BY UID ASC");
                $task->execute();
                if($task->rowCount() > 0){
                    // Demak misol Accept bo'lgan  Endi Shu misolga oldingi urinishlarni tekshiramiz;
                    $id = 0;
                    for($k = 0; $row2 = $task->fetch(); $k++){
                        $id = $row2['UID'];
                        $Sent_Time = $this->setDate($row2['Send_Time']);

                        break;
                    }
                    $accepted = 1;
                    $where = "(User_UID = $user_id AND Problem_ID = '$prob_id' AND UID < $id)";
                    $result = $this->problemUnsolved($where);
                }else{
                    $accepted = 0;
                    $Sent_Time = null;
                    $where = "(User_UID = $user_id AND `Problem_ID` = '".$prob_id."' AND State > 1)";
                    $result = $this->problemUnsolved($where);
                }
                $this->setProblems($prob_id, $accepted, $result, $Sent_Time);
            }
            $this->setName($user_id,$userName);
        }
    return null;
    }
}