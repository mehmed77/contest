<?php
/**
 * Created by PhpStorm.
 * User: Muhammad
 * Date: 04.09.2015
 * Time: 20:30
 */
class Database extends PDO
{
   public function __construct(){
       parent::__construct('mysql:host='.server.';dbname='.dbname.'', ''.user.'', ''.password.'');
   }
}