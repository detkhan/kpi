<?php
session_start();
include("class/criteria.php");
$position_criteria_id=$_GET['position_criteria_id'];
$criteria= new criteria;
$del_position_criteria=$criteria->delPositionCriteria($position_criteria_id);
  ?>
  <script type="text/javascript">
    window.location="../dashboard.php?page=listposition";
  </script>
