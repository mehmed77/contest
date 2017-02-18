<?php

class Index extends Controller
{
    public function __construct(){
        parent::__construct();
        Session::init();
        Session::set('title',"Masalalar");
        if(!Session::get('loggedIn')){
            header('location: '.URL."login");
        }
    }
    public function index(){
        $this->view->problems_list = $this->model->problem_list();
        $this->view->userdata = $this->model->userdata(Session::get('user_id'));
        $this->view->render("index/index");
        return false;
    }
}

