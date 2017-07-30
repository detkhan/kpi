<?php
include("class/user.php");
include("class/position.php");
include("class/promote.php");
$user= new user;
$user_list=$user->listUser();
$promote= new promote;
$ojb_position=new position;

  ?>
