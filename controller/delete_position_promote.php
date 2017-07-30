<?php
session_start();
include("class/promote.php");
$position_promote_id=$_GET['position_promote_id'];
$promote= new promote;
$del_promote=$promote->delPositionPromote($position_promote_id);
  ?>
  <script type="text/javascript">
    window.location="../dashboard.php?page=listposition";
  </script>
