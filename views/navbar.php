<?php
   Session::init();
   $title = Session::get('title');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <script src="<?php print URL?>public/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php print URL?>public/js/bootstrap.js" type="text/javascript"></script>
    <script src="<?php print URL?>public/js/myjquery.js" type="text/javascript"></script>
    <link type="text/css" rel="stylesheet" href="<?php print URL?>public/bootstrap/css/bootstrap-theme.min.css" >
    <link type="text/css" media="screen" rel="stylesheet" href="<?php print URL?>public/bootstrap/css/bootstrap.css" >
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <link rel="shortcut icon" href="<?php print URL;?>public/img/favicon.png" type="image/png">
    <title><?php print $title; ?> - Olimpiada</title>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top" style="background: #286090">
<div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php print URL; ?>" style="COLOR: #ffffff">Online Contest</a>
        <button class="navbar-toggle" type="button" data-target="#menu1" data-toggle="collapse" >
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse"   id="menu1">
        <ul class="nav navbar-nav">
            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
            <li>
                <a  style="COLOR: #ffffff" href="<?php print URL ?>"><span class="glyphicon glyphicon-tasks"></span> Masalalar &nbsp;&nbsp;&nbsp;</a>
            </li>
            <li class=""><a href="<?php print URL ?>submit" style="COLOR: #ffffff"><span class="glyphicon glyphicon-send"></span> Jo'natish &nbsp;&nbsp;&nbsp;</a></li>
            <li class=""><a href="<?php print URL ?>status" style="COLOR: #ffffff"><span class="glyphicon glyphicon-stats"></span> Holat &nbsp;&nbsp;&nbsp;</a></li>
            <li class=""><a href="<?php print URL ?>status/my" style="COLOR: #ffffff"><span class="glyphicon glyphicon-bookmark"></span> Mening Holatim &nbsp;&nbsp;&nbsp;</a></li>
            <li class=""><a href="<?php print URL ?>monitor" style="COLOR: #ffffff"><span class="glyphicon glyphicon-modal-window"></span> Monitor &nbsp;&nbsp;&nbsp;</a></li>
        </ul>
        <?php
            if(Session::get('loggedIn')){
                $login=Session::get('login');
        ?>
        <ul class="nav navbar-nav navbar-right" >
            <li><a style="COLOR: #ffffff" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $login; ?></a></li>
            <li><a style="COLOR: #ffffff" href="<?php print URL."login/logOut/"; ?>"><span class="glyphicon glyphicon-log-out"></span> Chiqish</a> </li>
        </ul>
        <?php }else{
        ?>
        <ul class="nav navbar-nav navbar-right" >
             <li class=""><a style="COLOR: #ffffff" href="<?php print URL;?>registration"><span class="glyphicon glyphicon-user"></span> Ro'yxatdan o'tish</a></li>
             <li class=""><a style="COLOR: #ffffff" href="<?php print URL;?>login/"><span class="glyphicon glyphicon-log-in"></span> Kirish </a> </li>
        </ul>
        <?php
        }?>
    </div>
</div>
</nav>
<div class="col-xs-12">