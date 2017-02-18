<?php

/**
 * Created by PhpStorm.
 * User: Muhammad
 * Date: 04.09.2015
 * Time: 20:30
 */
class Session
{
    public function init(){
       @session_start();
    }
    public function set($key, $value){
        $_SESSION[$key] = $value;
    }
    public function get($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }
    public function destroy(){
        session_destroy();
    }
}