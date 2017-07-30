<?php
session_start();
include("class/criteria.php");
$position_id=$_POST['position_id'];
$criteria_detail=$_POST['criteria_detail'];
$approver_id=$_POST['approver_id'];
$criteria= new criteria;
$add_position_criteria=$criteria->addPositionCriteria($position_id,$criteria_detail,$approver_id)

  ?>
  <script type="text/javascript">
    window.location="../dashboard.php?page=listposition";
  </script>
