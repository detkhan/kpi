<?php
include("class/position.php");
$position_id=$_GET["position_id"];
$position= new position;
$get_position=$position->getPosition($position_id);
$position_list=$position->listgetPosition($position_id);
  ?>
