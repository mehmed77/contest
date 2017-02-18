<?php

/**
 * Created by PhpStorm.
 * User: Muhammad
 * Date: 04.09.2015
 * Time: 20:30
 */
class Model
{
   protected $db;
   public function __construct(){
       $this->db = new Database();
   }
}