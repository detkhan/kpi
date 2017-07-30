<?php
include("class/position.php");
include("class/user.php");
$position_id=$_GET["position_id"];
$position= new position;
$get_position=$position->getPosition($position_id);
$user= new user;
$list_user=$user->listUser();
  ?>
