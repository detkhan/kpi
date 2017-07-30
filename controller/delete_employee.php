<?php
session_start();
include("class/user.php");
$employee_id=$_GET["employee_id"];
$user= new user;
$del_user=$user->delUser($employee_id);
  ?>
  <script type="text/javascript">
    window.location="../dashboard.php?page=listemployee";
  </script>
