<?php
include("class/position.php");
include("class/promote.php");
$position= new position;
$position_list=$position->listPosition();
$promote= new promote;

  ?>
