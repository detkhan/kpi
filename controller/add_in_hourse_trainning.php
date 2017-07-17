<?php
session_start();
include("class/trainning.php");
$in_house_train_name = $_POST["in_house_train_name"];
$in_house_train_day = $_POST["in_house_train_day"];
$employee_id = $_SESSION['employee_id'];
$obj_trainning= new trainning;
$add_criteria=$obj_trainning->addInHourse($in_house_train_name,$in_house_train_day,$employee_id);
  ?>
  <script type="text/javascript">
    window.location="../dashboard.php?page=list_inhouse_training";
  </script>
