<?php

/**
 * Created by PhpStorm.
 * User: Muhammad
 * Date: 12.09.2015
 * Time: 16:14
 */
class Problemset extends Controller{

    function __construct(){
        Session::init();
        if(!Session::get('loggedIn')){
            header("location: ".URL."login");
        }
        parent::__construct();
    }
    function index(){
        $this->view->problems_list = $this->model->problem_list();
        $this->view->userdata = $this->model->userdata(Session::get('user_id'));
        $this->view->render("problem/index");
        return false;
    }

    function problem($arg=false){
        $this->view->problem_one=$this->model->problem_one($arg);
        if($this->view->problem_one!=null){
            $this->view->render("problem/problem");
        }else{
            $this->error("Bunday masala mavjud emas!!!");
        }
    }

    public function result_one($prob_id)
    {
        if($this->model->is_result($prob_id)) {
            $this->view->result = $this->model->result_one($prob_id);
            $this->view->render1("problem/result");
        } else{
            print "Bunday yechimni ko'rishingiz uchun huquq yo'q";
        }
    }
    

    function error($msg=false){
        require 'controllers/error.php';
        $error = new Error();
        $error->index($msg);
        return false;
    }
}