<?php
session_start();
include("class/position.php");
$position_name=$_POST["position_name"];
$position= new position;
$add_position=$position->addPosition($position_name);
  ?>
  <script type="text/javascript">
    window.location="../dashboard.php?page=listposition";
  </script>
