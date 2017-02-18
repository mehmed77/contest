<?php

class Index_Model extends Model
{
   function __construct(){
       parent::__construct();
       Session::init();
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

}