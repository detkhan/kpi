<?php
session_start();
include("class/trainning.php");
$train_course_name = $_POST["train_course_name"];
$train_course_cost= $_POST["train_course_cost"];
$train_course_day= $_POST["train_course_day"];
$employee_id = $_SESSION['employee_id'];
$obj_trainning= new trainning;
$add_criteria=$obj_trainning->addTrainningCourse($train_course_name,$employee_id,$train_course_cost,$train_course_day);
  ?>
  <script type="text/javascript">
    window.location="../dashboard.php?page=list_training_course";
  </script>
