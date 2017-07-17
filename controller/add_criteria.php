<?php
session_start();
include("class/criteria.php");
$criteria = $_POST["criteria"];
$status = $_POST["status"];
$color = $_POST["color"];
$employee_id = $_SESSION['employee_id'];
$ojbcriteria= new criteria;
$add_criteria=$ojbcriteria->addCriteria($criteria,$status,$color,$employee_id);
  ?>
  <script type="text/javascript">
    window.location="../dashboard.php?page=listcriteria";
  </script>
