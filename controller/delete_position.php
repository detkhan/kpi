<?php
session_start();
include("class/position.php");
$position_id=$_GET["position_id"];
$position= new position;
$del_position=$position->delPosition($position_id);
  ?>
  <script type="text/javascript">
    window.location="../dashboard.php?page=listposition";
  </script>
