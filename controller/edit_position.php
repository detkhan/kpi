<?php
session_start();
include("class/position.php");
$position_id=$_POST["position_id"];
$position_name=$_POST["position_name"];
$position= new position;
$add_position=$position->editPosition($position_id,$position_name);
  ?>
  <script type="text/javascript">
    window.location="../dashboard.php?page=listposition";
  </script>
