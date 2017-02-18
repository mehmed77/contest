<?php

/**
 * Created by PhpStorm.
 * User: Muhammad
 * Date: 18.02.2016
 * Time: 22:11
 */
class Monitor extends Controller
{
  function __construct(){
      Session::init();
      Session::set('title',"Monitor");
      if(!Session::get('loggedIn')){
          header("location: ".URL."login");
      }
      parent::__construct();
  }
  public function index(){
      $this->model->sartirovka();
      $this->view->header = $this->model->problem_header();
      $this->view->getRowCount = $this->model->getRowCount();
      $this->view->allResult = $this->model->allResult();

//      print_r($this->view->allResult);

      $this->view->render("status/monitor");
  }
}