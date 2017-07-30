<?php
session_start();
include("class/promote.php");
include("class/criteria.php");
$position_id = $_GET["position_id"];
$employee_id = $_SESSION['employee_id'];
$position_criteria_id = unserialize($_GET["position_criteria_id"]);
//var_dump($position_criteria_id);
$criteria_detail=unserialize($_GET["criteria_detail"]);
$approver_id=unserialize($_GET["approver_id"]);
$promote= new promote;
$check_promote=$promote->addPromote($employee_id,$position_id);
for ($i=0; $i < sizeof($position_criteria_id) ; $i++) {
  $criteria_detail_add =$criteria_detail[$i];
  $position_criteria_id_add=$position_criteria_id[$i];
  $approver_id_add=$approver_id[$i];
  $status = "You can Do it";
  $color ="col-yellow";
  $ojbcriteria= new criteria;
  $add_criteria=$ojbcriteria->addCriteria($employee_id,$criteria_detail_add,$position_criteria_id_add,$status,$color,$approver_id_add);
}

  ?>
  <script type="text/javascript">
    window.location="../dashboard.php?page=listcriteria";
  </script>
