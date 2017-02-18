<?php
/**
 * Created by PhpStorm.
 * User: Muhammad
 * Date: 19.02.2016
 * Time: 1:51
 */

interface MonitorIF {
    public function setName($id, $name);

    public function setProblems($problemID,$state,$unSolved,$Sent_Time);

    public function setDate($date);
}