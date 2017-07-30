<?php
require_once("class/criteria.php");
require_once("class/trainning.php");
$obj_criteria= new criteria;
$data_criteria=$obj_criteria->countCriteria("not_all");
$data_criteria_all=$obj_criteria->countCriteria("all");
$data_criteria_list=$obj_criteria->listCriteria();
$data_sum_progress=$obj_criteria->calSum();
$data_kpi=$obj_criteria->calculateKpi($data_sum_progress[0]['sum_progress'],$data_criteria);

$obj_trainning= new trainning;
$data_count_in_house=$obj_trainning->countInHouse();
$data_count_trainning_course=$obj_trainning->countTrainningCourse();
$data_trainning_remaining=$obj_trainning->TrainningRemaining();



 ?>
