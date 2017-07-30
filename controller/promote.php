<?php
include("class/promote.php");
include("class/criteria.php");
$employee_id = $_SESSION['employee_id'];
$position_id = $_SESSION['position_id'];
$promote= new promote;
$check_promote=$promote->checkPromote($employee_id);
if($check_promote=="true"){
  ?>
  <script type="text/javascript">
    window.location="dashboard.php?page=listcriteria";
  </script>
  <?php
  exit();
}
$check_position=$promote->checkPositionPromote($position_id);
$criteria= new criteria;


  ?>
 ?>
