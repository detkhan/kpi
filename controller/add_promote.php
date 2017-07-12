<?php
session_start();
include("class/promote.php");
$position = $_POST["position"];
$employee_id = $_SESSION['employee_id'];

$promote= new promote;
$check_promote=$promote->addPromote($employee_id,$position);
  ?>
  <script type="text/javascript">
    window.location="../dashboard.php";
  </script>
