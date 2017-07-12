<?php
require_once("class/criteria.php");
$obj_criteria= new criteria;
$data_criteria=$obj_criteria->countCriteria("not_all");
$data_criteria_all=$obj_criteria->countCriteria("all");




 ?>
