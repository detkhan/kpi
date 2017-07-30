<?php
session_start();
include("class/user.php");
$name=$_POST["name"];
$username=$_POST["username"];
$employee_id=$_POST["employee_id"];
$position_id=$_POST["position_id"];

  $user= new user;
  $add_user=$user->editUser($employee_id,$name,$username,$position_id);
    ?>
    <script type="text/javascript">
      window.location="../dashboard.php?page=listemployee";
    </script>
