<?php
include("class/user.php");
$employee_id=$_GET["employee_id"];
$user= new user;
$position=new position;
$get_user=$user->getUser($employee_id);
  ?>
