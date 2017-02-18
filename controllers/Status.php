<?php

/**
 * Created by PhpStorm.
 * User: Muhammad
 * Date: 18.02.2016
 * Time: 19:20
 */
class Status extends Controller
{
  function __construct(){
      parent::__construct();
      Session::init();
      Session::set('title',"Holat");
      if(!Session::get('loggedIn')){
          header('location: '.URL."login");
      }
  }

    function index(){
        $this->view->status_list=$this->model->status_list();
        $this->view->result = 1;
        $this->view->render("status/index");
    }

    function my($arg = false){
        if ($arg=="" || !is_numeric($arg) || $arg < 1){
            $arg = 1;
        }
        $this->view->status_list=$this->model->my_status_list($arg,Session::get('user_id'));
        if($this->view->status_list==null){
            $this->error("Bunday sahifa mavjud emas!!!");
            return false;
        }
        $this->view->result = $arg <= 0 ? 1 : $arg;
        $this->view->render("status/index1");
    }

    function page($arg=false){
        if ($arg=="" || !is_numeric($arg) || $arg < 1){
            $arg = 1;
        }
        $this->view->status_list=$this->model->status_list($arg);
        if($this->view->status_list==null){
            $this->error("Bunday sahifa mavjud emas!!!");
            return false;
        }
        $this->view->result = $arg <= 0 ? 1 : $arg;
        $this->view->render("status/index");
    }

    function result($arg=false){
        $this->view->result = $this->model->status_one($arg);
        $this->view->render1("status/result");
        return false;
    }

    function error($msg){
        require 'controllers/error.php';
        $controller=new Error();
        $controller->index($msg);
        return false;
    }

}