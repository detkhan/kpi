<?php
session_start();
include("class/promote.php");
$employee_id = $_SESSION['employee_id'];
echo "employee_id=".$employee_id;
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
 ?>
