<?php

/**
 * Created by PhpStorm.
 * User: Muhammad
 * Date: 18.02.2016
 * Time: 18:24
 */

class Submit extends Controller
{
   function __construct(){
       parent::__construct();
       Session::init();
       Session::set('title',"Jo'natish");
       if(!Session::get('loggedIn')){
           header('location: '.URL."login");
       }
   }

    public function index(){
        $this->view->selected = null;
        $this->view->problems_list = $this->model->problems_list();
        $this->view->render("problem/submit1");
    }

    public function problem($arg=false){
        $this->view->selected = $this->model->selected($arg);
        $this->view->problems_list = $this->model->problems_list();
        $this->view->render("problem/submit1");
    }
    public function source(){
        $this->model->source(Session::get('user_id'));
    }

}