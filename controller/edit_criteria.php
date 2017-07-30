<?php
session_start();
include("class/criteria.php");
$criteria_id=$_POST["criteria_id"];
$status=$_POST["status"];
$progress=$_POST["progress"];

  $criteria= new criteria;
  $edit_criteria=$criteria->editCriteria($criteria_id,$status,$progress);
    ?>
    <script type="text/javascript">
      window.location="../dashboard.php?page=listemployee";
    </script>
